<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\ProdukRequest;
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
        return view('produk.create', ['produk' => new Produk]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProdukRequest $request)
    {
		$data 					= $request->all();
		$data['kd_judul'] 		= str_slug($request->judul);
		$data['tgl_artikel'] 	= date('Y-m-d H:i:s');
		$data['isi_mobile'] 	= $data['isi'];
		$data['ringkasan'] 		= str_limit($data['isi'], 250);
		$data['createdby'] 		= auth()->user()->name;

		if ($request->hasFile('img')) {

            $file = $request->file('img');

            $fileName = time().'_'.$file->getClientOriginalName();
            $file->move('uploads/dirimg_artikel', $fileName);

            $data['img_artikel'] = 'uploads/dirimg_artikel/'.$fileName;

        }

		Produk::create($data);
		return redirect('/produk/admin')->with('success', 'Produk berhasil disimpan');
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
    public function edit(Produk $produk)
    {
        return view('produk.edit', ['produk' => $produk]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProdukRequest $request, Produk $produk)
    {

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
