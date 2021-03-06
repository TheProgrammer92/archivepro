<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Archive extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


        Schema::create('archive', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_cat');
            $table->string('nom');
            $table->integer('id_service');
            $table->integer('id_user');
            $table->boolean('etat');
            $table->string('fichier');

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

        Schema::dropIfExists('archive');

    }


}