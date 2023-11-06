<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComiteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comite', function (Blueprint $table) {
            $table->id();
            $table->string('Rector');
            $table->string('vocalFud');
            $table->string('vocalFul');
            $table->string('vocalDocente1');
            $table->string('vocalEstudiante1');
            $table->string('vocalDocente2');
            $table->string('vocalEstudiante2');
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
        Schema::dropIfExists('comite');
    }
}
