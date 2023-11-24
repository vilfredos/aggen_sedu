<?php

namespace App\Imports;

use App\Models\Votante;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;

class VotanteImport implements ToModel
{
    use Importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Votante([
            'sis' => $row[0],
            'name' => $row[1],
            'facultad' => $row[2],
            'carrera' => $row[3],
            'ci' => $row[4],
            'tipo' => $row[5],
        ]);
    }
    
}
