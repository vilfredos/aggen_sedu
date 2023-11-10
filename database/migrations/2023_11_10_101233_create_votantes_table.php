<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVotantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votantes', function (Blueprint $table) {
            $table->integer('sis')->nullable();
            $table->string('name')->nullable();
            $table->string('facultad')->nullable();
            $table->string('carrera')->nullable();
            $table->integer('ci')->nullable();
            $table->string('tipo')->nullable();
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
        Schema::dropIfExists('votantes');
    }
}

