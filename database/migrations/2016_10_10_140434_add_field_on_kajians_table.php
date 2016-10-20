<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldOnKajiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kajians', function (Blueprint $table) {
            $table->string('hari');
            $table->time('jam');
            $table->date('tanggal');
            $table->dropColumn('waktu');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kajians', function (Blueprint $table) {
            $table->dropColumn(['hari', 'jam', 'tanggal']);
            $table->string('waktu');
        });
    }
}
