<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use App\Video;
use App\Artikel;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home.index', [
			'videos' => Video::limit(3)->orderBy('video_id', 'DESC')->get(),
			'artikel' => Artikel::limit(3)->orderBy('artikel_id', 'DESC')->get()
		]);
    }
}
