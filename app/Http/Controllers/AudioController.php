<?php

namespace App\Http\Controllers;

use App\Http\Requests\AudioRequest;
use Illuminate\Http\Request;
use App\Events\NewAudio;
use App\Http\Requests;
use App\Mp3;
use BrowserDetect;

class AudioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		$view = BrowserDetect::isMobile() ? 'audio.mobile.index' : 'audio.index';
		$search = str_replace(' ', '%', $request->search);

		$audios = Mp3::when($search, function($query) use ($search) {
					return $query->where('judul', 'like', '%'.$search.'%');
				})->when($request->group_id, function($query) use ($request) {
					return $query->where('group_id', $request->group_id);
				})->orderBy('updated', 'DESC')->paginate();

		if ($request->ajax()) {
			$html = '';

			foreach ($audios as $a) {
				$html .= view('audio.mobile._list', ['a' => $a]);
			}

			return response()->json([
				'html' 			=> $html,
				'nextPageUrl' 	=> $audios->nextPageUrl(),
				'currentPage'	=> $audios->currentPage(),
				'lastPage'		=> $audios->lastPage(),
			]);
		}

        return view($view, ['audios' => $audios]);
    }

    public function admin(Request $request)
    {
        return view('audio.admin', [
			'audios' => Mp3::select('mp3_download.*')->when($request->q, function($query) use ($request) {
							return $query->join('groups', 'groups.group_id', '=', 'mp3_download.group_id', 'left')
                                ->where(function($q) use($request) {
                                    return $q->where('judul', 'LIKE', '%'.str_replace(' ', '%', $request->q).'%')
                                        ->orWhere('groups.group_name', 'LIKE', '%'.str_replace(' ', '%', $request->q).'%');
                                });
						})->orderBy('mp3_download.created', 'DESC')->paginate()
		]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$view = BrowserDetect::isMobile() ? 'audio.mobile.create' : 'audio.create';
        return view($view, ['audio' => new Mp3]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AudioRequest $request)
    {
		$data 					= $request->all();
		$data['kd_judul'] 		= str_slug($request->judul);
		$data['createdby'] 		= auth()->user()->name;

		if ($request->hasFile('file')) {

            $file = $request->file('file');

            $fileName = time().'_'.$file->getClientOriginalName();
            $file->move('uploads/dirfile_mp3', $fileName);

            $data['file_mp3'] = 'uploads/dirfile_mp3/'.$fileName;

        }

		$audio = Mp3::create($data);
        event(new NewAudio($audio));
		return redirect('/audio/'.$audio->mp3_download_id)->with('success', 'Audio berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Mp3 $audio)
    {
		$view = BrowserDetect::isMobile() ? 'audio.mobile.show' : 'audio.show';

        return view($view, [
			'audio' 	=> $audio,
			'terkait'	=> Mp3::where('group_id', $audio->group_id)->orderBy('created', 'ASC')->get()
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
		$view = BrowserDetect::isMobile() ? 'audio.mobile.edit' : 'audio.edit';
        return view($view, ['audio' => $audio]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AudioRequest $request, Mp3 $audio)
    {
		$data 					= $request->all();
		$data['kd_judul'] 		= str_slug($request->judul);
		$data['updatedby'] 		= auth()->user()->name;

		if ($request->hasFile('file')) {

            $file = $request->file('file');

            $fileName = time().'_'.$file->getClientOriginalName();
            $file->move('uploads/dirfile_mp3', $fileName);

            $data['file_mp3'] = 'uploads/dirfile_mp3/'.$fileName;

			if ($audio->file_mp3 && file_exists($audio->file_mp3)) {
				unlink($audio->file_mp3);
			}

        }

		$audio->update($data);

		return redirect('/audio/'.$audio->mp3_download_id)->with('success', 'Audio berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mp3 $audio, Request $request)
    {
        $audio->delete();

		if ($audio->file_mp3 && file_exists($audio->file_mp3)) {
			unlink($audio->file_mp3);
		}

		return redirect($request->redirect)->with('success', 'Data berhasil dihapus');
    }

	public function download(Mp3 $audio)
	{
		if (!file_exists($audio->file_mp3)) {
			return abort(404);
		}

		return response()->download($audio->file_mp3);
	}

	public function playlist()
	{
		return view('audio.mobile.playlist', ['audios' => Mp3::all()]);
	}

}
