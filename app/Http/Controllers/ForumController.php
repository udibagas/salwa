<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\PostRequest;
use App\Http\Requests\ForumRequest;
use App\Forum;
use App\Group;
use App\Post;
use Gate;
use BrowserDetect;

class ForumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$view = BrowserDetect::isMobile() ? 'forum.mobile.index' : 'forum.index';
        return view($view, [
			'forums' => Forum::active()->orderBy('updated', 'DESC')->paginate(),
			'groups' => Group::forum()->active()->orderBy('group_name', 'ASC')->get()
		]);
    }

    public function mine(Request $request)
    {
		$view = BrowserDetect::isMobile() ? 'forum.mobile.mine' : 'forum.mine';
		$forums = Forum::where('user_id', auth()->user()->user_id)->active()->orderBy('updated', 'DESC')->paginate();

		if ($request->ajax()) {
			$html = '';

			foreach ($forums as $a) {
				$html .= view('forum.mobile._list', ['a' => $a]);
			}

			return response()->json([
				'html' 			=> $html,
				'nextPageUrl' 	=> $forums->nextPageUrl(),
				'currentPage'	=> $forums->currentPage(),
				'lastPage'		=> $forums->lastPage(),
			]);
		}

        return view($view, [
			'forums' => $forums,
			'groups' => Group::forum()->active()->orderBy('group_name', 'ASC')->get(),
		]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$view = BrowserDetect::isMobile() ? 'forum.mobile.create' : 'forum.create';
        return view($view, ['forum' => new Forum, 'post' => null]);
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

		$post = $forum->posts()->create([
			'user_id'		=> auth()->user()->user_id,
			'description'	=> clean($request->description),
			'date'			=> date('Y-m-d H:i:s'),
			'createdby'		=> auth()->user()->name
		]);

		if ($request->hasFile('img')) {

			foreach ($request->file('img') as $file) {

	            $fileName = time().'_'.$file->getClientOriginalName();
	            $file->move('uploads/dirimg_image', $fileName);

				$post->images()->create([
					'img_image'		=> 'uploads/dirimg_image/'.$fileName,
					'image_desc' 	=> $file->getClientOriginalName()
				]);
			}
        }

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
		$view = BrowserDetect::isMobile() ? 'forum.mobile.show' : 'forum.show';

        return view($view, [
			'forum' 	=> $forum,
			'posts'		=> $forum->posts()->orderBy('created', 'ASC')->get(),
			'terkait'	=> Forum::where('group_id', $forum->group_id)->limit(10)->orderByRaw('RAND()')->get(),
			'post'		=> new Post(['forum_id' => $forum->forum_id])
		]);
    }

    public function baca($slug)
    {
		$view = BrowserDetect::isMobile() ? 'forum.mobile.show' : 'forum.show';
		$forum = Forum::where('title_code', $slug)->firstOrFail();

        return view($view, [
			'forum' 	=> $forum,
			'posts'		=> $forum->posts()->orderBy('created', 'ASC')->get(),
			'terkait'	=> Forum::where('group_id', $forum->group_id)->limit(5)->orderByRaw('RAND()')->get(),
			'post'		=> new Post(['forum_id' => $forum->forum_id])
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
		if (Gate::denies('update-forum', $forum)) {
			abort(403);
		}

		$view = BrowserDetect::isMobile() ? 'forum.mobile.edit' : 'forum.edit';
		$post = $forum->posts()
				->where('user_id', $forum->user_id)
				->orderBy('post_id', 'ASC')->first();

        return view($view, ['forum' => $forum, 'post' => $post]);
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
		if (Gate::denies('update-forum', $forum)) {
			abort(403);
		}

		$data 				= $request->all();
		$data['title_code']	= str_slug($request->title);
		$data['updatedby'] 	= auth()->user()->name;

		$comment = [
			'description'	=> clean($request->description),
			'updatedby'		=> auth()->user()->name,
		];

		$forum->update($data);

		$post = $forum->posts()
				->where('user_id', $forum->user_id)
				->orderBy('post_id', 'ASC')->first();

		if ($post) {
			$post->update($comment);
		} else {
			$post = Post::create($comment);
		}

		if ($request->hasFile('img')) {

			foreach ($request->file('img') as $file) {

	            $fileName = time().'_'.$file->getClientOriginalName();
	            $file->move('uploads/dirimg_image', $fileName);

				$post->images()->create([
					'img_image'		=> 'uploads/dirimg_image/'.$fileName,
					'image_desc' 	=> $file->getClientOriginalName()
				]);
			}
        }

		if (auth()->user()->isAdmin() && auth()->user()->user_id !== $forum->user_id) {
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
    public function destroy(Forum $forum, Request $request)
    {
		if (Gate::denies('delete-forum', $forum)) {
			abort(403);
		}

        $forum->delete();

		// hapus semua post & image
		foreach ($forum->posts as $post) {
			$post->delete();

			foreach ($post->images as $image) {
				$image->delete();
				if ($image->img_image && file_exists($image->img_image)) {
					unlink($image->img_image);
				}
			}
		}

		return redirect($request->redirect)->with('success', 'Data berhasil dihapus');
    }

	public function category(Group $group, Request $request)
	{
		$view = BrowserDetect::isMobile() ? 'forum.mobile.category' : 'forum.category';
		$forums = $group->forums()->orderBy('updated', 'DESC')->paginate();

		if ($request->ajax()) {
			$html = '';

			foreach ($forums as $a) {
				$html .= view('forum.mobile._list', ['a' => $a]);
			}

			return response()->json([
				'html' 			=> $html,
				'nextPageUrl' 	=> $forums->nextPageUrl(),
				'currentPage'	=> $forums->currentPage(),
				'lastPage'		=> $forums->lastPage(),
			]);
		}

		return view($view, [
			'groups' 	=> Group::forum()->active()->orderBy('group_name', 'ASC')->get(),
			'group' 	=> $group,
			'forums' 	=> $forums
		]);
	}

	public function search(Request $request)
	{
		$view = BrowserDetect::isMobile() ? 'forum.mobile.search' : 'forum.search';
		$group_id = $request->group_id;
		$search = str_replace(' ', '%', $request->search);
		$forums = Forum::active()->when($search, function($query) use ($search) {
							return $query->where('title', 'like', '%'.$search.'%');
						})->when($group_id, function($query) use ($group_id) {
							return $query->where('group_id', $group_id);
						})->orderBy('forum_id', 'DESC')->paginate();

		if ($request->ajax()) {
			$html = '';

			foreach ($forums as $a) {
				$html .= view('forum.mobile._list', ['a' => $a]);
			}

			return response()->json([
				'html' 			=> $html,
				'nextPageUrl' 	=> $forums->nextPageUrl(),
				'currentPage'	=> $forums->currentPage(),
				'lastPage'		=> $forums->lastPage(),
			]);
		}

		return view($view, [
			'groups' 	=> Group::forum()->active()->orderBy('group_name', 'ASC')->get(),
			'group'		=> Group::find($group_id),
			'search'	=> $request->search,
			'forums' 	=> $forums
		]);
	}

	public function admin(Request $request)
	{
		$title		= str_replace(' ', '%', $request->title);

		return view('forum.admin', [
			'forums' 	=> Forum::when($title, function($query) use ($title) {
								return $query->where('title', 'like', '%'.$title.'%');
							})->when($request->group_id, function($query) use ($request) {
								return $query->where('group_id', $request->group_id);
							})->when($request->user, function($query) use ($request) {
								return $query->join('users', 'users.user_id', '=', 'forums.user_id')
											->where('users.name', 'like', '%'.$request->user.'%');
											// ->orWhere('users.user_name', 'like', '%'.$request->user.'%')
											// ->orWhere('users.email', 'like', '%'.$request->user.'%');
							})->orderBy('forums.forum_id', 'DESC')->paginate()
		]);
	}

	public function activate(Forum $forum, Request $request)
	{
		$forum->update(['status' => 'a']);
		return redirect($request->redirect);
	}

	public function deactivate(Forum $forum, Request $request)
	{
		$forum->update(['status' => 'b']);
		return redirect($request->redirect);
	}

	public function open(Forum $forum, Request $request)
	{
		$forum->update(['close' => 'N']);
		return redirect($request->redirect);
	}

	public function close(Forum $forum, Request $request)
	{
		$forum->update(['close' => 'Y']);
		return redirect($request->redirect);
	}
}
