<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class Sortorder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('project_models', function (Blueprint $table) {
            $table->integer('sort_order');
        });


        DB::statement('UPDATE project_models SET sort_order = id');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('project_models', function (Blueprint $table) {
            $table->dropColumn('sort_order');
        });
    }
}
