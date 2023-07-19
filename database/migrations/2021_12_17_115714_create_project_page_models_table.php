<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectPageModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_page_models', function (Blueprint $table) {
            $table->id();
            $table->json('meta_title')->nullable();
            $table->json('meta_description')->nullable();
            $table->json('og_title')->nullable();
            $table->json('og_description')->nullable();
            $table->string('og_image')->nullable();
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
        Schema::dropIfExists('project_page_models');
    }
}
