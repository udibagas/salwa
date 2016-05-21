<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\PertanyaanRequest;
use App\Http\Requests\JawabanRequest;

use App\Pertanyaan;
use App\User;
use Auth;

class PertanyaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	public function index(Request $request)
	{
		$search = str_replace(' ', '%', $request->search);

		return view('pertanyaan.index', [
			'pertanyaans' => Pertanyaan::show()
								->when($search, function($query) use ($search) {
									return $query->where('judul_pertanyaan', 'like', '%'.$search.'%')
												->orWhere('ket_pertanyaan', 'like', '%'.$search.'%');
								})->orderBy('updated', 'DESC')->paginate(),
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
								})->orderBy('pertanyaan.updated', 'DESC')->paginate(),
		]);
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pertanyaan.create', ['model' => new Pertanyaan]);
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
		$data['user_id']	= auth()->user()->user_id;
		$data['tgl_tanya'] 	= date('Y-m-d H:i:s');
		$data['createdby'] 	= auth()->user()->name;

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
        return view('pertanyaan.show', [
			'pertanyaan' 	=> $pertanyaan,
			'terkait'	=> Pertanyaan::where('user_id', $pertanyaan->user_id)->show()->limit(5)->get()
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
        return view('pertanyaan.edit', ['pertanyaan' => $pertanyaan]);
    }

    public function jawab(Pertanyaan $pertanyaan)
    {
        return view('pertanyaan.jawab', ['pertanyaan' => $pertanyaan]);
    }

	public function simpanJawaban(JawabanRequest $request, Pertanyaan $pertanyaan)
	{
		$data = $request->all();
		$data['dijawab_oleh'] = auth()->user()->user_id;
		$data['tgl_jawab'] = date('Y-m-d H:i:s');
		$pertanyaan->update($data);

		if (auth()->user()->user_status == User::ROLE_ADMIN) {
			return redirect('/pertanyaan/admin')->with('success', 'Jawaban telah disimpan');
		} else if (auth()->user()->user_status == User::ROLE_USTADZ) {
			return redirect()->action('PertanyaanController@show', ['pertanyaan' => $pertanyaan])
							->with('success', 'Jawaban telah disimpan');
		}

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
		$pertanyaan->update($request->all());
		return redirect()->action('PertanyaanController@show', ['pertanyaan' => $pertanyaan]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pertanyaan $pertanyaan)
    {
        $pertanyaan->delete();
		return redirect('/pertanyaan/admin');
    }
}
