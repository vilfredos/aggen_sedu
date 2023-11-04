<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AgregarTablaVotosPorMesa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registro_votos_por_mesa', function (Blueprint $table) {
            $table->id('id_mesa');
            $table->integer('num_mesa');
            $table->integer('votos_FR');
            $table->integer('votos_UXSS');
            $table->integer('votos_PSS');
            // Agrega aquí las columnas para los otros frentes
            $table->integer('votos_blancos');
            $table->integer('votos_nulos');
            $table->integer('votos_totales');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
