<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Kajian;
use Response;

class KajianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

	// API
	public function apiIndex(Request $request)
	{
		return Kajian::when($request->id_lokasi, function($query) use($request) {
					return $query->where('id_lokasi', $request->id_lokasi);
				})->when($request->id_area, function($query) use($request) {
					return $query->where('id_area', $request->id_area);
				})->when($request->kajian_tema, function($query) use($request) {
					return $query->where('kajian_tema', 'like', '%'.$request->kajian_tema.'%');
				})->when($request->kajian_ustadz_id, function($query) use($request) {
					return $query->where('kajian_ustadz_id', $request->kajian_ustadz_id);
				})->when($request->today, function($query) {
					return $query->whereRaw('DATE(kajian_dates) = '.date('Y-m-d'));
				})->orderBy('created', 'ASC')->paginate(10);
	}

	public function apiShow(Kajian $kajian)
	{
		return $kajian;
	}

	public function apiDelete(Kajian $kajian)
	{
		$kajian->delete();

		return Response::json([
			'succes'	=> true,
			'msg'		=> 'Data berhasil dihapus',
			'error'		=> false,
			'status'	=> delete
		]);
	}
}
