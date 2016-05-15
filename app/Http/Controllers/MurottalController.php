<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Murottal;

class MurottalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		$search = str_replace(' ', '%', $request->search);

        return view('murottal.admin', [
			'murottals' => Murottal::when($search, function($query) use ($search) {
						return $query->where('nama_surat', 'like', '%'.$search.'%');
					})->orderBy('nama_surat', 'ASC')->paginate()
		]);
    }

	public function admin(Request $request)
    {
		$search = str_replace(' ', '%', $request->search);

        return view('murottal.admin', [
			'murottals' => Murottal::when($search, function($query) use ($search) {
						return $query->where('nama_surat', 'like', '%'.$search.'%');
					})->orderBy('nama_surat', 'ASC')->paginate()
		]);
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
    public function show(Murottal $murottal)
    {
        return view('murottal.show', [
			'murottal' 	=> $murottal,
		]);
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
}
