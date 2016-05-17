<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddGroupOnImageAndBanner extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('salwaimages', function (Blueprint $table) {
            $table->tinyInteger('group_id')->unsigned();
        });

        Schema::table('mib_banner_positions', function (Blueprint $table) {
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
        Schema::table('salwaimages', function (Blueprint $table) {
            $table->dropColumn('group_id');
        });

        Schema::table('mib_banner_positions', function (Blueprint $table) {
            $table->dropColumn('group_id');
        });
    }
}
