<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\KajianOldRequest;
use App\KajianOld;
use App\Pic;
use BrowserDetect;

class KajianOldController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	public function index(Request $request)
	{
		$view = BrowserDetect::isMobile() ? 'kajian-old.mobile.index' : 'kajian-old.index';
		$kajians = KajianOld::active()->when($request->rutin == 'rutin', function($query) use($request) {
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
				$html .= view('kajian-old.mobile._list', ['a' => $a]);
			}

			return response()->json([
				'html'			=> $html,
				'nextPageUrl' 	=> $kajians->nextPageUrl(),
				'currentPage'	=> $kajians->currentPage(),
				'lastPage'		=> $kajians->lastPage(),
			]);
		}

		return view($view, ['kajians' => $kajians]);
	}


	public function admin(Request $request)
    {
        return view('kajian-old.admin', [
			'kajians' => KajianOld::when($request->tempat, function($query) use($request) {
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
		$view = BrowserDetect::isMobile() ? 'kajian-old.mobile.create' : 'kajian-old.create';
        return view($view, ['kajian' => new KajianOld]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KajianOldRequest $request)
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


		$pic1 = Pic::create([
			'pic_name' => $request->pic_nama_ikhwan,
			'pic_phone' => $request->pic_phone_ikhwan,
		]);

		$pic2 = Pic::create([
			'pic_name' => $request->pic_nama_akhwat,
			'pic_phone' => $request->pic_phone_akhwat,
		]);

        $data['kajian_pic_id'] = $pic1->pic_id;
        $data['kajian_pic_id2'] = $pic2->pic_id;

        $kajian = KajianOld::create($data);

		return redirect('kajian/admin')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(KajianOld $kajian)
    {
		$view = BrowserDetect::isMobile() ? 'kajian-old.mobile.show' : 'kajian-old.show';
        return view($view, [
			'kajian' => $kajian,
			'terkait' => KajianOld::where('kajian_ustadz_id', $kajian->kajian_ustadz_id)->orderBy('kajian_id', 'DESC')->limit(5)->get()
		]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(KajianOld $kajian)
    {
		$view = BrowserDetect::isMobile() ? 'kajian-old.mobile.edit' : 'kajian-old.edit';
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

            if ($kajian->img_kajian_photo && file_exists($kajian->img_kajian_photo)) {
                unlink($kajian->img_kajian_photo);
            }

        }

        if ($kajian->pic1 && $kajian->pic1->pic_name == $request->pic_nama_ikhwan) {
            if ($kajian->pic1->pic_phone != $request->pic_phone_ikhwan) {
                $kajian->pic1->update(['pic_phone' => $request->pic_phone_ikhwan]);
            }
        } else {
            $pic1 = Pic::create([
                'pic_name' => $request->pic_nama_ikhwan,
                'pic_phone' => $request->pic_phone_ikhwan,
            ]);
            $data['kajian_pic_id'] = $pic1->pic_id;
        }

        if ($kajian->pic2 && $kajian->pic2->pic_name == $request->pic_nama_ikhwan) {
            if ($kajian->pic2->pic_phone != $request->pic_phone_ikhwan) {
                $kajian->pic2->update(['pic_phone' => $request->pic_phone_ikhwan]);
            }
        } else {
            $pic2 = Pic::create([
                'pic_name' => $request->pic_nama_akhwat,
                'pic_phone' => $request->pic_phone_akhwat,
            ]);
            $data['kajian_pic_id2'] = $pic2->pic_id;
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
    public function destroy(KajianOld $kajian, Request $request)
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
		$data = KajianOld::with(['ustadz', 'lokasi', 'area', 'pic1', 'pic2'])->when($request->id_lokasi, function($query) use($request) {
					return $query->where('id_lokasi', $request->id_lokasi);
				})->when($request->id_area, function($query) use($request) {
					return $query->where('id_area', $request->id_area);
				})->when($request->jenis, function($query) use($request) {

                    if ($request->jenis == 'rutin') {
                        return $query->rutin();
                    }

                    if ($request->jenis == 'tematik') {
                        return $query->tematik();
                    }

				})->when($request->kajian_tema, function($query) use($request) {
					return $query->where('kajian_tema', 'like', '%'.$request->kajian_tema.'%');
				})->when($request->kajian_ustadz_id, function($query) use($request) {
					return $query->where('kajian_ustadz_id', $request->kajian_ustadz_id);
				})->when($request->today, function($query) {
					return $query->whereRaw('DATE(kajian_dates) = '.date('Y-m-d'));
				})->orderBy('created', 'DESC')->paginate(10);


		return response()->json([
			'results'	=> $data->items(),
			'total'		=> $data->total(),
			'pages'		=> $data->lastPage(),
			// 'user'		=> auth()->guard('api')->user()->name
		]);
	}

	public function apiShow(KajianOld $kajian)
	{
		return $kajian;
	}

	public function apiDelete(KajianOld $kajian)
	{
		$kajian->delete();

		return response()->json([
			'succes'	=> true,
			'msg'		=> 'Data berhasil dihapus',
			'error'		=> false,
		]);
	}

    public function apiStore(Request $request)
    {
        $data = $request->all();

        if ($request->get('pic1_name')) {
            $pic1 = Pic::create([
                'pic_name' => $request->pic1_name,
                'pic_phone' => $request->pic1_phone,
            ]);
        }

        if ($request->get('pic2_name')) {
            $pic2 = Pic::create([
                'pic_name' => $request->pic2_name,
                'pic_phone' => $request->pic2_phone,
            ]);
        }

        if ($request->hasFile('img_kajian_photo')) {

            $file = $request->file('img_kajian_photo');

            $fileName = time().'_'.$file->getClientOriginalName();
            $file->move('uploads/dirimg_kajian_photo', $fileName);

            $data['img_kajian_photo'] = 'uploads/dirimg_kajian_photo/'.$fileName;

        }

        $data['kajian_user_id']	= auth()->guard('api')->user()->user_id;
        $data['kajian_pic_id'] = $pic1->pic_id;
        $data['kajian_pic_id2'] = $pic2->pic_id;

        return KajianOld::create($data);
    }
}
