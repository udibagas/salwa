<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Mp3;

class AudioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		$search = str_replace(' ', '%', $request->search);

        return view('audio.index', [
			'audios' => Mp3::when($search, function($query) use ($search) {
						return $query->where('judul', 'like', '%'.$search.'%');
					})->when($request->group_id, function($query) use ($request) {
						return $query->where('group_id', $request->group_id);
					})->orderBy('updated', 'DESC')->paginate()
		]);
    }

    public function admin(Request $request)
    {
		$search = str_replace(' ', '%', $request->search);

        return view('audio.admin', [
			'audios' => Mp3::when($search, function($query) use ($search) {
						return $query->where('judul', 'like', '%'.$search.'%');
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
        return view('audio.create', ['audio' => new Mp3]);
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
    public function show(Mp3 $audio)
    {
        return view('audio.show', [
			'audio' 	=> $audio,
			'terkait'	=> Mp3::where('user_id', $audio->user_id)->limit(3)->get()
		]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Mp3 $audio)
    {
        return view('audio.edit', ['audio' => $audio]);
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
    public function destroy(Mp3 $audio)
    {
        $audio->delete();
		return redirect('/audio/admin');
    }
}
