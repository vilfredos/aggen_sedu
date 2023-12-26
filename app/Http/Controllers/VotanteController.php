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
use Illuminate\Support\Facades\Validator;




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
        
        $docentes = Docente::all();

    $pdf = PDF::loadView('panel.poblacion.pdf', ['votantes' => $docentes])->setOptions(['defaultFont' => 'sans-serif']);

       
        //return $pdf->stream('votantes.pdf');
        return $pdf->download('__votantes.pdf');   
    }
    


    public function import(Request $request)
    {
        
        try {
            $fileEstudiantes = $request->file('file_estudiantes');
            $fileDocentes = $request->file('file_docentes');
    
            // Verificar si se seleccionaron archivos
            if ($fileEstudiantes && $fileDocentes) {
                // Almacenar los archivos en el sistema de archivos
                $pathEstudiantes = $fileEstudiantes->store('public/import');
                $pathDocentes = $fileDocentes->store('public/import');
    
                // Importar los datos utilizando las rutas de los archivos almacenados
                $importEstudiante = new EstudianteImport;
                $importEstudiante->import($pathEstudiantes);
    
                $importDocente = new DocenteImport;
                $importDocente->import($pathDocentes);
    
                return redirect()->route('poblacion.index')->with('success', 'Datos importados correctamente');
            } else {
                // Manejar el caso en que no se seleccionaron archivos
                return redirect()->route('poblacion.index')->with('error', 'Por favor, seleccione archivos para importar.');
            }
        } catch (\Exception $e) {
            // Manejar otros errores durante el proceso de importación
            return redirect()->route('poblacion.index')->with('error', 'Error al importar archivos Excel: ' . $e->getMessage());
        }
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
        // Validar la presencia de un archivo y el formato del archivo
        $validator = Validator::make($request->all(), [
            'file_ubicacion' => 'required|file|mimes:xls,xlsx',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput()->with('error', 'Por favor, seleccione un archivo Excel válido.');
        }

        // Verificar si se seleccionó un archivo
        if ($request->hasFile('file_ubicacion')) {
            $fileUbicacion = $request->file('file_ubicacion')->store('public/import');
            $importUbicacion = new UbicacionImport;
            $importUbicacion->import($fileUbicacion);

            // Aquí puedes agregar el código para enviar el correo después de importar

            return redirect()->route('poblacion.index')->with('success', 'Datos importados correctamente');
        } else {
            // Manejar el caso en que no se seleccionó un archivo
            return back()->with('error', 'Por favor, seleccione un archivo para importar.');
        }
    } catch (\Exception $e) {
        // Manejar otros errores durante el proceso de importación
        dd($e->getMessage());
        return back()->with('error', 'Error al importar: ' . $e->getMessage());
    }
}



}