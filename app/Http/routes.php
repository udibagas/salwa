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
Route::get('/forum/search', 'ForumController@search');
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
Route::get('doa/{hadist}', 'HadistController@show');
Route::get('dzikir/{hadist}', 'HadistController@show');
// Route::resource('hadist', 'HadistController');

Route::auth();

Route::group(['middleware' => 'auth'], function() {
	Route::resource('group', 'GroupController');
	Route::get('me', 'UserController@me');
	Route::get('cms', 'CmsController@index');
	Route::resource('user', 'UserController');
	Route::get('pertanyaan/create', 'PertanyaanController@create');
	Route::get('pertanyaan/admin', 'PertanyaanController@admin');
	Route::get('pertanyaan/{pertanyaan}/jawab', 'PertanyaanController@jawab');
	Route::post('forum/comment', 'ForumController@comment');
});

Route::resource('pertanyaan', 'PertanyaanController');


Route::get('design', function() {
	return '<img src="/images/design.jpg" style="width:100%" />';
});
