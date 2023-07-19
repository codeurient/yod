<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveOgUrlAndSiteNameField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('about_models', function (Blueprint $table) {
            $table->dropColumn('og_url');
            $table->dropColumn('og_site_name');
        });

        Schema::table('awards_models', function (Blueprint $table) {
            $table->dropColumn('og_url');
            $table->dropColumn('og_site_name');
        });

        Schema::table('contacts_models', function (Blueprint $table) {
            $table->dropColumn('og_url');
            $table->dropColumn('og_site_name');
        });

        Schema::table('main_models', function (Blueprint $table) {
            $table->dropColumn('og_url');
            $table->dropColumn('og_site_name');
        });

        Schema::table('partners_models', function (Blueprint $table) {
            $table->dropColumn('og_url');
            $table->dropColumn('og_site_name');
        });

        Schema::table('press_models', function (Blueprint $table) {
            $table->dropColumn('og_url');
            $table->dropColumn('og_site_name');
        });

        Schema::table('project_models', function (Blueprint $table) {
            $table->dropColumn('og_url');
            $table->dropColumn('og_site_name');
        });

        Schema::table('service_models', function (Blueprint $table) {
            $table->dropColumn('og_url');
            $table->dropColumn('og_site_name');
        });

        Schema::table('thanks_page_models', function (Blueprint $table) {
            $table->dropColumn('og_url');
            $table->dropColumn('og_site_name');
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
            $table->json('og_url')->nullable();
            $table->json('og_site_name')->nullable();
        });

        Schema::table('awards_models', function (Blueprint $table) {
            $table->json('og_url')->nullable();
            $table->json('og_site_name')->nullable();
        });

        Schema::table('contacts_models', function (Blueprint $table) {
            $table->json('og_url')->nullable();
            $table->json('og_site_name')->nullable();
        });

        Schema::table('main_models', function (Blueprint $table) {
            $table->json('og_url')->nullable();
            $table->json('og_site_name')->nullable();
        });

        Schema::table('partners_models', function (Blueprint $table) {
            $table->json('og_url')->nullable();
            $table->json('og_site_name')->nullable();
        });

        Schema::table('press_models', function (Blueprint $table) {
            $table->json('og_url')->nullable();
            $table->json('og_site_name')->nullable();
        });

        Schema::table('project_models', function (Blueprint $table) {
            $table->json('og_url')->nullable();
            $table->json('og_site_name')->nullable();
        });

        Schema::table('service_models', function (Blueprint $table) {
            $table->json('og_url')->nullable();
            $table->json('og_site_name')->nullable();
        });

        Schema::table('thanks_page_models', function (Blueprint $table) {
            $table->json('og_url')->nullable();
            $table->json('og_site_name')->nullable();
        });
    }
}
