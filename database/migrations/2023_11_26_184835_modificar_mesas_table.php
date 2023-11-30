<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModificarMesasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mesas', function (Blueprint $table) {
            // Elimina la línea $table->id();
            $table->integer('numeroMesa')->autoIncrement()->primary(); // Esto configura 'numeroMesa' como clave primaria autoincremental
            $table->string('recinto');
            $table->string('aula');
            $table->string('facultad');
            $table->string('carrera');
            $table->string('tipo');
            $table->string('ubicacion');
            $table->integer('capMaxima');
            // ... otras columnas según sea necesario ...
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mesas');
    }
}