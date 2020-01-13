<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Courrier extends Migration
{

    public function up()
{
    Schema::create('courrier', function (Blueprint $table) {
        $table->increments('id');
        $table->Integer('numero');
        $table->unsignedInteger('id_expediteur')->references('id')->on('users');
        $table->unsignedInteger('id_destinataire')->references('id')->on('users');
        $table->string('type');
        $table->boolean('delivered')->default(0);
        $table->boolean('isAttending')->default(0);
        $table->boolean('isSend')->default(0);
        $table->boolean('isLost')->default(0);
        $table->rememberToken();
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
        Schema::dropIfExists('courrier');
    }
}
