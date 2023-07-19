<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMobileTitleFieldsToServiceModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('service_models', function (Blueprint $table) {
            $table->json('title_for_mob_1')->nullable();
            $table->json('title_fir_mob_2')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('service_models', function (Blueprint $table) {
            $table->dropColumn('title_for_mob_1');
            $table->dropColumn('title_fir_mob_2');
        });
    }
}
