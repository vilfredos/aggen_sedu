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
use Illuminate\Support\Facades\Mail;
use App\Mail\NotificacionJurado;
use App\Models\FacultadUbicacion;


class JuradoController extends Controller
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
     * @param  \App\Http\Requests\StoreJuradoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sis = $request->sis;
        $nombre = $request->nombre;
        $facultad = $request->facultad;
        $carrera = $request->carrera;
        $ci = $request->ci;
        $cargo = $request->cargo;
        $numeroMesa = $request->numeroMesa;
        $gremio = $request->gremio;

        // ... Save the data to the database ...

        $jurado = new Jurado();
        $jurado->sis = $sis;
        $jurado->nombre = $nombre;
        $jurado->facultad = $facultad;
        $jurado->carrera = $carrera;
        $jurado->ci = $ci;
        $jurado->cargo = $cargo;
        $jurado->numeroMesa = $numeroMesa;
        $jurado->gremio = $gremio;
        $jurado->save();

        return back()->with('success', 'Jurado guardado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jurado  $jurado
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $jurados = jurado::find(1);
        return view('resultados')->with('jurados', $jurados);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jurado  $jurado
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateJuradoRequest  $request
     * @param  \App\Models\Jurado  $jurado
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jurado  $jurado
     * @return \Illuminate\Http\Response
     */
    /*
    public function destroy(Jurado $jurado)
    {
        //
    }*/
    public function mostrar()
    {
        $datos = Jurado::all();
        return view('ver_lista_jurados')->with('datos', $datos);
    }
    public function guardarJurados(array $jurados)
    {
        Jurado::insert($jurados);
    }
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
    
        return view('lista_jurados', ['data' => $datos]);  // para poder email 
    }
    
    public function enviar_correos_a_jurados()
{
    $datos = DB::table('eleccion_jurados')->get();

    foreach ($datos as $item) {
        $estudiante = DB::table('estudiantes')->where('sis', $item->sis)->first();
        $docente = DB::table('docentes')->where('sis', $item->sis)->first();

        $item->name = $estudiante ? $estudiante->name : ($docente ? $docente->name : null);
        $item->email = $estudiante ? $estudiante->email : ($docente ? $docente->email : null);
        $item->facultad = $estudiante ? $estudiante->facultad : ($docente ? $docente->facultad : null);
        $item->carrera = $estudiante ? $estudiante->carrera : null;
        $item->ci = $estudiante ? $estudiante->ci : ($docente ? $docente->ci : null);

        // Envía el correo electrónico a cada jurado
        Mail::to($item->email)->send(new NotificacionJurado($item));
    }

    return "Correos electrónicos enviados a todos los jurados.";
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









    public function seleccionarJurados()
    {
        $facultad = 'economia'; // Reemplace esto con la facultad deseada

        // Obtener todos los votantes y jurados
        $votantes = Votante::all()->pluck('sis')->toArray();
        $juradosExistentes = Jurado::all()->pluck('sis')->toArray();

        // Eliminar los jurados existentes de la lista de votantes
        $votantes = array_diff($votantes, $juradosExistentes);
        // Seleccionar 1 presidente
        $presidente = Votante::whereIn('sis', $votantes)
            ->where('facultad', $facultad)
            ->where('tipo', 'DOCENTE')
            ->inRandomOrder()
            ->first();
        $presidente->cargo = 'Presidente';

        // Seleccionar 2 docentes titulares
        $docentesTitulares = Votante::whereIn('sis', $votantes)
            ->where('facultad', $facultad)
            ->where('tipo', 'DOCENTE')
            ->inRandomOrder()
            ->take(2)
            ->get();
        foreach ($docentesTitulares as $docente) {
            $docente->cargo = 'Titular';
        }

        // Seleccionar 2 docentes suplentes
        $docentesSuplentes = Votante::whereIn('sis', $votantes)
            ->where('facultad', $facultad)
            ->where('tipo', 'DOCENTE')
            ->whereNotIn('sis', $docentesTitulares->pluck('sis'))
            ->inRandomOrder()
            ->take(2)
            ->get();
        foreach ($docentesSuplentes as $docente) {
            $docente->cargo = 'Suplente';
        }
        // Seleccionar 2 estudiantes titulares
        $estudiantesTitulares = Votante::whereIn('sis', $votantes)
            ->where('facultad', $facultad)
            ->where('tipo', 'ESTUDIANTE')
            ->inRandomOrder()
            ->take(2)
            ->get();
        foreach ($estudiantesTitulares as $estudiante) {
            $estudiante->cargo = 'Titular';
        }

        // Seleccionar 2 estudiantes suplentes
        $estudiantesSuplentes = Votante::whereIn('sis', $votantes)
            ->where('facultad', $facultad)
            ->where('tipo', 'ESTUDIANTE')
            ->whereNotIn('sis', $estudiantesTitulares->pluck('sis'))
            ->inRandomOrder()
            ->take(2)
            ->get();
        foreach ($estudiantesSuplentes as $estudiante) {
            $estudiante->cargo = 'Suplente';
        }

        // Crear la lista de jurados
        $jurados = collect([$presidente])
            ->concat($docentesTitulares)
            ->concat($docentesSuplentes)
            ->concat($estudiantesTitulares)
            ->concat($estudiantesSuplentes);

        $jurados = $jurados->map(function ($jurado) {
            unset($jurado['created_at'], $jurado['updated_at']);
            return $jurado;
        });
        $jurados = $jurados->map(function ($jurado) {
            $jurado['numeroMesa'] = 4; // Asignar el número de mesa 4 a todos los jurados
            return $jurado;
        });
        Jurado::insert($jurados->toArray());
        
        return view('jurado_aleatorio', ['jurados' => $jurados]);
      
    }
    /*
    public function pdf()
    {

        $votantes = Votante::all();
        $pdf = PDF::loadView('poblacion.pdf', ['votantes' => $votantes])->setOptions(['defaultFont' => 'sans-serif']);
        //return $pdf->stream('votantes.pdf');
        return $pdf->download('__votantes.pdf');
    }
    */
    public function guardar_lista(Request $request)
    {
        if (!$request->has('jurados')) {
            // El Request está vacío
            return back()->with('error', 'No hay jurados para guardar');
        }
        $jurados = $request->all();

        if (empty($jurados)) {
            // El Request está vacío
            return back()->with('error', 'No hay jurados para guardar');
        }
        foreach ($jurados as $jurado) {
            $jurado = new Jurado();
            $jurado->sis = $jurado['sis'] ?? '';
            $jurado->nombre = $jurado['nombre'] ?? '';
            $jurado->facultad = $jurado['facultad'] ?? '';
            $jurado->carrera = $jurado['carrera'] ?? '';
            $jurado->ci = $jurado['ci'] ?? '';
            $jurado->gremio = $jurado['gremio'] ?? '';
            $jurado->numeroMesa = 1;
            $jurado->cargo = $jurado['cargo'] ?? '';
            $jurado->save();
        }

        return back()->with('success', 'Jurados guardados exitosamente');
    }
    public function remplazarSS(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'sis' => 'required|integer',
            'menu' => 'required|string',
            'descripcion' => 'required|string',
            'file' => 'required|mimes:pdf',
        ]);

        // Buscar el jurado por sis
        $jurado = Jurado::where('sis', $request->sis)->first();

        if (!$jurado) {
            return back()->withErrors(['sis' => 'No se encontró el jurado']);
        }


        // Buscar un votante aleatorio con la misma facultad, carrera y tipo que no esté en la tabla de jurados
        $votante = Votante::where('facultad', $jurado->facultad)
            ->where('carrera', $jurado->carrera)
            ->where('tipo', $jurado->tipo)
            ->whereNotIn('sis', Jurado::pluck('sis'))
            ->inRandomOrder()
            ->first();

        if (!$votante) {
            return back()->withErrors(['sis' => 'No se encontró un votante adecuado para reemplazar al jurado']);
        }
        $guardarSys = $jurado->sis;
        $guardarCi = $jurado->ci;
        $guardarName =  $jurado->name;
        // Reemplazar el sis y el ci en la tabla de jurados
        $jurado->sis = $votante->sis;
        $jurado->ci = $votante->ci;
        $jurado->name = $votante->name;
        $jurado->save();
        $jurado->sis = $guardarSys;
        $jurado->ci = $guardarCi;
        $jurado->name = $guardarName;

        // Guardar en la tabla de remplazar_jurado
        remplazar_jurado::create([
            'antiguo_sis' => $request->sis,
            'razon' => $request->menu,
            'descripcion' => $request->descripcion,
            'archivo' => $request->file->store('pdfs'),
            'facultad' => $votante->facultad,
            'carrera' => $votante->carrera,
            'tipo' => $votante->tipo,
            'nuevo_sys' => $votante->sis,
        ]);
        //['antiguo_sis', 'razon', 'Descripcion', 'archivo', 'nuevo_sys'];

        // Mostrar los datos
        return view('remplazar', compact('jurado', 'votante'));
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
    public function remplazar_jurado($sis)
    {
        return view('remplazar_jurado', ['sis' => $sis]);
    }
    
}
