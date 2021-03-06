<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\MurottalRequest;
use App\Murottal;
use BrowserDetect;

class MurottalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		$view = BrowserDetect::isMobile() ? 'murottal.mobile.index' : 'murottal.index';
		$search = str_replace(' ', '%', $request->search);

		$murottals = Murottal::when($search, function($query) use ($search) {
						return $query->where('nama_surat', 'like', '%'.$search.'%');
					})->when($request->group_id, function($query) use ($request) {
						return $query->where('group_id', $request->group_id);
					})->orderBy('nama_surat', 'ASC')->paginate();

		if ($request->ajax()) {
			$html = '';

			foreach ($murottals as $a) {
				$html .= view('murottal.mobile._list', ['a' => $a]);
			}

			return response()->json([
				'html' 			=> $html,
				'nextPageUrl' 	=> $murottals->nextPageUrl(),
				'currentPage'	=> $murottals->currentPage(),
				'lastPage'		=> $murottals->lastPage(),
			]);
		}

        return view($view, ['murottals' => $murottals]);
    }

	public function admin(Request $request)
    {
        return view('murottal.admin', [
			'murottals' => Murottal::select('murotal.*')
                        ->when($request->q, function($query) use ($request) {
							return $query->join('groups', 'groups.group_id', '=', 'murotal.group_id', 'left')
                                ->where(function($q) use($request) {
                                    return $q->where('nama_surat', 'LIKE', '%'.str_replace(' ', '%', $request->q).'%')
                                        ->orWhere('groups.group_name', 'LIKE', '%'.str_replace(' ', '%', $request->q).'%');
                                });
						})->orderBy('nama_surat', 'ASC')->paginate()
		]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$view = BrowserDetect::isMobile() ? 'murottal.mobile.create' : 'murottal.create';
        return view($view, ['murottal' => new Murottal]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$data 					= $request->all();
		$data['kd_nama_surat'] 	= str_slug($request->nama_surat);
		$data['createdby'] 		= auth()->user()->name;

		if ($request->hasFile('file')) {

            $file = $request->file('file');

            $fileName = time().'_'.$file->getClientOriginalName();
            $file->move('uploads/dirfile_mp3', $fileName);

            $data['file_mp3'] = 'uploads/dirfile_mp3/'.$fileName;

        }

		$murottal = Murottal::create($data);
		return redirect('/murottal/admin')->with('success', 'Murottal berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Murottal $murottal)
    {
		$view = BrowserDetect::isMobile() ? 'murottal.mobile.show' : 'murottal.show';

        return view($view, [
			'murottal' 	=> $murottal,
		]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Murottal $murottal)
    {
		$view = BrowserDetect::isMobile() ? 'murottal.mobile.edit' : 'murottal.edit';
        return view($view, ['murottal' => $murottal]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MurottalRequest $request, Murottal $murottal)
    {
		$data 					= $request->all();
		$data['kd_nama_surat'] 	= str_slug($request->nama_surat);
		$data['updatedby'] 		= auth()->user()->name;

		if ($request->hasFile('file')) {

            $file = $request->file('file');

            $fileName = time().'_'.$file->getClientOriginalName();
            $file->move('uploads/dirfile_mp3', $fileName);

            $data['file_mp3'] = 'uploads/dirfile_mp3/'.$fileName;

			if ($murottal->file_mp3 && file_exists($murottal->file_mp3)) {
				unlink($murottal->file_mp3);
			}

        }

		$murottal->update($data);
		return redirect('/murottal/admin')->with('success', 'Murottal berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Murottal $murottal, Request $request)
    {
        $murottal->delete();

		if ($murottal->file_mp3 && file_exists($murottal->file_mp3)) {
			unlink($murottal->file_mp3);
		}

		return redirect($request->redirect)->with('success', 'Data berhasil dihapus');
    }

	public function download(Murottal $murottal)
	{
		if (!file_exists($murottal->file_mp3)) {
			return abort(404, 'File tidak ditemukan');
		}

		return response()->download($murottal->file_mp3);
	}
}
