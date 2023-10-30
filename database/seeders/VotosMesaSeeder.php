<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\votos_mesa;
class VotosMesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 2; $i++) {
            $votos_FR = rand(0, 100);
            $votos_UXSS = rand(0, 100);
            $votos_PSS = rand(0, 100);
            $votos_blancos = rand(0, 100);
            $votos_nulos = rand(0, 100);

            $votos_totales = $votos_FR + $votos_UXSS + $votos_PSS + $votos_blancos + $votos_nulos;

            votos_mesa::create([
                'num_mesa' => rand(1, 50),
                'votos_FR' => $votos_FR,
                'votos_UXSS' => $votos_UXSS,
                'votos_PSS' => $votos_PSS,
                'votos_blancos' => $votos_blancos,
                'votos_nulos' => $votos_nulos,
                'votos_totales' => $votos_totales
            ]);
        }
    }
        /**
     * Generate a random number between two numbers.
     *
     * @param int $min
     * @param int $max
     * @return int
     */
    private function rand(int $min, int $max): int
    {
        return mt_rand($min, $max);
    }
}
