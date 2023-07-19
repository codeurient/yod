<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTitleFieldsToOneServiceModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('one_service_models', function (Blueprint $table) {
            $table->dropColumn('about_bottom_title');
            $table->json('about_bottom_title_1')->nullable();
            $table->json('about_bottom_title_2')->nullable();
            $table->json('about_bottom_title_3')->nullable();
            $table->json('about_bottom_title_mob_1')->nullable();
            $table->json('about_bottom_title_mob_2')->nullable();
            $table->json('about_bottom_title_mob_3')->nullable();
            $table->json('about_bottom_title_mob_4')->nullable();
            $table->json('about_bottom_title_mob_5')->nullable();
            $table->json('about_bottom_title_mob_6')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('one_service_models', function (Blueprint $table) {
            $table->json('about_bottom_title')->nullable();
            $table->dropColumn('about_bottom_title_1');
            $table->dropColumn('about_bottom_title_2');
            $table->dropColumn('about_bottom_title_3');
            $table->dropColumn('about_bottom_title_mob_1');
            $table->dropColumn('about_bottom_title_mob_2');
            $table->dropColumn('about_bottom_title_mob_3');
            $table->dropColumn('about_bottom_title_mob_4');
            $table->dropColumn('about_bottom_title_mob_5');
            $table->dropColumn('about_bottom_title_mob_6');
        });
    }
}
