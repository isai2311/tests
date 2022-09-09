<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpcionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opcion', function (Blueprint $table) {
            $table->id();
            $table->string('Pregunta');
            $table->unsignedBigInteger('Pregunta_id');
            $table->foreign('Pregunta_id')->references('id')->on('pregunta');
            $table->boolean('Correcta')->default(0)->comment('0 incorrecta, 1 correcta');
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
        Schema::dropIfExists('opcion');
    }
}
