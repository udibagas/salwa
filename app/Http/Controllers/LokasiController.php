<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\LokasiRequest;
use App\Lokasi;

class LokasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function apiIndex()
    {
        return Lokasi::orderBy('nama_lokasi', 'ASC')->get();
    }

	public function index(Request $request)
	{
		return view('lokasi.index', [
			'lokasis' => Lokasi::orderBy('nama_lokasi', 'ASC')
						->when($request->nama_lokasi, function($query) use ($request) {
							return $query->where('nama_lokasi', 'like', '%'.$request->nama_lokasi.'%');
						})->paginate()
		]);
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lokasi.create', ['lokasi' => new Lokasi]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LokasiRequest $request)
    {
        $data 				= $request->all();
		$data['createdby']	= auth()->user()->name;

		Lokasi::create($data);
		return redirect('/lokasi')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Lokasi $lokasi)
    {
    	return view('lokasi.edit', ['lokasi' => $lokasi]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LokasiRequest $request, Lokasi $lokasi)
    {
        $data 				= $request->all();
		$data['updatedby']	= auth()->user()->name;

		$lokasi->update($data);
		return redirect('/lokasi')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lokasi $lokasi)
    {
        $lokasi->delete();
		return redirect('/lokasi')->with('success', 'Data berhasil disimpan');
    }
}
