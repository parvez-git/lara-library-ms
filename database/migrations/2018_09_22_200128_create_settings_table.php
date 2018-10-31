<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('site_name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->integer('per_page')->default(0);
            $table->string('currency')->nullable();
            $table->integer('home_per_page')->default(0);
            $table->integer('blog_per_page')->default(0);
            $table->integer('withsidebar_per_page')->default(0);
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
        Schema::dropIfExists('settings');
    }
}
