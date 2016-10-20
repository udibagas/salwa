<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\KajianRequest;
use App\Kajian;
use BrowserDetect;

class KajianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		$view = BrowserDetect::isMobile() ? 'kajian.mobile.index' : 'kajian.index';
        return view('kajian.index', [
			'kajians' => Kajian::when($request->tema, function($query) use ($request) {
							return $query->where('tema', 'like', '%'.$request->tema.'%');
						})->when($request->rutin == 'rutin', function($query) {
							return $query->where('rutin', 1);
						})->when($request->rutin == 'tematik', function($query) {
							return $query->where('rutin', 0);
						})->when($request->ustadz_id, function($query) use ($request) {
							return $query->where('ustadz_id', $request->ustadz_id);
						})->when($request->tempat, function($query) use ($request) {
							return $query->where('tempat', 'like', '%'.$request->tempat.'%');
						})->orderBy('created_at', 'DESC')->paginate()
		]);
    }

    public function admin(Request $request)
    {
        return view('kajian.admin', [
			'kajians' => Kajian::when($request->tema, function($query) use ($request) {
							return $query->where('tema', 'like', '%'.$request->tema.'%');
						})->when($request->rutin == 'rutin', function($query) {
							return $query->where('rutin', 1);
						})->when($request->rutin == 'tematik', function($query) {
							return $query->where('rutin', 0);
						})->when($request->ustadz, function($query) use ($request) {
							return $query->join('tb_ustadz', 'tb_ustadz.ustadz_id', '=', 'kajian.ustadz_id')
										->where('tb_ustadz.ustadz_name', 'like', '%'.$request->ustadz.'%');
						})->when($request->tempat, function($query) use ($request) {
							return $query->where('tempat', 'like', '%'.$request->tempat.'%');
						})->orderBy('created_at', 'DESC')->paginate()
		]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kajian.create', ['kajian' => new Kajian]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KajianRequest $request)
    {
		$data = $request->all();
        $data['user_id'] = auth()->user()->user_id;

        if ($request->rutin == 1) {
            $data['hari'] = implode(',', $data['hari']);
            $data['pekan'] = implode(',', $data['pekan']);
        }
        // dd($data);

		if ($request->hasFile('img')) {
            $file = $request->file('img');
            $fileName = time().'_'.$file->getClientOriginalName();
            $file->move('uploads/brosur_kajian', $fileName);
            $data['brosur'] = 'uploads/brosur_kajian/'.$fileName;
        }

		Kajian::create($data);
		return redirect('/kajian/admin')->with('success', 'Data kajian telah disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Kajian $kajian)
    {
        return view('kajian.show', ['kajian' => $kajian]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Kajian $kajian)
    {
        return view('kajian.edit', ['kajian' => $kajian]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(KajianRequest $request, Kajian $kajian)
    {
		$data = $request->all();
		$data['pekan'] = json_encode($request->pekan);

		if ($request->hasFile('img')) {

            $file = $request->file('img');

            $fileName = time().'_'.$file->getClientOriginalName();
            $file->move('uploads/brosur_kajian', $fileName);

            $data['brosur'] = 'uploads/brosur_kajian/'.$fileName;

        }

		$kajian->update($data);
		return redirect('/kajian/admin')->with('success', 'Data kajian telah disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kajian $kajian)
    {
        $kajian->delete();

        if ($kajian->brosur && file_exists($kajian->brosur)) {
            unlink($kajian->brosur);
        }

		return redirect('/kajian/admin')->with('success', 'Data kajian telah dihapus');
    }

	public function downloadFile(Kajian $kajian)
	{
		if (!file_exists($kajian->file)) {
			return abort(404, 'File tidak ditemukan');
		}

		return response()->download($kajian->file);
	}

	public function downloadAudio(Kajian $kajian)
	{
		if (!file_exists($kajian->audio)) {
			return abort(404, 'File tidak ditemukan');
		}

		return response()->download($kajian->audio);
	}

	public function apiIndex(Request $request)
	{
		$data = Kajian::when($request->id_lokasi, function($query) use($request) {
					return $query->where('id_lokasi', $request->id_lokasi);
				})->when($request->id_area, function($query) use($request) {
					return $query->where('id_area', $request->id_area);
				})->when($request->kajian_tema, function($query) use($request) {
					return $query->where('tema', 'like', '%'.$request->tema.'%');
				})->when($request->ustadz_id, function($query) use($request) {
					return $query->where('ustadz_id', $request->ustadz_id);
				})->when($request->today, function($query) {
					return $query->whereRaw('DATE(waktu_mulai) = '.date('Y-m-d'));
				})->orderBy('created_at', 'ASC')->paginate(10);


		return response()->json([
			'results'	=> $data->items(),
			'total'		=> $data->total(),
			'pages'		=> $data->lastPage(),
			'user'		=> auth()->guard('api')->user()->name
		]);
	}

	public function apiShow(Kajian $kajian)
	{
		return $kajian;
	}

    // tema, ustadz, keterangan, waktu, area, lokasi, tempat, jenis, pekan, hari, tanggal
}
