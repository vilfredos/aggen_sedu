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
        /*MESAS*/
        /*asignacion mesas por docente*/

        $id_mesa_docentes = DB::table('mesas')->insertGetId([
            'recinto' => 'No asignado',
            'aula' => 'No asignado',
            'facultad' => 'todos',
            'carrera' => 'todos',
            'gremio' => 'docente',
            'id_eleccion' => $id_eleccion,
        ]);

        $votantesDocentes = DB::table('eleccion_sis')
            ->where('gremio', 'docente')
            ->where('id_eleccion', $id_eleccion)
            ->get();

        foreach ($votantesDocentes as $votante) {
            DB::table('eleccion_votante_mesa')->insert([
                'id_eleccion' => $id_eleccion,
                'sis' => $votante->sis,
                'id_mesa' => $id_mesa_docentes,
            ]);
        }

        /*asignacion mesas por estudiantes*/
        // ... código anterior ...

        $capMaxVotantes = 5;
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
                    'recinto' => 'No asignado',
                    'aula' => 'No asignado',
                    'facultad' => 'todas',
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
        /*asignar comite por facultad*/
        // Definir los cargos
        // Definir los cargos
        $cargosDocentes = ['Presidente', 'Vocal Titular', 'Vocal Titular', 'Vocal Suplente', 'Vocal Suplente', 'Vocal Suplente'];
        $cargosEstudiantes = ['Vocal Titular', 'Vocal Titular', 'Vocal Suplente', 'Vocal Suplente'];

        // Obtener las facultades
        $facultades = DB::table('eleccion_sis')->where('id_eleccion', $id_eleccion)->distinct()->pluck('facultad');

        foreach ($facultades as $facultad) {
            // Seleccionar docentes al azar
            $docentes = DB::table('eleccion_sis')
                ->where('id_eleccion', $id_eleccion)
                ->where('gremio', 'docente')
                ->where('facultad', $facultad)
                ->inRandomOrder()
                ->take(6)
                ->get();

            // Asignar cargos a los docentes
            foreach ($docentes as $index => $docente) {
                DB::table('eleccion_comite')->insert([
                    'id_eleccion' => $id_eleccion,
                    'sis' => $docente->sis,
                    'facultad' => $docente->facultad,
                    'cargo' => $cargosDocentes[$index],
                ]);
            }

            // Seleccionar estudiantes al azar
            $estudiantes = DB::table('eleccion_sis')
                ->where('id_eleccion', $id_eleccion)
                ->where('gremio', 'estudiante')
                ->where('facultad', $facultad)
                ->inRandomOrder()
                ->take(4)
                ->get();

            // Asignar cargos a los estudiantes
            foreach ($estudiantes as $index => $estudiante) {
                DB::table('eleccion_comite')->insert([
                    'id_eleccion' => $id_eleccion,
                    'sis' => $estudiante->sis,
                    'facultad' => $estudiante->facultad,
                    'cargo' => $cargosEstudiantes[$index],
                ]);
            }
            /*jurados*/

            // Primero, obtenemos los datos de las mesas y elecciones
            $mesas = DB::table('mesas')->where('id_eleccion', $id_eleccion)->get();
            $eleccion_sis = DB::table('eleccion_sis')->where('id_eleccion', $id_eleccion)->get();

            // Luego, iteramos sobre cada mesa
            foreach ($mesas as $mesa) {
                // Obtenemos los docentes y estudiantes de eleccion_sis que no están en eleccion_comite
                $docentes = $eleccion_sis->where('cargo', 'docente')->whereNotIn('sis', function ($query) {
                    $query->select('sis')->from('eleccion_comite');
                })->take(5);

                $estudiantes = $eleccion_sis->where('cargo', 'estudiante')->whereNotIn('sis', function ($query) {
                    $query->select('sis')->from('eleccion_comite');
                })->take(4);

                // Asignamos los cargos a los docentes
                $cargos_docentes = ['Presidente', 'Titular', 'Titular Suplente', 'Suplente'];
                foreach ($docentes as $index => $docente) {
                    DB::table('eleccion_jurados')->insert([
                        'id_eleccion' => $id_eleccion,
                        'sis' => $docente->sis,
                        'cargo' => $cargos_docentes[$index],
                        'id_mesa' => $mesa->id,
                    ]);
                }

                // Asignamos los cargos a los estudiantes
                $cargos_estudiantes = ['Titular', 'Titular Suplente', 'Suplente'];
                foreach ($estudiantes as $index => $estudiante) {
                    DB::table('eleccion_jurados')->insert([
                        'id_eleccion' => $id_eleccion,
                        'sis' => $estudiante->sis,
                        'cargo' => $cargos_estudiantes[$index],
                        'id_mesa' => $mesa->id,
                    ]);
                }
            }
        }
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
