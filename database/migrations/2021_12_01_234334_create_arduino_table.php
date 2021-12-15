<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArduinoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arduino', function (Blueprint $table) {
            $table->id();
            $table->string('estatus');
            $table->string('abrir');
            $table->string('cerrar');
            $table->unsignedBigInteger('fraccionamiento')->nullable();
            $table->foreign('fraccionamiento')->references('id')->on('fraccionamientos');
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
        Schema::dropIfExists('arduino');
    }
}
