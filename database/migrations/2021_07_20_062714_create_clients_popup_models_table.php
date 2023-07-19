<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsPopupModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients_popup_models', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->json('meta_title');
            $table->json('meta_description');

            $table->json('name');
            $table->json('phone');
            $table->json('email');
            $table->json('city');
            $table->json('message');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients_popup_models');
    }
}
