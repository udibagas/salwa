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

// all can index & show
Route::resource('artikel', 'Api\ArtikelController', ['only' => ['index', 'show']]);
Route::resource('audio', 'Api\AudioController', ['only' => ['index', 'show']]);
Route::resource('comment', 'Api\CommentController', ['only' => ['index', 'show']]);
Route::resource('forum', 'Api\ForumController', ['only' => ['index', 'show']]);
Route::resource('hadist', 'Api\HadistController', ['only' => ['index', 'show']]);
Route::resource('image', 'Api\ImageController', ['only' => ['index', 'show']]);
Route::resource('kajian', 'Api\KajianController', ['only' => ['index', 'show']]);
Route::resource('kitab', 'Api\KitabController', ['only' => ['index', 'show']]);
Route::resource('peduli', 'Api\PeduliController', ['only' => ['index', 'show']]);
Route::resource('pertanyaan', 'Api\PertanyaanController', ['only' => ['index', 'show']]);
Route::resource('produk', 'Api\ProdukController', ['only' => ['index', 'show']]);
Route::resource('video', 'Api\VideoController', ['only' => ['index', 'show']]);


// auth can store, update, delete
// TODO : admin only
Route::group(['middleware' => 'auth:api'], function() {

    Route::resource('artikel', 'Api\ArtikelController', ['only' => ['store', 'update', 'destroy']]);
    Route::resource('audio', 'Api\AudioController', ['only' => ['store', 'update', 'destroy']]);
    Route::resource('comment', 'Api\CommentController', ['only' => ['store', 'update', 'destroy']]);
    Route::resource('forum', 'Api\ForumController', ['only' => ['store', 'update', 'destroy']]);
    Route::resource('hadist', 'Api\HadistController', ['only' => ['store', 'update', 'destroy']]);
    Route::resource('image', 'Api\ImageController', ['only' => ['store', 'update', 'destroy']]);
    Route::resource('kajian', 'Api\KajianController', ['only' => ['store', 'update', 'destroy']]);
    Route::resource('kitab', 'Api\KitabController', ['only' => ['store', 'update', 'destroy']]);
    Route::resource('peduli', 'Api\PeduliController', ['only' => ['store', 'update', 'destroy']]);
    Route::resource('pertanyaan', 'Api\PertanyaanController', ['only' => ['store', 'update', 'destroy']]);
    Route::resource('produk', 'Api\ProdukController', ['only' => ['store', 'update', 'destroy']]);
    Route::resource('video', 'Api\VideoController', ['only' => ['store', 'update', 'destroy']]);

});
