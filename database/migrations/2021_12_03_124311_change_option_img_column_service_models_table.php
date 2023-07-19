<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeOptionImgColumnServiceModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('service_models', function (Blueprint $table) {
            $table->json('sub_title_mob')->nullable()->change();
            $table->json('description_mob')->nullable()->change();
            $table->string('mob_image')->nullable()->change();
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
            $table->json('sub_title_mob')->change();
            $table->json('description_mob')->change();
            $table->string('mob_image')->change();
        });
    }
}
