<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThanksPageModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thanks_page_models', function (Blueprint $table) {
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
            $table->json('sub_title');
            $table->text('video');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('thanks_page_models');
    }
}
