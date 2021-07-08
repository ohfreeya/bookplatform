<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoodImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('good_images', function (Blueprint $table) {
            $table->unsignedBigInteger('imageid');
            $table->foreign('imageid')->references('id')->on('images')->onUpdate('cascade');
            $table->unsignedBigInteger('goodid');
            $table->foreign('goodid')->references('id')->on('goods')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.a
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('good_images');
    }
}
