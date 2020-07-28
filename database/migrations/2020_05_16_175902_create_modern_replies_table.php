<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModernRepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modern_replies', function (Blueprint $table) {

            $table->increments('id');
            $table->unsignedInteger('comment_id');
            $table->foreign('comment_id')->references('id')->on('modern_comments')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('post_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('post_id')->references('id')->on('moderns')->onDelete('cascade')->onUpdate('cascade');
            $table->mediumText('reply');
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
        Schema::dropIfExists('modern_replies');
    }
}
