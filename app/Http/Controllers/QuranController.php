<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

use App\Http\Requests;
use App\Ayah;
use App\Surah;
use BrowserDetect;

class QuranController extends Controller
{
	public function index(Request $request)
	{
		$view = BrowserDetect::isMobile() ? 'quran.mobile.main' : 'quran.ayah';

		if (is_numeric($request->q)) {
			return redirect('/quran/'.$request->q);
		}

		if (count(explode(':', $request->q) == 2))
		{
			$keywords = explode(':',$request->q);

			if (is_numeric($keywords[0]) && is_numeric($keywords[1])) {
				return redirect('/quran/'.$keywords[0].':'.$keywords[1]);
			}

			elseif (is_numeric($keywords[0]))
			{
				$ayatRange = explode('-', $keywords[1]);

				if (is_numeric($ayatRange[0]) && is_numeric($ayatRange[1])) {
					return redirect('/quran/'.$keywords[0].':'.$keywords[1]);
				}
			}
		}

		$ayats = Ayah::when($request->q, function($query) use ($request) {
					$keyword = str_replace(' ', '%', $request->q);
					return $query->join('surah', 'surah.id', '=', 'ayah.surat_id')
								->where('ayat_text', 'LIKE', '%'.$keyword.'%')
								->orWhere('terjemahan', 'LIKE', '%'.$keyword.'%')
								->orWhere('surah.nama', 'LIKE', '%'.$keyword.'%')
								->orWhere('surah.arti', 'LIKE', '%'.$keyword.'%');
				})->paginate();

		if ($request->ajax()) {
			return $this->getAyatsJson($ayats);
		}

		return view($view, ['ayats' => $ayats, 'surah' => Surah::find(1)]);
	}

	public function image(Request $request)
	{
		$view = BrowserDetect::isMobile() ? 'quran.mobile.image' : 'quran.image';

		if (!$request->page) {
			$request->page = 1;
		}

		if ($request->ajax())
		{
			$html = '<img src="/quran_image/page'.sprintf("%03d", $request->page).'.png" alt="" />';

			return response()->json(['html' => $html]);
		}

		return view($view, ['page' => $request->page]);
	}


    public function surah(Surah $surah, Request $request)
	{
		$view = BrowserDetect::isMobile() ? 'quran.mobile.main' : 'quran.surah';
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
		$view = BrowserDetect::isMobile() ? 'quran.mobile.main' : 'quran.ayah';

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
