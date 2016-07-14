<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\SalwaTimeline;

class TimelineController extends Controller
{
    public function index()
	{
		$view			= BrowserDetect::isMobile() ? 'timeline.mobile.index' : 'timeline.index';
		$viewPartial	= BrowserDetect::isMobile() ? 'timeline.mobile._list' : 'timeline._list';
		$search			= str_replace(' ', '%', $request->q);
		$posts			= SalwaTimeline::when($search, function($query) use ($search) {
								return $query->where('title', 'LIKE' '%'.$search.'%')
											->orWhere('body', 'LIKE' '%'.$search.'%');
							})->orderBy('updated', 'DESC')->paginate();

		if ($request->ajax()) {
			$html = '';

			foreach ($posts as $a) {
				$html .= view($viewPartial, ['p' => $p]);
			}

			return response()->json([
				'html' 			=> $html,
				'nextPageUrl' 	=> $posts->nextPageUrl(),
				'currentPage'	=> $posts->currentPage(),
				'lastPage'		=> $posts->lastPage(),
			]);
		}

		return view($view, ['posts' => $posts]);
	}
}
