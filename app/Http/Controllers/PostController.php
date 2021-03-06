<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use App\Events\NewPost;
use App\PostImage;
use BrowserDetect;
use App\Forum;
use App\Post;
use Gate;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('post.admin', [
			'posts' => Post::when($request->forum_id, function($query) use ($request) {
						return $query->where('forum_id', $request->forum_id);
					})->when($request->q, function($query) use ($request) {
						return $query->where('description', 'LIKE', '%'.str_replace(' ', '%', $request->q).'%');
					})->orderBy('created', 'ASC')->paginate(),
			'forum' => Forum::find($request->forum_id)
		]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create', ['model' => new Post]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
		$data 				= $request->all();
		$data['description']= clean($request->description);
		$data['user_id'] 	= auth()->user()->user_id;
		$data['createdby'] 	= auth()->user()->name;
		$data['date']		= date('Y-m-d H:i:s');

		$forum 	= Forum::find($request->forum_id);
		$post 	= $forum->posts()->create($data);
		$forum->updated = date('Y-m-d H:i:s');
		$forum->save();

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

        event(new NewPost($post));
		return redirect('/forum/'.$forum->forum_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
		if (Gate::denies('update-post', $post)) {
			abort(403);
		}

		$view = BrowserDetect::isMobile() ? 'post.mobile.edit' : 'post.edit';
        return view($view, ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
		if (Gate::denies('update-post', $post)) {
			abort(403);
		}

		$data 				= $request->all();
		$data['description']= clean($request->description);
		$data['updatedby'] 	= auth()->user()->name;

		$post->update($data);

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

		$forum = $post->forum;
		$forum->updated = date('Y-m-d H:i:s');
		$forum->save();

		return redirect('/forum/'.$forum->forum_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post, Request $request)
    {
		if (Gate::denies('delete-post', $post)) {
			abort(403);
		}

		$post->delete();

		foreach ($post->images as $image) {
			$image->delete();
			if ($image->img_image && file_exists($image->img_image)) {
				unlink($image->img_image);
			}
		}

		return redirect($request->redirect);
    }

	public function deleteImage(PostImage $image, Request $request)
	{
		if (Gate::denies('delete-post', $image->post)) {
			abort(403);
		}

		$image->delete();

		if ($image->img_image && file_exists($image->img_image)) {
			unlink($image->img_image);
		}

		return redirect($request->redirect);
	}

    public function mine(Request $request)
    {
        return view('post.mine', [
            'posts' => auth()->user()->posts()
                    ->when($request->q, function($query) use($request) {
                        return $query->where('description', 'LIKE', '%'.str_replace(' ', '%', $request->q).'%');
                    })->orderBy('post_id', 'DESC')->paginate()
        ]);
    }
}
