<?php

namespace App\Http\Controllers;

use App\Models\Comite;
use Illuminate\Http\Request;
use App\Http\Requests\StoreComiteRequest;
use App\Http\Requests\UpdateComiteRequest;

use Illuminate\Support\Facades\Validator; // Importa la clase Validator aquí


class ComiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view('comite');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comite'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    try {
        $comitedb = new Comite;
        $comitedb->Rector = $request->rector;
        $comitedb->vocalFud = $request->fud;
        $comitedb->vocalFul = $request->ful;
        $comitedb->vocalDocente1 = $request->vocalDocente1;
        $comitedb->vocalEstudiante1 = $request->vocalEstudiante1;
        $comitedb->vocalDocente2 = $request->vocalDocente2;
        $comitedb->vocalEstudiante2 = $request->vocalEstudiante2;

        // Guardar en la base de datos
        $comitedb->save();

        \Log::info('Request Data:', $request->all());

        // Redirigir de vuelta con mensaje de éxito
        
        return redirect('/papeleta')->with('success', 'Comite realizada exitosamente');

        //return back()->with('success', 'Comite realizada exitosamente');
    } catch (\Exception $e) {
        return back()->with('error', 'Error al guardar en la base de datos: ' . $e->getMessage());
    }
}

    public function show(Comite $comite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comite  $comite
     * @return \Illuminate\Http\Response
     */
    public function edit(Comite $comite)
    {
        return view('modificacionComite');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comite  $comite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comite $comite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comite  $comite
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comite $comite)
    {
        //
    }
}
