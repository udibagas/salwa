<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use App\Video;
use App\Artikel;
use App\Peduli;
use App\Pertanyaan;
use App\Forum;
use App\Buku;
use App\BukuTerjemahan;
use App\Produk;

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
			'forum'		=> Forum::limit(5)->orderBy('forum_id', 'DESC')->get(),
			'buku'		=> Buku::limit(4)->orderBy('buku_id', 'DESC')->get(),
			'produk'	=> Produk::limit(3)->orderBy('id_produk', 'DESC')->get(),
			'pertanyaan'	=> Pertanyaan::limit(5)->orderBy('pertanyaan_id', 'DESC')->get(),
			'bukuterjemahan'	=> BukuTerjemahan::limit(4)->orderBy('terjamahan_id', 'DESC')->get(),
		]);
    }
}
