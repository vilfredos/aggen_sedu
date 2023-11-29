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
            $table->string('VocalDocenteTitular1');
            $table->string('VocalDocenteTitular2');
            $table->string('VocalDocenteTitular3');
            $table->string('VocalDocenteSuplente1');
            $table->string('VocalDocenteSuplente2');
            $table->string('VocalDocenteSuplente3');
            $table->string('VocalEstudianteTitular1');
            $table->string('VocalEstudianteTitular2');
            $table->string('VocalEstudianteSuplente1');
            $table->string('VocalEstudianteSuplente2');



            
            /*
            $table->index('ci');
            $table->integer('ci')->primary(); // Definir 'Ci' como clave primaria
            $table->string('Nombre');
            $table->string('Facultad');
            $table->string('Gremio');
            $table->string('Estado');
            //$table->timestamps();
            */
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
