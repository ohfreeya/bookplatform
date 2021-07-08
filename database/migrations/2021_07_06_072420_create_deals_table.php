<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deals', function (Blueprint $table) {
            $table->unsignedBigInteger('buyerid');
            $table->foreign('buyerid')->references('id')->on('users')->onUpdate('cascade');
            $table->unsignedBigInteger('goodid');
            $table->foreign('goodid')->references('id')->on('users')->onUpdate('cascade');
            $table->string('dealStatus');
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
        Schema::dropIfExists('deals');
    }
}
