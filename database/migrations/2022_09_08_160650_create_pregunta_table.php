<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreguntaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pregunta', function (Blueprint $table) {
            $table->id();
            $table->string('Descripcion');
            $table->integer('Tipo')->comment('0 opción abierta, 1 opción multiple, 2 opción múltiple con respuesta única');
            $table->integer('Punto')->comment('puntos a respuesta correcta')->default(1);
            $table->unsignedBigInteger('Prueba')->nullable();
            $table->foreign('Prueba')->references('id')->on('prueba');
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
        Schema::dropIfExists('pregunta');
    }
}
