<?php

namespace App\Http\Controllers;

use App\Models\Convocatoria;

use App\Http\Requests\StoreJuradoRequest;
use App\Http\Requests\UpdateConvocatoriaRequest;

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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreConvocatoriaRequest $request)
    {
        dd($request->all());

        $convocatoria = new Convocatoria;
        $convocatoria->titulo = $request->titulo;

        $convocatoria->archivo_pdf = $rutaPdf;
        
        $convocatoria->fecha_inicio = $request->fecha_inicio;
        $convocatoria->fecha_fin = $request->fecha_fin;
        // Asegúrate de que los nombres de los campos coincidan con los nombres en tu base de datos
        // ...
        $convocatoria->save();
    
        return back()->with('success', 'Convocatoria relizada exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Convocatoria  $convocatoria
     * @return \Illuminate\Http\Response
     */
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
