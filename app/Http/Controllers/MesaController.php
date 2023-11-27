<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Mesa;
use App\Models\Votante;
use App\Models\MesaVotante; 

class MesaController extends Controller
{
    public function mostrarListadoMesas()
    {
        $mesas = Mesa::all();
        return view('listamesas', compact('mesas'));
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
}
