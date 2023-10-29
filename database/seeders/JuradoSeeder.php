<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JuradoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jurados')->insert([
            'nombre' => 'Jose Balderrama ',
            'turno' => 'tarde',
            'cargo' => 'titular',
            'numeroMesa' => 5,
            'observacion' => 'Docente',
        ]);
    }
}
