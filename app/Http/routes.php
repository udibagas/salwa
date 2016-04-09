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

Route::get('/', function () {
    return view('home.index');
});

Route::group(['prefix' => 'video'], function() {

	Route::get('index', function () {
	    return view('video.index');
	});

	Route::get('show', function () {
	    return view('video.show');
	});

});

Route::group(['prefix' => 'artikel'], function() {

	Route::get('index', function () {
	    return view('artikel.index');
	});

	Route::get('show', function () {
	    return view('artikel.show');
	});

});

Route::group(['prefix' => 'peduli'], function() {

	Route::get('index', function () {
	    return view('peduli.index');
	});

	Route::get('show', function () {
	    return view('peduli.show');
	});

});

Route::group(['prefix' => 'info'], function() {

	Route::get('index', function () {
	    return view('info.index');
	});

	Route::get('show', function () {
	    return view('info.show');
	});

});

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

Route::group(['prefix' => 'image'], function() {

	Route::get('index', function () {
	    return view('image.index');
	});

	Route::get('show', function () {
	    return view('image.show');
	});

});

Route::group(['prefix' => 'forum'], function() {

	Route::get('index', function () {
	    return view('forum.index');
	});

	Route::get('show', function () {
	    return view('forum.show');
	});

});

Route::group(['prefix' => 'doa'], function() {

	Route::get('index', function () {
	    return view('doa.index');
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

Route::get('/home', 'HomeController@index');
