<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\PopupRequest;
use App\Popup;

class PopupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('popup.index', [
			'popups' => Popup::when($request->title, function($query) use ($request) {
							return $query->where('title', 'like', '%'.$request->title.'%');
						})->when($request->active, function($query) use ($request) {
                            return ($request->active == 'Y')
                                ? $query->isActive()
                                : $query->where('active', 0);
						})->orderBy('title', 'ASC')->paginate()
		]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('popup.create', [
            'popup' => new Popup([
                'start' => date('Y-m-d H:i:s'),
                'end' => date('Y-m-d H:i:s', strtotime('+7 days')),
            ])
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PopupRequest $request)
    {
        $data = $request->all();
        $data['active'] = $request->get('active', 0);

		if ($request->hasFile('img')) {

            $file = $request->file('img');

            $fileName = time().'_'.$file->getClientOriginalName();
            $file->move('uploads/dirimg_popup', $fileName);

            $data['img'] = 'uploads/dirimg_popup/'.$fileName;

        }

		$popup = Popup::create($data);

		return redirect('/popup')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Popup $popup)
    {
        return view('popup.edit', ['popup' => $popup]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PopupRequest $request, Popup $popup)
    {
		$data = $request->all();
        $data['active'] = $request->get('active', 0);

		if ($request->hasFile('img')) {

            $file = $request->file('img');

            $fileName = time().'_'.$file->getClientOriginalName();
            $file->move('uploads/dirimg_popup', $fileName);

            $data['img'] = 'uploads/dirimg_popup/'.$fileName;

			if ($popup->img && file_exists($popup->img)) {
				unlink($popup->img);
			}

        }

		$popup->update($data);
		return redirect('/popup')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Popup $popup, Request $request)
    {
		$popup->delete();
        if ($popup->img && file_exists($popup->img)) {
            unlink($popup->img);
        }
		return redirect($request->redirect)->with('success', 'Data berhasil dihapus');
    }
}
