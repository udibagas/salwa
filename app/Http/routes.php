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
Route::resource('informasi', 'InformasiController');
Route::resource('artikel', 'ArtikelController');
Route::resource('peduli', 'PeduliController');
Route::resource('video', 'VideoController');
Route::resource('mp3', 'Mp3Controller');
Route::resource('image', 'ImageController');
Route::resource('pertanyaan', 'PertanyaanController');
Route::resource('forum', 'ForumController');
Route::get('forum-category/{group}', 'ForumController@category');
Route::resource('produk', 'ProdukController');
Route::resource('murottal', 'MurottalController');
Route::resource('promo', 'PromoController');
Route::resource('kitab', 'KitabController');
Route::get('hadist', 'HadistController@indexHadist');
Route::get('doa', 'HadistController@indexDoa');
Route::get('dzikir', 'HadistController@indexDzikir');
Route::get('hadist/{hadist}', 'HadistController@show');
// Route::resource('hadist', 'HadistController');


Route::auth();

Route::group(['middleware' => 'auth'], function() {
	Route::resource('post', 'PostController');
});
