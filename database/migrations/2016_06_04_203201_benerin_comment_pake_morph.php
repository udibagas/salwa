<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BenerinCommentPakeMorph extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->renameColumn('post_id', 'commentable_id');
            $table->renameColumn('type', 'commentable_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comments', function (Blueprint $table) {
			$table->renameColumn('commentable_id', 'post_id');
            $table->renameColumn('commentable_type', 'type');
        });
    }
}
