<?php

namespace App\Http\Controllers;

use App\Http\Requests\PertanyaanRequest;
use App\Http\Requests\JawabanRequest;
use App\Events\PertanyaanAnswered;
use App\Events\NewPertanyaan;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Pertanyaan;
use BrowserDetect;
use Gate;

class PertanyaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	public function index(Request $request)
	{
		$view = BrowserDetect::isMobile() ? 'pertanyaan.mobile.index' : 'pertanyaan.index';
		$search 	= str_replace(' ', '%', $request->search);
		// $showOnly 	= (auth()->guest() || (auth()->check() && !auth()->user()->isUstadz() && !auth()->user()->isAdmin()));
		$showOnly 	= true;
		$pertanyaans = Pertanyaan::when($showOnly, function($query) {
								return $query->where('status', 's');
							})->when($search, function($query) use ($search) {
								return $query->where('judul_pertanyaan', 'like', '%'.$search.'%');
							})->when($request->group_id, function($query) use ($request) {
								return $query->where('group_id', $request->group_id);
							})->when($request->user_id, function($query) use ($request) {
								return $query->where('user_id', $request->user_id);
							})->orderBy('created', 'DESC')->paginate();

		if ($request->ajax()) {
			$html = '';

			foreach ($pertanyaans as $a) {
				$html .= view('pertanyaan.mobile._list', ['a' => $a]);
			}

			return response()->json([
				'html' 			=> $html,
				'nextPageUrl' 	=> $pertanyaans->nextPageUrl(),
				'currentPage'	=> $pertanyaans->currentPage(),
				'lastPage'		=> $pertanyaans->lastPage(),
			]);
		}

		return view($view, ['pertanyaans' => $pertanyaans]);
	}

	public function mine(Request $request)
	{
		$view = BrowserDetect::isMobile() ? 'pertanyaan.mobile.mine' : 'pertanyaan.mine';
		$search = str_replace(' ', '%', $request->q);
		$pertanyaans = auth()->user()->pertanyaans()->when($request->q, function($query) use ($request) {
								return $query->join('groups', 'groups.group_id', '=', 'pertanyaan.group_id', 'left')
                                    ->where(function($q) use($request) {
                                        return $q->where('judul_pertanyaan', 'LIKE', '%'.str_replace(' ', '%', $request->q).'%')
                                            ->orWhere('groups.group_name', 'LIKE', '%'.str_replace(' ', '%', $request->q).'%');
                                    });
							})->when($request->status, function($query) use ($request) {
								return $query->where('status', $request->status);
							})->orderBy('pertanyaan.created', 'DESC')->paginate();

		if ($request->ajax()) {
			$html = '';

			foreach ($pertanyaans as $a) {
				$html .= view('pertanyaan.mobile._list', ['a' => $a]);
			}

			return response()->json([
				'html' 			=> $html,
				'nextPageUrl' 	=> $pertanyaans->nextPageUrl(),
				'currentPage'	=> $pertanyaans->currentPage(),
				'lastPage'		=> $pertanyaans->lastPage(),
			]);
		}

		return view($view, ['pertanyaans' => $pertanyaans]);
	}

	public function admin(Request $request)
	{
		return view('pertanyaan.admin', [
			'pertanyaans' => Pertanyaan::select('pertanyaan.*')->when($request->q, function($query) use ($request) {
									return $query->join('groups', 'groups.group_id', '=', 'pertanyaan.group_id', 'left')
                                        ->where(function($q) use($request) {
                                            return $q->where('judul_pertanyaan', 'LIKE', '%'.str_replace(' ', '%', $request->q).'%')
                                                ->orWhere('groups.group_name', 'LIKE', '%'.str_replace(' ', '%', $request->q).'%');
                                        });
								})->when($request->status, function($query) use ($request) {
									return $query->where('status', $request->status);
								})->orderBy('pertanyaan.created', 'DESC')->paginate(),
		]);
	}

	public function adminUstadz(Request $request)
	{
		if (!auth()->user()->isAdmin() && !auth()->user()->isUstadz()) {
			abort(403);
		}

		$view = BrowserDetect::isMobile() ? 'pertanyaan.mobile.ustadz.admin' : 'pertanyaan.ustadz.admin';
		return view($view, [
			'pertanyaans' => Pertanyaan::select('pertanyaan.*')->when($request->q, function($query) use ($request) {
									return $query->join('groups', 'groups.group_id', '=', 'pertanyaan.group_id', 'left')
                                        ->where(function($q) use($request) {
                                            return $q->where('judul_pertanyaan', 'LIKE', '%'.str_replace(' ', '%', $request->q).'%')
                                                ->orWhere('groups.group_name', 'LIKE', '%'.str_replace(' ', '%', $request->q).'%');
                                        });
								})->when($request->status, function($query) use ($request) {
									return $query->where('status', $request->status);
								})->orderBy('pertanyaan.created', 'DESC')->paginate(),
		]);
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$view = BrowserDetect::isMobile() ? 'pertanyaan.mobile.create' : 'pertanyaan.create';
        return view($view, ['pertanyaan' => new Pertanyaan]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PertanyaanRequest $request)
    {
		$data 				= $request->all();
		$data['kd_judul']	= str_slug($request->judul_pertanyaan);
		$data['user_id']	= auth()->user()->user_id;
		$data['tgl_tanya'] 	= date('Y-m-d H:i:s');
		$data['createdby'] 	= auth()->user()->name;
		$data['ket_pertanyaan'] = clean($request->ket_pertanyaan);

        $pertanyaan = Pertanyaan::create($data);
        event(new NewPertanyaan($pertanyaan));
		return redirect()->action('PertanyaanController@show', ['pertanyaan' => $pertanyaan]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pertanyaan $pertanyaan)
    {
		$view = BrowserDetect::isMobile() ? 'pertanyaan.mobile.show' : 'pertanyaan.show';

		return view($view, [
			'pertanyaan' 	=> $pertanyaan,
			'terkait'		=> Pertanyaan::where('group_id', $pertanyaan->group_id)
									->show()->orderByRaw('RAND()')->limit(10)->get()
		]);
    }

    public function baca($slug)
    {
		$view = BrowserDetect::isMobile() ? 'pertanyaan.mobile.show' : 'pertanyaan.show';
		$pertanyaan = Pertanyaan::where('kd_judul', $slug)->firstOrFail();

        return view($view, [
			'pertanyaan' 	=> $pertanyaan,
			'terkait'		=> Pertanyaan::where('group_id', $pertanyaan->group_id)
									->show()->orderByRaw('RAND()')->limit(5)->get()
		]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pertanyaan $pertanyaan)
    {
		if (Gate::denies('update-pertanyaan', $pertanyaan)) {
			abort(403);
		}

		$view = BrowserDetect::isMobile() ? 'pertanyaan.mobile.edit' : 'pertanyaan.edit';
        return view($view, ['pertanyaan' => $pertanyaan]);
    }

    public function jawab(Pertanyaan $pertanyaan)
    {
		// if (Gate::denies('jawab-pertanyaan', $pertanyaan)) {
		// 	abort(403);
		// }

		if (!auth()->user()->isAdmin() && !auth()->user()->isUstadz()) {
			abort(403);
		}

		$view = BrowserDetect::isMobile() ? 'pertanyaan.mobile.jawab' : 'pertanyaan.ustadz.jawab';
        return view($view, ['pertanyaan' => $pertanyaan]);
    }

	public function simpanJawaban(JawabanRequest $request, Pertanyaan $pertanyaan)
	{
		// if (Gate::denies('jawab-pertanyaan', $pertanyaan)) {
		// 	abort(403);
		// }

		if (!auth()->user()->isAdmin() && !auth()->user()->isUstadz()) {
			abort(403);
		}

		$data 					= $request->all();
		$data['dijawab_oleh'] 	= auth()->user()->user_id;
		$data['tgl_jawab'] 		= date('Y-m-d H:i:s');
		$data['jawaban'] 		= $request->jawaban;

		$pertanyaan->update($data);
        event(new PertanyaanAnswered($pertanyaan));
		return redirect()->action('PertanyaanController@show', ['pertanyaan' => $pertanyaan])
						->with('success', 'Jawaban telah disimpan');
	}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PertanyaanRequest $request, Pertanyaan $pertanyaan)
    {
		if (Gate::denies('update-pertanyaan', $pertanyaan)) {
			abort(403);
		}

		$data 				= $request->all();
		$data['updatedby']	= auth()->user()->name;
		$data['kd_judul']	= str_slug($request->judul_pertanyaan);
		$data['ket_pertanyaan'] = clean($request->ket_pertanyaan);

		$pertanyaan->update($data);
        return redirect('/pertanyaan-saya');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pertanyaan $pertanyaan, Request $request)
    {
		if (Gate::denies('delete-pertanyaan', $pertanyaan)) {
			abort(403);
		}

        $pertanyaan->delete();
		return redirect($request->redirect)->with('success', 'Data berhasil dihapus');
    }
}
