<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_models', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->json('meta_title');
            $table->json('meta_description');

            $table->json('og_title');
            $table->json('og_description');
            $table->json('og_url');
            $table->json('og_site_name');
            $table->integer('og_image')->unsigned()->nullable();

            $table->json('project_title');
            $table->json('project_slug');
            $table->json('project_year');
            $table->json('city_country');
            $table->integer('one_category')->unsigned();
            $table->integer('project_photo')->unsigned();
            $table->text('logo_awards');

            $table->boolean('active');


            $table->json('project_description');
            $table->json('character');
            $table->json('title');
            $table->json('link');

            $table->text('blocks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_models');
    }
}
