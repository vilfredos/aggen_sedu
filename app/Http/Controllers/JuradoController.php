<?php

namespace App\Http\Controllers;

use App\Models\jurados;
use App\Http\Requests\StoreJuradoRequest;
use App\Http\Requests\UpdateJuradoRequest;
use App\Models\Votante;
use Barryvdh\DomPDF\Facade\Pdf;

class JuradoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreJuradoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreJuradoRequest $request)
    {
        dd($request->all());

        $jurados = new Jurados;
        $jurados->nombre = $request->nombre;
        $jurados->turno = $request->turno;
        $jurados->cargo = $request->cargo;
        $jurados->numeroMesa = $request->numeroMesa;
        // Asegúrate de que los nombres de los campos coincidan con los nombres en tu base de datos
        // ...
        $jurados->save();

        return back()->with('success', 'Jurado registrado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jurado  $jurado
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $jurados = jurados::find(1);
        return view('resultados')->with('jurados', $jurados);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jurado  $jurado
     * @return \Illuminate\Http\Response
     */
    public function edit(Jurado $jurado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateJuradoRequest  $request
     * @param  \App\Models\Jurado  $jurado
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateJuradoRequest $request, Jurado $jurado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jurado  $jurado
     * @return \Illuminate\Http\Response
     */
    /*
    public function destroy(Jurado $jurado)
    {
        //
    }*/
    public function mostrar()
    {
        $datos = Jurados::all();
        return view('ver_lista_jurados')->with('datos', $datos);
    }


    public function seleccionarJurados()
    {
        $facultad = 'CIENCIAS ECONOMICAS'; // Reemplace esto con la facultad deseada

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
            ->whereNotIn('id', $docentesTitulares->pluck('id'))
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
            ->whereNotIn('id', $estudiantesTitulares->pluck('id'))
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

        return view('jurado_aleatorio', ['jurados' => $jurados]);
    }
    /*
    public function pdf()
    {

        $votantes = Votante::all();
        $pdf = PDF::loadView('poblacion.pdf', ['votantes' => $votantes])->setOptions(['defaultFont' => 'sans-serif']);
        //return $pdf->stream('votantes.pdf');
        return $pdf->download('__votantes.pdf');
    }
    */
}
