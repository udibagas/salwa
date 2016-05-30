<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\InformasiRequest;
use App\Informasi;

class InformasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		$search = str_replace(' ', '%', $request->search);

        return view('informasi.index', [
			'informasis' => Informasi::when($search, function($query) use ($search) {
								return $query->where('judul', 'like', '%'.$search.'%');
							})->when($request->group_id, function($query) use ($request) {
								return $query->where('group_id', $request->group_id);
							})->orderBy('updated', 'DESC')->paginate(16)
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
		$data['content']		= clean($request->content);
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
        return view('informasi.show', [
			'informasi' => $informasi,
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
        return view('informasi.edit', ['informasi' => $informasi]);
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
		$data['content']		= clean($request->content);
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Informasi $informasi)
    {
        $informasi->delete();

		if ($informasi->img_gambar && file_exists($informasi->img_gambar)) {
			unlink($informasi->img_gambar);
		}

		return redirect('/informasi/admin');
    }
}
