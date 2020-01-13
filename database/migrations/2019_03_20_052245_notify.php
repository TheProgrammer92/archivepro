<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Notify extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

        Schema::create('notify', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_courrier')->references('id')->on('courrier');
            $table->unsignedInteger('id_destinataire')->references('id')->on('courrier');
            $table->unsignedInteger('id_expediteur')->references('id')->on('courrier');
            $table->boolean("vue")->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('notify');

    }
}
