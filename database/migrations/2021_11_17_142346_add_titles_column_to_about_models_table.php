<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTitlesColumnToAboutModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('about_models', function (Blueprint $table) {
            $table->json('main_title_2');
            $table->json('main_title_3');
            $table->json('company_title_2');
            $table->json('company_title_3');
            $table->json('company_title_4');
            $table->json('comand_title_2');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('about_models', function (Blueprint $table) {
            $table->dropColumn('main_title_2');
            $table->dropColumn('main_title_3');
            $table->dropColumn('company_title_2');
            $table->dropColumn('company_title_3');
            $table->dropColumn('company_title_4');
            $table->dropColumn('comand_title_2');
        });
    }
}
