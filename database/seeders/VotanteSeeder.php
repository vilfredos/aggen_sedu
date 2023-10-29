<?php

namespace Database\Seeders;

use App\Models\Votante;
use Illuminate\Database\Seeder;

class VotanteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $votante = [
            [
                'name' => 'Jose Luis Rodriguez Perez',
                'facultad' => 'Economia',
                'tipo' => 'Estudiante'
            ],
            [
                'name' => 'Willy Lopez Conde',
                'facultad' => 'Medicina',
                'tipo' => 'Estudiante'
            ],
            [
                'name' => 'Raul Encinas Portugal',
                'facultad' => 'Economia',
                'tipo' => 'Docente'
            ]
            ];
            Votante::insert($votante);
    }
}
