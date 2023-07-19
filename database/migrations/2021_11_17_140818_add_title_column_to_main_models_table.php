<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTitleColumnToMainModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('main_models', function (Blueprint $table) {
            $table->json('main_title_2');
            $table->json('main_title_3');
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
            $table->dropColumn('main_title_2');
            $table->dropColumn('main_title_3');
        });
    }
}
