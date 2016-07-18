<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;

use BrowserDetect;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
		Relation::morphMap([
			'artikel' 	=> \App\Artikel::class,
			'audio'		=> \App\Mp3::class,
			'image' 	=> \App\SalwaImages::class,
			'hadist' 	=> \App\Hadist::class,
			'informasi' => \App\Informasi::class,
			'kajian' 	=> \App\Kajian::class,
			'kitab' 	=> \App\Buku::class,
			'murottal' 	=> \App\Murottal::class,
			'peduli' 	=> \App\Peduli::class,
			'pertanyaan'=> \App\Pertanyaan::class,
			'produk'	=> \App\Produk::class,
			'video' 	=> \App\Video::class,
		]);

		view()->share([
			'isMobile' => BrowserDetect::isMobile(),
			'isTablet' => BrowserDetect::isTablet(),
		]);

        // view()->share([
		// 	'info' 		=> Informasi::limit(3)->orderBy('informasi_id', 'DESC')->get(),
		// 	'hadist'	=> Hadist::where('group_id', 42)->orderBy('hadist_id', 'DESC')->first(),
		// 	'doa'		=> Hadist::where('group_id', 59)->orderBy('hadist_id', 'DESC')->first(),
		// 	'banner'	=> Banner::limit(3)->orderBy('banner_id', 'DESC')->get(),
		// 	'salwaImage'	=> SalwaImages::orderBy('id_salwaimages', 'DESC')->first(),
		// ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
