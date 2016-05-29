<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddKajianTematikTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kajians', function (Blueprint $table) {
            $table->increments('id');
			$table->string('tema');
			$table->text('description');
			$table->string('brosur');
			$table->integer('ustadz_id')->unsigned();
			$table->json('pekan');
			$table->json('waktu');
			// $table->dateTime('waktu_mulai');
			// $table->dateTime('waktu_selesai');
			$table->integer('lokasi_id')->unsigned();
			$table->integer('area_id')->unsigned();
			$table->string('tempat');
			// $table->decimal('lat', 6,3);
			// $table->decimal('long', 6,3);
			$table->json('position');
			$table->json('cp');
			// $table->string('cp_ikhwan', 20);
			// $table->string('cp_akhwat', 20);
			// $table->string('cp_ikhwan_phone', 20);
			// $table->string('cp_akhwat_phone', 20);
			$table->string('peserta', 20);
			$table->integer('user_id')->unsigned();
			$table->boolean('rutin');
			$table->string('audio');
			$table->string('video');
			$table->string('file');
			$table->longText('transkrip');
			$table->text('fawaid');
            $table->timestamps();
        });

		// cp
		// [
		// 	'ikhwan' => ['name' => 'abu yasmin', 'phone' => 'xxx'],
		// 	'akhwat' => ['name' => 'putri', 'phone' => 'aaa']
		// ]

		// position
		// [
		// 	'lat' => 767787,
		// 	'long' => 8782368
		// ]

		// kajian tematik
		// [
		// 	'mulai' => '2016-06-06 09:00:00',
		// 	'selesai' => '2016-06-06 12:00:00',
		// ];

		// kajian rutin
		// [
		// 	0 => [
		// 		'mulai' => '09:00:00',
		// 		'selesai' => '12:00:00',
		// 	],
		// 	4 => [
		// 		'mulai' => '09:00:00',
		// 		'selesai' => '12:00:00',
		// 	],
		// ]
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('kajians');
    }
}
