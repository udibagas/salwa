<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\PertanyaanRequest;
use App\Http\Requests\ForumRequest;
use App\SalwaTimeline;
use BrowserDetect;
use App\Pertanyaan;
use App\Forum;

class TimelineController extends Controller
{
	public function index(Request $request)
	{
		$view = BrowserDetect::isMobile() ? 'timeline.mobile.index' : 'timeline.index';

		$timeStart = microtime(true);
		$micro = null;

		$posts = SalwaTimeline::when($request->q, function($query) use ($request) {
					$q = str_replace(' ', '%', $request->q);
					return $query->where('title', 'like', '%'.$q.'%')
								->orWhere('content', 'like', '%'.$q.'%');
				})->when($request->type, function($query) use ($request) {
					return $query->where('type', $request->type);
				})->orderBy('time', 'DESC')->paginate();


	    $diff = microtime(true) - $timeStart;
	    $sec = intval($diff);
	    $micro = $diff - $sec;

		if ($request->ajax()) {
			$html = '';

			foreach ($posts as $p) {
				$html .= view('timeline.mobile._item', ['p' => $p]);
			}

			return response()->json([
				'html' 			=> $html,
				'nextPageUrl' 	=> $posts->nextPageUrl(),
				'currentPage'	=> $posts->currentPage(),
				'lastPage'		=> $posts->lastPage(),
			]);
		}

		return view($view, [
			'posts' => $posts,
			'time' => round($micro * 1000, 4)
		]);
	}

	public function create()
	{
		return view('timeline.mobile.create', [
			'pertanyaan'	=> new Pertanyaan,
			'forum' 		=> new Forum,
		]);
	}

	public function postPertanyaan(PertanyaanRequest $request)
    {
		$data 				= $request->all();
		$data['kd_judul']	= str_slug($request->judul_pertanyaan);
		$data['user_id']	= auth()->user()->user_id;
		$data['tgl_tanya'] 	= date('Y-m-d H:i:s');
		$data['createdby'] 	= auth()->user()->name;
		$data['ket_pertanyaan'] = clean($request->ket_pertanyaan);

        $pertanyaan = Pertanyaan::create($data);
		return redirect('/timeline')->with('Pertanyaan Anda akan ditampilkan setelah dijawab oleh team Redaksi Salamdakwah');
    }

	public function postForum(ForumRequest $request)
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

		return redirect('/timeline');
    }

	public function hamil(Request $request)
	{
		
	}
}
