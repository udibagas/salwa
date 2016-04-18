<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use App\Video;
use App\Artikel;
use App\Peduli;
use App\Informasi;
use App\Pertanyaan;
use App\Forum;
use App\Buku;
use App\BukuTerjemahan;
use App\SalwaImages;
use App\Hadist;

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
			'videos' 	=> Video::limit(3)->orderBy('video_id', 'DESC')->get(),
			'slider' 	=> Video::limit(3)->orderBy('video_id', 'DESC')->get(),
			'artikel' 	=> Artikel::limit(3)->orderBy('artikel_id', 'DESC')->get(),
			'peduli' 	=> Peduli::limit(3)->orderBy('peduli_id', 'DESC')->get(),
			'informasi' => Informasi::limit(3)->orderBy('informasi_id', 'DESC')->get(),
			'forum'		=> Forum::limit(5)->orderBy('forum_id', 'DESC')->get(),
			'buku'		=> Buku::limit(4)->orderBy('buku_id', 'DESC')->get(),
			'hadist'	=> Hadist::where('group_id', 42)->orderBy('hadist_id', 'DESC')->first(),
			'doa'		=> Hadist::where('group_id', 59)->orderBy('hadist_id', 'DESC')->first(),
			'salwaImage'	=> SalwaImages::orderBy('id_salwaimages', 'DESC')->first(),
			'pertanyaan'	=> Pertanyaan::limit(5)->orderBy('pertanyaan_id', 'DESC')->get(),
			'bukuterjemahan'	=> BukuTerjemahan::limit(4)->orderBy('terjamahan_id', 'DESC')->get(),
		]);
    }
}
