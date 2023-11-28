<?php

namespace App\Http\Controllers;

use App\Models\Convocatoria;
use Illuminate\Http\Request;
use App\Http\Requests\StoreConvocatoriaRequest;
use App\Http\Requests\UpdateConvocatoriaRequest;
use Illuminate\Support\Facades\Validator; // Importa la clase Validator aquí
use Illuminate\Support\Facades\DB;

//use Illuminate\Http\Request;

class ConvocatoriaController extends Controller
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

    public function create()
    {
        return view('convocatoria'); 

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*
        $request->validate([
            'titulo' => 'required',
            'descripcion' => 'required',
            'fecha_ini' => 'required|date',
            'ficha_fin' => 'required|date',
            'convocatoria' => 'required|mimes:pdf|max:2048',
            'cargos' => 'required|array',
            'cargos.*' => 'required|string',
        ]);*/
    
        $input = $request->all();
        if ($archivo = $request->file('pdf')) {
            $nombre = $archivo->getClientOriginalName();
            $archivo->storeAs('public/pdf', $nombre);
        }
    
        // Crear una nueva elección
        $id_eleccion = DB::table('eleccion')->insertGetId([
            'titulo' => $input['titulo'],
            'descripcion' => $input['descripcion'],
            'fecha_ini' => $input['fecha_ini'],
            'ficha_fin' => $input['ficha_fin'],
        ]);
    
        // Crear los cargos para la elección
        foreach ($input['cargos'] as $cargo) {
            DB::table('eleccion_cargo')->insert([
                'id_eleccion' => $id_eleccion,
                'cargo_postular' => $cargo,
            ]);
        }
    ///
    $facultad = $request->input('facultad');
    $carrera = $request->input('carrera');

    // Obtener votantes de la tabla de estudiantes
    $votantesEstudiantes = DB::table('estudiantes');

    if (!empty($facultad)) {
        $votantesEstudiantes->where('facultad', $facultad);
    }
    
    if (!empty($carrera)) {
        $votantesEstudiantes->where('carrera', $carrera);
    }
    
    // Obtener votantes de la tabla de docentes
    $votantesDocentes = DB::table('docentes');
    
    if (!empty($facultad)) {
        $votantesDocentes->where('facultad', $facultad);
    }
    
    if (!empty($carrera)) {
        $votantesDocentes->where('carrera', $carrera);
    }
    
    // Unir las consultas de votantes de estudiantes y docentes
    $votantes = $votantesEstudiantes->union($votantesDocentes)->get();
    
    foreach ($votantes as $votante) {
        DB::table('eleccion_sis')->insert([
            'id_eleccion' => $id_eleccion,
            'sis' => $votante->sis,
            'facultad' => $votante->facultad,
            'carrera' => $votante->carrera,
        ]);
    }
    
    return view('poblacion.mostrar', compact('votantes'));

        //return back()->with('success', 'Formulario enviado exitosamente!');
    }

    
    public function show(Convocatoria $convocatoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Convocatoria  $convocatoria
     * @return \Illuminate\Http\Response
     */
    public function edit(Convocatoria $convocatoria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Convocatoria  $convocatoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Convocatoria $convocatoria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Convocatoria  $convocatoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Convocatoria $convocatoria)
    {
        //
    }
}
