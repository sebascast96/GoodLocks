<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicioPTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicio_p', function (Blueprint $table) {
            $table->id();
            $table->string('servicio');
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
        Schema::dropIfExists('servicio_p');
    }
}
