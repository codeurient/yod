<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropOgAndMetaFieldFrom404PageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('page404_models', function (Blueprint $table) {
            $table->dropColumn('meta_title');
            $table->dropColumn('meta_description');
            $table->dropColumn('og_title');
            $table->dropColumn('og_description');
            $table->dropColumn('og_url');
            $table->dropColumn('og_site_name');
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
        Schema::table('404_page', function (Blueprint $table) {
            $table->json('meta_title');
            $table->json('meta_description');
            $table->json('og_title');
            $table->json('og_description');
            $table->json('og_url');
            $table->json('og_site_name');
            $table->integer('og_image')->unsigned()->nullable();
        });
    }
}
