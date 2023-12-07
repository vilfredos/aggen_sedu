<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrenteController extends Controller
{



    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'sis_representante' => 'required|integer',
            'nombre_frente' => 'required|string',
            'sigla_frente' => 'required|string',
            'color_primario' => 'required|string',
            'color_secundario' => 'required|string',
            // Agrega más validaciones según sea necesario
        ]);
        $eleccionId = $request->input('id_eleccion');
        $sis_representante = $request->input('sis_representante');
        $nombre_frente = $request->input('nombre_frente');
        $sigla_frente = $request->input('sigla_frente');
        $color_primario = $request->input('color_primario');
        $color_secundario = $request->input('color_secundario');

        // Verifica que el sis del representante pertenece a la id_eleccion

        $representante = DB::table('eleccion_sis')->where('sis', $sis_representante)->where('id_eleccion', $eleccionId)->first();

        if (!$representante) {
            return back()->withErrors(['sis_representante' => 'El SIS del representante no pertenece a la elección']);
        }

        $cargos = DB::table('eleccion_cargo')->where('id_eleccion', $request->input('id_eleccion'))->get();
        foreach ($cargos as $cargo) {
            $id_eleccion = $request->input('id_eleccion');
            $sis_candidato = $request->input(str_replace(' ', '_', $cargo->cargo_postular));

            // Verifica que el sis del candidato pertenece a la id_eleccion
            $candidato = DB::table('eleccion_sis')->where('sis', $sis_candidato)->where('id_eleccion', $id_eleccion)->first();
            if (!$candidato) {
                return back()->withErrors(['sis_candidato' => 'El SIS del candidato no pertenece a la elección']);
            }
        }

        $representanteExistente = DB::table('frentes')->where('sis_representante', $sis_representante)->first();
        if ($representanteExistente) {
            return back()->withErrors(['sis_representante' => 'El SIS del representante ya está registrado']);
        }

        $id_frente = DB::table('frentes')->insertGetId([
            'sis_representante' => $sis_representante,
            'nombre_frente' => $nombre_frente,
            'sigla_frente' => $sigla_frente,
            'color_primario' => $color_primario,
            'color_secundario' => $color_secundario,
            'id_eleccion' => $request->input('id_eleccion'),
        ]);

        foreach ($cargos as $cargo) {
            $id_eleccion = $request->input('id_eleccion');
            $sis_candidato = $request->input(str_replace(' ', '_', $cargo->cargo_postular));

            // Verifica que el sis del candidato no está ya registrado en la tabla 'candidato'
            $candidatoExistente = DB::table('candidato')->where('sis_candidato', $sis_candidato)->where('id_eleccion', $id_eleccion)->first();
            if ($candidatoExistente) {
                return back()->withErrors(['sis_candidato' => 'El SIS del candidato ya está registrado']);
            }

            DB::table('candidato')->insert([
                'id_eleccion' => $id_eleccion,
                'sis_candidato' => $sis_candidato,
                'cargo_postular' => $cargo->cargo_postular,
                'id_frente' => $id_frente,
            ]);
        }
        return redirect()->route('votantes_por_mesa')->with('success', 'Frente y candidatos registrados');    

    }
    public function frente($sis)
    {
        $cargos = DB::table('eleccion_cargo')->where('id_eleccion', $sis)->get();
        return view('frente', ['id' => $sis, 'cargos' => $cargos]);
    }
}
