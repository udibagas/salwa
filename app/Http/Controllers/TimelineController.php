<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\SalwaTimeline;
use BrowserDetect;

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
				})when($request->type, function($query) use ($query) {
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
}
