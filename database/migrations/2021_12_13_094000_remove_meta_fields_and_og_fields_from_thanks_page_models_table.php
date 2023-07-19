<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveMetaFieldsAndOgFieldsFromThanksPageModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('thanks_page_models', function (Blueprint $table) {
            $table->dropColumn('meta_title');
            $table->dropColumn('meta_description');

            $table->dropColumn('og_title');
            $table->dropColumn('og_description');
            $table->dropColumn('og_image');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('thanks_page_models', function (Blueprint $table) {
            $table->json('meta_title');
            $table->json('meta_description');

            $table->json('og_title');
            $table->json('og_description');
            $table->integer('og_image')->unsigned()->nullable();
        });
    }
}
