<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreatePharaonicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pharaonics', function (Blueprint $table) {

            $table->increments('id');
            $table->string('title');
            $table->text('post');
            $table->string('img');
            $table->unsignedBigInteger('viewers')->default(0);
            $table->json('user_id')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();

        });

    }

    public function down()
    {
        Schema::dropIfExists('pharaonics');

    }
}
