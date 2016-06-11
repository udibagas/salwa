<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\AreaRequest;
use App\Area;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function apiIndex(Request $request)
    {
        $data = Area::when($request->id_lokasi, function($query) use ($request) {
					return $query->where('id_lokasi', $request->id_lokasi);
				})->orderBy('nama_area', 'ASC')->get();

		return response()->json([
			'results'	=> $data,
			'total'		=> $data->count(),
		]);
    }

	public function index(Request $request)
    {
		return view('area.index', [
			'areas' => Area::when($request->id_lokasi, function($query) use ($request) {
							return $query->where('id_lokasi', $request->id_lokasi);
						})->when($request->nama_area, function($query) use ($request) {
							return $query->where('nama_area', 'like', '%'.$request->nama_area.'%');
						})->orderBy('nama_area', 'ASC')->paginate()
		]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('area.create', ['area' => new Area]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AreaRequest $request)
    {
        $data 				= $request->all();
		$data['createdby']	= auth()->user()->name;

		Area::create($data);
		return redirect('area')->with('success', 'Data berhasil disimpan');
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
    public function edit(Area $area)
    {
        return view('area.edit', ['area' => $area]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AreaRequest $request, Area $area)
    {
		$data 				= $request->all();
		$data['updatedby']	= auth()->user()->name;

		$area->update($data);
		return redirect('area')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Area $area, Request $request)
    {
		$area->delete();
		return redirect($request->redirect)->with('success', 'Data berhasil disimpan');
    }
}
