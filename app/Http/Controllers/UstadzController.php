<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\UstadzRequest;
use App\Ustadz;
use Response;

class UstadzController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin(Request $request)
    {
        return view('ustadz.admin', [
			'ustadzs' => Ustadz::orderBy('ustadz_name', 'ASC')
							->when($request->ustadz_name, function($query) use ($request) {
								$query->where('ustadz_name', 'like', '%'.$request->ustadz_name.'%');
							})->when($request->address, function($query) use ($request) {
								$query->where('address', 'like', '%'.$request->address.'%');
							})->when($request->phone, function($query) use ($request) {
								$query->where('phone', 'like', '%'.$request->phone.'%');
							})->when($request->ustadz_gender, function($query) use ($request) {
								$query->where('ustadz_gender', $request->ustadz_gender);
							})->when($request->ustadz_status, function($query) use ($request) {
								$query->where('ustadz_status', $request->ustadz_status);
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
        return view('ustadz.create', ['ustadz' => new Ustadz]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UstadzRequest $request)
    {
        $data 				= $request->all();
		$data['createdby']	= auth()->user()->name;

		Ustadz::create($data);
		return redirect('ustadz/admin')->with('Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Ustadz $ustadz)
    {
        return view('ustadz.show', ['ustadz' => $ustadz]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Ustadz $ustadz)
    {
        return view('ustadz.edit', ['ustadz' => $ustadz]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UstadzRequest $request, Ustadz $ustadz)
    {
		$data 				= $request->all();
		$data['updatedby']	= auth()->user()->name;

		$ustadz->update($data);
		return redirect('ustadz/admin')->with('Data berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ustadz $ustadz)
    {
		$ustadz->delete();
		return redirect('/ustadz/admin')->with('success', 'Data berhasil disimpan');
    }

	// API
	public function apiIndex(Request $request)
	{
		return Ustadz::when($request->ustadz_name, function($query) use ($request) {
						return $query->where('ustadz_name', 'like', '%'.$request->ustadz_name.'%');
					})->orderBy('ustadz_name', 'ASC')->paginate(10);
	}

	public function apiShow(Ustadz $ustadz)
	{
		return $ustadz;
	}
}
