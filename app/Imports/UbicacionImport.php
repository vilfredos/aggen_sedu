<?php

namespace App\Imports;

use App\Models\FacultadUbicacion;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;

class UbicacionImport implements ToModel
{
    use Importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new FacultadUbicacion([
            'facultad' => $row[0],
            'ubicacion' => $row[1],
            'script' => $row[2],
            
        ]);
    }
}
