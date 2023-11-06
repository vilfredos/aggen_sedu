<?php

namespace App\Http\Controllers;

use App\Models\votos_mesa;
use Illuminate\Http\Request;
use App\Http\Requests\Storevotos_mesaRequest;
use App\Http\Requests\Updatevotos_mesaRequest;
use Illuminate\Support\Facades\Validator; // Importa la clase Validator aquí


class VotosMesaController extends Controller
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
     * @param  \App\Http\Requests\Storevotos_mesaRequest  $request
     * @return \Illuminate\Http\Response
     * App\Http\Controllers\Request1. Esto puede suceder por varias razones:
     */
    public function store(Request $request)
    {
        $voto = new votos_mesa;

        $voto->num_mesa = $request->num_mesa;
        $voto->votos_FR = $request->votos_FR;
        $voto->votos_UXSS = $request->votos_UXSS;
        $voto->votos_PSS = $request->votos_PSS;
        $voto->votos_blancos = $request->votos_blancos;
        $voto->votos_nulos = $request->votos_nulos;
        $voto->votos_totales = $request->votos_totales;

        $voto->save();

        /*return response()->json(['success' => 'Datos guardados exitosamente!']);    }
        */
        return redirect('/cierreActa');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\votos_mesa  $votos_mesa
     * @return \Illuminate\Http\Response
     */
    public function show(votos_mesa $votos_mesa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\votos_mesa  $votos_mesa
     * @return \Illuminate\Http\Response
     */
    public function edit(votos_mesa $votos_mesa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatevotos_mesaRequest  $request
     * @param  \App\Models\votos_mesa  $votos_mesa
     * @return \Illuminate\Http\Response
     */
    public function update(Updatevotos_mesaRequest $request, votos_mesa $votos_mesa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\votos_mesa  $votos_mesa
     * @return \Illuminate\Http\Response
     */
    public function destroy(votos_mesa $votos_mesa)
    {
        //
    }
    public function mostrar()
    {
        $datos = votos_mesa::all();
        return view('votosPorMesa')->with('datos', $datos);
    }
}
