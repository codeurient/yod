<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFooterModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('footer_models', function (Blueprint $table) {
            $table->id();
            $table->timestamps();


            $table->json('footer_page_name');

            $table->integer('copyright_file')->unsigned();
            $table->integer('conditions_file')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('footer_models');
    }
}
