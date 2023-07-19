<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeFieldOptionsToProjectModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('project_models', function (Blueprint $table) {
            $table->json('meta_title')->nullable()->change();
            $table->json('meta_description')->nullable()->change();
            $table->json('og_title')->nullable()->change();
            $table->json('og_description')->nullable()->change();
            $table->json('project_title')->nullable()->change();
            $table->json('project_year')->nullable()->change();
            $table->json('city_country')->nullable()->change();
            $table->integer('one_category')->nullable()->change();
            $table->integer('project_photo')->nullable()->change();
            $table->json('project_description')->nullable()->change();
            $table->json('character')->nullable()->change();
            $table->json('title')->nullable()->change();
            $table->json('link')->nullable()->change();
            $table->json('project_description_small')->nullable()->change();
            $table->text('blocks')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('project_models', function (Blueprint $table) {
            $table->json('meta_title')->change();
            $table->json('meta_description')->change();
            $table->json('og_title')->change();
            $table->json('og_description')->change();
            $table->json('project_title')->change();
            $table->json('project_year')->change();
            $table->json('city_country')->change();
            $table->integer('one_category')->change();
            $table->integer('project_photo')->change();
            $table->json('project_description')->change();
            $table->json('character')->change();
            $table->json('title')->change();
            $table->json('link')->change();
            $table->json('project_description_small')->change();
            $table->text('blocks')->change();
        });
    }
}
