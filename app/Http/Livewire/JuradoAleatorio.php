<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Votante;

class JuradoAleatorio extends Component
{
    public $jurados;

    public function render()
    {
        return view('livewire.jurado-aleatorio', ['jurados' => $this->seleccionarJurados()]);
    }

    public function seleccionarJurados()
    {
        $facultad = 'medicina'; // Reemplace esto con la facultad deseada

        // Seleccionar 1 presidente
        $presidente = Votante::where('facultad', $facultad)
            ->inRandomOrder()
            ->first();
        $presidente->cargo = 'Presidente';


        // Seleccionar 2 docentes titulares
        $docentesTitulares = Votante::where('facultad', $facultad)
            ->where('tipo', 'DOCENTE')
            ->inRandomOrder()
            ->take(2)
            ->get();
        foreach ($docentesTitulares as $docente) {
            $docente->cargo = 'Titular';
        }

        // Seleccionar 2 docentes suplentes
        $docentesSuplentes = Votante::where('facultad', $facultad)
            ->where('tipo', 'DOCENTE')
            ->whereNotIn('sis', $docentesTitulares->pluck('sis'))
            ->inRandomOrder()
            ->take(2)
            ->get();
        foreach ($docentesSuplentes as $docente) {
            $docente->cargo = 'Suplente';
        }
        // Seleccionar 2 estudiantes titulares
        $estudiantesTitulares = Votante::where('facultad', $facultad)
            ->where('tipo', 'ESTUDIANTE')
            ->inRandomOrder()
            ->take(2)
            ->get();
        foreach ($estudiantesTitulares as $estudiante) {
            $estudiante->cargo = 'Titular';
        }

        // Seleccionar 2 estudiantes suplentes
        $estudiantesSuplentes = Votante::where('facultad', $facultad)
            ->where('tipo', 'ESTUDIANTE')
            ->whereNotIn('sis', $estudiantesTitulares->pluck('sis'))
            ->inRandomOrder()
            ->take(2)
            ->get();
        foreach ($estudiantesSuplentes as $estudiante) {
            $estudiante->cargo = 'Suplente';
        }

        // Crear la lista de jurados
        $jurados = collect([$presidente])
            ->concat($docentesTitulares)
            ->concat($docentesSuplentes)
            ->concat($estudiantesTitulares)
            ->concat($estudiantesSuplentes);

            return $jurados; 
    }


    public function actualizarJurados()
    {
        $this->jurados = $this->seleccionarJurados();
    }
}
