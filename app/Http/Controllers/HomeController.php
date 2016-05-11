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
use App\Hadist;
use App\Banner;
use App\Group;
use App\SalwaImages;
use App\Informasi;

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
			'videos' 	=> Video::limit(9)->orderBy('video_id', 'DESC')->get(),
			'images' 	=> SalwaImages::limit(3)->orderBy('updated', 'DESC')->get(),
			'slider' 	=> Video::limit(3)->orderBy('video_id', 'DESC')->get(),
			'artikel' 	=> Artikel::limit(4)->orderBy('artikel_id', 'DESC')->get(),
			'peduli' 	=> Peduli::limit(3)->orderBy('peduli_id', 'DESC')->get(),
			'forum'		=> Forum::limit(3)->orderBy('forum_id', 'DESC')->get(),
			'buku'		=> Buku::limit(6)->orderBy('buku_id', 'ASC')->get(),
			'produk'	=> Produk::limit(3)->orderBy('id_produk', 'DESC')->get(),
			'doa'		=> Hadist::limit(5)->doa()->orderBy('hadist.updated', 'DESC')->get(),
			'dzikir'	=> Hadist::limit(5)->dzikir()->orderBy('hadist.updated', 'DESC')->get(),
			'promo'		=> Banner::limit(3)->orderBy('banner_id', 'DESC')->get(),
			'infoHome'	=> Informasi::limit(3)->orderBy('updated', 'DESC')->get(),
			'pertanyaan'	=> Pertanyaan::limit(5)->orderBy('pertanyaan_id', 'DESC')->get(),
			'forumKategori'	=> Group::forum()->has('forums')->get(),
			'bukuterjemahan'	=> BukuTerjemahan::limit(4)->orderBy('terjamahan_id', 'DESC')->get(),
		]);
    }

	public function search()
	{
		return view('home.search', [
			'q' => $_REQUEST['q']
		]);
	}
}
