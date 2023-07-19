<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMobileColumnsToServiceModels extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('service_models', function (Blueprint $table) {
            $table->json('sub_title_mob');
            $table->json('description_mob');
            $table->string('mob_image');
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
            $table->dropColumn('sub_title_mob');
            $table->dropColumn('description_mob');
            $table->dropColumn('mob_image');
        });
    }
}
