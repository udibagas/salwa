<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');
Route::get('/forum/search', 'ForumController@search');
Route::get('forum-category/{group}', 'ForumController@category');

Route::get('/doa', 'HadistController@index');
Route::get('/dzikir', 'HadistController@index');

Route::auth();

Route::group(['middleware' => 'auth'], function() {

	Route::resource('user', 'UserController');
	Route::resource('group', 'GroupController');
	Route::resource('lokasi', 'LokasiController');
	Route::resource('area', 'AreaController');

	Route::post('forum/comment/{forum}', 'ForumController@comment');
	Route::put('pertanyaan/{pertanyaan}/simpan-jawaban', 'PertanyaanController@simpanJawaban');
	Route::get('pertanyaan/jawab', 'PertanyaanController@jawab');

	Route::get('me', 'UserController@me');
	Route::get('cms', 'CmsController@index');
	Route::get('pertanyaan/create', 'PertanyaanController@create');
	Route::get('pertanyaan/admin', 'PertanyaanController@admin');
	Route::get('artikel/admin', 'ArtikelController@admin');
	Route::get('informasi/admin', 'InformasiController@admin');
	Route::get('kajian/admin', 'KajianController@admin');
	Route::get('peduli/admin', 'PeduliController@admin');
	Route::get('kitab/admin', 'KitabController@admin');
	Route::get('pertanyaan/{pertanyaan}/jawab', 'PertanyaanController@jawab');
	Route::get('forum/admin', 'ForumController@admin');
	Route::get('hadist/admin', 'HadistController@admin');
	Route::get('video/admin', 'VideoController@admin');
	Route::get('audio/admin', 'AudioController@admin');
	Route::get('murottal/admin', 'MurottalController@admin');
	Route::get('image/admin', 'ImageController@admin');
	Route::get('ustadz/admin', 'UstadzController@admin');
});

Route::resource('artikel', 'ArtikelController');
Route::resource('banner', 'BannerController');
Route::resource('forum', 'ForumController');
Route::resource('hadist', 'HadistController');
Route::resource('image', 'ImageController');
Route::resource('informasi', 'InformasiController');
Route::resource('kitab', 'KitabController');
Route::resource('audio', 'AudioController');
Route::resource('murottal', 'MurottalController');
Route::resource('peduli', 'PeduliController');
Route::resource('pertanyaan', 'PertanyaanController');
Route::resource('produk', 'ProdukController');
Route::resource('promo', 'PromoController');
Route::resource('ustadz', 'UstadzController');
Route::resource('video', 'VideoController');

Route::get('design', function() {
	return '<img src="/images/design.jpg" style="width:100%" />';
});

Route::group(['prefix' => 'api'], function() {
	Route::get('lokasi', 'LokasiController@apiIndex');
	Route::get('area', 'AreaController@apiIndex');

	// hadist
	Route::get('hadits', 'HadistController@apiIndexHadits');
	Route::get('doa', 'HadistController@apiIndexDoa');
	Route::get('dzikir', 'HadistController@apiIndexDzikir');
	Route::get('hadits/{hadist}', 'HadistController@apiShow');

	// kajian
	Route::get('kajian', 'KajianController@apiIndex'); // list & search & today
	Route::get('kajian/{kajian}', 'KajianController@apiShow'); // show detail

	// ustadz
	Route::get('ustadz', 'UstadzController@apiIndex');
	Route::get('ustadz/{ustadz}', 'UstadzController@apiShow');

});
