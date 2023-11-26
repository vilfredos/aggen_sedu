<?php

namespace App\Http\Controllers;

use App\Models\Comite;
use Illuminate\Http\Request;

use App\Exports\VotanteExport;
use App\Imports\VotanteImport;
use App\Models\Votante;

use Illuminate\Support\Facades\Validator; // Importa la clase Validator aquí


class ComiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('comite');

    }

    public function create()
    {


        $vocalesTitularesDocentes = Votante::where('tipo', 'DOCENTE')->inRandomOrder()->take(3)->pluck('name');
        $vocalesSuplentesDocentes = Votante::where('tipo', 'DOCENTE')->inRandomOrder()->take(3)->pluck('name');
        $vocalesTitularesEstudiantes = Votante::where('tipo', 'ESTUDIANTE')->inRandomOrder()->take(2)->pluck('name');
        $vocalesSuplentesEstudiantes = Votante::where('tipo', 'ESTUDIANTE')->inRandomOrder()->take(2)->pluck('name');
    
        return view('comite', [
            'vocalesTitularesDocentes' => $vocalesTitularesDocentes,
            'vocalesSuplentesDocentes' => $vocalesSuplentesDocentes,
            'vocalesTitularesEstudiantes' => $vocalesTitularesEstudiantes,
            'vocalesSuplentesEstudiantes' => $vocalesSuplentesEstudiantes,
        ]);



    
    }

    public function store(Request $request)
{



    $request->validate([

        'rector' => 'required|string', 
        'docenteTitular1' => 'required|string',
        'docenteTitular2' => 'required|string',
        'docenteTitular3' => 'required|string',
        'docenteSuplente1' => 'required|string',
        'docenteSuplente2' => 'required|string',
        'docenteSuplente3' => 'required|string',
        'estudianteTitular1' => 'required|string',
        'estudianteTitular2' => 'required|string',
        'estudianteSuplente1' => 'required|string',
        'estudianteSuplente2' => 'required|string',

    ]);

    $comite = new Comite;
    $comite->Rector = $request->rector;
    $comite->VocalDocenteTitular1 = $request->docenteTitular1;
    $comite->VocalDocenteTitular2 = $request->docenteTitular2;
    $comite->VocalDocenteTitular3 = $request->docenteTitular3;
    $comite->VocalDocenteSuplente1 = $request->docenteSuplente1;
    $comite->VocalDocenteSuplente2 = $request->docenteSuplente2;
    $comite->VocalDocenteSuplente3 = $request->docenteSuplente3;
    $comite->VocalEstudianteTitular1 = $request->estudianteTitular1;
    $comite->VocalEstudianteTitular2 = $request->estudianteTitular2;
    $comite->VocalEstudianteSuplente1 = $request->estudianteSuplente1;
    $comite->VocalEstudianteSuplente2 = $request->estudianteSuplente2;

    $comite->save();

    return redirect('/papeleta')->with('success', 'Miembros del Comite Registrado exitosamente');

    /* ANTERIOR
    // Validar los datos recibidos del formulario
    $validator = Validator::make($request->all(), [
        'rector' => 'required|string',
        'docenteTitular1' => 'required|string',
        'docenteTitular2' => 'required|string',
        'docenteTitular3' => 'required|string',
        'docenteSuplente1' => 'required|string',
        'docenteSuplente2' => 'required|string',
        'docenteSuplente3' => 'required|string',
        'estudianteTitular1' => 'required|string',
        'estudianteTitular2' => 'required|string',
        'estudianteSuplente1' => 'required|string',
        'estudianteSuplente2' => 'required|string',
        // Agrega las validaciones para los demás campos
    ]);

    // Si la validación falla, redirige de nuevo al formulario con un mensaje de error
    if ($validator->fails()) {
        return redirect('/comite')
            ->withErrors($validator)
            ->withInput();
    }

    // Crear una nueva instancia del modelo Comite y asignar el nombre del rector
    $comite = new Comite();
    $comite->Nombre = $request->input('rector');
    $comite->save();

    // Obtener los datos restantes de la tabla votantes y guardarlos en la tabla comite
    $this->guardarDatosComite($request->input('docenteTitular1'), $comite);
    $this->guardarDatosComite($request->input('docenteTitular2'), $comite);
    $this->guardarDatosComite($request->input('docenteTitular3'), $comite);
    $this->guardarDatosComite($request->input('docenteSuplente1'), $comite);
    $this->guardarDatosComite($request->input('docenteSuplente2'), $comite);
    $this->guardarDatosComite($request->input('docenteSuplente3'), $comite);
    $this->guardarDatosComite($request->input('estudianteTitular1'), $comite);
    $this->guardarDatosComite($request->input('estudianteTitular2'), $comite);
    $this->guardarDatosComite($request->input('estudianteSuplente1'), $comite);
    $this->guardarDatosComite($request->input('estudianteSuplente2'), $comite);

    // Repite este proceso para los demás campos (docenteTitular2, docenteTitular3, ...)
    // ...

    // Redirigir a la página de papeleta con un mensaje de éxito
    return redirect('/papeleta')->with('success', 'Miembros del Comite Registrado exitosamente');
    }

    // Método para guardar los datos restantes en la tabla comite
    private function guardarDatosComite($nombreVotante, $comite)
    {
    // Buscar el votante en la tabla votantes por el nombre
    $votante = Votante::where('name', $nombreVotante)->first();

    // Verificar si el votante existe antes de intentar acceder a sus propiedades
    if ($votante) {
        $comite->Ci = (int) $votante->ci; // Convertir a entero si es necesario
        $comite->Facultad = $votante->facultad;
        $comite->Gremio = $votante->tipo;
        $comite->save();
    }

/* EL QUE FUNCIONA

    $request->validate([

        'rector' => 'required|string', 
        'docenteTitular1' => 'required|string',
        'docenteTitular2' => 'required|string',
        'docenteTitular3' => 'required|string',
        'docenteSuplente1' => 'required|string',
        'docenteSuplente2' => 'required|string',
        'docenteSuplente3' => 'required|string',
        'estudianteTitular1' => 'required|string',
        'estudianteTitular2' => 'required|string',
        'estudianteSuplente1' => 'required|string',
        'estudianteSuplente2' => 'required|string',

    ]);

    $comite = new Comite;
    $comite->Rector = $request->rector;
    $comite->VocalDocenteTitular1 = $request->docenteTitular1;
    $comite->VocalDocenteTitular2 = $request->docenteTitular2;
    $comite->VocalDocenteTitular3 = $request->docenteTitular3;
    $comite->VocalDocenteSuplente1 = $request->docenteSuplente1;
    $comite->VocalDocenteSuplente2 = $request->docenteSuplente2;
    $comite->VocalDocenteSuplente3 = $request->docenteSuplente3;
    $comite->VocalEstudianteTitular1 = $request->estudianteTitular1;
    $comite->VocalEstudianteTitular2 = $request->estudianteTitular2;
    $comite->VocalEstudianteSuplente1 = $request->estudianteSuplente1;
    $comite->VocalEstudianteSuplente2 = $request->estudianteSuplente2;

    $comite->save();

    return redirect('/papeleta')->with('success', 'Miembros del Comite Registrado exitosamente');
*/
}

    public function show(Comite $comite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comite  $comite
     * @return \Illuminate\Http\Response
     */
    public function edit(Comite $comite)
    {

        return view('modificacionComite', compact('comite'));

        /*return view('modificacionComite');*/
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comite  $comite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comite $comite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comite  $comite
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comite $comite)
    {
        //
    }
}
