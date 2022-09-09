<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTperfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tperfiles', function (Blueprint $table) {
            $table->id('cPerFolio');
            $table->string('cPerDescripcion', 30);
            $table->string('cPerPrivilegios', 500)->default('1');
            $table->tinyInteger('cPerEstatus');
            $table->boolean('cPerAdmin')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tperfiles');
    }
}
