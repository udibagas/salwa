<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('post', function (Blueprint $table) {
        //     $table->increments('id');
		// 	$table->string('judul');
		// 	$table->text('isi');
		// 	$table->text('terjemah'); // untuk hadits, quran, doa, dzikir
		// 	$table->string('gambar'); // untuk thumbnail, jenis = image
		// 	$table->string('file'); // pdf, audio, video
		// 	$table->string('jenis'); // Halaman, Artikel, Peduli, Pengumuman, Informasi, Image, Audio, Video, Kitab, Running Text, Tanya Ustadz, Banner, Forum, Hadits, Doa, Al Quran, Dzikir, Poling
		// 	$table->integer('user_id')->index(); // yg ngepost
		// 	$table->integer('ustadz_id')->index(); // tulisan dari ustadz siapa
		// 	$table->integer('hit')->unsigned(); // berapa kali dibaca
        //     $table->timestamps();
        // });
		//
		// Schema::create('komentar', function (Blueprint $table) {
        //     $table->increments('id');
		// 	$table->integer('post_id')->index();
		// 	$table->integer('user_id')->index(); // yg ngupdate
		// 	$table->integer('ustadz_id')->index(); // untuk jawaban pertanyaan
		// 	$table->text('isi');
        //     $table->timestamps();
        // });
		//
		// Schema::create('ustadz', function (Blueprint $table) {
        //     $table->increments('id');
		// 	$table->string('nama');
		// 	$table->string('kunyah');
		// 	$table->string('hp', 20);
		// 	$table->string('wa', 20);
		// 	$table->string('bb', 20);
		// 	$table->string('email', 50);
		// 	$table->string('propinsi', 30);
		// 	$table->string('kota', 30);
		// 	$table->string('alamat');
		// 	$table->text('profil');
        //     $table->timestamps();
        // });
		//
		// Schema::create('kategori', function(Blueprint $table) {
		// 	$table->increments('id');
		// 	$table->string('judul');
		// 	$table->string('keterangan');
		// 	$table->string('gambar');
		// 	$table->timestamps();
		// });
		//
		// Schema::create('post_kategori', function(Blueprint $table) {
		// 	$table->increments('id');
		// 	$table->string('post_id');
		// 	$table->string('kategori_id');
		// });
		//
		// Schema::create('slug', function(Blueprint $table) {
		// 	$table->increments('id');
		// 	$table->string('title');
		// 	$table->timestamps();
		// });
		//
		// Schema::create('post_slug', function(Blueprint $table) {
		// 	$table->increments('id');
		// 	$table->string('post_id');
		// 	$table->string('slug_id');
		// });
		//
		// Schema::create('link', function(Blueprint $table) {
		// 	$table->increments('id');
		// 	$table->string('url');
		// 	$table->string('judul');
		// 	$table->string('keterangan');
		// 	$table->timestamps();
		// });
		//
		// Schema::create('sensor', function(Blueprint $table) {
		// 	$table->increments('id');
		// 	$table->string('kata');
		// 	$table->string('ganti');
		// 	$table->timestamps();
		// });
		//
		// Schema::create('pilihan', function(Blueprint $table) {
		// 	$table->increments('id');
		// 	$table->integer('post_id')->index();
		// 	$table->string('pilihan');
		// 	$table->timestamps();
		// });
		//
		// Schema::create('polling', function(Blueprint $table) {
		// 	$table->increments('id');
		// 	$table->integer('post_id')->index();
		// 	$table->integer('user_id')->index();
		// 	$table->integer('pilihan_id')->index();
		// 	$table->timestamps();
		// });
		//
		// Schema::create('widget', function(Blueprint $table) {
		// 	$table->increments('id');
		// 	$table->string('posisi'); // atas/bawah = running text, sidebar left/right, footer, header
		// 	$table->string('judul');
		// 	$table->text('isi'); // bisa text, html, shortcode php
		// 	$table->text('jenis'); // text, html, json
		// 	$table->timestamps();
		// });
		//
		// // widget post
		// // {
		// // 	"post" 		: "Audio/Video/Doa/Halaman",
		// // 	"jenis" 	: "Tanya Ustadz",
		// // 	"kategori" 	: "Aqidah",
		// // 	"jumlah" 	: 5,
		// // 	"gambar" 	: true,
		// // 	"user" 		: true,
		// // 	"ustadz" 	: true,
		// // 	"waktu" 	: true,
		// // 	"ringkasan"	: true
		// // }
		//
		// Schema::create('menu', function(Blueprint $table) {
		// 	$table->increments('id');
		// 	$table->string('posisi'); // main, footer
		// 	$table->integer('urutan')->unsigned();
		// 	$table->string('label');
		// 	$table->string('link');
		// 	$table->string('target');
		// 	$table->string('class');
		// 	$table->string('parent_id');
		// 	$table->timestamps();
		// });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::drop('post');
        // Schema::drop('kategori');
        // Schema::drop('post_kategori');
        // Schema::drop('slug');
        // Schema::drop('post_slug');
        // Schema::drop('komentar');
        // Schema::drop('ustadz');
        // Schema::drop('link');
        // Schema::drop('pilihan');
        // Schema::drop('polling');
        // Schema::drop('widget');
        // Schema::drop('menu');
    }
}
