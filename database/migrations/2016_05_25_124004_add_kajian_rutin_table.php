<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddKajianRutinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kajian_rutin', function (Blueprint $table) {
            $table->increments('id');
			$table->string('tema');
			$table->text('description');
			$table->string('brosur');
			$table->integer('ustadz_id')->unsigned();
			$table->integer('lokasi_id')->unsigned();
			$table->integer('area_id')->unsigned();
			$table->string('tempat');
			$table->decimal('lat', 6,3);
			$table->decimal('long', 6,3);
			$table->string('cp_ikhwan', 20);
			$table->string('cp_akhwat', 20);
			$table->string('cp_ikhwan_phone', 20);
			$table->string('cp_akhwat_phone', 20);
			$table->string('jenis_peserta', 20);
			$table->integer('user_id')->unsigned();
            $table->timestamps();
        });

		Schema::create('jadwal_kajian_rutin', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('kajian_id')->unsigned();
			$table
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('kajian_rutin');
    }
}
