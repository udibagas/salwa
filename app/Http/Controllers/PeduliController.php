<?php

namespace App\Http\Controllers;

use App\Http\Requests\PeduliRequest;
use Illuminate\Http\Request;
use App\Events\NewPeduli;
use App\Http\Requests;
use BrowserDetect;
use App\Peduli;

class PeduliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		$view = BrowserDetect::isMobile() ? 'peduli.mobile.index' : 'peduli.index';
		$search = str_replace(' ', '%', $request->search);
		$pedulis = Peduli::when($search, function($query) use ($search) {
							return $query->where('judul', 'like', '%'.$search.'%');
						})->when($request->group_id, function($query) use ($request) {
							return $query->where('group_id', $request->group_id);
						})->orderBy('updated', 'DESC')->paginate(16);

		if ($request->ajax()) {
			$html = '';

			foreach ($pedulis as $a) {
				$html .= view('peduli.mobile._list', ['a' => $a]);
			}

			return response()->json([
				'html' 			=> $html,
				'nextPageUrl' 	=> $pedulis->nextPageUrl(),
				'currentPage'	=> $pedulis->currentPage(),
				'lastPage'		=> $pedulis->lastPage(),
			]);
		}

        return view($view, ['pedulis' => $pedulis]);
    }

    public function admin(Request $request)
    {
        return view('peduli.admin', [
			'pedulis' => Peduli::select('peduli.*')
                        ->when($request->q, function($query) use($request) {
                            return $query
                                ->join('groups', 'groups.group_id', '=', 'peduli.group_id', 'left')
                                ->join('users', 'users.user_id', '=', 'peduli.user_id', 'left')
                                ->where(function($q) use($request) {
                                    $search = str_replace(' ', '%', $request->q);
                                    return $q->where('judul', 'LIKE', '%'.$search.'%')
                                        ->orWhere('groups.group_name', 'LIKE', '%'.$search.'%')
                                        ->orWhere('users.name', 'like', '%'.$search.'%');
                                });
                        })->orderBy('peduli.updated', 'DESC')->paginate()
		]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$view = BrowserDetect::isMobile() ? 'peduli.mobile.create' : 'peduli.create';
        return view($view, ['peduli' => new Peduli]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PeduliRequest $request)
    {
		$data 					= $request->all();
		$data['isi']			= $request->isi;
		$data['kd_judul'] 		= str_slug($request->judul);
		$data['tgl_artikel'] 	= date('Y-m-d H:i:s');
		$data['isi_mobile'] 	= $data['isi'];
		$data['ringkasan'] 		= str_limit($data['isi'], 250);
		$data['createdby'] 		= auth()->user()->name;
		$data['user_id']		= auth()->user()->user_id;

		if ($request->hasFile('img')) {

            $file = $request->file('img');

            $fileName = time().'_'.$file->getClientOriginalName();
            $file->move('uploads/dirimg_artikel', $fileName);

            $data['img_artikel'] = 'uploads/dirimg_artikel/'.$fileName;

        }

		$peduli = Peduli::create($data);
        event(new NewPeduli($peduli));
		return redirect('/peduli/'.$peduli->peduli_id)->with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Peduli $peduli)
    {
		$view = BrowserDetect::isMobile() ? 'peduli.mobile.show' : 'peduli.show';

        return view($view, [
			'peduli' => $peduli,
			'terkait'	=> Peduli::where('group_id', $peduli->group_id)
							->orderBy('updated', 'DESC')->limit(10)->get()
		]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Peduli $peduli)
    {
		$view = BrowserDetect::isMobile() ? 'peduli.mobile.edit' : 'peduli.edit';
        return view($view, ['peduli' => $peduli]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PeduliRequest $request, Peduli $peduli)
    {
		$data 					= $request->all();
		$data['isi']			= $request->isi;
		$data['kd_judul'] 		= str_slug($request->judul);
		$data['isi_mobile'] 	= $data['isi'];
		$data['ringkasan'] 		= str_limit($data['isi'], 250);
		$data['updatedby'] 		= auth()->user()->name;

		if ($request->hasFile('img')) {

            $file = $request->file('img');

            $fileName = time().'_'.$file->getClientOriginalName();
            $file->move('uploads/dirimg_artikel', $fileName);

            $data['img_artikel'] = 'uploads/dirimg_artikel/'.$fileName;

			if ($peduli->img_artikel && file_exists($peduli->img_artikel)) {
				unlink($peduli->img_artikel);
			}

        }

		$peduli->update($data);
        return redirect('/peduli/'.$peduli->peduli_id)->with('success', 'Data berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Peduli $peduli, Request $request)
    {
		$peduli->delete();

		if ($peduli->img_artikel && file_exists($peduli->img_artikel)) {
			unlink($peduli->img_artikel);
		}

        // delete comment
        $peduli->comments()->delete();
		return redirect($request->redirect)->with('success', 'Data berhasil dihapus');
    }

}
