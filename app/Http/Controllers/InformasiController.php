<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\InformasiRequest;
use App\Informasi;
use App\InformasiFile;
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

        return view($view, [
			'informasis' => Informasi::when($search, function($query) use ($search) {
								return $query->where('judul', 'like', '%'.$search.'%');
							})->when($request->group_id, function($query) use ($request) {
								return $query->where('group_id', $request->group_id);
							})->orderBy('updated', 'DESC')->simplePaginate(16)
		]);
    }

    public function admin(Request $request)
    {
		$judul = str_replace(' ', '%', $request->judul);

        return view('informasi.admin', [
			'informasis' => Informasi::when($judul, function($query) use ($judul) {
								return $query->where('judul', 'like', '%'.$judul.'%');
							})->when($request->group_id, function($query) use ($request) {
								return $query->where('group_id', $request->group_id);
							})->orderBy('updated', 'DESC')->simplePaginate()
		]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('informasi.create', ['informasi' => new Informasi]);
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

		return redirect('/informasi/admin')->with('success', 'Informasi berhasil disimpan');
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
			'terkait'	=> Informasi::where('group_id', $informasi->group_id)->limit(4)->get()
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
        return view('informasi.edit', [
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

        return redirect('/informasi/admin')->with('success', 'Informasi berhasil disimpan');
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
