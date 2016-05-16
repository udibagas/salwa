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
    public function indexHadist(Request $request)
    {
		$group_name = 'kumpulan hadits';

        return view('hadist.index', [
			'groupName'	=> $group_name,
			'hadists' 	=> Hadist::join('groups', 'hadist.group_id', '=', 'groups.group_id')
						->when($request->search, function($query) use ($request) {
							return $query->where('judul', 'like', '%'.$request->search.'%');
						})->where('group_name', $group_name)
						->orderBy('hadist.updated', 'DESC')
						->paginate()
		]);
    }

    public function admin(Request $request)
    {
        return view('hadist.admin', [
			'hadists' 	=> Hadist::join('groups', 'hadist.group_id', '=', 'groups.group_id')
						->when($request->search, function($query) use ($request) {
							return $query->where('judul', 'like', '%'.$request->search.'%');
						})->orderBy('hadist.updated', 'DESC')
						->paginate()
		]);
    }

    public function indexDoa(Request $request)
    {
		$group_name = 'doa';

        return view('hadist.index', [
			'groupName'	=> $group_name,
			'hadists' 	=> Hadist::join('groups', 'hadist.group_id', '=', 'groups.group_id')
						->when($request->search, function($query) use ($request) {
							return $query->where('judul', 'like', '%'.$request->search.'%');
						})->where('group_name', $group_name)
						->orderBy('hadist.updated', 'DESC')
						->paginate()
		]);
    }

    public function indexDzikir(Request $request)
    {
		$group_name = 'dzikir';

        return view('hadist.index', [
			'groupName'	=> $group_name,
			'hadists' 	=> Hadist::join('groups', 'hadist.group_id', '=', 'groups.group_id')
						->when($request->search, function($query) use ($request) {
							return $query->where('judul', 'like', '%'.$request->search.'%');
						})->where('group_name', $group_name)
						->orderBy('hadist.updated', 'DESC')
						->paginate()
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
