<?php

namespace App\Http\Controllers;

use App\Http\Requests\HadistRequest;
use Illuminate\Http\Request;
use App\Events\ShowHadist;
use App\Events\NewHadist;
use App\Http\Requests;
use BrowserDetect;
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
		$view = BrowserDetect::isMobile() ? 'hadist.mobile.index' : 'hadist.index';
		$search = str_replace(' ', '%', $request->search);

		$hadists = Hadist::when($request->group_id, function($query) use ($request) {
						return $query->where('hadist.group_id', $request->group_id);
					})->when($search, function($query) use ($search) {
						return $query->where('judul', 'like', '%'.$search.'%');
					})->orderBy('hadist.updated', 'DESC')->paginate(20);

		if ($request->ajax()) {
			$html = '';

			foreach ($hadists as $a) {
				$html .= view('hadist.mobile._list', ['a' => $a]);
			}

			return response()->json([
				'html' 			=> $html,
				'nextPageUrl' 	=> $hadists->nextPageUrl(),
				'currentPage'	=> $hadists->currentPage(),
				'lastPage'		=> $hadists->lastPage(),
			]);
		}

		return view($view, [
			'groupName'	=> 'HADIST',
			'hadists' 	=> $hadists,
			'hadist'	=> Hadist::hadist()->orderByRaw('RAND()')->first()
		]);
    }

    public function indexDoa(Request $request)
    {
		$view = BrowserDetect::isMobile() ? 'hadist.mobile.index' : 'hadist.index';
		$search = str_replace(' ', '%', $request->search);
		$hadists = Hadist::doa()->when($request->group_id, function($query) use ($request) {
						return $query->where('hadist.group_id', $request->group_id);
					})->when($search, function($query) use ($search) {
						return $query->where('judul', 'like', '%'.$search.'%');
					})->orderBy('hadist.updated', 'DESC')->paginate(20);

		if ($request->ajax()) {
			$html = '';

			foreach ($hadists as $a) {
				$html .= view('hadist.mobile._list', ['a' => $a]);
			}

			return response()->json(['html' => $html, 'nextPageUrl' => $hadists->nextPageUrl()]);
		}

		return view($view, [
			'groupName'	=> 'DO\'A',
			'hadists' 	=> $hadists,
			'hadist'	=> Hadist::doa()->orderByRaw('RAND()')->first()
		]);
    }

    public function indexDzikir(Request $request)
    {
		$view = BrowserDetect::isMobile() ? 'hadist.mobile.index' : 'hadist.index';
		$search = str_replace(' ', '%', $request->search);
		$hadists = Hadist::dzikir()->when($request->group_id, function($query) use ($request) {
						return $query->where('hadist.group_id', $request->group_id);
					})->when($search, function($query) use ($search) {
						return $query->where('judul', 'like', '%'.$search.'%');
					})->orderBy('hadist.updated', 'DESC')->paginate(20);

		if ($request->ajax()) {
			$html = '';

			foreach ($hadists as $a) {
				$html .= view('hadist.mobile._list', ['a' => $a]);
			}

			return response()->json(['html' => $html, 'nextPageUrl' => $hadists->nextPageUrl()]);
		}

		return view($view, [
			'groupName'	=> 'DZIKIR',
			'hadists' 	=> $hadists,
			'hadist'	=> Hadist::dzikir()->orderByRaw('RAND()')->first()
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
		$view = BrowserDetect::isMobile() ? 'hadist.mobile.create' : 'hadist.create';
        return view($view, ['hadist' => new Hadist]);
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
		$data['hadist']			= $request->hadist;
		$data['penjelasan']		= $request->penjelasan;
		$data['kd_judul'] 		= str_slug($request->judul);
		$data['tanggal'] 		= date('Y-m-d H:i:s');
		$data['ringkasan'] 		= str_limit($data['penjelasan'], 250);
		$data['createdby'] 		= auth()->user()->name;

		$hadist = Hadist::create($data);
        event(new NewHadist($hadist));
        return redirect('/hadist/'.$hadist->hadist_id)->with('success', 'Hadist berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Hadist $hadist)
    {
		$view = BrowserDetect::isMobile() ? 'hadist.mobile.show' : 'hadist.show';
        event(new ShowHadist($hadist));

		if ($hadist->group->group_name == 'Dzikir') {
			$url = 'dzikir';
		} else if ($hadist->group->group_name == 'Doa') {
			$url = 'doa';
		} else {
			$url = 'hadist';
		}

        return view($view, [
			'url'		=> $url,
			'groupName'	=> $hadist->group->group_name,
			'hadist' 	=> $hadist,
			'terkait'	=> Hadist::where('group_id', $hadist->group_id)->orderByRaw('RAND()')->limit(10)->get()
		]);
    }

    public function baca($slug)
    {
		$hadist = Hadist::where('kd_judul', $slug)->firstOrFail();
        event(new ShowHadist($hadist));

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
			'terkait'	=> Hadist::where('group_id', $hadist->group_id)->orderByRaw('RAND()')->limit(10)->get()
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
		$view = BrowserDetect::isMobile() ? 'hadist.mobile.edit' : 'hadist.edit';
        return view($view, ['hadist' => $hadist]);
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
		$data['hadist']			= $request->hadist;
		$data['penjelasan']		= $request->penjelasan;
		$data['kd_judul'] 		= str_slug($request->judul);
		$data['ringkasan'] 		= str_limit($data['penjelasan'], 250);
		$data['updatedby'] 		= auth()->user()->name;

		$hadist->update($data);

        return redirect('/hadist/'.$hadist->hadist_id)->with('success', 'Hadist berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hadist $hadist, Request $request)
    {
        $hadist->delete();
		return redirect($request->redirect)->with('success', 'Data berhasil dihapus');
    }

	// API
	public function apiIndexHadits(Request $request)
	{
		$data = Hadist::select('hadist_id', 'judul', 'tanggal')
				->hadist()->when($request->judul, function($query) use ($request) {
					return $query->where('judul', 'like', '%'.$request->judul.'%');
				})->orderBy('hadist.updated', 'DESC')->paginate(10);

		return response()->json([
			'results'	=> $data->items(),
			'total'		=> $data->total(),
			'pages'		=> $data->lastPage()
		]);
	}

	public function apiIndexDoa(Request $request)
	{
		$data = Hadist::select('hadist_id', 'judul', 'tanggal')
				->doa()->when($request->judul, function($query) use ($request) {
					return $query->where('judul', 'like', '%'.$request->judul.'%');
				})->orderBy('hadist.updated', 'DESC')->paginate(10);

		return response()->json([
			'results'	=> $data->items(),
			'total'		=> $data->total(),
			'pages'		=> $data->lastPage()
		]);
	}

	public function apiIndexDzikir(Request $request)
	{
		$data = Hadist::select('hadist_id', 'judul', 'tanggal')
				->dzikir()->when($request->judul, function($query) use ($request) {
					return $query->where('judul', 'like', '%'.$request->judul.'%');
				})->orderBy('hadist.updated', 'DESC')->paginate(10);

		return response()->json([
			'results'	=> $data->items(),
			'total'		=> $data->total(),
			'pages'		=> $data->lastPage()
		]);
	}
}
