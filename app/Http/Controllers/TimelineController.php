<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\SalwaTimeline;
use BrowserDetect;

class TimelineController extends Controller
{
    // public function index1()
	// {
	// 	$view			= BrowserDetect::isMobile() ? 'timeline.mobile.index' : 'timeline.index';
	// 	$viewPartial	= BrowserDetect::isMobile() ? 'timeline.mobile._list' : 'timeline._list';
	// 	$search			= str_replace(' ', '%', $request->q);
	// 	$posts			= SalwaTimeline::when($search, function($query) use ($search) {
	// 							return $query->where('title', 'LIKE' '%'.$search.'%')
	// 										->orWhere('body', 'LIKE' '%'.$search.'%');
	// 						})->orderBy('updated', 'DESC')->paginate();
	//
	// 	if ($request->ajax()) {
	// 		$html = '';
	//
	// 		foreach ($posts as $a) {
	// 			$html .= view($viewPartial, ['p' => $p]);
	// 		}
	//
	// 		return response()->json([
	// 			'html' 			=> $html,
	// 			'nextPageUrl' 	=> $posts->nextPageUrl(),
	// 			'currentPage'	=> $posts->currentPage(),
	// 			'lastPage'		=> $posts->lastPage(),
	// 		]);
	// 	}
	//
	// 	return view($view, ['posts' => $posts]);
	// }

	public function index(Request $request)
	{
		$view = BrowserDetect::isMobile() ? 'timeline.mobile.index' : 'timeline.index';

		$timeStart = microtime(true);
		$micro = null;

		$posts = SalwaTimeline::when($request->q, function($query) use ($request) {
			$q = str_replace(' ', '%', $request->q);
			return $query->where('judul', 'like', '%'.$q.'%')
			->orWhere('isi', 'like', '%'.$q.'%')
			->orWhere('judul', 'like', '%'.strtolower($q).'%')
			->orWhere('isi', 'like', '%'.strtolower($q).'%')
			->orWhere('judul', 'like', '%'.strtoupper($q).'%')
			->orWhere('isi', 'like', '%'.strtoupper($q).'%')
			->orWhere('judul', 'like', '%'.ucfirst($q).'%')
			->orWhere('isi', 'like', '%'.ucfirst($q).'%');
		})->orderBy('tanggal', 'DESC')->paginate();


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
