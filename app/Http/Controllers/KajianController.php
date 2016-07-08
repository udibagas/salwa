<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\KajianRequest;
use App\Kajian;
use App\Pic;
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
		$kajians = Kajian::active()->when($request->rutin == 'rutin', function($query) use($request) {
						return $query->rutin()->orderBy('setiap_hari', 'ASC');
					})->when($request->rutin == 'tematik', function($query) use($request) {
						return $query->tematik()->whereRaw('DATE(kajian_dates) >= DATE(NOW())');
					})->when($request->tema, function($query) use($request) {
						return $query->where('kajian_tema', 'like', '%'.$request->tema.'%');
					})->when($request->ustadz_id, function($query) use($request) {
						return $query->where('kajian_ustadz_id', $request->ustadz_id);
					})->when($request->today, function($query) {
						return $query->today();
					})->orderBy('created', 'DESC')->paginate(16);

		if ($request->ajax()) {
			$html = '';

			foreach ($kajians as $a) {
				$html .= view('kajian.mobile._list', ['a' => $a]);
			}

			return response()->json(['html' => $html, 'nextPageUrl' => $kajians->nextPageUrl()]);
		}

		return view($view, ['kajians' => $kajians]);
	}


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
		$view = BrowserDetect::isMobile() ? 'kajian.mobile.create' : 'kajian.create';
        return view($view, ['kajian' => new Kajian]);
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

		// kajian sekali waktu
		if ($request->jenis_kajian == 1) {
			$data['kajian_dates'] = $request->tanggal.' '.$request->setiap_jam;
		}

		if ($request->hasFile('img')) {

            $file = $request->file('img');

            $fileName = time().'_'.$file->getClientOriginalName();
            $file->move('uploads/dirimg_kajian_photo', $fileName);

            $data['img_kajian_photo'] = 'uploads/dirimg_kajian_photo/'.$fileName;

        }

		$kajian = Kajian::create($data);

		$pic1 = Pic::create([
			'pic_name' => $request->pic_nama_ikhwan,
			'pic_phone' => $request->pic_phone_ikhwan,
		]);

		$pic2 = Pic::create([
			'pic_name' => $request->pic_nama_akhwat,
			'pic_phone' => $request->pic_phone_akhwat,
		]);

		$kajian->update([
			'kajian_pic_id' => $pic1->pic_id,
			'kajian_pic_id2' => $pic2->pic_id
		]);

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
		$view = BrowserDetect::isMobile() ? 'kajian.mobile.show' : 'kajian.show';
        return view($view, [
			'kajian' => $kajian,
			'terkait' => Kajian::where('kajian_ustadz_id', $kajian->kajian_ustadz_id)->orderBy('kajian_id', 'DESC')->limit(5)->get()
		]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Kajian $kajian)
    {
		$view = BrowserDetect::isMobile() ? 'kajian.mobile.edit' : 'kajian.edit';
        return view($view, ['kajian' => $kajian]);
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

		if ($request->jenis_kajian == 1) {
			$data['kajian_dates'] == $request->tanggal.' '.$request->setiap_jam;
		}

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
    public function destroy(Kajian $kajian, Request $request)
    {
        $kajian->delete();

		if ($kajian->img_kajian_photo && file_exists($kajian->img_kajian_photo)) {
			unlink($kajian->img_kajian_photo);
		}

		return redirect($request->redirect)->with('success', 'Data berhasil dihapus');
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
