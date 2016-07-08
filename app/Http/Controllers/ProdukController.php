<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\ProdukRequest;
use App\Produk;
use BrowserDetect;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		$view = BrowserDetect::isMobile() ? 'produk.mobile.index' : 'produk.index';
		$search = str_replace(' ', '%', $request->search);
		$produks = Produk::when($request->group_id, function($query) use ($request) {
							return $query->where('group_id', $request->group_id);
						})->when($search, function($query) use ($search) {
							return $query->where('judul', 'like', '%'.$search.'%');
						})->orderBy('updated', 'DESC')->paginate(16);

		if ($request->ajax()) {
			$html = '';

			foreach ($produks as $a) {
				$html .= view('produk.mobile._list', ['a' => $a]);
			}

			return response()->json([
				'html'			=> $html,
				'nextPageUrl'	=> $produks->nextPageUrl(),
				'currentPage'	=> $produks->currentPage(),
				'lastPage'		=> $produks->lastPage(),
			]);
		}

        return view($view, ['produks' => $produks]);
    }

    public function admin(Request $request)
    {
		$judul = str_replace(' ', '%', $request->judul);

        return view('produk.admin', [
			'produks' => Produk::when($request->group_id, function($query) use ($request) {
								return $query->where('group_id', $request->group_id);
							})->when($judul, function($query) use ($judul) {
								return $query->where('judul', 'like', '%'.$judul.'%');
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
		$view = BrowserDetect::isMobile() ? 'produk.mobile.create' : 'produk.create';
        return view($view, ['produk' => new Produk]);
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
		// $data['sinopsis_kecil']	= str_limit(clean($data['sinopsis']), 100);
		$data['createdby'] 		= auth()->user()->name;

		if ($request->hasFile('img')) {

            $file = $request->file('img');

            $fileName = time().'_'.$file->getClientOriginalName();
            $file->move('uploads/dirimg_buku', $fileName);

            $data['img_buku'] = 'uploads/dirimg_buku/'.$fileName;

        }

		$produk = Produk::create($data);
		return redirect('/produk/'.$produk->id_produk)->with('success', 'Produk berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
		$view = BrowserDetect::isMobile() ? 'produk.mobile.show' : 'produk.show';

        return view($view, [
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
		$view = BrowserDetect::isMobile() ? 'produk.mobile.edit' : 'produk.edit';
        return view($view, ['produk' => $produk]);
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
		$data 					= $request->all();
		$data['kd_judul'] 		= str_slug($request->judul);
		// $data['sinopsis_kecil']	= str_limit(clean($data['sinopsis']), 100);
		$data['updatedby'] 		= auth()->user()->name;

		if ($request->hasFile('img')) {

            $file = $request->file('img');

            $fileName = time().'_'.$file->getClientOriginalName();
            $file->move('uploads/dirimg_buku', $fileName);

            $data['img_buku'] = 'uploads/dirimg_buku/'.$fileName;

        }

		$produk->update($data);
		return redirect('/produk/'.$produk->id_produk)->with('success', 'Produk berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk, Request $request)
    {
        $produk->delete();

		if ($produk->img_buku && file_exists($produk->img_buku)) {
			unlink($produk->img_buku);
		}

		return redirect($request->redirect)->with('success', 'Data berhasil dihapus');
    }
}
