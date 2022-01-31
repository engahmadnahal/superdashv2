<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sup_data_postes', function (Blueprint $table) {
            $table->integer("data_id")->autoIncrement();
            $table->string("name_one");
            $table->string("name_two");
            $table->string("logo_one");
            $table->string("logo_two");
            $table->string("date_match");
            $table->string("time_start_match");
            $table->string("voice_over");
            $table->string("botola");
            $table->string("channel");
            $table->string("url_channel");
            $table->string("url_match");

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
        Schema::dropIfExists('posts');
    }
}
