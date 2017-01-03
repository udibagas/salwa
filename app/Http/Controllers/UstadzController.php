<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\UstadzRequest;
use App\Ustadz;

class UstadzController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin(Request $request)
    {
        return view('ustadz.admin', [
			'ustadzs' => Ustadz::orderBy('ustadz_name', 'ASC')
							->when($request->q, function($query) use ($request) {
								return $query->where('ustadz_name', 'like', '%'.$request->q.'%');
							})->paginate()
		]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ustadz.create', ['ustadz' => new Ustadz]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UstadzRequest $request)
    {
        $data 				= $request->all();
		$data['createdby']	= auth()->user()->name;

		Ustadz::create($data);
		return redirect('ustadz/admin')->with('Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Ustadz $ustadz)
    {
        return view('ustadz.show', ['ustadz' => $ustadz]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Ustadz $ustadz)
    {
        return view('ustadz.edit', ['ustadz' => $ustadz]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UstadzRequest $request, Ustadz $ustadz)
    {
		$data 				= $request->all();
		$data['updatedby']	= auth()->user()->name;

		$ustadz->update($data);
		return redirect('ustadz/admin')->with('Data berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ustadz $ustadz, Request $request)
    {
		$ustadz->delete();
		return redirect($request->redirect)->with('success', 'Data berhasil dihapus');
    }

	// API
	public function apiIndex(Request $request)
	{
		$data = Ustadz::when($request->ustadz_name, function($query) use ($request) {
						return $query->where('ustadz_name', 'like', '%'.$request->ustadz_name.'%');
					})->orderBy('ustadz_name', 'ASC')->paginate(10);

		return response()->json([
			'results'	=> $data->items(),
			'total'		=> $data->total(),
			'pages'		=> $data->lastPage()
		]);
	}

	public function apiShow(Ustadz $ustadz)
	{
		return $ustadz;
	}
}
