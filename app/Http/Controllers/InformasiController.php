<?php

namespace App\Http\Controllers;

use App\Http\Requests\InformasiRequest;
use App\Events\NewInformasi;
use Illuminate\Http\Request;
use App\InformasiFile;
use App\Http\Requests;
use App\Informasi;
use BrowserDetect;

class InformasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		$view = BrowserDetect::isMobile() ? 'informasi.mobile.index' : 'informasi.index';
		$search = str_replace(' ', '%', $request->search);
		$informasis = Informasi::when($search, function($query) use ($search) {
							return $query->where('judul', 'like', '%'.$search.'%');
						})->when($request->group_id, function($query) use ($request) {
							return $query->where('group_id', $request->group_id);
						})->orderBy('updated', 'DESC')->paginate(16);

		if ($request->ajax()) {
			$html = '';

			foreach ($informasis as $a) {
				$html .= view('informasi.mobile._list', ['a' => $a]);
			}

			return response()->json([
				'html' 			=> $html,
				'nextPageUrl' 	=> $informasis->nextPageUrl(),
				'currentPage'	=> $informasis->currentPage(),
				'lastPage'		=> $informasis->lastPage(),
			]);
		}

        return view($view, ['informasis' => $informasis]);
    }

    public function admin(Request $request)
    {
        return view('informasi.admin', [
			'informasis' => Informasi::select('informasi.*')
                        ->when($request->q, function($query) use($request) {
                            return $query
                                ->join('groups', 'groups.group_id', '=', 'informasi.group_id', 'left')
                                ->where(function($q) use($request) {
                                    $search = str_replace(' ', '%', $request->q);
                                    return $q->where('judul', 'LIKE', '%'.$search.'%')
                                        ->orWhere('groups.group_name', 'LIKE', '%'.$search.'%');
                                });
                        })->orderBy('informasi.created', 'DESC')->paginate()
		]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$view = BrowserDetect::isMobile() ? 'informasi.mobile.create' : 'informasi.create';
        return view($view, ['informasi' => new Informasi]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
	public function store(InformasiRequest $request)
    {
        $data 					= $request->all();
		$data['content']		= $request->content;
		$data['kd_judul'] 		= str_slug($request->judul);
		$data['tanggal'] 		= date('Y-m-d H:i:s');
		$data['summary'] 		= str_limit($data['content'], 250);
		$data['createdby'] 		= auth()->user()->name;

		if ($request->hasFile('img')) {

			$file = $request->file('img');

			$fileName = time().'_'.$file->getClientOriginalName();
			$file->move('uploads/dirimg_gambarinformasi', $fileName);

			$data['img_gambar'] = 'uploads/dirimg_gambarinformasi/'.$fileName;

        }

		$informasi = Informasi::create($data);

		if ($request->hasFile('file')) {

			foreach ($request->file('file') as $file) {

				$fileName = time().'_'.$file->getClientOriginalName();
				$file->move('uploads/dirfile_upload', str_slug($fileName));

				$informasi->files()->create([
					'file_upload'	=> 'uploads/dirfile_upload/'.str_slug($fileName),
					'tipe' 			=> $file->getClientOriginalExtension()
				]);
			}
		}

        event(new NewInformasi($informasi));
		return redirect('/informasi/'.$informasi->informasi_id)->with('success', 'Informasi berhasil disimpan');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Informasi $informasi)
    {
		$view = BrowserDetect::isMobile() ? 'informasi.mobile.show' : 'informasi.show';

        return view($view, [
			'informasi' => $informasi,
			'images'	=> InformasiFile::image()->where('informasi_id', $informasi->informasi_id)->get(),
			'dokumens'	=> InformasiFile::dokumen()->where('informasi_id', $informasi->informasi_id)->get(),
			'terkait'	=> Informasi::where('group_id', $informasi->group_id)->limit(10)->get()
		]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Informasi $informasi)
    {
		$view = BrowserDetect::isMobile() ? 'informasi.mobile.edit' : 'informasi.edit';
        return view($view, [
			'informasi' => $informasi,
			'images'	=> InformasiFile::image()->where('informasi_id', $informasi->informasi_id)->get(),
			'dokumens'	=> InformasiFile::dokumen()->where('informasi_id', $informasi->informasi_id)->get(),
		]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(InformasiRequest $request, Informasi $informasi)
    {
		$data 					= $request->all();
		$data['content']		= $request->content;
		$data['kd_judul'] 		= str_slug($request->judul);
		$data['summary'] 		= str_limit($data['content'], 250);
		$data['updatedby'] 		= auth()->user()->name;

		if ($request->hasFile('img')) {

            $file = $request->file('img');

            $fileName = time().'_'.$file->getClientOriginalName();
            $file->move('uploads/dirimg_gambarinformasi', $fileName);

            $data['img_gambar'] = 'uploads/dirimg_gambarinformasi/'.$fileName;

			if ($informasi->img_gambar && file_exists($informasi->img_gambar)) {
				unlink($informasi->img_gambar);
			}

        }

		$informasi->update($data);

		if ($request->hasFile('file')) {

			foreach ($request->file('file') as $file) {

				$fileName = time().'_'.$file->getClientOriginalName();
				$file->move('uploads/dirfile_upload', $fileName);

				$informasi->files()->create([
					'file_upload'	=> 'uploads/dirfile_upload/'.$fileName,
					'tipe' 			=> $file->getClientOriginalExtension()
				]);
			}
		}

        return redirect('/informasi/'.$informasi->informasi_id)->with('success', 'Informasi berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Informasi $informasi, Request $request)
    {
        $informasi->delete();

		// hapus gambar thumbnail
		if ($informasi->img_gambar && file_exists($informasi->img_gambar)) {
			unlink($informasi->img_gambar);
		}

		// hapus semua file
		foreach ($informasi->files as $file) {
			$file->delete();
			if ($file->file_upload && file_exists($file->file_upload)) {
				unlink($file->file_upload);
			}
		}

        $informasi->comments()->delete();
		return redirect($request->redirect)->with('success', 'Data berhasil dihapus');
    }

	public function deleteFile(InformasiFile $file)
	{
		$file->delete();

		if ($file->file_upload && file_exists($file->file_upload)) {
			unlink($file->file_upload);
		}

		return redirect('/informasi/'.$file->informasi_id.'/edit');
	}
}
