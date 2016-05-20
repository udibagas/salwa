<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\ImageRequest;

use App\SalwaImages;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		$search = str_replace(' ', '%', $request->search);

        return view('image.index', [
			'images' => SalwaImages::when($search, function($query) use ($search) {
						return $query->where('judul', 'like', '%'.$search.'%');
					})->when($request->group_id, function($query) use ($request) {
						return $query->where('group_id', $request->group_id);
					})->orderBy('updated', 'DESC')->paginate()
		]);
    }

	public function admin(Request $request)
    {
		$search = str_replace(' ', '%', $request->search);

        return view('image.admin', [
			'images' => SalwaImages::when($search, function($query) use ($search) {
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
        return view('image.create', ['image' => new SalwaImages]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ImageRequest $request)
    {
		$data 					= $request->all();
		$data['kd_judul'] 		= str_slug($request->judul);
		$data['tanggal'] 		= date('Y-m-d H:i:s');
		$data['createdby'] 		= auth()->user()->name;

		if ($request->hasFile('img')) {

            $file = $request->file('img');

            $fileName = time().'_'.$file->getClientOriginalName();
            $file->move('uploads/dirimg_images', $fileName);

            $data['img_images'] = 'uploads/dirimg_images/'.$fileName;

        }

		SalwaImages::create($data);

		return redirect('/image/admin')->with('success', 'Image berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(SalwaImages $image)
    {
        return view('image.show', [
			'image' 	=> $image,
			'terkait'	=> SalwaImages::limit(3)->get()
		]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(SalwaImages $image)
    {
        return view('image.edit', ['image' => $image]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ImageRequest $request, SalwaImages $image)
    {
		$data 					= $request->all();
		$data['kd_judul'] 		= str_slug($request->judul);
		$data['updatedby'] 		= auth()->user()->name;

		if ($request->hasFile('img')) {

            $file = $request->file('img');

            $fileName = time().'_'.$file->getClientOriginalName();
            $file->move('uploads/dirimg_images', $fileName);

            $data['img_images'] = 'uploads/dirimg_images/'.$fileName;

        }

		$image->update($data);

		return redirect('/image/admin')->with('success', 'Image berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SalwaImages $image)
    {
        $image->delete();
		return redirect('image/admin');
    }
}
