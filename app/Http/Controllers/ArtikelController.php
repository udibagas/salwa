<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArtikelRequest;
use Illuminate\Http\Request;
use App\Events\ShowArtikel;
use App\Events\NewArtikel;
use App\Http\Requests;
use BrowserDetect;
use App\Artikel;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		$view = BrowserDetect::isMobile() ? 'artikel.mobile.index' : 'artikel.index';
		$search = str_replace(' ', '%', $request->search);

		$artikels = Artikel::when($request->group_id, function($query) use ($request) {
							return $query->where('group_id', $request->group_id);
						})->when($search, function($query) use ($search) {
							return $query->where('judul', 'like', '%'.$search.'%');
						})->orderBy('created', 'DESC')->paginate(16);

		if ($request->ajax()) {
			$html = '';

			foreach ($artikels as $a) {
				$html .= view('artikel.mobile._list', ['a' => $a]);
			}

			return response()->json([
				'html' 			=> $html,
				'nextPageUrl' 	=> $artikels->nextPageUrl(),
				'currentPage'	=> $artikels->currentPage(),
				'lastPage'		=> $artikels->lastPage(),
			]);
		}

        return view($view, ['artikels' => $artikels]);
    }

    public function admin(Request $request)
    {
        return view('artikel.admin', [
			'artikels' => Artikel::select('artikel.*')
                        ->when($request->q, function($query) use($request) {
                            return $query
                                ->join('groups', 'groups.group_id', '=', 'artikel.group_id', 'left')
                                ->join('users', 'users.user_id', '=', 'artikel.user_id', 'left')
                                ->where(function($q) use($request) {
                                    $search = str_replace(' ', '%', $request->q);
                                    return $q->where('judul', 'LIKE', '%'.$search.'%')
                                        ->orWhere('groups.group_name', 'LIKE', '%'.$search.'%')
                                        ->orWhere('users.name', 'like', '%'.$search.'%');
                                });
                        })->orderBy('artikel.created', 'DESC')->paginate()
		]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$view = BrowserDetect::isMobile() ? 'artikel.mobile.create' : 'artikel.create';
        return view($view, ['artikel' => new Artikel]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArtikelRequest $request)
    {
        $data 					= $request->all();
		$data['isi']			= $request->isi;
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

		$artikel = Artikel::create($data);
        event(new NewArtikel($artikel));
		return redirect('/artikel/'.$artikel->artikel_id)->with('success', 'Artikel berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Artikel $artikel)
    {
		$view = BrowserDetect::isMobile() ? 'artikel.mobile.show' : 'artikel.show';
        event(new ShowArtikel($artikel));

        return view($view, [
			'artikel' 	=> $artikel,
			'terkait'	=> Artikel::where('group_id', $artikel->group_id)->orderByRaw('RAND()')->limit(10)->get()
		]);
    }

    public function baca($slug)
    {
		$artikel = Artikel::where('kd_judul', $slug)->firstOrFail();
        event(new ShowArtikel($artikel));

        return view('artikel.show', [
			'artikel' 	=> $artikel,
			'terkait'	=> Artikel::where('group_id', $artikel->group_id)->orderByRaw('RAND()')->limit(4)->get()
		]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Artikel $artikel)
    {
		$view = BrowserDetect::isMobile() ? 'artikel.mobile.edit' : 'artikel.edit';
        return view($view, ['artikel' => $artikel]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArtikelRequest $request, Artikel $artikel)
    {
		$data 					= $request->all();
		$data['isi']			= $request->isi;
		$data['kd_judul'] 		= str_slug($request->judul);
		$data['isi_mobile'] 	= $data['isi'];
		$data['ringkasan'] 		= str_limit($data['isi'], 250);
		$data['updatedby'] 		= auth()->user()->name;

		if ($request->hasFile('img')) {

            $file = $request->file('img');
            $fileName = time().'_'.$file->getClientOriginalName();
            $file->move('uploads/dirimg_artikel', $fileName);

            $data['img_artikel'] = 'uploads/dirimg_artikel/'.$fileName;

			if ($artikel->img_artikel && file_exists($artikel->img_artikel)) {
				unlink($artikel->img_artikel);
			}
        }

		$artikel->update($data);
        return redirect('/artikel/'.$artikel->artikel_id)->with('success', 'Artikel berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Artikel $artikel, Request $request)
    {
        $artikel->delete();

		if ($artikel->img_artikel && file_exists($artikel->img_artikel)) {
			unlink($artikel->img_artikel);
		}
        // 
        $artikel->comments()->delete();
		return redirect($request->redirect)->with('success', 'Data berhasil dihapus');
    }
}
