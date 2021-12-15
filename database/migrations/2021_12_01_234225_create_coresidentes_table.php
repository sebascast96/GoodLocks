<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoresidentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coresidentes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idr');
            $table->foreign('idr')->references('id')->on('residentes');
            $table->string('nombre');
            $table->unsignedBigInteger('fraccionamiento')->nullable();
            $table->foreign('fraccionamiento')->references('id')->on('fraccionamientos');
            $table->string('relacion');
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
        Schema::dropIfExists('coresidentes');
    }
}
