<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTafsirsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tafsir', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('surah_id');
			$table->integer('from_ayah');
			$table->integer('to_ayah');
			$table->text('tafsir');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tafsirs');
    }
}
