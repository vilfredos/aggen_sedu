<?php

namespace App\Http\Controllers;

use App\Models\jurados;
use App\Http\Requests\StoreJuradoRequest;
use App\Http\Requests\UpdateJuradoRequest;

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
    public function destroy(Jurado $jurado)
    {
        //
    }
    public function mostrar()
    {
        $datos = Jurados::all();
        return view('ver_lista_jurados')->with('datos', $datos);
    }
}
