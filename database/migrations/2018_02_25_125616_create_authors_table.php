<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('authors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
<<<<<<< HEAD
            $table->string('slug');
            $table->text('bio');
            $table->integer('country_id')->unsigned();
            $table->integer('language_id')->unsigned();
=======
            $table->text('bio');
            $table->string('country');
            $table->string('language');
>>>>>>> 0e09d9c680d1937892a74e6be5b2caff71e5f16d
            $table->date('dateofbirth');
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
        Schema::dropIfExists('authors');
    }
}
