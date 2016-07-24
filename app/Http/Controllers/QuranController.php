<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

use App\Http\Requests;
use App\Ayah;
use App\Surah;
use App\Tafsir;
use BrowserDetect;

class QuranController extends Controller
{
	public function index(Request $request)
	{
		$view = BrowserDetect::isMobile() ? 'quran.mobile.main' : 'quran.index';

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
								->orWhere('surah.nama', 'LIKE', '%'.$keyword.'%');
				})->paginate();

		if ($request->ajax()) {
			return $this->getAyatsJson($ayats);
		}

		return view($view, [
			'ayats' => $ayats,
			'surah' => Surah::find(1),
		]);
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
		$view = BrowserDetect::isMobile() ? 'quran.mobile.main' : 'quran.index';
		$ayats = $surah->ayats()->paginate();

		if ($request->ajax()) {
			return $this->getAyatsJson($ayats);
		}

		return view($view, [
			'surah' => $surah,
			'ayats' => $ayats,
		]);
	}

    public function ayah(Request $request, Surah $surah, $from, $to = 0)
	{
		$view = BrowserDetect::isMobile() ? 'quran.mobile.main' : 'quran.index';

		if ($to == 0) {
			$to = $from;
		}

		$ayats = $surah->ayats()->whereRaw('ayat_id BETWEEN '.$from.' AND '.$to)->paginate();

		if ($request->ajax()) {
			return $this->getAyatsJson($ayats);
		}

		return view($view, [
			'surah'	=> $surah,
			'ayats'	=> $ayats,
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

	public function downloadAudio(Request $request)
	{
		$ayat 		= Ayah::findOrFail($request->id);
		$audioDir 	= 'quran_audio';
		$qari 		= $request->qari;
		$surah		= str_pad($ayat->surat_id, 3, '0', STR_PAD_LEFT);
		$ayah		= str_pad($ayat->ayat_id, 3, '0', STR_PAD_LEFT);
		$fileAudio	= $audioDir.'/'.$qari.'/'.$surah.'/'.$ayah.'.mp3';

		if (!file_exists($fileAudio)) {
			return abort(404);
		}

		return response()->download($fileAudio, 'Surah_'.$ayat->surat->nama.'_'.$ayah.'_'.$qari.'.mp3');
	}

	public function detailAyah($ayah)
	{
		$ayah = Ayah::findOrFail($ayah);
		$tafsir = Tafsir::where('from_ayah', '>=', $ayah->ayat_id)
					// ->where('to_ayah', '<=', $ayah->ayat_id)
					// ->where('surah_id', $ayah->surat_id)
					->orderBy('from_ayah', 'ASC')->get();

		return view('quran._detail-ayah', [
			'ayah' => $ayah,
			'tafsir' => $tafsir
		]);
	}
}
