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

use App\User;

Route::resource('kajians', 'Kajians');

Route::get('jajal', function() {
	return view('auth.emails.password', ['unsubscribe' => 'aaa', 'logo' => ['path' => '/images/logo.png']]);
});

Route::get('timeline', 'TimelineController@index');

Route::get('search', 'HomeController@search');
Route::get('salwa.id', 'HomeController@salwaId');

Route::get('quran', 'QuranController@index');
Route::get('quran/download-ayah-audio', 'QuranController@downloadAyahAudio');
Route::get('quran/download-surah-audio', 'QuranController@downloadSurahAudio');
Route::get('quran/{ayah}/detail-ayah', 'QuranController@detailAyah');
Route::get('quran/image', 'QuranController@image');
Route::get('quran/search', 'QuranController@search');
Route::get('quran/{surah}:{from}-{to}', 'QuranController@ayah');
Route::get('quran/{surah}:{from}', 'QuranController@ayah');
Route::get('quran/{surah}', 'QuranController@surah');

Route::get('audio/playlist', 'AudioController@playlist');
Route::get('radio', 'RadioController@index');

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
Route::get('/home', ['as' => 'home1', 'uses' => 'HomeController@index']);
Route::get('/instagram', 'HomeController@instagram');
Route::get('audio/{audio}/download', 'AudioController@download');
Route::get('doa', 'HadistController@indexDoa');
Route::get('dzikir', 'HadistController@indexDzikir');
Route::get('forum/search', 'ForumController@search');
Route::get('forum-category/{group}', 'ForumController@category');
Route::get('kitab/{kitab}/download', 'KitabController@download');
Route::get('murottal/{murottal}/download', 'MurottalController@download');
Route::get('promo', 'BannerController@index');
// Route::get('kajian/{kajian}/download-file', 'KajianController@downloadFile');
// Route::get('kajian/{kajian}/download-audio', 'KajianController@downloadAudio');

Route::group(['middleware' => 'auth'], function() {

	Route::get('timeline/create', 'TimelineController@create');
	Route::post('timeline/post-pertanyaan', 'TimelineController@postPertanyaan');
	Route::post('timeline/post-forum', 'TimelineController@postForum');

	Route::group(['middleware' => 'role:'.User::ROLE_ADMIN], function() {

		Route::resource('area', 'AreaController');
		Route::resource('position', 'PositionController');
		Route::get('cms', 'CmsController@index');
		Route::resource('group', 'GroupController');
		Route::resource('lokasi', 'LokasiController');
		Route::resource('post', 'PostController', ['only' => ['index']]);
		Route::resource('user/{user}/delete-pp', 'UserController@deletePp');
		Route::resource('user', 'UserController', ['except' => ['update']]);

		Route::get('artikel/admin', 'ArtikelController@admin');
		Route::get('audio/admin', 'AudioController@admin');
		Route::get('banner/admin', 'BannerController@admin');
		Route::get('comment/{comment}/approve', 'CommentController@approve');
		Route::get('comment/approve-all', 'CommentController@approveAll');
		Route::get('forum/admin', 'ForumController@admin');
		Route::get('forum/activate', 'ForumController@activate');
		Route::get('forum/deactivate', 'ForumController@deactivate');
		Route::get('forum/open', 'ForumController@open');
		Route::get('forum/close', 'ForumController@close');
		Route::get('forum/delete', 'ForumController@delete');
		Route::get('hadist/admin', 'HadistController@admin');
		Route::get('image/admin', 'ImageController@admin');
		Route::get('informasi/admin', 'InformasiController@admin');
		Route::get('informasi/delete-file/{file}', 'InformasiController@deleteFile');
		Route::get('kajian/admin', 'KajianController@admin');
		Route::get('kitab/admin', 'KitabController@admin');
		Route::get('murottal/admin', 'MurottalController@admin');
		Route::get('peduli/admin', 'PeduliController@admin');
		Route::get('pertanyaan/admin', 'PertanyaanController@admin');
		Route::get('produk/admin', 'ProdukController@admin');
		Route::get('tafsir/admin', 'TafsirController@admin');
		Route::get('ustadz/admin', 'UstadzController@admin');
		Route::get('video/admin', 'VideoController@admin');

		// khusus admin
		Route::resource('artikel', 'ArtikelController', ['only' => ['create', 'edit', 'store', 'update', 'destroy']]);
		Route::resource('audio', 'AudioController', ['only' => ['create', 'edit', 'store', 'update', 'destroy']]);
		Route::resource('banner', 'BannerController', ['only' => ['create', 'edit', 'store', 'update', 'destroy']]);
		Route::resource('comment', 'CommentController', ['only' => ['index']]);
		Route::resource('hadist', 'HadistController', ['only' => ['create', 'edit', 'store', 'update', 'destroy']]);
		Route::resource('image', 'ImageController', ['only' => ['create', 'edit', 'store', 'update', 'destroy']]);
		Route::resource('informasi', 'InformasiController', ['only' => ['create', 'edit', 'store', 'update', 'destroy']]);
		Route::resource('kajian', 'KajianController', ['only' => ['create', 'edit', 'store', 'update', 'destroy']]);
		Route::resource('kitab', 'KitabController', ['only' => ['create', 'edit', 'store', 'update', 'destroy']]);
		Route::resource('murottal', 'MurottalController', ['only' => ['create', 'edit', 'store', 'update', 'destroy']]);
		Route::resource('peduli', 'PeduliController', ['only' => ['create', 'edit', 'store', 'update', 'destroy']]);
		Route::resource('produk', 'ProdukController', ['only' => ['create', 'edit', 'store', 'update', 'destroy']]);
		Route::resource('ustadz', 'UstadzController', ['only' => ['create', 'edit', 'store', 'update', 'destroy']]);
		Route::resource('tafsir', 'TafsirController', ['only' => ['create', 'edit', 'store', 'update', 'destroy']]);
		Route::resource('video', 'VideoController', ['only' => ['create', 'edit', 'store', 'update', 'destroy']]);
	});

	Route::get('pertanyaan/admin-ustadz', 'PertanyaanController@adminUstadz');
	Route::get('pertanyaan/{pertanyaan}/jawab', 'PertanyaanController@jawab');
	Route::put('pertanyaan/{pertanyaan}/simpan-jawaban', 'PertanyaanController@simpanJawaban');

	// pake policy, admin & ustadz bisa
	// ustadz only

	// Route::group(['middleware' => 'role:'.User::ROLE_USTADZ], function() {
	// });

	Route::resource('forum', 'ForumController', ['only' => ['create', 'edit', 'store', 'update', 'destroy']]);
	Route::get('post/delete-image/{image}', 'PostController@deleteImage');
	Route::get('me', 'UserController@me');
	Route::put('user/{user}', 'UserController@update');
	Route::resource('pertanyaan', 'PertanyaanController', ['except' => ['index', 'show']]);
	Route::resource('post', 'PostController', ['except' => ['index', 'show', 'create']]);
	Route::resource('comment', 'CommentController', ['only' => ['store', 'destroy', 'edit', 'update']]);

	Route::get('pertanyaan-saya', 'PertanyaanController@mine');
	Route::get('forum-saya', 'ForumController@mine');
});

Route::get('baca-artikel/{slug}.html', 'ArtikelController@baca');
Route::get('baca-forum/{slug}.html', 'ForumController@baca');
Route::get('baca-hadist/{slug}.html', 'HadistController@baca');
Route::get('baca-pertanyaan/{slug}.html', 'PertanyaanController@baca');
Route::get('videos-detail/{slug}.html', 'VideoController@lihat');

Route::resource('artikel', 'ArtikelController', ['only' => ['index', 'show']]);
Route::resource('banner', 'BannerController', ['only' => ['index', 'show']]);
Route::resource('forum', 'ForumController', ['only' => ['index', 'show']]);
Route::resource('hadist', 'HadistController', ['only' => ['index', 'show']]);
Route::resource('image', 'ImageController', ['only' => ['index', 'show']]);
Route::resource('informasi', 'InformasiController', ['only' => ['index', 'show']]);
Route::resource('kajian', 'KajianController', ['only' => ['index', 'show']]);
Route::resource('kitab', 'KitabController', ['only' => ['index', 'show']]);
Route::resource('audio', 'AudioController', ['only' => ['index', 'show']]);
Route::resource('murottal', 'MurottalController', ['only' => ['index', 'show']]);
Route::resource('peduli', 'PeduliController', ['only' => ['index', 'show']]);
Route::resource('produk', 'ProdukController', ['only' => ['index', 'show']]);
Route::resource('tafsir', 'TafsirController', ['only' => ['index', 'show']]);
Route::resource('ustadz', 'UstadzController', ['only' => ['index', 'show']]);
Route::resource('video', 'VideoController', ['only' => ['index', 'show']]);
Route::resource('pertanyaan', 'PertanyaanController', ['only' => ['index', 'show']]);

Route::auth();

Route::group(['prefix' => 'api', 'middleware' => 'auth:api'], function() {

	Route::get('lokasi', 'LokasiController@apiIndex');
	Route::get('area', 'AreaController@apiIndex');

	// hadist
	Route::get('hadits', 'HadistController@apiIndexHadits');
	Route::get('doa', 'HadistController@apiIndexDoa');
	Route::get('dzikir', 'HadistController@apiIndexDzikir');
	Route::get('hadits/{hadist}', 'HadistController@apiShow');

	// kajian
	Route::get('kajian/create', 'KajianController@apiStore');
	Route::get('kajian', 'KajianController@apiIndex');
	Route::get('kajian/{kajian}', 'KajianController@apiShow');

	// ustadz
	Route::get('ustadz', 'UstadzController@apiIndex');
	Route::get('ustadz/{ustadz}', 'UstadzController@apiShow');

	// image
	Route::get('image', 'ImageController@apiIndex');
	Route::get('image/{image}', 'ImageController@apiShow');

	// artikel
	Route::get('artikel', 'ArtikelController@apiIndex');
	Route::get('artikel/{artikel}', 'ArtikelController@apiShow');

	// video
	Route::get('video', 'VideoController@apiIndex');
	Route::get('video/{video}', 'VideoController@apiShow');

});
