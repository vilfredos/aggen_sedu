<?php

namespace App\Http\Controllers;

use App\Models\Convocatoria;
use Illuminate\Http\Request;
use App\Http\Requests\StoreConvocatoriaRequest;
use App\Http\Requests\UpdateConvocatoriaRequest;
use Illuminate\Support\Facades\Validator; // Importa la clase Validator aquí
use Illuminate\Support\Facades\DB;

//use Illuminate\Http\Request;

class ConvocatoriaController extends Controller
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

    public function create()
    {
        return view('convocatoria');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /*
    public function store(Request $request)
    {
        $input = $request->all();
        $id_eleccion = DB::table('eleccion')->insertGetId($input);
        foreach ($input['cargos'] as $cargo) {
            DB::table('eleccion_cargo')->insert(['id_eleccion' => $id_eleccion, 'cargo_postular' => $cargo]);
        }
        $facultad = $request->input('facultad');
        $carrera = $request->input('carrera');
        $votantes = ['estudiantes' => DB::table('estudiantes'), 'docentes' => DB::table('docentes')];
        foreach ($votantes as $gremio => $votante) {
            if (!empty($facultad)) $votante->where('facultad', $facultad);
            if (!empty($carrera)) $votante->where('carrera', $carrera);
            foreach ($votante->get() as $v) {
                DB::table('eleccion_sis')->insert(['id_eleccion' => $id_eleccion, 'sis' => $v->sis, 'facultad' => $v->facultad, 'carrera' => $v->carrera, 'gremio' => $gremio]);
            }
        }
        $mesas = ['docentes' => DB::table('mesas')->insertGetId(['numeroMesa' => DB::table('mesas')->max('numeroMesa') + 1, 'recinto' => ' ', 'aula' => ' ', 'facultad' => 'todos', 'carrera' => 'todos', 'gremio' => 'docente', 'id_eleccion' => $id_eleccion])];
        $carreras = DB::table('eleccion_sis')->where('gremio', 'estudiante')->distinct()->pluck('carrera');
        foreach ($carreras as $carrera) {
            $mesas[$carrera] = DB::table('mesas')->insertGetId(['numeroMesa' => DB::table('mesas')->max('numeroMesa') + 1, 'recinto' => null, 'aula' => null, 'facultad' => 'todos', 'carrera' => $carrera, 'gremio' => 'estudiante', 'id_eleccion' => $id_eleccion]);
        }
        foreach ($votantes as $gremio => $votante) {
            foreach ($votante->get() as $v) {
                DB::table('eleccion_votante_mesa')->insert(['id_eleccion' => $id_eleccion, 'sis' => $v->sis, 'id_mesa' => $mesas[$gremio == 'docentes' ? 'docentes' : $v->carrera]]);
            }
        }
        return back()->with('success', 'Formulario enviado exitosamente!');
    }*/
    public function store(Request $request)
    {
        /*
        $request->validate([
            'titulo' => 'required',
            'descripcion' => 'required',
            'fecha_ini' => 'required|date',
            'ficha_fin' => 'required|date',
            'convocatoria' => 'required|mimes:pdf|max:2048',
            'cargos' => 'required|array',
            'cargos.*' => 'required|string',
        ]);*/

        $input = $request->all();


        // Crear una nueva elección
        $id_eleccion = DB::table('eleccion')->insertGetId([
            'titulo' => $input['titulo'],
            'descripcion' => $input['descripcion'],
            'fecha_ini' => $input['fecha_ini'],
            'ficha_fin' => $input['ficha_fin'],
            'convocatoria' => $input['pdf'],
        ]);
        // Crear los cargos para la elección
        foreach ($input['cargos'] as $cargo) {
            DB::table('eleccion_cargo')->insert([
                'id_eleccion' => $id_eleccion,
                'cargo_postular' => $cargo,
            ]);
        }
        ///
        $facultad = $request->input('facultad');
        $carrera = $request->input('carrera');

        // Obtener votantes de la tabla de estudiantes
        $votantesEstudiantes = DB::table('estudiantes');

        if (!empty($facultad)) {
            $votantesEstudiantes->where('facultad', $facultad);
        }

        if (!empty($carrera)) {
            $votantesEstudiantes->where('carrera', $carrera);
        }

        // Obtener votantes de la tabla de docentes
        $votantesDocentes = DB::table('docentes');

        if (!empty($facultad)) {
            $votantesDocentes->where('facultad', $facultad);
        }

        if (!empty($carrera)) {
            $votantesDocentes->where('carrera', $carrera);
        }

        // Unir las consultas de votantes de estudiantes y docentes
        $votantesEstudiantes = $votantesEstudiantes->get();
        $votantesDocentes = $votantesDocentes->get();

        foreach ($votantesEstudiantes as $votante) {
            DB::table('eleccion_sis')->insert([
                'id_eleccion' => $id_eleccion,
                'sis' => $votante->sis,
                'facultad' => $votante->facultad,
                'carrera' => $votante->carrera,
                'gremio' => 'estudiante', // Agrega esta línea
            ]);
        }

        foreach ($votantesDocentes as $votante) {
            DB::table('eleccion_sis')->insert([
                'id_eleccion' => $id_eleccion,
                'sis' => $votante->sis,
                'facultad' => $votante->facultad,
                'carrera' => $votante->carrera,
                'gremio' => 'docente', // Agrega esta línea
            ]);
        }

       /*asignacion mesas por docente*/

        $id_mesa_docentes = DB::table('mesas')->insertGetId([
            'numeroMesa' => DB::table('mesas')->max('numeroMesa') + 1, // Incrementa el número de mesa
            'recinto' => 'No asignado',
            'aula' => 'No asignado',
            'facultad' => 'todos',
            'carrera' => 'todos',
            'gremio' => 'docente',
            'id_eleccion' => $id_eleccion,

            
        ]);

        $votantesDocentes = DB::table('eleccion_sis')->where('gremio', 'docente')->get();

        foreach ($votantesDocentes as $votante) {
            DB::table('eleccion_votante_mesa')->insert([
                'id_eleccion' => $id_eleccion,
                'sis' => $votante->sis,
                'id_mesa' => $id_mesa_docentes,
            ]);
        }

           /*asignacion mesas por estudiantes*/  
     // ... código anterior ...

     $capMaxVotantes = 2;
     $carreras = DB::table('eleccion_sis')
         ->where('gremio', 'estudiante')
         ->where('id_eleccion', $id_eleccion)
         ->distinct()
         ->pluck('carrera');
 
     foreach ($carreras as $carrera) {
         $votantesEstudiantes = DB::table('eleccion_sis')
             ->where('gremio', 'estudiante')
             ->where('carrera', $carrera)
             ->where('id_eleccion', $id_eleccion)
             ->get();
 
         $chunks = $votantesEstudiantes->chunk($capMaxVotantes);
 
         foreach ($chunks as $chunk) {
             $id_mesa = DB::table('mesas')->insertGetId([
                 'numeroMesa' => DB::table('mesas')->max('numeroMesa') + 1,
                 'recinto' => 'No asignado',
                 'aula' => 'No asignado',
                 'facultad' => 'todos',
                 'carrera' => $carrera,
                 'gremio' => 'estudiante',
                 'id_eleccion' => $id_eleccion,
             ]);
 
             foreach ($chunk as $votante) {
                 DB::table('eleccion_votante_mesa')->insert([
                     'id_eleccion' => $id_eleccion,
                     'sis' => $votante->sis,
                     'id_mesa' => $id_mesa,
                 ]);
             }
         }
     }
        //return view('poblacion.mostrar', compact('votantes'));

        return back()->with('success', 'Formulario enviado exitosamente!');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Convocatoria  $convocatoria
     * @return \Illuminate\Http\Response
     */
    public function edit(Convocatoria $convocatoria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Convocatoria  $convocatoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Convocatoria $convocatoria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Convocatoria  $convocatoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Convocatoria $convocatoria)
    {
        //
    }
}
