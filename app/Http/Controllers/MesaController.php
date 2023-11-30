<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Mesa;
use App\Models\Votante;
use App\Models\MesaVotante; 
use Illuminate\Support\Facades\DB;

class MesaController extends Controller
{
    public function mostrarListadoMesas($id_eleccion)
    {
        // Obtén la información de la elección desde la tabla eleccion_sis
        $eleccionInfo = DB::table('eleccion_sis')->where('id_eleccion', $id_eleccion)->first();

        // Obtén las mesas de la tabla mesas que coincidan con la facultad y carrera de la elección
        $mesas = DB::table('mesas')
            ->where('facultad', $eleccionInfo->facultad)
            ->where('carrera', $eleccionInfo->carrera)
            ->get();

        // Pasa las mesas a la vista listamesas.blade.php
        return view('listamesas', ['mesas' => $mesas]);
    }
    public function mostrarListadoMesa()
    {
        $mesas = Mesa::all();
        return view('listamesas', compact('mesas'));
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

}
