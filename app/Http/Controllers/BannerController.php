<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\BannerRequest;
use App\Banner;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('banner.index', ['banners' => Banner::orderBy('updated', 'DESC')->paginate()]);
    }

    public function admin()
    {
        return view('banner.admin', ['banners' => Banner::orderBy('updated', 'DESC')->paginate()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		return view('banner.create', ['banner' => new Banner]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BannerRequest $request)
    {
		$data = $request->all();
		$data['createdby'] = auth()->user()->name;

		if ($request->hasFile('img')) {

            $file = $request->file('img');

            $fileName = time().'_'.$file->getClientOriginalName();
            $file->move('uploads/dirimg_banner', $fileName);

            $data['img_banner'] = 'uploads/dirimg_banner/'.$fileName;

        }

		Banner::create($data);
		return redirect('/banner/admin')->with('success', 'Banner berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show(Banner $banner)
    // {
    //     return view('banner.show', ['banner' 	=> $banner]);
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        return view('banner.edit', ['banner' => $banner]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BannerRequest $request, Banner $banner)
    {
		$data = $request->all();
		$data['updatedby'] = auth()->user()->name;

		if ($request->hasFile('img')) {

            $file = $request->file('img');

            $fileName = time().'_'.$file->getClientOriginalName();
            $file->move('uploads/dirimg_banner', $fileName);

            $data['img_banner'] = 'uploads/dirimg_banner/'.$fileName;

        }

		$banner->update($data);
		return redirect('/banner/admin')->with('success', 'Banner berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	public function destroy(Banner $banner)
    {
		$banner->delete();

		if ($banner->img_banner && file_exists($banner->img_banner)) {
			unlink($banner->img_banner);
		}

		return redirect('/banner/admin')->with('success', 'Banner berhasil dihapus');
    }
}
