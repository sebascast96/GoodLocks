<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('telefono');
            $table->string('direccion');
            $table->unsignedBigInteger('fraccionamiento')->nullable();
            $table->foreign('fraccionamiento')->references('id')->on('fraccionamientos');
            $table->string('tipo');
            $table->string('ine');
            $table->string('servicio');
            $table->unsignedBigInteger('idr')->nullable();
            $table->foreign('idr')->references('id')->on('residentes');
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
        Schema::dropIfExists('personal');
    }
}
