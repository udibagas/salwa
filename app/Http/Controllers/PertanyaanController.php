<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\PertanyaanRequest;
use App\Http\Requests\JawabanRequest;

use App\Pertanyaan;

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
			'pertanyaans' 	=> Pertanyaan::show()
								->when($search, function($query) use ($search) {
									return $query->where('judul_pertanyaan', 'like', '%'.$search.'%')
												->orWhere('ket_pertanyaan', 'like', '%'.$search.'%');
								})->when($request->search == 'belum dijawab', function($query) {
									return $query->where('jawaban', '');
								})->orderBy('updated', 'DESC')->paginate(),
		]);
	}

	public function admin(Request $request)
	{
		$search = str_replace(' ', '%', $request->search);

		return view('pertanyaan.admin', [
			'pertanyaans' 	=> Pertanyaan::when($request->search == 'belum dijawab', function($query) {
									return $query->where('jawaban', '');
								})->when($search, function($query) use ($search) {
									return $query->where('judul_pertanyaan', 'like', '%'.$search.'%');
												// ->orWhere('ket_pertanyaan', 'like', '%'.$search.'%');
								})->orderBy('updated', 'DESC')->paginate(),
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
        $pertanyaan = Pertanyaan::create($request->all());
		$pertanyaan->user_id = Auth::user()->user_id;
		$pertanyaan->save();

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
		$data['tanggal_jawab'] = date('Y-m-d H:i:s');
		$pertanyaan->update($data);

		return redirect('/pertanyaan/admin')->with('success', 'Jawaban telah disimpan');
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
