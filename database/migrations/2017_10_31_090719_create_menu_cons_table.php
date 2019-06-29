<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuConsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_cons', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('menu_id');
            $table->string('menu_name');
            $table->string('menu_slug');
            $table->string('menu_link')->nullable();
            $table->string('menu_lang_id');
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
        Schema::dropIfExists('menu_cons');
    }
}
