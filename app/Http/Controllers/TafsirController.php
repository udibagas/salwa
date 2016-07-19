<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\TafsirRequest;
use App\Tafsir;
use BrowserDetect;

class TafsirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		$view = BrowserDetect::isMobile() ? 'tafsir.mobile.index' : 'tafsir.index';
		return view($view, ['tafsirs' => Tafsir::paginate()]);
    }

    public function admin(Request $request)
    {
		return view('tafsir.admin', ['tafsirs' => Tafsir::paginate()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tafsir.create', ['tafsir' => new Tafsir]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TafsirRequest $request)
    {
		$tafsir = Tafsir::create($request->all());
		return redirect('/tafsir/admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tafsir $tafsir)
    {
		$view = BrowserDetect::isMobile() ? 'tafsir.mobile.show' : 'tafsir.show';
        return view($view, ['tafsir' => $tafsir]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tafsir $tafsir)
    {
		return view('tafsir.edit', ['tafsir' => $tafsir]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TafsirRequest $request, Tafsir $tafsir)
    {
        $tafsir->update($request->all());
		return redirect('/tafsir/admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tafsir $tafsir)
    {
        $tafsir->delete();
		return redirect('/tafsir/admin');
    }
}
