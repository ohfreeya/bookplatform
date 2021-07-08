<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('bookid')->unsigned();
            $table->foreign('bookid')->references('id')->on('books')->onUpdate('cascade');
            $table->bigInteger('ISBN');
            $table->string('name');
            $table->bigInteger('publisherid')->unsigned();
            $table->foreign('publisherid')->references('id')->on('publishers')->onUpdate('cascade');
            $table->dateTime('publishDate');
            $table->string('edition');
            $table->string('language');
            $table->bigInteger('sellerid')->unsigned();
            $table->foreign('sellerid')->references('id')->on('users')->onUpdate('cascade');
            $table->string('bookStatus');
            $table->integer('price');
            $table->integer('isDelete')->default('0');
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
        Schema::dropIfExists('goods');
    }
}
