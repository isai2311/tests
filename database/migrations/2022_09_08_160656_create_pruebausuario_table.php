<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePruebausuarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pruebausuario', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Prueba')->nullable();
            $table->foreign('Prueba')->references('id')->on('prueba');
            $table->unsignedBigInteger('Usuario')->nullable();
            $table->foreign('Usuario')->references('id')->on('users');
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
        Schema::dropIfExists('pruebausuario');
    }
}
