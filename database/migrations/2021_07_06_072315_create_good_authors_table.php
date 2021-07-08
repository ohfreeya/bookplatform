<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoodAuthorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('good_authors', function (Blueprint $table) {
            $table->unsignedBigInteger('goodid');
            $table->foreign('goodid')->references('id')->on('goods')->onUpdate('cascade');
            $table->unsignedBigInteger('authorid');
            $table->foreign('authorid')->references('id')->on('authors')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('good_authors');
    }
}
