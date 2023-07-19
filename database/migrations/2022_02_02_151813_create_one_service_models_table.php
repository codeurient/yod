<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOneServiceModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('one_service_models', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('service_model_id')
                ->unsigned()->nullable();
            $table->foreign('service_model_id')
                ->references('id')
                ->on('service_models')
                ->onDelete('cascade');
            $table->tinyInteger('active');
            $table->json('meta_title')
                ->nullable();
            $table->json('meta_description')
                ->nullable();
            $table->json('og_title')
                ->nullable();
            $table->json('og_description')
                ->nullable();
            $table->string('og_image')
                ->nullable();
            $table->json('hero_title')->nullable();
            $table->json('hero_sub_title')->nullable();
            $table->json('hero_field_1')->nullable();
            $table->json('hero_field_2')->nullable();
            $table->string('about_big_image')->nullable();
            $table->string('about_small_image')->nullable();
            $table->json('about_top_title')->nullable();
            $table->json('about_top_under_title')->nullable();
            $table->json('about_description')->nullable();
            $table->json('about_bottom_title')->nullable();
            $table->json('about_specifications')->nullable();
            $table->json('stages')->nullable();
            $table->json('circle_title')->nullable();
            $table->json('circle_description')->nullable();
            $table->json('circle_specifications')->nullable();
            $table->json('projects_title')->nullable();
            $table->json('projects_under_title')->nullable();
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
        Schema::dropIfExists('one_service_models');
    }
}
