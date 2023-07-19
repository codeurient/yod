<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnOptionsForTitlesColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('main_models', function (Blueprint $table) {
            $table->json('main_title_2')->nullable()->change();
            $table->json('main_title_3')->nullable()->change();
        });

        Schema::table('page404_models', function (Blueprint $table) {
            $table->json('title_2')->nullable()->change();
            $table->json('title_3')->nullable()->change();
        });

        Schema::table('about_models', function (Blueprint $table) {
            $table->json('main_title_2')->nullable()->change();
            $table->json('main_title_3')->nullable()->change();
            $table->json('company_title_2')->nullable()->change();
            $table->json('company_title_3')->nullable()->change();
            $table->json('company_title_4')->nullable()->change();
            $table->json('comand_title_2')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('main_models', function (Blueprint $table) {
            $table->json('main_title_2')->change();
            $table->json('main_title_3')->change();
        });

        Schema::table('page404_models', function (Blueprint $table) {
            $table->json('title_2')->change();
            $table->json('title_3')->change();
        });

        Schema::table('about_models', function (Blueprint $table) {
            $table->json('main_title_2')->change();
            $table->json('main_title_3')->change();
            $table->json('company_title_2')->change();
            $table->json('company_title_3')->change();
            $table->json('company_title_4')->change();
            $table->json('comand_title_2')->change();
        });
    }
}
