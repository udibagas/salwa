<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Buku;

class KitabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		$search = str_replace(' ', '%', $request->search);

        return view('kitab.index', [
			'kitabs' => Buku::when($search, function($query) use ($search) {
							return $query->where('judul', 'like', '%'.$search.'%')
									->orWhere('penulis', 'like', '%'.$search.'%');
						})->when($request->group_id, function($query) use ($request) {
							return $query->where('group_id', $request->group_id);
						})->orderBy('updated', 'DESC')->paginate()
		]);
    }

    public function admin(Request $request)
    {
		$search = str_replace(' ', '%', $request->search);

        return view('kitab.admin', [
			'kitabs' => Buku::when($search, function($query) use ($search) {
							return $query->where('judul', 'like', '%'.$search.'%')
									->orWhere('penulis', 'like', '%'.$search.'%');
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
        return view('kitab.create', ['kitab' => new Buku]);
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
    public function show(Buku $kitab)
    {
        return view('kitab.show', [
			'kitab' 	=> $kitab,
			'terkait'	=> Buku::limit(3)->get()
		]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Buku $kitab)
    {
        return view('kitab.edit', ['kitab' => $kitab]);
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
    public function destroy(Kitab $kitab)
    {
        $kitab->delete();
		return redirect('/kitab/admin');
    }
}
