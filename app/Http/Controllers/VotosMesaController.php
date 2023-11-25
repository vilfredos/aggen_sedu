<?php

namespace App\Http\Controllers;

use App\Models\votos_mesa;
use Illuminate\Http\Request;
use App\Http\Requests\Storevotos_mesaRequest;
use App\Http\Requests\Updatevotos_mesaRequest;
use Illuminate\Support\Facades\Validator; // Importa la clase Validator aquí

use Illuminate\Support\Facades\DB;

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
    /*
    los metodos de franz
    
    */
    // Obtén los docentes de la tabla votantes
    public function votante_mesa()
    {
        $docentes = DB::table('votantes')->where('tipo', 'docente')->get();

        // Prepara los datos para la tabla votantes_por_mesa
        $datos = [];
        foreach ($docentes as $docente) {
            $datos[] = [
                'sis' => $docente->sis,
                'name' => $docente->name,
                'numeroMesa' => 1, // Asigna a la mesa 1
            ];
        }

        // Inserta los datos en la tabla votantes_por_mesa
        DB::table('votantes_por_mesa')->insert($datos);

        return view('votantes_por_mesa', ['datos' => $datos]);
    }
    public function enviar_datos(){


    }
    // En tu controlador
public function agregar(Request $request)
{
    // Aquí va tu código para agregar
}

public function eliminar(Request $request)
{
    // Aquí va tu código para eliminar
}

public function otros(Request $request)
{
    $sis = $request->sis;
    // Aquí va tu código para otros
    return response()->json(['redirect' => '/ruta-a-votosPorMesa']);
}
public function papeleta($sis)
{
    // Aquí puedes hacer algo con $sis si es necesario
    return view('papeleta', ['sis' => $sis]);
}
}
