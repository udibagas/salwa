<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\HadistRequest;
use Response;

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
		$judul = str_replace(' ', '%', $request->judul);

        return view('hadist.admin', [
			'hadists' 	=> Hadist::when($request->group_id, function($query) use ($request) {
							return $query->where('group_id', $request->group_id);
						})->when($judul, function($query) use ($judul) {
							return $query->where('judul', 'like', '%'.$judul.'%');
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
        return view('hadist.create', ['hadist' => new Hadist(['hadist' => 'Hadist', 'penjelasan' => 'Penjelasan'])]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HadistRequest $request)
    {
		$data 					= $request->all();
		$data['kd_judul'] 		= str_slug($request->judul);
		$data['tanggal'] 		= date('Y-m-d H:i:s');
		$data['ringkasan'] 		= str_limit($data['penjelasan'], 250);
		$data['createdby'] 		= auth()->user()->name;

		Hadist::create($data);

        return redirect('/hadist/admin')->with('success', 'Hadist berhasil disimpan');
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
    public function edit(Hadist $hadist)
    {
        return view('hadist.create', ['hadist' => $hadist]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(HadistRequest $request, Hadist $hadist)
    {
		$data 					= $request->all();
		$data['kd_judul'] 		= str_slug($request->judul);
		$data['ringkasan'] 		= str_limit($data['isi'], 250);
		$data['updatedby'] 		= auth()->user()->name;

		$hadist->update($data);

        return redirect('/hadist/admin')->with('success', 'Hadist berhasil disimpan');
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

	// API
	public function apiIndexHadits(Request $request)
	{
		return Hadist::select('hadist_id', 'judul', 'tanggal')
		->hadist()->when($request->judul, function($query) use ($request) {
			return $query->where('judul', 'like', '%'.$request->judul.'%');
		})->orderBy('hadist.updated', 'DESC')->paginate(10);

		// return Response::json([
		// 	'results' 	=> $data->items(),
		// 	'pages' 	=> $data->lastPage(),
		// 	'total' 	=> $data->total()
		// ]);
	}

	public function apiIndexDoa(Request $request)
	{
		return Hadist::select('hadist_id', 'judul', 'tanggal')
		->doa()->when($request->judul, function($query) use ($request) {
			return $query->where('judul', 'like', '%'.$request->judul.'%');
		})->orderBy('hadist.updated', 'DESC')->paginate(10);
	}

	public function apiIndexDzikir(Request $request)
	{
		return Hadist::select('hadist_id', 'judul', 'tanggal')
		->dzikir()->when($request->judul, function($query) use ($request) {
			return $query->where('judul', 'like', '%'.$request->judul.'%');
		})->orderBy('hadist.updated', 'DESC')->paginate(10);
	}

	public function apiShow(Hadist $hadist)
	{
		return $hadist;
	}
}
