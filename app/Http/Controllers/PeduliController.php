<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Peduli;

class PeduliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		$search = str_replace(' ', '%', $request->search);

        return view('peduli.index', [
			'pedulis' => Peduli::when($search, function($query) use ($search) {
								return $query->where('judul', 'like', '%'.$search.'%');
							})->when($request->group_id, function($query) use ($request) {
								return $query->where('group_id', $request->group_id);
							})->orderBy('updated', 'DESC')->paginate(20)
		]);
    }

    public function admin(Request $request)
    {
		$search = str_replace(' ', '%', $request->search);

        return view('peduli.admin', [
			'pedulis' => Peduli::when($search, function($query) use ($search) {
								return $query->where('judul', 'like', '%'.$search.'%');
							})->when($request->group_id, function($query) use ($request) {
								return $query->where('group_id', $request->group_id);
							})->orderBy('updated', 'DESC')->paginate()
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
    public function show(Peduli $peduli)
    {
        return view('peduli.show', [
			'peduli' => $peduli,
			'terkait'	=> Peduli::where('user_id', $peduli->user_id)->limit(4)->get()
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
