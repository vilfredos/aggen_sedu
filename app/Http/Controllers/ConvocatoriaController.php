<?php

namespace App\Http\Controllers;

use App\Models\Convocatoria;
use Illuminate\Http\Request;
use App\Http\Requests\StoreConvocatoriaRequest;
use App\Http\Requests\UpdateConvocatoriaRequest;
use Illuminate\Support\Facades\Validator; // Importa la clase Validator aquí


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
        return view('comvocatoria'); 

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|in:Consejeros de Carrera,Consejeros Facultativos,Consejeros Universitarios,Directores de Carrera,Autoridades Facultativas,Autoridades Universitarias',
            'documento' => 'required|mimes:pdf',
            'fechaInicio' => 'required|date',
            'fechaFin' => 'required|date',    
        ]);
    
        $convocatoriadb = new Convocatoria;
        $convocatoriadb->Titulo = $request->titulo;
        $archivoPdfPath = $request->file('documento')->store('pdfs', 'public');
        $convocatoriadb->archivo_pdf = $archivoPdfPath;   
        $convocatoriadb->fecha_inicio = $request->fechaInicio;
        $convocatoriadb->fecha_final = $request->fechaFin;
    
        $convocatoriadb->save();

        return back()->with('success', 'Convocatoria realizada exitosamente');
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
