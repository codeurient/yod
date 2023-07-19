<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAwardsModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('awards_models', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->json('meta_title');
            $table->json('meta_description');

            $table->json('og_title');
            $table->json('og_description');
            $table->json('og_url');
            $table->json('og_site_name');
            $table->integer('og_image')->unsigned()->nullable();

//            $table->json('awards_year');
//            $table->json('awards_title');
//            $table->integer('awards_logo')->unsigned();
//            $table->integer('awards_photo')->unsigned();
//            $table->json('awards_description')->unsigned();
//            $table->json('characteristic');

            $table->json('awards');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('awards_models');
    }
}
