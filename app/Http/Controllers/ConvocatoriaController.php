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

        $capMaxVotantes = 28;
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
                DB::commit();
            }
        }
        /*asignar comite por facultad*/
        // Definir los cargos
        // Definir los cargos
        $cargosDocentes = ['Docente Presidente', 'Docente Vocal Titular', 'Docente Vocal Titular', 'Docente Vocal Suplente', 'Docente Vocal Suplente', 'Docente Vocal Suplente'];
        $cargosEstudiantes = ['Estudiante Vocal Titular', 'Estudiante Vocal Titular', 'Estudiante Vocal Suplente', 'Estudiante Vocal Suplente'];

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
        }
        /*jurados*/
        // Obtén todas las mesas para la elección dada
        $mesas = DB::table('mesas')->where('id_eleccion', $id_eleccion)->get();
        $cargosEstudiantes = ['Estudiante Titular', 'Estudiante Titular', 'Estudiante Suplente', 'Estudiante Suplente'];
        $cargosDocentes = ['Docente Presidente', 'Docente Titular', 'Docente Titular', 'Docente Suplente', 'Docente Suplente'];

        // Itera sobre cada mesa
        foreach ($mesas as $mesa) {
            // Asigna los cargos a los docentes
            $cargosDocentes = ['Presidente', 'Titular', 'Suplente', 'Suplente'];
            foreach ($cargosDocentes as $cargo) {
                // Selecciona un docente al azar que no sea jurado en otra mesa y no pertenezca al comité
                $docente = DB::table('eleccion_sis')
                    ->where('id_eleccion', $id_eleccion)
                    ->where('gremio', 'docente')
                    ->whereNotIn('sis', function ($query) use ($id_eleccion) {
                        $query->select('sis')->from('eleccion_jurados')->where('id_eleccion', $id_eleccion);
                    })
                    ->whereNotIn('sis', function ($query) use ($id_eleccion) {
                        $query->select('sis')->from('eleccion_comite')->where('id_eleccion', $id_eleccion);
                    })
                    ->inRandomOrder()
                    ->first();

                // Inserta el docente en el jurado
                DB::table('eleccion_jurados')->insert([
                    'id_eleccion' => $id_eleccion,
                    'sis' => $docente->sis,
                    'cargo' => $cargo,
                    'id_mesa' => $mesa->numeroMesa,
                ]);
            }

            // Asigna los cargos a los estudiantes
            $cargosEstudiantes = ['Titular', 'Titular', 'Suplente', 'Suplente'];
            foreach ($cargosEstudiantes as $cargo) {
                // Selecciona un estudiante al azar que no sea jurado en otra mesa y no pertenezca al comité
                $estudiante = DB::table('eleccion_sis')
                    ->where('id_eleccion', $id_eleccion)
                    ->where('gremio', 'estudiante')
                    ->whereNotIn('sis', function ($query) use ($id_eleccion) {
                        $query->select('sis')->from('eleccion_jurados')->where('id_eleccion', $id_eleccion);
                    })
                    ->whereNotIn('sis', function ($query) use ($id_eleccion) {
                        $query->select('sis')->from('eleccion_comite')->where('id_eleccion', $id_eleccion);
                    })
                    ->inRandomOrder()
                    ->first();

                // Inserta el estudiante en el jurado
                DB::table('eleccion_jurados')->insert([
                    'id_eleccion' => $id_eleccion,
                    'sis' => $estudiante->sis,
                    'cargo' => $cargo,
                    'id_mesa' => $mesa->numeroMesa,
                ]);
            }
        }
        $this->actualizarMesas();
        $this->updateAllRecintos();
        return redirect()->route('votantes_por_mesa')->with('success', '¡Registro realizado correctamente!');
    }
    public function actualizarMesas() {
        $mesas = DB::table('mesas')->get();
            
        foreach ($mesas as $mesa) {
            // Busca el docente correspondiente
            $docente = DB::table('docentes')->where('carrera', $mesa->carrera)->first();
    
            // Si encontramos un docente, actualizamos la facultad
            if ($docente) {
                DB::table('mesas')->where('numeroMesa', $mesa->numeroMesa)->update(['facultad' => $docente->facultad]);
            }
    
            // Busca la ubicación de la facultad
            $facultadUbicacion = DB::table('facultad_ubicacion')->where('facultad', $mesa->facultad)->first();
    
            // Si encontramos una ubicación, actualizamos el recinto
            if ($facultadUbicacion) {
                DB::table('mesas')->where('numeroMesa', $mesa->numeroMesa)->update(['recinto' => $facultadUbicacion->ubicacion]);
            }
        }
    }
    public function updateAllRecintos()
    {
        // Actualiza todas las mesas con recinto 'No asignado'
        DB::table('mesas')
            ->where('recinto', 'No asignado')
            ->update(['recinto' => 'https://maps.app.goo.gl/uaUGUXdJZLmMqPbh8']);

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
