<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTitleColumnsToPage404ModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('page404_models', function (Blueprint $table) {
            $table->json('title_2');
            $table->json('title_3');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('page404_models', function (Blueprint $table) {
            $table->dropColumn('title_2');
            $table->dropColumn('title_3');
        });
    }
}
