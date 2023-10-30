<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Jurados; 

class JuradosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

        public function run()
        {
            $nombres = ['Juan Lopez Aviador', 'Timoteo Quispe Mañanero', 'Mateo Bursalino Casas', 'Mateo Quirozers', 'Mauricio Flores', 'Jose Lopez Quispe', 'Patricio Tamayo Martinez', 'Jhordy Borreguillo', 'Mateo Decrio Quiroz']; // Puedes cambiar estos nombres
            $turnos = ['mañana', 'tarde'];
            $cargos = ['presidente', 'titular', 'suplente'];
            $numeroMesa = 1; // Cambia esto al número de mesa que necesites
            $gremios = ['docente', 'estudiante'];
    
            for ($i = 0; $i < 9; $i++) {
                $turno = $turnos[$i < 4 ? 0 : 1];
                $cargo = $cargos[$i % 3];
                $gremio = $gremios[($i % 2 == 0) ? 0 : 1];
    
                jurados::create([
                    'nombre' => $nombres[$i],
                    'turno' => $turno,
                    'cargo' => $cargo,
                    'numeroMesa' => $numeroMesa,
                    'gremio' => $gremio,
                ]);
            }
        }   //
    }
