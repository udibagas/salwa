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
use App\Produk;
use App\Hadist;
use App\Banner;
use App\Group;
use App\SalwaImages;
use App\Informasi;
use App\Mp3;
use App\Post;
use Instagram;

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
    public function index(Request $request)
    {
		if ($request->search)
		{
			$search = str_replace(' ', '%', $request->search);

			return view('home.search', [
				'videos'	=> Video::where('title', 'like', '%'.$search.'%')->orderBy('created', 'DESC')->limit(10)->get(),
				'forums'	=> Forum::active()->where('title', 'like', '%'.$search.'%')->orderBy('created', 'DESC')->limit(10)->get(),
				'posts'		=> Post::where('description', 'like', '%'.$search.'%')->orderBy('created', 'DESC')->limit(10)->get(),
				'artikels'	=> Artikel::where('judul', 'like', '%'.$search.'%')->orderBy('created', 'DESC')->limit(10)->get(),
				'produks'	=> Produk::where('judul', 'like', '%'.$search.'%')->orderBy('created', 'DESC')->limit(10)->get(),
				'images'	=> SalwaImages::where('judul', 'like', '%'.$search.'%')->orderBy('created', 'DESC')->limit(10)->get(),
				'audios'	=> Mp3::where('judul', 'like', '%'.$search.'%')->orderBy('created', 'DESC')->limit(10)->get(),
				'informasis'=> Informasi::where('judul', 'like', '%'.$search.'%')->orderBy('created', 'DESC')->limit(10)->get(),
				'buku'		=> Buku::where('judul', 'like', '%'.$search.'%')->orderBy('created', 'DESC')->limit(10)->get(),
				'pertanyaan'=> Pertanyaan::show()->where('judul_pertanyaan', 'like', '%'.$search.'%')->orderBy('created', 'DESC')->limit(10)->get(),
				'pedulis'	=> Peduli::where('judul', 'like', '%'.$search.'%')->orderBy('created', 'DESC')->limit(10)->get(),
				'doa'		=> Hadist::doa()->where('judul', 'like', '%'.$search.'%')->orderBy('hadist.created', 'DESC')->limit(10)->get(),
				'dzikir'	=> Hadist::dzikir()->where('judul', 'like', '%'.$search.'%')->orderBy('hadist.created', 'DESC')->limit(10)->get(),
				'hadist'	=> Hadist::hadist()->where('judul', 'like', '%'.$search.'%')->orderBy('hadist.created', 'DESC')->limit(10)->get(),
			]);
		}

        return view('home.index', [
			'videos' 	=> Video::limit(6)->orderBy('video_id', 'DESC')->get(),
			'images' 	=> SalwaImages::limit(5)->orderByRaw('RAND()')->get(),
			'slider' 	=> Video::limit(3)->orderBy('video_id', 'DESC')->get(),
			'artikel' 	=> Artikel::limit(12)->orderBy('artikel_id', 'DESC')->get(),
			'peduli' 	=> Peduli::limit(3)->orderBy('peduli_id', 'DESC')->get(),
			'forum'		=> Forum::active()->limit(3)->orderBy('forum_id', 'DESC')->get(),
			'buku'		=> Buku::limit(18)->orderByRaw('RAND()')->get(),
			'produk'	=> Produk::limit(3)->orderBy('id_produk', 'DESC')->get(),
			'doa'		=> Hadist::limit(5)->doa()->orderByRaw('RAND()')->get(),
			'dzikir'	=> Hadist::limit(5)->dzikir()->orderByRaw('RAND()')->get(),
			'promo'		=> Banner::active()->has('positions')->orderBy('banner_id', 'DESC')->get(),
			'infoHome'	=> Informasi::limit(3)->orderBy('updated', 'DESC')->get(),
			'videoRandom' 	=> Video::limit(9)->orderByRaw('RAND()')->get(),
			'pertanyaan'	=> Pertanyaan::limit(5)->show()->dijawab()->orderBy('pertanyaan_id', 'DESC')->get(),
			'forumKategori'	=> Group::forum()->has('forums')->limit(10)->get(),
		]);
    }

	public function instagram()
	{
		return Instagram::users()->get(30);
	}
}
