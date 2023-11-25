<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrenteController extends Controller
{
    /*
    public function create()
    {
        $elecciones = Eleccion::all();
        return view('frente.create', compact('elecciones'));
    }

    public function store(Request $request)
    {
        $frente = new Frente;
        $frente->name_representante = $request->name_representante;
        $frente->sis_representante = $request->sis_representante;
        $frente->color_primario = $request->color_primario;
        $frente->color_secundario = $request->color_secundario;
        $frente->sigla_frente = $request->sigla_frente;
        $frente->cod_eleccion = $request->cod_eleccion;
        $frente->save();

        return redirect()->route('frente.index');
    }
    */
}