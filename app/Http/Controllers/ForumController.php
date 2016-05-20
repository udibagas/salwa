<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CommentRequest;
use App\Http\Requests\ForumRequest;

use App\Forum;
use App\Group;
use App\Post;
use App\User;

use Auth;

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
			'model' => new Forum
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
		$data 				= $request->all();
		$data['user_id'] 	= auth()->user()->user_id;
		$data['title_code'] = str_slug($request->title);
		$data['date'] 		= date('Y-m-d H:i:s');
		$data['createdby'] 	= auth()->user()->name;

    	$forum = Forum::create($data);

		$forum->posts()->create([
			'user_id'		=> auth()->user()->user_id,
			'description'	=> $request->description,
			'date'			=> date('Y-m-d H:i:s'),
			'createdby'		=> auth()->user()->name
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
			'posts'		=> $forum->posts()->orderBy('created', 'ASC')->paginate(),
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
    public function edit(Forum $forum)
    {
		$view = auth()->user()->user_status == User::ROLE_ADMIN ? 'forum.edit-admin' : 'forum.edit';
        return view($view, ['forum' => $forum]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ForumRequest $request, Forum $forum)
    {
		$data 				= $request->all();
		$data['title_code']	= str_slug($request->title);
		$data['updatedby'] 	= auth()->user()->name;

		$forum->update($data);

		$forum->post()->update([
			'description'	=> $request->description,
			'updatedby'		=> auth()->user()->name,
		]);

		if (auth()->user()->user_status == User::ROLE_ADMIN) {
			return redirect('forum/admin')->with('success', 'Forum berhasil disimpan');
		} else {
			return redirect()->action('ForumController@show', ['forum' => $forum])->with('success', 'Forum berhasil disimpan');
		}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Forum $forum)
    {
        $forum->delete();
		Post::where('forum_id', $forum->forum_id)->delete();
		return redirect('/forum/admin');
    }

	public function category(Group $group)
	{
		return view('forum.category', [
			'groups' 	=> Group::forum()->orderBy('group_name', 'ASC')->get(),
			'group' 	=> $group,
			'forums' 	=> $group->forums()->orderBy('updated', 'DESC')->paginate()
		]);
	}

	public function search(Request $request)
	{
		$group_id	= $request->group_id;
		$search		= str_replace(' ', '%', $request->search);

		return view('forum.search', [
			'groups' 	=> Group::forum()->orderBy('group_name', 'ASC')->get(),
			'group'		=> Group::find($group_id),
			'search'	=> $request->search,
			'forums' 	=> Forum::when($search, function($query) use ($search) {
								return $query->where('title', 'like', '%'.$search.'%');
							})->when($group_id, function($query) use ($group_id) {
								return $query->where('group_id', $group_id);
							})->orderBy('updated', 'DESC')->paginate()
		]);
	}

	public function admin(Request $request)
	{
		$search		= str_replace(' ', '%', $request->search);

		return view('forum.admin', [
			'forums' 	=> Forum::when($search, function($query) use ($search) {
								return $query->where('title', 'like', '%'.$search.'%');
							})->orderBy('updated', 'DESC')->paginate()
		]);
	}

	public function comment(CommentRequest $request)
	{
		$post = Post::create($request->all());
		$post->user_id = Auth::user()->user_id;
		$post->save();

		return redirect()->action('ForumController@show', ['forum' => $post->forum]);
	}
}
