<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
<<<<<<< HEAD
            $table->string('slug');
            $table->string('subtitle')->nullable();
            $table->bigInteger('ISBN')->unsigned();
            $table->integer('series_id')->unsigned()->nullable();
            $table->integer('publisher_id')->unsigned();
            $table->integer('author_id')->unsigned();
=======
            $table->string('subtitle')->nullable();
            $table->bigInteger('ISBN')->unsigned();
            $table->string('series')->nullable();
            $table->string('publisher');
            $table->integer('author_id')->unsigned();
            $table->string('genre');
>>>>>>> 0e09d9c680d1937892a74e6be5b2caff71e5f16d
            $table->string('edition')->nullable();
            $table->year('published_year');
            $table->integer('pages')->unsigned();
            $table->string('binding');
            $table->integer('quantity')->unsigned();
            $table->float('price', 8, 2);
<<<<<<< HEAD
            $table->integer('language_id')->unsigned();
=======
            $table->string('language');
>>>>>>> 0e09d9c680d1937892a74e6be5b2caff71e5f16d
            $table->text('description');
            $table->string('image');
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
        Schema::dropIfExists('books');
    }
}
