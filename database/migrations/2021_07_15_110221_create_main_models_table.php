<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMainModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('main_models', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->json('meta_title');
            $table->json('meta_description');

            $table->json('og_title');
            $table->json('og_description');
            $table->json('og_url');
            $table->json('og_site_name');
            $table->integer('og_image')->unsigned()->nullable();

            $table->json('main_title');
            $table->json('main_text');
            $table->json('project_title');
            $table->json('scroll_down_text_field');

            $table->integer('company_photo')->unsigned();

            $table->json('company_title');
            $table->json('company_subtitle');
            $table->json('company_description');

            $table->integer('photo')->unsigned();
            $table->json('caption_to_photo');
            //$table->json('photo_with_caption'); // Flexible

            $table->json('main_press_title');
            $table->json('main_press_subtitle');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('main_models');
    }
}
