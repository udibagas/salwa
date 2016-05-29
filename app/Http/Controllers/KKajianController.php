<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\KajianRequest;
use App\Kajian;

class KajianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin(Request $request)
    {
        return view('kajian.admin', [
			'kajians' => Kajian::when($request->tempat, function($query) use($request) {
							return $query->where('kajian_tempat', 'like', '%'.$request->tempat.'%');
						})->when($request->jenis, function($query) use($request) {
							return $query->where('jenis_kajian', $request->jenis);
						})->when($request->hari, function($query) use($request) {
							return $query->where('setiap_hari', $request->hari);
						})->when($request->status, function($query) use($request) {
							return $query->where('kajian_status', $request->status);
						})->when($request->tema, function($query) use($request) {
							return $query->where('kajian_tema', 'like', '%'.$request->tema.'%');
						})->when($request->ustadz, function($query) use($request) {
							return $query->join('tb_ustadz', 'tb_ustadz.ustadz_id', '=', 'tb_kajian.kajian_ustadz_id')
									->where('tb_ustadz.ustadz_name', 'like', '%'.$request->ustadz.'%');
						})->when($request->today, function($query) {
							return $query->whereRaw('DATE(kajian_dates) = '.date('Y-m-d'));
						})->orderBy('tb_kajian.created', 'ASC')->paginate()
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
        $data				= $request->all();
		$data['createdby']	= auth()->user()->name;
		$data['kajian_user_id']	= auth()->user()->user_id;

		if ($request->hasFile('img')) {

            $file = $request->file('img');

            $fileName = time().'_'.$file->getClientOriginalName();
            $file->move('uploads/dirimg_kajian_photo', $fileName);

            $data['img_kajian_photo'] = 'uploads/dirimg_kajian_photo/'.$fileName;

        }

		Kajian::create($data);
		return redirect('kajian/admin')->with('success', 'Data berhasil disimpan');
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
		$data				= $request->all();
		$data['updatedby']	= auth()->user()->name;

		if ($request->hasFile('img')) {

            $file = $request->file('img');

            $fileName = time().'_'.$file->getClientOriginalName();
            $file->move('uploads/dirimg_kajian_photo', $fileName);

            $data['img_kajian_photo'] = 'uploads/dirimg_kajian_photo/'.$fileName;

        }

		$kajian->update($data);
		return redirect('kajian/admin')->with('success', 'Data berhasil disimpan');
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

		if ($kajian->img_kajian_photo && file_exists($kajian->img_kajian_photo)) {
			unlink($kajian->img_kajian_photo);
		}

		return redirect('kajian/admin')->with('success', 'Data berhasil dihapus');
    }

	// API
	public function apiIndex(Request $request)
	{
		$data = Kajian::when($request->id_lokasi, function($query) use($request) {
					return $query->where('id_lokasi', $request->id_lokasi);
				})->when($request->id_area, function($query) use($request) {
					return $query->where('id_area', $request->id_area);
				})->when($request->kajian_tema, function($query) use($request) {
					return $query->where('kajian_tema', 'like', '%'.$request->kajian_tema.'%');
				})->when($request->kajian_ustadz_id, function($query) use($request) {
					return $query->where('kajian_ustadz_id', $request->kajian_ustadz_id);
				})->when($request->today, function($query) {
					return $query->whereRaw('DATE(kajian_dates) = '.date('Y-m-d'));
				})->orderBy('created', 'ASC')->paginate(10);


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

	public function apiDelete(Kajian $kajian)
	{
		$kajian->delete();

		return response()->json([
			'succes'	=> true,
			'msg'		=> 'Data berhasil dihapus',
			'error'		=> false,
		]);
	}
}
