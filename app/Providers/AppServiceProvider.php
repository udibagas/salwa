<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\SalwaImages;
use App\Informasi;
use App\Hadist;
use App\Banner;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->share([
			'informasi' => Informasi::limit(3)->orderBy('informasi_id', 'DESC')->get(),
			'hadist'	=> Hadist::where('group_id', 42)->orderBy('hadist_id', 'DESC')->first(),
			'doa'		=> Hadist::where('group_id', 59)->orderBy('hadist_id', 'DESC')->first(),
			'banner'	=> Banner::limit(3)->orderBy('banner_id', 'DESC')->get(),
			'salwaImage'	=> SalwaImages::orderBy('id_salwaimages', 'DESC')->first(),
		]);
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
