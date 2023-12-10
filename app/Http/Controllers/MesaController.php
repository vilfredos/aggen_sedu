<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Mesa;
use App\Models\Votante;
use App\Models\MesaVotante; 
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\VotosBlancosMesa;
use App\Models\VotosFrenteMesa;
use App\Models\VotosNulosMesa;
use App\Models\Frente;
class MesaController extends Controller
{
    public function listamesas($id_eleccion)
    {
        $mesas = DB::table('mesas')->where('id_eleccion', $id_eleccion)->get();
        return view('listamesas', ['mesas' => $mesas, 'id_eleccion' => $id_eleccion]);
    }
    public function mostrarTablaDeVotos($idEleccion)
{
    // Obtener mesas para la elección
    $mesas = Mesa::where('id_eleccion', $idEleccion)->get();

    // Obtener frentes para la elección
    $frentes = Frente::where('id_eleccion', $idEleccion)->get();

    // Inicializar arrays para almacenar los totales de votos nulos, blancos y por frente
    $totalesNulos = $totalesBlancos = $votosFrentes = [];

    foreach ($mesas as $mesa) {
        // Obtener votos nulos y blancos para cada mesa
        $votosNulos = VotosNulosMesa::where('id_mesa', $mesa->numeroMesa)->sum('votos_nulos');
        $votosBlancos = VotosBlancosMesa::where('id_mesa', $mesa->numeroMesa)->sum('votos_blancos');

        // Obtener votos por frente para cada mesa
        $votosFrentes[$mesa->numeroMesa] = VotosFrenteMesa::where('id_mesa', $mesa->numeroMesa)->pluck('votos_frente')->toArray();

        // Almacenar los totales en los arrays
        $totalesNulos[$mesa->numeroMesa] = $votosNulos;
        $totalesBlancos[$mesa->numeroMesa] = $votosBlancos;
    }

    // Pasar las variables a la vista
    return view('tablaDeVotos', compact('mesas', 'totalesNulos', 'totalesBlancos', 'votosFrentes', 'frentes'));
}
    /*
    public function ver_votantes($num_mesa)
    {
        $eleccionId = request()->query('eleccionId');
        $datos = DB::table('eleccion_votante_mesa')
    ->where('id_eleccion', $eleccionId)
    ->where('id_mesa', $num_mesa)
    ->get();
        return view('votante_mesa', ['data' => $datos]);
    }*/
    public function ver_votantes($num_mesa)
{
    $eleccionId = request()->query('eleccionId');
    $datos = DB::table('eleccion_votante_mesa')
        ->where('id_eleccion', $eleccionId)
        ->where('id_mesa', $num_mesa)
        ->get();

    // Recorrer cada votante y buscar sus datos en las tablas docentes y estudiantes
    foreach ($datos as $votante) {
        $sis = $votante->sis;

        // Buscar en la tabla docentes
        $docente = DB::table('docentes')->where('sis', $sis)->first();
        if ($docente) {
            $votante->name = $docente->name;
            $votante->email = $docente->email;
            $votante->facultad = $docente->facultad;
            $votante->carrera = $docente->carrera;
            $votante->ci = $docente->ci;
            $votante->created_at = $docente->created_at;
            $votante->updated_at = $docente->updated_at;
        } else {
            // Si no se encuentra en docentes, buscar en la tabla estudiantes
            $estudiante = DB::table('estudiantes')->where('sis', $sis)->first();
            if ($estudiante) {
                $votante->name = $estudiante->name;
                $votante->email = $estudiante->email;
                $votante->facultad = $estudiante->facultad;
                $votante->carrera = $estudiante->carrera;
                $votante->ci = $estudiante->ci;
                $votante->created_at = $estudiante->created_at;
                $votante->updated_at = $estudiante->updated_at;
            }
        }
    }

    return view('votante_mesa', ['data' => $datos]);
}

    public function mostrarVistaAsignacion()
    {
        // Obtener las mesas desde tu modelo o cualquier lógica que necesites
        $mesas = Mesa::all();

        // Renderizar la vista asignacion.blade.php y pasar las mesas como variable
        return view('asignacion', compact('mesas'));
    }
    public function registrar(Request $request)
    {
        // Validar los datos del formulario según tus necesidades
        $request->validate([
            'numeroMesa' => 'required|numeric',
            'recintoVotacion' => 'required|string',
            'aulaVotacion' => 'required|string',
            'facultad' => 'required|string',
            'carrera' => 'required|string',
            'tipoUsuario' => 'required|string',
            'fotoLugar' => 'required|string',
            'capacidadMaxima' => 'required|integer|min:10',
        ]);

        // Crear una nueva instancia del modelo Mesa y asignar los valores
        $mesa = new Mesa([
            'numeroMesa' => $request->input('numeroMesa'),
            'recinto' => $request->input('recintoVotacion'),
            'aula' => $request->input('aulaVotacion'),
            'facultad' => $request->input('facultad'),
            'carrera' => $request->input('carrera'),
            'tipo' => $request->input('tipoUsuario'),
            'ubicacion' => $request->input('fotoLugar'),
            'capMaxima' => $request->input('capacidadMaxima'),
            // Agrega otros campos aquí según sea necesario
        ]);

        // Guardar la mesa en la base de datos
        $mesa->save();

        // Puedes redirigir a una página de éxito o realizar alguna otra acción
        return redirect('/mesa')->with('success', 'Mesa registrada exitosamente');
    }

    public function adjuntarVotantes(Request $request)
{
    // Obtén las mesas seleccionadas desde el formulario
    $mesasSeleccionadas = $request->input('mesas_seleccionadas', []);

    // Itera sobre las mesas seleccionadas
    foreach ($mesasSeleccionadas as $mesaSeleccionada) {
        // Divide la cadena para obtener los valores de facultad, carrera y tipo
        list($facultad, $carrera, $tipo) = explode('-', $mesaSeleccionada);

        // Obtén el ID de la mesa seleccionada
        $mesaId = Mesa::where('facultad', $facultad)
            ->where('carrera', $carrera)
            ->where('tipo', $tipo)
            ->value('numeroMesa'); // Cambiado de 'id' a 'numeroMesa'

        // Obtén los votantes que coinciden con la facultad, carrera y tipo
        $votantes = Votante::where('facultad', $facultad)
            ->where('carrera', $carrera)
            ->where('tipo', $tipo)
            ->get();

        // Itera sobre los votantes y agrega las filas en la tabla mesa_votante
        foreach ($votantes as $votante) {
            MesaVotante::create([
                'mesa_id' => $mesaId,
                'votante_id' => $votante->sis,
            ]);
        }
    }

    // Puedes redirigir a la vista o hacer cualquier otra acción después de la inserción
    return redirect()->back()->with('success', 'Votantes adjuntados exitosamente.');
}
public function agregarInfo($numeroMesa)
{
    // Recupera la información de la mesa
    $mesa = Mesa::where('numeroMesa', $numeroMesa)->first();

    // Verifica si la mesa existe
    if (!$mesa) {
        abort(404); // O maneja la situación de manera diferente (redirección, mensaje de error, etc.)
    }

    // Pasa la variable de mesa a la vista
    return view('agregarInfo')->with('mesa', $mesa);
}
public function guardarInformacion(Request $request, $numeroMesa)
{
    // Validar los datos según tus necesidades
    $request->validate([
        'recinto' => 'required|string',
        'aula' => 'required|string',
    ]);

    // Obtener la mesa correspondiente
    $mesa = Mesa::where('numeroMesa', $numeroMesa)->firstOrFail();

    // Actualizar los campos recinto y aula
    $mesa->recinto = $request->input('recinto');
    $mesa->aula = $request->input('aula');

    // Guardar los cambios
    $mesa->save();

    // Puedes redirigir a una página de éxito o realizar alguna otra acción
   // Puedes redirigir a la vista de la información de la mesa
    return redirect()->route('agregarInfo', ['numeroMesa' => $numeroMesa])->with('success', 'Información de la mesa actualizada exitosamente');

}

public function mostrarActaDeInicio($numeroMesa) {
    // Obtener la mesa y su elección asociada
    $mesa = Mesa::where('numeroMesa', $numeroMesa)->with('eleccion')->first();

    // Verificar si la mesa y la elección existen
    if (!$mesa || !$mesa->eleccion) {
        abort(404); // O maneja la situación de manera diferente
    }

    // Obtener la fecha de fecha_fin de la elección y restar dos días
    $fechaInicioEleccion = Carbon::parse($mesa->eleccion->fecha_fin)->subDays(2)->format('l j \\d\\e F \\d\\e Y');

    // Pasar la variable a la vista
    return view('ActaDeInicio', ['numeroMesa' => $numeroMesa, 'fechaInicioEleccion' => $fechaInicioEleccion]);
}

public function actualizarResultados()
    {
        // Ejecutar la consulta
        $resultados = DB::select("
            SELECT
                id_eleccion,
                sigla_frente AS sigla,
                id_frente,
                sis_candidato,
                cargo_postular
            FROM (
                SELECT
                    ev.id_eleccion,
                    ev.sigla_frente,
                    f.id_frente,
                    c.sis_candidato,
                    c.cargo_postular,
                    DENSE_RANK() OVER (PARTITION BY ev.id_eleccion ORDER BY SUM(ev.votos_frente) DESC) AS rnk
                FROM eleccion_votosfrente_mesa ev
                JOIN frentes f ON ev.sigla_frente = f.sigla_frente AND ev.id_eleccion = f.id_eleccion
                JOIN candidato c ON f.id_frente = c.id_frente AND ev.id_eleccion = c.id_eleccion
                GROUP BY ev.id_eleccion, ev.sigla_frente, f.id_frente, c.sis_candidato, c.cargo_postular
            ) AS ranked
            WHERE rnk = 1
            ORDER BY id_eleccion, sigla_frente, id_frente, sis_candidato
        ");

        // Insertar resultados en la tabla eleccion_resultado_total
        foreach ($resultados as $resultado) {
            DB::table('eleccion_resultado_total')->insert([
                'id_eleccion' => $resultado->id_eleccion,
                'sigla' => $resultado->sigla,
                'id_frente' => $resultado->id_frente,
                'sis_candidato' => $resultado->sis_candidato,
                'cargo_postular' => $resultado->cargo_postular,
            ]);
        }

        // Redirigir a la vista original
        return redirect()->route('votantes_por_mesa');
    }
/*
public function guardarAsignacion(Request $request)
{
    try {
        // Obtener las mesas seleccionadas
        $mesasSeleccionadas = $request->input('mesas', []);

        // Verificar que hay mesas seleccionadas
        if (count($mesasSeleccionadas) > 0) {
            DB::transaction(function () use ($mesasSeleccionadas) {
                foreach ($mesasSeleccionadas as $numeroMesa) {
                    // Obtener la mesa seleccionada
                    $mesa = Mesa::where('numeroMesa', $numeroMesa)->first();

                    // Verificar si ya existe una asignación para esta mesa y votante
                    $existingAssignment = MesaVotante::where('mesa_id', $mesa->numeroMesa)
                        ->whereIn('votante_id', Votante::where('facultad', $mesa->facultad)
                            ->where('carrera', $mesa->carrera)
                            ->pluck('sis'))
                        ->exists();

                    if (!$existingAssignment) {
                        // Obtener los votantes que cumplen con los criterios
                        $votantes = Votante::where('facultad', $mesa->facultad)
                            ->where('carrera', $mesa->carrera)
                            ->get();

                        // Iterar sobre los votantes y asignarlos a la mesa
                        foreach ($votantes as $votante) {
                            // Crear la asignación solo si no existe
                            MesaVotante::create([
                                'mesa_id' => $mesa->numeroMesa,
                                'votante_id' => $votante->sis,
                            ]);
                        }
                    } else {
                        // Manejar la situación donde ya existe una asignación
                        // Puedes informar al usuario o registrar un mensaje de advertencia
                        \Log::warning("Intento de asignar votantes a la misma mesa {$mesa->numeroMesa} más de una vez.");
                    }
                }
            });

            // Puedes redirigir a una vista de éxito o realizar alguna otra acción
            return redirect()->back()->with('success', 'Mesas asignadas correctamente.');
        }

        // Si no hay mesas seleccionadas, puedes redirigir o mostrar un mensaje de error
        return redirect()->back()->with('error', 'No hay mesas seleccionadas.');
    } catch (\Exception $e) {
        // Registrar el error
        \Log::error('Error al asignar mesas: ' . $e->getMessage());

        // Mostrar un mensaje de error al usuario
        return redirect()->back()->with('error', 'Hubo un error al asignar las mesas.');
    }
}
*/
}
