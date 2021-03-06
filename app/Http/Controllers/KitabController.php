<?php

namespace App\Http\Controllers;

use App\Http\Requests\BukuRequest;
use Illuminate\Http\Request;
use App\Events\NewKitab;
use App\Http\Requests;
use BrowserDetect;
use App\Buku;

class KitabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		$view = BrowserDetect::isMobile() ? 'kitab.mobile.index' : 'kitab.index';
		$search = str_replace(' ', '%', $request->search);
		$kitabs = Buku::when($search, function($query) use ($search) {
						return $query->where('judul', 'like', '%'.$search.'%')
								->orWhere('penulis', 'like', '%'.$search.'%');
					})->when($request->group_id, function($query) use ($request) {
						return $query->where('group_id', $request->group_id);
					})->orderBy('created', 'DESC')->paginate(16);

		if ($request->ajax()) {
			$html = '';

			foreach ($kitabs as $a) {
				$html .= view('kitab.mobile._list', ['a' => $a]);
			}

			return response()->json([
				'html' 			=> $html,
				'nextPageUrl' 	=> $kitabs->nextPageUrl(),
				'currentPage'	=> $kitabs->currentPage(),
				'lastPage'		=> $kitabs->lastPage(),
			]);
		}

        return view($view, ['kitabs' => $kitabs]);
    }

    public function admin(Request $request)
    {
		$judul = str_replace(' ', '%', $request->judul);

        return view('kitab.admin', [
			'kitabs' => Buku::when($judul, function($query) use ($judul) {
							return $query->where('judul', 'like', '%'.$judul.'%');
						})->when($request->penulis, function($query) use ($request) {
							return $query->where('penulis', 'like', '%'.$request->penulis.'%');
						})->when($request->group_id, function($query) use ($request) {
							return $query->where('group_id', $request->group_id);
						})->orderBy('created', 'DESC')->paginate()
		]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$view = BrowserDetect::isMobile() ? 'kitab.mobile.create' : 'kitab.create';
        return view($view, ['kitab' => new Buku]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BukuRequest $request)
    {
		$data 					= $request->all();
		$data['materi']			= clean($request->materi);
		$data['kd_judul'] 		= str_slug($request->judul);
		$data['createdby'] 		= auth()->user()->name;

		if ($request->hasFile('img')) {

            $file = $request->file('img');

            $fileName = time().'_'.$file->getClientOriginalName();
            $file->move('uploads/dirimg_buku', $fileName);

            $data['img_buku'] = 'uploads/dirimg_buku/'.$fileName;

        }

		if ($request->hasFile('file')) {

            $file = $request->file('file');

            $fileName = time().'_'.$file->getClientOriginalName();
            $file->move('uploads/dirfile_pdf', $fileName);

            $data['file_pdf'] = 'uploads/dirfile_pdf/'.$fileName;

        }

		$buku = Buku::create($data);
        event(new NewKitab($buku));
		return redirect('/kitab/'.$buku->buku_id)->with('success', 'Buku berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Buku $kitab)
    {
		$view = BrowserDetect::isMobile() ? 'kitab.mobile.show' : 'kitab.show';
        return view($view, [
			'kitab' 	=> $kitab,
			'terkait'	=> Buku::where('group_id', $kitab->group_id)->limit(3)->orderByRaw('RAND()')->get()
		]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Buku $kitab)
    {
		$view = BrowserDetect::isMobile() ? 'kitab.mobile.edit' : 'kitab.edit';
        return view($view, ['kitab' => $kitab]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BukuRequest $request, Buku $kitab)
    {
		$data 					= $request->all();
		$data['materi']			= clean($request->materi);
		$data['kd_judul'] 		= str_slug($request->judul);
		$data['updatedby'] 		= auth()->user()->name;

		if ($request->hasFile('img')) {

            $file = $request->file('img');

            $fileName = time().'_'.$file->getClientOriginalName();
            $file->move('uploads/dirimg_buku', $fileName);

            $data['img_buku'] = 'uploads/dirimg_buku/'.$fileName;

			if ($kitab->img_buku && file_exists($kitab->img_buku)) {
				unlink($kitab->img_buku);
			}

        }

		if ($request->hasFile('file')) {

            $file = $request->file('file');

            $fileName = time().'_'.$file->getClientOriginalName();
            $file->move('uploads/dirfile_pdf', $fileName);

            $data['file_pdf'] = 'uploads/dirfile_pdf/'.$fileName;

			if ($kitab->file_pdf && file_exists($kitab->file_pdf)) {
				unlink($kitab->file_pdf);
			}

        }

		$kitab->update($data);
		return redirect('/kitab/'.$kitab->buku_id)->with('success', 'Buku berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Buku $kitab, Request $request)
    {
        $kitab->delete();

		if ($kitab->file_pdf && file_exists($kitab->file_pdf)) {
			unlink($kitab->file_pdf);
		}

		if ($kitab->img_buku && file_exists($kitab->img_buku)) {
			unlink($kitab->img_buku);
		}

		return redirect($request->redirect)->with('success', 'Data berhasil dihapus');
    }

	public function download(Buku $kitab)
	{
		if (!file_exists($kitab->file_pdf)) {
			return abort(404);
		}

        $kitab->didownload += 1;
        $kitab->save();
		return response()->download($kitab->file_pdf);
	}
}
