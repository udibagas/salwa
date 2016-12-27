<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');


Route::get('lokasi', 'LokasiController@ndex');
Route::get('area', 'AreaController@apiIndex');
Route::get('hadist', 'HadistController@apiIndex');
Route::get('pertanyaan', 'PertanyaanController@apiIndex');
Route::get('informasi', 'InformasiController@apiIndex');
Route::get('artikel', 'ArtikelController@apiIndex');
Route::get('peduli', 'PeduliController@apiIndex');
Route::get('image', 'ImageController@apiIndex');
Route::get('video', 'VideoController@apiIndex');
Route::get('forum/group', 'ForumController@apiGroup');
Route::get('forum', 'ForumController@apiIndex');

Route::resource('kajian', 'Api\KajianController');


Route::group(['middleware' => 'auth:api'], function() {

	// hadist
	// Route::get('dzikir', 'HadistController@apiIndexDzikir');
	Route::get('hadits/{hadist}', 'HadistController@apiShow');

	// kajian
	// Route::get('kajian/create', 'KajianController@apiStore');
	// Route::get('kajian', 'KajianController@apiIndex');
	// Route::get('kajian/{kajian}', 'KajianController@apiShow');

	// ustadz
	Route::get('ustadz', 'UstadzController@apiIndex');
	Route::get('ustadz/{ustadz}', 'UstadzController@apiShow');

	// image
	Route::get('image/{image}', 'ImageController@apiShow');

	// artikel
	// Route::get('artikel', 'ArtikelController@apiIndex');
	Route::get('artikel/{artikel}', 'ArtikelController@apiShow');

	// video
	// Route::get('video', 'VideoController@apiIndex');
	Route::get('video/{video}', 'VideoController@apiShow');

});
