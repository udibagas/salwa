<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\PertanyaanRequest;
use App\Http\Requests\JawabanRequest;
use App\Pertanyaan;
use Gate;
use BrowserDetect;

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

		return view($view, [
			'pertanyaans' => Pertanyaan::when($showOnly, function($query) {
									return $query->where('status', 's');
								})->when($search, function($query) use ($search) {
									return $query->where('judul_pertanyaan', 'like', '%'.$search.'%');
								})->when($request->group_id, function($query) use ($request) {
									return $query->where('group_id', $request->group_id);
								})->orderBy('created', 'DESC')->simplePaginate(),
		]);
	}

	public function mine(Request $request)
	{
		$view = BrowserDetect::isMobile() ? 'pertanyaan.mobile.mine' : 'pertanyaan.mine';
		$search 	= str_replace(' ', '%', $request->search);

		return view($view, [
			'pertanyaans' => Pertanyaan::where('user_id', auth()->user()->user_id)
								->when($search, function($query) use ($search) {
									return $query->where('judul_pertanyaan', 'like', '%'.$search.'%');
								})->when($request->group_id, function($query) use ($request) {
									return $query->where('group_id', $request->group_id);
								})->orderBy('created', 'DESC')->simplePaginate(),
		]);
	}

	public function admin(Request $request)
	{
		return view('pertanyaan.admin', [
			'pertanyaans' => Pertanyaan::when($request->judul_pertanyaan, function($query) use ($request) {
									return $query->where('judul_pertanyaan', 'like', '%'.$request->judul_pertanyaan.'%');
								})->when($request->status, function($query) use ($request) {
									return $query->where('status', $request->status);
								})->when($request->jawaban == 'belum', function($query) use ($request) {
									return $query->where('jawaban', NULL);
								})->when($request->jawaban == 'sudah', function($query) use ($request) {
									return $query->where('jawaban', '!=', '');
								})->when($request->user, function($query) use ($request) {
									return $query->join('users', 'users.user_id', '=', 'pertanyaan.user_id')
												->where('users.name', 'like', '%'.$request->user.'%');
								})->when($request->dijawab_oleh, function($query) use ($request) {
									return $query->where('dijawab_oleh', $request->dijawab_oleh);
								})->when($request->jenis_kelamin, function($query) use ($request) {
									return $query->join('users as u', 'u.user_id', '=', 'pertanyaan.user_id')
												->where('u.jenis_kelamin',  $request->jenis_kelamin);
								})->when($request->group_id, function($query) use ($request) {
									return $query->where('group_id', $request->group_id);
								})->orderBy('pertanyaan.created', 'DESC')->paginate(),
		]);
	}

	public function adminUstadz(Request $request)
	{
		$view = BrowserDetect::isMobile() ? 'pertanyaan.mobile.ustadz.admin' : 'pertanyaan.ustadz.admin';
		return view($view, [
			'pertanyaans' => Pertanyaan::when($request->judul_pertanyaan, function($query) use ($request) {
									return $query->where('judul_pertanyaan', 'like', '%'.$request->judul_pertanyaan.'%');
								})->when($request->status, function($query) use ($request) {
									return $query->where('status', $request->status);
								})->when($request->jawaban == 'belum', function($query) use ($request) {
									return $query->where('jawaban', NULL);
								})->when($request->jawaban == 'sudah', function($query) use ($request) {
									return $query->where('jawaban', '!=', '');
								})->when($request->user, function($query) use ($request) {
									return $query->join('users', 'users.user_id', '=', 'pertanyaan.user_id')
												->where('users.name', 'like', '%'.$request->user.'%');
								})->when($request->dijawab_oleh, function($query) use ($request) {
									return $query->where('dijawab_oleh', $request->dijawab_oleh);
								})->when($request->jenis_kelamin, function($query) use ($request) {
									return $query->join('users as u', 'u.user_id', '=', 'pertanyaan.user_id')
												->where('u.jenis_kelamin',  $request->jenis_kelamin);
								})->when($request->group_id, function($query) use ($request) {
									return $query->where('group_id', $request->group_id);
								})->orderBy('pertanyaan.created', 'DESC')->simplePaginate(),
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
									->show()->orderByRaw('RAND()')->limit(5)->get()
		]);
    }

    public function baca($slug)
    {
		$pertanyaan = Pertanyaan::where('kd_judul', $slug)->firstOrFail();

        return view('pertanyaan.show', [
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

        return view('pertanyaan.edit', ['pertanyaan' => $pertanyaan]);
    }

    public function jawab(Pertanyaan $pertanyaan)
    {
		// if (Gate::denies('jawab-pertanyaan', $pertanyaan)) {
		// 	abort(403);
		// }

        return view('pertanyaan.ustadz.jawab', ['pertanyaan' => $pertanyaan]);
    }

	public function simpanJawaban(JawabanRequest $request, Pertanyaan $pertanyaan)
	{
		// if (Gate::denies('jawab-pertanyaan', $pertanyaan)) {
		// 	abort(403);
		// }

		$data 					= $request->all();
		$data['dijawab_oleh'] 	= auth()->user()->user_id;
		$data['tgl_jawab'] 		= date('Y-m-d H:i:s');
		$data['jawaban'] 		= $request->jawaban;

		$pertanyaan->update($data);
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

		if (auth()->user()->isAdmin()) {
			return redirect('/pertanyaan/admin');
		} elseif (auth()->user()->isUstadz()) {
			return redirect('/pertanyaan/admin-ustadz');
		} else {
			return redirect()->action('PertanyaanController@show', ['pertanyaan' => $pertanyaan]);
		}
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
