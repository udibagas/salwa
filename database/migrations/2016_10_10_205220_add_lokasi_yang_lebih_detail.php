<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLokasiYangLebihDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lokasi', function (Blueprint $table) {
            // $table->integer('provinsi_id');
            // $table->integer('kota_id');
            // $table->integer('kecamatan_id');
            // $table->integer('kelurahan_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lokasi', function (Blueprint $table) {
            // $table->dropColumn(['provinsi_id', 'kota_id', 'kecamatan_id', 'kelurahan_id']);
        });
    }
}
