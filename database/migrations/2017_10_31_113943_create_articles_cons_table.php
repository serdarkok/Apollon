<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesConsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles_cons', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('art_id');
            $table->string('art_name');
            $table->string('art_slug');
            $table->text('art_abstract')->nullable();;
            $table->text('art_content')->nullable();;
            $table->string('art_image')->nullable();
            $table->string('art_keywords')->nullable();;
            $table->string('art_description')->nullable();;
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
        Schema::dropIfExists('articles_cons');
    }
}
