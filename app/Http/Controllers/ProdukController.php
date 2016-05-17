<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Produk;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		$search = str_replace(' ', '%', $request->search);

        return view('produk.index', [
			'produks' => Produk::when($request->group_id, function($query) use ($request) {
								return $query->where('group_id', $request->group_id);
							})->when($search, function($query) use ($search) {
								return $query->where('judul', 'like', '%'.$search.'%');
							})->orderBy('updated', 'DESC')->paginate(20)
		]);
    }

    public function admin(Request $request)
    {
		$search = str_replace(' ', '%', $request->search);

        return view('produk.admin', [
			'produks' => Produk::when($request->group_id, function($query) use ($request) {
								return $query->where('group_id', $request->group_id);
							})->when($search, function($query) use ($search) {
								return $query->where('judul', 'like', '%'.$search.'%');
							})->orderBy('updated', 'DESC')->paginate(20)
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
    public function show(Produk $produk)
    {
        return view('produk.show', [
			'produk' => $produk,
			'terkait'	=> Produk::where('group_id', $produk->group_id)->limit(3)->get()
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
    public function destroy(Produk $produk)
    {
        $produk->delete();
		return redirect('/produk/admin');
    }
}
