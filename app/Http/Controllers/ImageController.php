<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

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
					})->orderBy('updated', 'DESC')->paginate()
		]);
    }

	public function admin(Request $request)
    {
		$search = str_replace(' ', '%', $request->search);

        return view('image.admin', [
			'images' => SalwaImages::when($search, function($query) use ($search) {
						return $query->where('judul', 'like', '%'.$search.'%');
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
    public function destroy(SalwaImages $image)
    {
        $image->delete();
		return redirect('image/admin');
    }
}
