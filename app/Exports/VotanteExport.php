<?php

namespace App\Exports;

use App\Models\Votante;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class VotanteExport implements FromQuery, WithMapping, ShouldAutoSize, WithHeadings
{
    use Exportable;
    public function query()
    {
        return Votante::query();
    }

    public function map($votante):array
    {
        return [
            $votante->id,
             $votante->name,
             $votante->facultad,
             $votante->tipo,
        ];
    }

    public function headings(): array
    {
        return[
            'Id',
            'Nombre',
            'Facultad',
            'Tipo',
        ];
    }
}
