<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbmenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbmenu', function (Blueprint $table) {
            $table->integer('cFolioMenu', true);
            $table->integer('cIdMenu')->unique('cIdMenu');
            $table->string('cItemMenu', 100);
            $table->integer('cParentIdMenu');
            $table->string('cUrlMenu', 400);
            $table->integer('cNivelUsuarioMenu')->nullable()->default(0)->comment('El nivel del usuario');
            $table->boolean('cChildMenu')->default(false)->comment('Tiene nodos hijos?');
            $table->boolean('cNewMenu')->default(false)->comment('Es nuevo este registro?');
            $table->string('cNomIcoMenu', 50)->default('fa fa-circle-o')->comment('Nombre del icono que aparecera en menu');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbmenu');
    }
}
