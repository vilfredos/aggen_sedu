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
            'name' => $row[0],
            'facultad' => $row[1],
            'tipo' => $row[2],
        ]);
    }
}
