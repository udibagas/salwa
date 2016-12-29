<?php

namespace App\Http\Controllers;

use App\Http\Requests\VideoRequest;
use Illuminate\Http\Request;
use App\Events\ShowVideo;
use App\Events\NewVideo;
use App\Http\Requests;
use BrowserDetect;
use App\Video;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		$view = BrowserDetect::isMobile() ? 'video.mobile.index' : 'video.index';
		$search = str_replace(' ', '%', $request->search);

		$videos = Video::video()->when($search, function($query) use ($search) {
						return $query->where('title', 'like', '%'.$search.'%');
					})->when($request->user_id, function($query) use ($request) {
						return $query->where('user_id', $request->user_id);
					})->orderBy('updated', 'DESC')->paginate();

		if ($request->ajax()) {
			$html = '';

			foreach ($videos as $a) {
				$html .= view('video.mobile._list', ['a' => $a]);
			}

			return response()->json([
				'html' 			=> $html,
				'nextPageUrl' 	=> $videos->nextPageUrl(),
				'currentPage'	=> $videos->currentPage(),
				'lastPage'		=> $videos->lastPage(),
			]);
		}

        return view($view, ['videos' => $videos]);
    }

    public function admin(Request $request)
    {
		$title = str_replace(' ', '%', $request->title);

        return view('video.admin', [
			'videos' => Video::video()->when($title, function($query) use ($title) {
							return $query->where('title', 'like', '%'.$title.'%');
						})->when($request->url_video_youtube, function($query) use ($request) {
							return $query->where('url_video_youtube', 'like', '%'.$request->url_video_youtube.'%');
						})->when($request->user, function($query) use ($request) {
							return $query->join('users', 'users.user_id', '=', 'videos.user_id')
								->where('users.name', 'like', '%'.$request->user.'%');
						})->orderBy('videos.updated', 'DESC')->paginate()
		]);
    }

    public function indexAudio()
    {
        return view('video.indexAudio', ['audios' => Video::audio()->orderBy('updated', 'DESC')->paginate()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$view = BrowserDetect::isMobile() ? 'video.mobile.create' : 'video.create';
        return view($view, ['video' => new Video]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VideoRequest $request)
    {
		$data 					= $request->all();
		$data['desc']			= clean($request->desc);
		$data['title_code'] 	= str_slug($request->title);
		$data['date'] 			= date('Y-m-d H:i:s');
		$data['createdby'] 		= auth()->user()->name;

		if ($request->hasFile('img')) {

            $file = $request->file('img');

            $fileName = time().'_'.$file->getClientOriginalName();
            $file->move('uploads/dirimg_video', $fileName);

            $data['img_video'] = 'uploads/dirimg_video/'.$fileName;

        }

		$video = Video::create($data);
        event(new NewVideo($video));
		return redirect('/video/'.$video->video_id)->with('success', 'Video berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
		$view = 'video.show';
        event(new ShowVideo($video));

		if (BrowserDetect::isMobile()) {
			$view =  'video.mobile.show';
		}

		// if (BrowserDetect::isTablet()) {
		// 	$view =  'video.tablet.show';
		// }

        return view($view, [
			'video' 	=> $video,
			'terkait'	=> Video::where('user_id', $video->user_id)->orderByRaw('RAND()')->limit(10)->get()
		]);
    }

	public function lihat($slug)
    {
		$view = 'video.show';
        event(new ShowVideo($video));

		if (BrowserDetect::isMobile()) {
			$view =  'video.mobile.show';
		}

		$video = Video::where('title_code', $slug)->firstOrFail();

        return view($view, [
			'video' 	=> $video,
			'terkait'	=> Video::where('user_id', $video->user_id)->orderByRaw('RAND()')->limit(6)->get()
		]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
		$view = BrowserDetect::isMobile() ? 'video.mobile.edit' : 'video.edit';
		return view($view, ['video' => $video]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VideoRequest $request, Video $video)
    {
		$data 					= $request->all();
		$data['desc']			= clean($request->desc);
		$data['title_code'] 	= str_slug($request->title);
		$data['updatedby'] 		= auth()->user()->name;

		if ($request->hasFile('img')) {

            $file = $request->file('img');

            $fileName = time().'_'.$file->getClientOriginalName();
            $file->move('uploads/dirimg_video', $fileName);

            $data['img_video'] = 'uploads/dirimg_video/'.$fileName;

			if ($video->img_video && file_exists($video->img_video)) {
				unlink($video->img_video);
			}

        }

		$video->update($data);
        return redirect('/video/'.$video->video_id)->with('success', 'Video berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video, Request $request)
    {
        $video->delete();

		if ($video->img_video && file_exists($video->img_video)) {
			unlink($video->img_video);
		}

		return redirect($request->redirect)->with('success', 'Data berhasil dihapus');
    }
}
