<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyJuradosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jurados', function (Blueprint $table) {
            $table->dropColumn('observacion');
            $table->string('gremio');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jurados', function (Blueprint $table) {
            $table->string('observacion');
            $table->dropColumn('gremio');
        });
    }
}
