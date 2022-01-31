<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreateImgsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('create_imgs', function (Blueprint $table) {
            $table->id();
            $table->integer('site_id');
            $table->integer('user_id');
            $table->string('backg_img');
            $table->string('stng_log_one');
            $table->string('stng_logo_two');
            $table->string('stng_name_one');
            $table->string('stng_name_two');
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
        Schema::dropIfExists('create_imgs');
    }
}
