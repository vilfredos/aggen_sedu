<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\VotanteExport;
use App\Imports\VotanteImport;
use App\Models\Votante;
use Illuminate\Http\Request;
use App\Models\Estudiante;
use App\Models\Docente;
use App\Imports\EstudianteImport;
use App\Imports\DocenteImport;
use App\Models\FacultadUbicacion;
use App\Imports\UbicacionImport;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactanosMailable;




class VotanteController extends Controller
{
    public function index(Request $request)
    {
        $busqueda = $request->busqueda;

        // Obtener estudiantes y docentes directamente usando union
        $barangs = Estudiante::where('name', 'LIKE', "%$busqueda%")
            ->orWhere('sis', 'LIKE', "%$busqueda%")
            ->latest('sis')
            ->union(
                Docente::where('name', 'LIKE', "%$busqueda%")
                    ->orWhere('sis', 'LIKE', "%$busqueda%")
                    ->latest('sis')
            )
            ->get();
    
        return view('panel.poblacion.index', compact('barangs'));
    }
    public function pdf()
    {
        
        $estudiantes =Estudiante::all();
        $docentes = Docente::all();

        $votantes = $estudiantes->concat($docentes);

        $pdf = PDF::loadView('panel.poblacion.pdf', ['votantes' => $votantes])->setOptions(['defaultFont' => 'sans-serif']);
        //return $pdf->stream('votantes.pdf');
        return $pdf->download('__votantes.pdf');   
    }
    


    public function import(Request $request)
    {
        $fileEstudiantes = $request->file('file_estudiantes')->store('public/import');
        $fileDocentes = $request->file('file_docentes')->store('public/import');
        
        $importEstudiante = new EstudianteImport;
        $importEstudiante->import($fileEstudiantes);
        
        $importDocente = new DocenteImport;
        $importDocente->import($fileDocentes);
        
        return redirect()->route('poblacion.index')->with('success', 'Datos importados');
        
    }

    public function export(){
        return (new VotanteExport)->download('base_votantes.xls');       
    }
    

    public function seleccionarTipo()
    {
        return view('poblacion.seleccionar');
    }

    public function obtenerVotantes(Request $request)
    {
        $facultad = $request->input('facultad');
        $carrera = $request->input('carrera');
    
        // Obtener votantes de la tabla de estudiantes
        $votantesEstudiantes = Estudiante::query();
    
        if (!empty($facultad)) {
            $votantesEstudiantes->where('facultad', $facultad);
        }
    
        if (!empty($carrera)) {
            $votantesEstudiantes->where('carrera', $carrera);
        }
    
        // Obtener votantes de la tabla de docentes
        $votantesDocentes = Docente::query();
    
        if (!empty($facultad)) {
            $votantesDocentes->where('facultad', $facultad);
        }
    
        if (!empty($carrera)) {
            $votantesDocentes->where('carrera', $carrera);
        }
    
        // Unir las colecciones de votantes de estudiantes y docentes
        $votantes = $votantesEstudiantes->union($votantesDocentes)->get();
    
        return view('poblacion.mostrar', compact('votantes'));
}

public function importUbicacion(Request $request)
{
    try {
        $fileUbicacion = $request->file('file_ubicacion')->store('public/import');
        $importUbicacion = new UbicacionImport;
        $importUbicacion->import($fileUbicacion);

          // Aquí puedes agregar el código para enviar el correo después de importar
          
        return redirect()->route('poblacion.index')->with('success', 'Datos importados');
    } catch (\Exception $e) {
        dd($e->getMessage());

        return back()->with('error', 'Error al importar: ' . $e->getMessage());
    }
}



}