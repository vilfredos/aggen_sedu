<?php

namespace App\Http\Controllers;

use App\Models\jurado;
use App\Http\Requests\StoreJuradoRequest;
use App\Http\Requests\UpdateJuradoRequest;
use App\Models\Votante;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Models\remplazar_jurado;

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
    public function store(Request $request)
    {
        $sis = $request->sis;
        $nombre = $request->nombre;
        $facultad = $request->facultad;
        $carrera = $request->carrera;
        $ci = $request->ci;
        $cargo = $request->cargo;
        $numeroMesa = $request->numeroMesa;
        $gremio = $request->gremio;

        // ... Save the data to the database ...

        $jurado = new Jurado();
        $jurado->sis = $sis;
        $jurado->nombre = $nombre;
        $jurado->facultad = $facultad;
        $jurado->carrera = $carrera;
        $jurado->ci = $ci;
        $jurado->cargo = $cargo;
        $jurado->numeroMesa = $numeroMesa;
        $jurado->gremio = $gremio;
        $jurado->save();

        return back()->with('success', 'Jurado guardado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jurado  $jurado
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $jurados = jurado::find(1);
        return view('resultados')->with('jurados', $jurados);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jurado  $jurado
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateJuradoRequest  $request
     * @param  \App\Models\Jurado  $jurado
     * @return \Illuminate\Http\Response
     */

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
        $datos = Jurado::all();
        return view('ver_lista_jurados')->with('datos', $datos);
    }
    public function guardarJurados(array $jurados)
    {
        Jurado::insert($jurados);
    }
    public function seleccionarJurados()
    {
        $facultad = 'medicina'; // Reemplace esto con la facultad deseada

        // Obtener todos los votantes y jurados
        $votantes = Votante::all()->pluck('sis')->toArray();
        $juradosExistentes = Jurado::all()->pluck('sis')->toArray();

        // Eliminar los jurados existentes de la lista de votantes
        $votantes = array_diff($votantes, $juradosExistentes);
        // Seleccionar 1 presidente
        $presidente = Votante::whereIn('sis', $votantes)
            ->where('facultad', $facultad)
            ->where('tipo', 'DOCENTE')
            ->inRandomOrder()
            ->first();
        $presidente->cargo = 'Presidente';

        // Seleccionar 2 docentes titulares
        $docentesTitulares = Votante::whereIn('sis', $votantes)
            ->where('facultad', $facultad)
            ->where('tipo', 'DOCENTE')
            ->inRandomOrder()
            ->take(2)
            ->get();
        foreach ($docentesTitulares as $docente) {
            $docente->cargo = 'Titular';
        }

        // Seleccionar 2 docentes suplentes
        $docentesSuplentes = Votante::whereIn('sis', $votantes)
            ->where('facultad', $facultad)
            ->where('tipo', 'DOCENTE')
            ->whereNotIn('sis', $docentesTitulares->pluck('sis'))
            ->inRandomOrder()
            ->take(2)
            ->get();
        foreach ($docentesSuplentes as $docente) {
            $docente->cargo = 'Suplente';
        }
        // Seleccionar 2 estudiantes titulares
        $estudiantesTitulares = Votante::whereIn('sis', $votantes)
            ->where('facultad', $facultad)
            ->where('tipo', 'ESTUDIANTE')
            ->inRandomOrder()
            ->take(2)
            ->get();
        foreach ($estudiantesTitulares as $estudiante) {
            $estudiante->cargo = 'Titular';
        }

        // Seleccionar 2 estudiantes suplentes
        $estudiantesSuplentes = Votante::whereIn('sis', $votantes)
            ->where('facultad', $facultad)
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

        $jurados = $jurados->map(function ($jurado) {
            unset($jurado['created_at'], $jurado['updated_at']);
            return $jurado;
        });
        $jurados = $jurados->map(function ($jurado) {
            $jurado['numeroMesa'] = 4; // Asignar el número de mesa 4 a todos los jurados
            return $jurado;
        });
        Jurado::insert($jurados->toArray());

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
    public function guardar_lista(Request $request)
    {
        if (!$request->has('jurados')) {
            // El Request está vacío
            return back()->with('error', 'No hay jurados para guardar');
        }
        $jurados = $request->all();

        if (empty($jurados)) {
            // El Request está vacío
            return back()->with('error', 'No hay jurados para guardar');
        }
        foreach ($jurados as $jurado) {
            $jurado = new Jurado();
            $jurado->sis = $jurado['sis'] ?? '';
            $jurado->nombre = $jurado['nombre'] ?? '';
            $jurado->facultad = $jurado['facultad'] ?? '';
            $jurado->carrera = $jurado['carrera'] ?? '';
            $jurado->ci = $jurado['ci'] ?? '';
            $jurado->gremio = $jurado['gremio'] ?? '';
            $jurado->numeroMesa = 1;
            $jurado->cargo = $jurado['cargo'] ?? '';
            $jurado->save();
        }

        return back()->with('success', 'Jurados guardados exitosamente');
    }
    public function remplazar(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'sis' => 'required|integer',
            'menu' => 'required|string',
            'descripcion' => 'required|string',
            'file' => 'required|mimes:pdf',
        ]);

        // Buscar el jurado por sis
        $jurado = Jurado::where('sis', $request->sis)->first();

        if (!$jurado) {
            return back()->withErrors(['sis' => 'No se encontró el jurado']);
        }


        // Buscar un votante aleatorio con la misma facultad, carrera y tipo que no esté en la tabla de jurados
        $votante = Votante::where('facultad', $jurado->facultad)
            ->where('carrera', $jurado->carrera)
            ->where('tipo', $jurado->tipo)
            ->whereNotIn('sis', Jurado::pluck('sis'))
            ->inRandomOrder()
            ->first();

        if (!$votante) {
            return back()->withErrors(['sis' => 'No se encontró un votante adecuado para reemplazar al jurado']);
        }
        $guardarSys = $jurado->sis; 
        $guardarCi = $jurado->ci; 
        $guardarName =  $jurado->name;
        // Reemplazar el sis y el ci en la tabla de jurados
        $jurado->sis = $votante->sis;
        $jurado->ci = $votante->ci;
        $jurado->name = $votante->name;
        $jurado->save();
        $jurado->sis = $guardarSys;
        $jurado->ci = $guardarCi;
        $jurado->name = $guardarName;

        // Guardar en la tabla de remplazar_jurado
        remplazar_jurado::create([
            'antiguo_sis' => $request->sis,
            'razon' => $request->menu,
            'descripcion' => $request->descripcion,
            'archivo' => $request->file->store('pdfs'),
            'facultad' => $votante->facultad,
            'carrera' => $votante->carrera,
            'tipo' => $votante->tipo,
            'nuevo_sys' => $votante->sis,
        ]);
       //['antiguo_sis', 'razon', 'Descripcion', 'archivo', 'nuevo_sys'];

        // Mostrar los datos
        return view('remplazar', compact('jurado', 'votante'));
    }
}
