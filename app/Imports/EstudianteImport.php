<?php

namespace App\Imports;

use App\Models\Estudiante;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;

class EstudianteImport implements ToModel
{
    use Importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Estudiante([
            'sis' => $row[0],
            'name' => $row[1],
            'email' => $row[2],
            'facultad' => $row[3],
            'carrera' => $row[4],
            'ci' => $row[5],
        ]);
    }
}
