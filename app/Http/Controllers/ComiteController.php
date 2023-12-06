<?php

namespace App\Http\Controllers;

use App\Models\Comite;
use Illuminate\Http\Request;

use App\Exports\VotanteExport;
use App\Imports\VotanteImport;
use App\Models\Votante;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Validator; // Importa la clase Validator aquí


class ComiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function remplazar_comite($sis)
    {
        return view('remplazar_comite', ['sis' => $sis]);
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

        return redirect('/lista_comite/' . $oldMembrer->id_eleccion);
    }



    public function mostrar($id_eleccion)
    {
        $comite = DB::table('eleccion_comite')
            ->where('id_eleccion', $id_eleccion)
            ->get()
            ->map(function ($item) {
                $estudiante = DB::table('estudiantes')->where('sis', $item->sis)->first();
                $docente = DB::table('docentes')->where('sis', $item->sis)->first();

                $item->name = $estudiante ? $estudiante->name : ($docente ? $docente->name : null);
                $item->email = $estudiante ? $estudiante->email : ($docente ? $docente->email : null);
                $item->facultad = $estudiante ? $estudiante->facultad : ($docente ? $docente->facultad : null);
                $item->carrera = $estudiante ? $estudiante->carrera : null;
                $item->ci = $estudiante ? $estudiante->ci : ($docente ? $docente->ci : null);
                $item->gremio = $estudiante ? 'estudiante' : ($docente ? 'docente' : null);

                return $item;
            });

        return view('lista_comite', ['id_eleccion' => $id_eleccion, 'comite' => $comite]);
    }
}
