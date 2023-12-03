<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrenteController extends Controller
{
    

    public function store(Request $request)
    {
        try {
            // tu código
            $eleccionId = $request->input('id');
        $sis_representante = $request->input('sis_representante');
        $nombre_frente = $request->input('nombre_frente');
        $sigla_frente = $request->input('sigla_frente');
        $color_primario = $request->input('color_primario');
        $color_secundario = $request->input('color_secundario');
    
        $id_frente = DB::table('frentes')->insertGetId([
            'sis_representante' => $sis_representante,
            'nombre_frente' => $nombre_frente,
            'sigla_frente' => $sigla_frente,
            'color_primario' => $color_primario,
            'color_secundario' => $color_secundario,
            'id_eleccion' => $eleccionId,
        ]);
    
        $cargos = DB::table('eleccion_cargo')->where('id_eleccion', $request->input('id'))->get();
        foreach ($cargos as $cargo) {
            $id_eleccion = $request->input('id');
            $sis_candidato = $request->input($cargo->cargo_postular);
        
            DB::table('candidato')->insert([
                'id_eleccion' => $id_eleccion,
                'sis_candidato' => $sis_candidato,
                'cargo_postular' => $cargo->cargo_postular,
                'id_frente' => $id_frente,
            ]);
        }
    } catch (\Exception $e) {
        dd($e->getMessage());
    }
    
        return redirect()->back();
    }

public function frente($sis)
{
    $cargos = DB::table('eleccion_cargo')->where('id_eleccion', $sis)->get();
    return view('frente', ['id' => $sis, 'cargos' => $cargos]);
}
    
}