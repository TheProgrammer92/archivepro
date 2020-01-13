<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Messagerie extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messagerie', function (Blueprint $table) {


            $table->increments('id');
            $table->unsignedInteger('id_recepteur')->references('id')->on('users');
            $table->unsignedInteger('mon_id')->references('id')->on('users');
            $table->string('message');
            $table->boolean('vue')->default(0);
            $table->dateTime('vue-a')->nullable();
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

        Schema::dropIfExists('messagerie');

    }
}
