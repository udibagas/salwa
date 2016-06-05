<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CommentRequest;
use App\Comment;
use Gate;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('comment.admin', [
			'comments' => Comment::orderBy('id', 'DESC')
							->when($request->type, function($query) use ($request) {
								return $query->ofType($request->type);
							})->when($request->user, function($query) use ($request) {
								return $query->join('users', 'users.user_id', '=', 'comments.user_id')
											->where('users.name', 'like', '%'.$request->user.'%');
							})->when($request->title, function($query) use ($request) {
								return $query->where('title', 'like', '%'.$request->title.'%');
							})->when($request->approved == 'yes', function($query) use ($request) {
								return $query->approved();
							})->when($request->approved == 'no', function($query) use ($request) {
								return $query->unapproved();
							})->paginate()
		]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentRequest $request)
    {
        $data 				= $request->all();
		$data['content']	= clean($request->content);
		$data['user_id']	= auth()->user()->user_id;

		Comment::create($data);
		return redirect($request->redirect)->with('success', 'Komentar Anda akan tampil setelah dimoderasi.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
		if (Gate::denies('update-comment', $comment)) {
			abort(403);
		}

        return view('comment.edit', ['comment' => $comment]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CommentRequest $request, Comment $comment)
    {
		if (Gate::denies('update-comment', $comment)) {
			abort(403);
		}

		$data = $request->all();
		$data['content'] = clean($request->content);
        $comment->update($data);
		return redirect($comment->commentable_type.'/'.$comment->commentable_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment, Request $request)
    {
        $comment->delete();
		return redirect($request->redirect);
    }

	public function approve(Comment $comment, Request $request)
	{
		$comment->update(['approved' => 1]);
		$redirect = $request->redirect ? $request->redirect : '/comment';
		return redirect($redirect);
	}

	public function approveAll()
	{
		Comment::where('approved', 0)->update(['approved' => 1]);
		return redirect('/comment');
	}
}
