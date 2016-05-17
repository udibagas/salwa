<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddGroupOnMp3 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mp3_download', function (Blueprint $table) {
            $table->tinyInteger('group_id')->unsigned();
        });

        Schema::table('murotal', function (Blueprint $table) {
            $table->tinyInteger('group_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mp3_download', function (Blueprint $table) {
			$table->dropColumn('group_id');
        });

        Schema::table('murotal', function (Blueprint $table) {
            $table->dropColumn('group_id');
        });
    }
}
