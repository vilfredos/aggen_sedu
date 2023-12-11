<?php
 
namespace App\Http\Controllers;

use App\Models\votos_mesa;
use Illuminate\Http\Request;
use App\Http\Requests\Storevotos_mesaRequest;
use App\Http\Requests\Updatevotos_mesaRequest;
use Illuminate\Support\Facades\Validator; // Importa la clase Validator aquí
use App\Models\Mesa;
use Illuminate\Support\Facades\DB;
use App\Models\Frente;
use App\Models\VotosBlancosMesa;
use App\Models\VotosFrenteMesa;
use App\Models\VotosNulosMesa;
use App\Models\EleccionActaMesa;
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
    // Obtener la mesa por su número
    $mesa = Mesa::where('numeroMesa', $request->num_mesa)->first();

    // Verificar si la mesa existe
    if (!$mesa) {
        abort(404, "Mesa no encontrada");
    }

    // Obtener la elección asociada a la mesa
    $eleccion = $mesa->eleccion;

    // Verificar si la elección existe
    if (!$eleccion) {
        abort(404, "Elección no encontrada");
    }

    // Guardar votos blancos
    VotosBlancosMesa::create([
        'id_eleccion' => $eleccion->id,
        'votos_blancos' => $request->votos_blancos,
        'id_mesa' => $request->num_mesa,
    ]);

    // Guardar votos de frentes
    foreach ((array)$request->votos_frentes as $id_frente => $votos) {
        // Verifica si la clave 'id_frente' está presente en el elemento antes de acceder a ella
        if (isset($id_frente) && isset($votos)) {
            // Obtén la sigla del frente utilizando el ID
            $frente = Frente::find($id_frente);

            // Crea votos por frente en la tabla eleccion_votosfrente_mesa
            $votosFrente = new VotosFrenteMesa();
            $votosFrente->id_mesa = $request->num_mesa;
            $votosFrente->id_eleccion = $eleccion->id;
            $votosFrente->sigla_frente = $frente->sigla_frente;
            $votosFrente->votos_frente = $votos; // Puede que necesites ajustar esto según cómo estás recibiendo los votos
            $votosFrente->save();
        }
    }

    // Guardar votos nulos
    VotosNulosMesa::create([
        'id_eleccion' => $eleccion->id,
        'votos_nulos' => $request->votos_nulos,
        'id_mesa' => $request->num_mesa,
    ]);

    // Verificar si se proporcionó un archivo y es un PDF
    
        $file = $request->file('documento_pdf');

        // Verificar si el archivo es un PDF
        
            $nombreArchivo = 'acta_' . time() . '.' . $file->getClientOriginalExtension();
            $rutaArchivo = $file->storeAs('documentos', $nombreArchivo, 'public');

            // Guardar en la tabla eleccion_acta_mesa
            EleccionActaMesa::create([
                'id_eleccion' => $eleccion->id,
                'acta' => $rutaArchivo,
                'id_mesa' => $request->num_mesa,
            ]);
        

    // Redirigir a la ruta deseada
    return redirect()->route('listamesas', ['id_eleccion' => $eleccion->id]);
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
public function mostrarEleccion()
{
    $datos = DB::table('eleccion')->get();
    return view('votantes_por_mesa')->with('datos', $datos);
}
public function mostrarActaEscrutinio($numeroMesa) {
    // Obtener la mesa por su número
    $mesa = Mesa::where('numeroMesa', $numeroMesa)->first();

    // Verificar si la mesa existe
    if (!$mesa) {
        abort(404); // Puedes personalizar esto según tus necesidades
    }

    // Obtener la elección asociada a la mesa
    $eleccion = $mesa->eleccion;

    // Verificar si la elección existe
    if (!$eleccion) {
        abort(404); // Puedes personalizar esto según tus necesidades
    }

    // Obtener los frentes asociados a la elección
    $frentes = Frente::where('id_eleccion', $eleccion->id)->get();

    return view('acta_escrutino', [
        'frentes' => $frentes,
        'numeroMesa' => $numeroMesa,
    ]);
}
public function verHistorico(){
    $elecciones = DB::table('eleccion')->get();
    return view('historico', ['elecciones' => $elecciones]);
}
public function verInformacion($id){
    $eleccion = DB::table('eleccion')->where('id', $id)->first();
    $eleccion_sis = DB::table('eleccion_sis')->where('id_eleccion', $id)->get();
    $candidatos = DB::table('candidato')->where('id_eleccion', $id)->get();
    $eleccion_cargo = DB::table('eleccion_cargo')->where('id_eleccion', $id)->get();
    $eleccion_comite = DB::table('eleccion_comite')->where('id_eleccion', $id)->get();
    $eleccion_jurados = DB::table('eleccion_jurados')->where('id_eleccion', $id)->get();
    $eleccion_resultado_total = DB::table('eleccion_resultado_total')->where('id_eleccion', $id)->get();
    $eleccion_votante_mesa = DB::table('eleccion_votante_mesa')->where('id_eleccion', $id)->get();
    $frentes = DB::table('frentes')->where('id_eleccion', $id)->get();
    $mesas = DB::table('mesas')->where('id_eleccion', $id)->get();

    $votosblancos = DB::table('eleccion_votosblancos_mesa')->where('id_eleccion', $id)->get();
    $votosfrente = DB::table('eleccion_votosfrente_mesa')
                     ->select('sigla_frente', DB::raw('SUM(votos_frente) as total_votos'))
                     ->where('id_eleccion', $id)
                     ->groupBy('sigla_frente')
                     ->get();    
    $votosnulos = DB::table('eleccion_votosnulos_mesa')->where('id_eleccion', $id)->get();
    $resultado = DB::table('eleccion_resultado_total')->where('id_eleccion', $id)->get();


    $suma_votosblanco = $votosblancos->sum('votos_blancos'); // Asume que 'votos_frente' es el nombre de la columna que contiene los votos
    $suma_votosnulo = $votosnulos->sum('votos_nulos'); // Asume que 'votos_frente' es el nombre de la columna que contiene los votos

    //dd($eleccion_cargo);
    if ($eleccion) {
        return view('informacion', [
            'eleccion' => $eleccion,
            'eleccion_sis' => $eleccion_sis,
            'candidatos' => $candidatos,
            'eleccion_cargo' => $eleccion_cargo,
            'eleccion_comite' => $eleccion_comite,
            'eleccion_jurados' => $eleccion_jurados,
            'eleccion_resultado_total' => $eleccion_resultado_total,
            'eleccion_votante_mesa' => $eleccion_votante_mesa,
            'frentes' => $frentes,
            'mesas' => $mesas,
            'suma_votosnulo' => $suma_votosnulo,
            'suma_votosblanco' => $suma_votosblanco,
            'votosfrente' => $votosfrente,
        ]);
    } else {
        return redirect('/informacion')->with('error', 'Eleccion no encontrada');
    }
}

}
