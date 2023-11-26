<?php

namespace App\Imports;

use App\Models\Docente;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
class DocenteImport implements ToModel
{
    use Importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Docente([
            'sis' => $row[0],
            'name' => $row[1],
            'email' => $row[2],
            'facultad' => $row[3],
            'carrera' => $row[4],
            'ci' => $row[5],
        ]);
    }
}
