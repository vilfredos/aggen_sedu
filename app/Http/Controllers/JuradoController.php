<?php

namespace App\Http\Controllers;

use App\Models\jurado;
use App\Http\Requests\StoreJuradoRequest;
use App\Http\Requests\UpdateJuradoRequest;
use App\Models\Votante;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Models\remplazar_jurado;
use Illuminate\Support\Facades\DB;

class JuradoController extends Controller
{
    public function ver_jurado($num_mesa)
    {
        $eleccionId = request()->query('eleccionId');
        $datos = DB::table('eleccion_jurados')
            ->where('id_eleccion', $eleccionId)
            ->where('id_mesa', $num_mesa)
            ->get()
            ->map(function ($item) {
                $estudiante = DB::table('estudiantes')->where('sis', $item->sis)->first();
                $docente = DB::table('docentes')->where('sis', $item->sis)->first();
    
                $item->name = $estudiante ? $estudiante->name : ($docente ? $docente->name : null);
                $item->email = $estudiante ? $estudiante->email : ($docente ? $docente->email : null);
                $item->facultad = $estudiante ? $estudiante->facultad : ($docente ? $docente->facultad : null);
                $item->carrera = $estudiante ? $estudiante->carrera : null;
                $item->ci = $estudiante ? $estudiante->ci : ($docente ? $docente->ci : null);
    
                return $item;
            });
    
        return view('lista_jurados', ['data' => $datos]);
    }
    public function ver_papeleta($id_eleccion)
    {
        // Obtén todos los frentes para la elección dada
        $frentes = DB::table('frentes')->where('id_eleccion', $id_eleccion)->get();
    
        // Itera sobre cada frente
        foreach ($frentes as $frente) {
            // Obtén todos los candidatos para el frente dado
            $candidatos = DB::table('candidato')
                ->where('id_eleccion', $id_eleccion)
                ->where('id_frente', $frente->id_frente)
                ->get();
    
            // Añade los candidatos al frente
            $frente->candidatos = $candidatos;
        }  
        return view('papeleta', ['data' => $frentes]);
    }
    public function remplazar(Request $request)
    {
        $validatedData = $request->validate([
            'new_sis' => 'required|integer',
            'menu' => 'required|string',
            'descripcion' => 'required|string',
            'file' => 'required|mimes:pdf',
            // Add more validations as needed
        ]);
        $newMembrer =  DB::table('eleccion_sis')->where('sis', $request->new_sis)->first();
        $oldMembrer =  DB::table('eleccion_sis')->where('sis', $request->sis)->first();
    
        if (!$newMembrer) {
            return back()->withErrors(['sis' => 'No se encontró al remplazo']);
        }
    
        // Verifica que el nuevo sis no sea parte de una mesa
        $esJurado = DB::table('eleccion_jurados')->where('sis', $request->new_sis)->first();
        if ($esJurado) {
            return back()->withErrors(['new_sis' => 'El nuevo SIS ya es parte de una mesa']);
        }
    
        // Verifica que el nuevo sis no sea miembro del comité
        $esMiembroComite = DB::table('eleccion_comite')->where('sis', $request->new_sis)->first();
        if ($esMiembroComite) {
            return back()->withErrors(['new_sis' => 'El nuevo SIS ya es miembro del comité']);
        }
    
        // Replace the committee member in the eleccion_comite table
        DB::table('eleccion_comite')
            ->where('sis', $request->sis)
            ->update(['sis' => $request->new_sis]);
    
        // Insert the replacement details into the remplazo_jurados table
        DB::table('remplazo_jurados_comite')->insert([
            'antiguo_sis' => $request->sis,
            'razon' => $request->menu,
            'descripcion' => $request->descripcion,
            'archivo' => $request->file->store('pdfs'), // This will store the PDF in the 'pdfs' directory
            'tipo' => 'comite',
            'nuevo_sys' => $request->new_sis,
        ]);
    
        return redirect()->route('lista_jurados', ['num_mesa' => $oldMembrer->id_eleccion]);
    }
    public function remplazar_jurado($sis)
    {
        return view('remplazar_jurado', ['sis' => $sis]);
    }
    
}
