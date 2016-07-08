<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\ImageRequest;
use App\SalwaImages;
use BrowserDetect;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		$view = BrowserDetect::isMobile() ? 'image.mobile.index' : 'image.index';
		$search = str_replace(' ', '%', $request->search);
		$images = SalwaImages::when($search, function($query) use ($search) {
					return $query->where('judul', 'like', '%'.$search.'%');
				})->when($request->group_id, function($query) use ($request) {
					return $query->where('group_id', $request->group_id);
				})->orderBy('updated', 'DESC')->paginate();

		if ($request->ajax()) {
			$html = '';

			foreach ($images as $a) {
				$html .= view('image.mobile._list', ['a' => $a]);
			}

			return response()->json([
				'html' 			=> $html,
				'nextPageUrl' 	=> $images->nextPageUrl(),
				'currentPage'	=> $images->currentPage(),
				'lastPage'		=> $images->lastPage(),
			]);
		}

        return view($view, ['images' => $images]);
    }

	public function admin(Request $request)
    {
		$judul = str_replace(' ', '%', $request->judul);

        return view('image.admin', [
			'images' => SalwaImages::when($judul, function($query) use ($judul) {
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
		$view = BrowserDetect::isMobile() ? 'image.mobile.create' : 'image.create';
        return view($view, ['image' => new SalwaImages]);
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

		$image = SalwaImages::create($data);

		return redirect('/image/'.$image->id_salwaimages)->with('success', 'Image berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(SalwaImages $image)
    {
		$view = BrowserDetect::isMobile() ? 'image.mobile.show' : 'image.show';

        return view($view, [
			'image' 	=> $image,
			'terkait'	=> SalwaImages::where('group_id', $image->group_id)->orderByRaw('RAND()')->limit(6)->get()
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
		$view = BrowserDetect::isMobile() ? 'image.mobile.edit' : 'image.edit';
        return view($view, ['image' => $image]);
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

			if ($image->img_images && file_exists($image->img_images)) {
				unlink($image->img_images);
			}

        }

		$image->update($data);

		return redirect('/image/'.$image->id_salwaimages)->with('success', 'Image berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SalwaImages $image, Request $request)
    {
        $image->delete();

		if ($image->img_images && file_exists($image->img_images)) {
			unlink($image->img_images);
		}

		return redirect($request->redirect)->with('success', 'Data berhasil dihapus');
    }

	public function apiIndex()
	{
		$data = SalwaImages::paginate(5);

		return response()->json([
			'results'	=> $data->items(),
			'total'		=> $data->total(),
			'pages'		=> $data->lastPage()
		]);
	}

	public function apiShow(SalwaImages $image)
	{
		return $image;
	}
}
