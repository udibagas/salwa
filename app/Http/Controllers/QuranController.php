<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Ayah;
use App\Surah;
use BrowserDetect;

class QuranController extends Controller
{
	public function index(Request $request)
	{
		$view = BrowserDetect::isMobile() ? 'quran.mobile.ayah' : 'quran.ayah';

		if (is_numeric($request->search)) {
			return redirect('/quran/'.$request->search);
		}

		$ayats = Ayah::when($request->search, function($query) use ($request) {
					$keyword = str_replace(' ', '%', $request->search);
					return $query->where('ayat_text', 'LIKE', '%'.$keyword.'%')
								->orWhere('terjemahan', 'LIKE', '%'.$keyword.'%');
				})->paginate();

		if ($request->ajax()) {
			return $this->getAyatsJson($ayats);
		}

		// $pattern1 = '/[1]/';
		// $pattern2 = '/[0-9](:[0-9])/';
		// $pattern3 = '/[0-9](:[0-9](-[0-9]))/';
		//
		// $a = preg_match($pattern3, $request->search, $matches1);
		// $b = preg_match($pattern2, $request->search, $matches2);
		// $c = preg_match($pattern1, $request->search, $matches3);

		// if ($a) {
		// 	return redirect('/quran/'.$matches1[0]);
		// }
		//
		// if ($b) {
		// 	return redirect('/quran/'.$matches2[0]);
		// }
		//
		// if ($c) {
		// 	return redirect('/quran/'.$matches3[0]);
		// }

		return view($view, ['ayats' => $ayats]);
	}

    public function surah(Surah $surah, Request $request)
	{
		$view = BrowserDetect::isMobile() ? 'quran.mobile.surah' : 'quran.surah';
		$ayats = $surah->ayats()->paginate();

		if ($request->ajax()) {
			return $this->getAyatsJson($ayats);
		}

		return view($view, [
			'surah' => $surah,
			'ayats' => $ayats
		]);
	}

    public function ayah(Request $request, Surah $surah, $from, $to = 0)
	{
		$view = BrowserDetect::isMobile() ? 'quran.mobile.ayah' : 'quran.ayah';

		if ($to == 0) {
			$to = $from;
		}

		$ayats = $surah->ayats()->whereRaw('ayat_id BETWEEN '.$from.' AND '.$to)->paginate();

		if ($request->ajax()) {
			return $this->getAyatsJson($ayats);
		}

		return view($view, [
			'surah'	=> $surah,
			'ayats'	=> $ayats
		]);
	}

	protected function getAyatsJson($ayats)
	{
		$html = '';

		foreach ($ayats as $a) {
			$html .= view('quran.mobile._ayat', ['a' => $a]);
		}

		return response()->json([
			'html' 			=> $html,
			'nextPageUrl' 	=> $ayats->nextPageUrl(),
			'currentPage'	=> $ayats->currentPage(),
			'lastPage'		=> $ayats->lastPage(),
		]);
	}
}
