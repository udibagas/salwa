<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CommentRequest;
use App\Http\Requests\ForumRequest;

use App\Forum;
use App\Group;
use App\Post;

class ForumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('forum.index', [
			'forums' => Forum::orderBy('updated', 'DESC')->paginate(),
			'groups' => Group::forum()->orderBy('group_name', 'ASC')->get()
		]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('forum.create', [
			'model' => new Forum([
				'user_id' => 44
			])
		]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ForumRequest $request)
    {
    	$forum = Forum::create($request->all());
		$forum->user_id = 44;
		$forum->save();

		$comment = Post::create([
			'user_id' 	=> 44,
			'forum_id'	=> $forum->forum_id,
			'description'	=> $request->description
		]);

		return redirect()->action('ForumController@show', ['forum' => $forum]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Forum $forum)
    {
        return view('forum.show', [
			'forum' 	=> $forum,
			'posts'		=> $forum->posts()->paginate(),
			'terkait'	=> Forum::where('group_id', $forum->group_id)->limit(5)->get(),
			'model'		=> new Post
		]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

	public function category(Group $group)
	{
		return view('forum.category', [
			'groups' 	=> Group::forum()->orderBy('group_name', 'ASC')->get(),
			'group' 	=> $group,
			'forums' 	=> $group->forums()->orderBy('updated', 'DESC')->paginate()
		]);
	}

	public function comment(CommentRequest $request)
	{
		$post = Post::create($request->all());
		$post->user_id = 44;
		$post->save();

		return redirect()->action('ForumController@show', ['forum' => $post->forum]);
	}
}
