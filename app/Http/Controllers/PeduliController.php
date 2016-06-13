<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\PeduliRequest;
use App\Peduli;
use BrowserDetect;

class PeduliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		$view = BrowserDetect::isMobile() ? 'peduli.mobile.index' : 'peduli.index';
		$search = str_replace(' ', '%', $request->search);

        return view($view, [
			'pedulis' => Peduli::when($search, function($query) use ($search) {
								return $query->where('judul', 'like', '%'.$search.'%');
							})->when($request->group_id, function($query) use ($request) {
								return $query->where('group_id', $request->group_id);
							})->orderBy('updated', 'DESC')->simplePaginate(16)
		]);
    }

    public function admin(Request $request)
    {
		$judul = str_replace(' ', '%', $request->judul);

        return view('peduli.admin', [
			'pedulis' => Peduli::when($judul, function($query) use ($judul) {
								return $query->where('judul', 'like', '%'.$judul.'%');
							})->when($request->group_id, function($query) use ($request) {
								return $query->where('group_id', $request->group_id);
							})->when($request->user, function($query) use ($request) {
								return $query->join('users', 'users.user_id', '=', 'peduli.user_id')
									->where('users.name', 'like', '%'.$request->user.'%');
							})->orderBy('peduli.updated', 'DESC')->simplePaginate()
		]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('peduli.create', ['peduli' => new Peduli]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PeduliRequest $request)
    {
		$data 					= $request->all();
		$data['isi']			= $request->isi;
		$data['kd_judul'] 		= str_slug($request->judul);
		$data['tgl_artikel'] 	= date('Y-m-d H:i:s');
		$data['isi_mobile'] 	= $data['isi'];
		$data['ringkasan'] 		= str_limit($data['isi'], 250);
		$data['createdby'] 		= auth()->user()->name;
		$data['user_id']		= auth()->user()->user_id;

		if ($request->hasFile('img')) {

            $file = $request->file('img');

            $fileName = time().'_'.$file->getClientOriginalName();
            $file->move('uploads/dirimg_artikel', $fileName);

            $data['img_artikel'] = 'uploads/dirimg_artikel/'.$fileName;

        }

		Peduli::create($data);
		return redirect('/peduli/admin')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Peduli $peduli)
    {
		$view = BrowserDetect::isMobile() ? 'peduli.mobile.show' : 'peduli.show';

        return view($view, [
			'peduli' => $peduli,
			'terkait'	=> Peduli::where('group_id', $peduli->group_id)
							->orderBy('updated', 'DESC')->limit(4)->get()
		]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Peduli $peduli)
    {
        return view('peduli.edit', ['peduli' => $peduli]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PeduliRequest $request, Peduli $peduli)
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

			if ($peduli->img_artikel && file_exists($peduli->img_artikel)) {
				unlink($peduli->img_artikel);
			}

        }

		$peduli->update($data);
        return redirect('/peduli/admin')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Peduli $peduli, Request $request)
    {
		$peduli->delete();

		if ($peduli->img_artikel && file_exists($peduli->img_artikel)) {
			unlink($peduli->img_artikel);
		}

		return redirect($request->redirect)->with('success', 'Data berhasil dihapus');
    }
}
