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
Route::resource('image', 'ImageController');

Route::group(['prefix' => 'market'], function() {

	Route::get('index', function () {
	    return view('market.index');
	});

	Route::get('show', function () {
	    return view('market.show');
	});

});

Route::group(['prefix' => 'tanya'], function() {

	Route::get('index', function () {
	    return view('tanya.index');
	});

	Route::get('show', function () {
	    return view('tanya.show');
	});

});

Route::group(['prefix' => 'kitab'], function() {

	Route::get('index', function () {
	    return view('kitab.index');
	});

	Route::get('show', function () {
	    return view('kitab.show');
	});

});

Route::group(['prefix' => 'promo'], function() {

	Route::get('index', function () {
	    return view('promo.index');
	});

	Route::get('show', function () {
	    return view('promo.show');
	});

});

Route::group(['prefix' => 'forum'], function() {

	Route::get('index', function () {
	    return view('forum.index');
	});

	Route::get('show', function () {
	    return view('forum.show');
	});

	Route::get('create', function () {
	    return view('forum.create');
	});

});

Route::group(['prefix' => 'doa'], function() {

	Route::get('index', function () {
	    return view('doa.index');
	});

	Route::get('show', function () {
	    return view('doa.show');
	});

});

Route::group(['prefix' => 'dzikir'], function() {

	Route::get('index', function () {
	    return view('doa.index');
	});

});

Route::group(['prefix' => 'hadits'], function() {

	Route::get('index', function () {
	    return view('doa.index');
	});

});

Route::group(['prefix' => 'audio'], function() {

	Route::get('index', function () {
	    return view('audio.index');
	});

});

Route::group(['prefix' => 'murottal'], function() {

	Route::get('index', function () {
	    return view('murottal.index');
	});

});


Route::auth();

Route::group(['middleware' => 'auth'], function() {
	Route::resource('post', 'PostController');
});
