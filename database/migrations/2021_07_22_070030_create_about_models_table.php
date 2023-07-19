<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_models', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->json('meta_title');
            $table->json('meta_description');

            $table->json('og_title');
            $table->json('og_description');
            $table->json('og_url');
            $table->json('og_site_name');
            $table->integer('og_image')->unsigned()->nullable();

            $table->integer('main_photo');
            $table->json('main_title');
            $table->json('main_subtitle');
            $table->json('main_description_one');
            $table->json('main_description_two');
            $table->json('char_title');
            $table->json('year');
            $table->integer('char_photo');
            $table->json('char_photo_caption');

            $table->json('left_description');
            $table->json('right_description');

            $table->json('company_title');
            $table->json('company_description');
            $table->integer('first_photo');
            $table->integer('second_photo');
            $table->integer('company_photo');
            $table->json('company_photo_caption');

            $table->json('comand_title');
            $table->integer('comand_photo');
            $table->json('comand_photo_caption');
            $table->json('slider');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('about_models');
    }
}
