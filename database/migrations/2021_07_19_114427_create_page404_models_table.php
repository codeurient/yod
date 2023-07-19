<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePage404ModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page404_models', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->json('meta_title');
            $table->json('meta_description');

            $table->json('og_title');
            $table->json('og_description');
            $table->json('og_url');
            $table->json('og_site_name');
            $table->integer('og_image')->unsigned()->nullable();

            $table->json('title');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('page404_models');
    }
}
