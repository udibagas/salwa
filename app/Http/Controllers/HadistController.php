<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Hadist;

class HadistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		$search = str_replace(' ', '%', $request->search);

		return view('hadist.index', [
			'hadists' 	=> Hadist::when($request->group_id, function($query) use ($request) {
							return $query->where('group_id', $request->group_id);
						})->when($search, function($query) use ($search) {
							return $query->where('judul', 'like', '%'.$search.'%');
						})->orderBy('updated', 'DESC')->paginate()
		]);
    }

    public function admin(Request $request)
    {
		$search = str_replace(' ', '%', $request->search);

        return view('hadist.admin', [
			'hadists' 	=> Hadist::when($request->group_id, function($query) use ($request) {
							return $query->where('group_id', $request->group_id);
						})->when($search, function($query) use ($search) {
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
    public function show(Hadist $hadist)
    {
		if ($hadist->group->group_name == 'Dzikir') {
			$url = 'dzikir';
		} else if ($hadist->group->group_name == 'Doa') {
			$url = 'doa';
		} else {
			$url = 'hadist';
		}

        return view('hadist.show', [
			'url'		=> $url,
			'groupName'	=> $hadist->group->group_name,
			'hadist' 	=> $hadist,
			'terkait'	=> Hadist::where('group_id', $hadist->group_id)->limit(3)->get()
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
    public function destroy(Hadist $hadist)
    {
        $hadist->delete();
		return redirect('/hadist/admin');
    }
}
