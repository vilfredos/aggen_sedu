<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\VotanteController;
use App\Models\Votante;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\EleccionController;
use App\Models\Eleccion;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserSettingsController;
use App\Http\Controllers\ComiteController;
use App\Http\Controllers\VotacionController;
use App\Http\Controllers\pages\Backups;
use App\Http\Controllers\ActivityLogController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::resource('roles', RolController::class);
    Route::resource('usuarios', UsuarioController::class);
    Route::resource('elecciones', EleccionController::class);
});

Route::get('/NewPassword',  [UserSettingsController::class, 'NewPassword'])->name('NewPassword')->middleware('auth');
Route::post('/change/password',  [UserSettingsController::class, 'changePassword'])->name('changePassword');
Route::resource('cierreActa', 'ActaController');

Route::get('poblacion', [VotanteController::class, 'index'])->name('poblacion.index');
Route::post('votante', [VotanteController::class, 'import'])->name('votante.import');

Route::get('/', [VotanteController::class, 'pdf']);
Route::get('poblacion/pdf', [VotanteController::class, 'pdf'])->name('poblacion.pdf');

Route::get('poblacion/seleccionar', [VotanteController::class, 'seleccionarTipo']);
Route::post('/buscar-votantes', [VotanteController::class, 'obtenerVotantes'])->name('votantes.buscar');


Route::get('/cierreActa', function () {
    return view('cierreActa');
});
Route::get('/', function () {
    return view('elecciones');
});

Route::get('/eleccion', function () {
    return view('elecciones');
});
Route::get('/inicio', function () {
    return view('inicio');
});
Route::get('/user', function () {
    return view('user');
});
Route::get('/inicioActa', function () {
    return view('inicioActa');
});


Route::get('/historicoResultados', function () {
    return view('historicoResultados');
});


/*Route::get('/modificacionComite', function () {
    return view('modificacionComite');
});*/



Route::get('/papeleta', function () {
    return view('papeleta');
});

Route::get('/mesa', function () {
    return view('mesa');
});
/*para los controladores*/


/*para la base de datos */


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/resultados', [JuradoController::class, 'store']);

Route::get('/resultados', function () {
    return view('resultados');
});


/*Route::get('/jurado_aleatorio', 'App\Http\Controllers\JuradoController@seleccionarJurados');
*/

use App\Http\Controllers\VotosMesaController;

Route::get('/acta_escrutino', function () {
    return view('acta_escrutino');
});

Route::post('/acta_escrutino', 'App\Http\Controllers\VotosMesaController@store');

Route::get('/votosPorMesa', function () {
    return view('votosPorMesa');
});
Route::get('/votosPorMesa', 'App\Http\Controllers\VotosMesaController@mostrar');

Route::get('/ver_lista_jurados', 'App\Http\Controllers\JuradoController@mostrar');


//desde aca modificado

use App\Http\Controllers\ConvocatoriaController;
/*
Route::middleware(['web'])->group(function () {

    Route::get('/convocatoria', [ConvocatoriaController::class, 'create']);
    Route::post('/convocatoria', 'App\Http\Controllers\ConvocatoriaController@store');
});*/

//Comite



Route::middleware(['web'])->group(function () {

    Route::get('/comite', [ComiteController::class, 'create']);
    Route::post('/comite', 'App\Http\Controllers\ComiteController@store');
});


//Route::get('/modificacionComite', [ComiteController::class, 'edit']);//->name('comite.edit');





Route::get('/jurado_aleatorio', function () {
    return view('/jurado_aleatorio');
});


use App\Http\Controllers\JuradoController;

Route::get('/jurado_aleatorio', 'App\Http\Controllers\JuradoController@seleccionarJurados');
Route::post('/jurado_aleatorio', [JuradoController::class, 'guardar_lista'])->name('jurado_aleatorio.guardar_lista');

//Route::post('/guardar-jurados', 'App\Http\Controllers\JuradoController@guardar_lista');

Route::post('/jurado', [JuradoController::class, 'store'])->name('jurado.store');

Route::get('/jurado', function () {
    return view('jurado');
});

Route::get('/jurado_remplazar', function () {
    return view('jurado_remplazar');
});

Route::post('/jurado_remplazar', [JuradoController::class, 'remplazar']);

Route::get('/remplazar', function () {
    return view('remplazar');
});

//use App\Http\Controllers\ListamesasController;

//Route::get('/listamesas', 'App\Http\Controllers\ListamesasController@mostrarListadoMesas');

Route::get('/elecciones_ofi', function () {
    return view('elecciones_ofi');
});

Route::get('/votantes_por_mesa', 'App\Http\Controllers\VotosMesaController@mostrarEleccion');

Route::post('/agregar', 'TuControlador@agregar');
Route::post('/eliminar', 'TuControlador@eliminar');
Route::post('/votantes_por_mesa', 'App\Http\Controllers\VotosMesaController@otros');

Route::get('/papeleta/{id_eleccion}', 'App\Http\Controllers\VotosMesaController@papeleta');

Route::get('/frente/{id_eleccion}', 'App\Http\Controllers\FrenteController@frente');

Route::post('/frente', 'App\Http\Controllers\FrenteController@store')->name('frente.store');

//Route::post('/frente', 'App\Http\Controllers\FrenteController@store');


//panel
Route::get('panel/', function () {
    return view('panel.index');
});
//backups
Route::get('panel/backups', [Backups::class, 'index'])->name('pages-backups');
Route::post('panel/backups/create', [Backups::class, 'create'])->name('pages-backups-create');
Route::get('panel/bitacora', [ActivityLogController::class, 'index'])->name('bitacora-index');



use App\Http\Controllers\MesaController;

Route::post('/registrar-mesa', [MesaController::class, 'registrar'])->name('registrarMesa');

// Ruta para adjuntar votantes a mesas
Route::post('/adjuntar-votantes', [MesaController::class, 'adjuntarVotantes'])->name('adjuntarVotantes');

// Ruta para mostrar el listado de mesas
//Route::get('/listamesas', [MesaController::class, 'mostrarListadoMesa'])->name('listamesas');
Route::get('/ActaDeInicio', function () {
    return view('ActaDeInicio');
});
Route::get('/listamesas/{id_eleccion}', 'App\Http\Controllers\MesaController@listamesas');
Route::get('/lista_comite/{id_eleccion}', 'App\Http\Controllers\ComiteController@mostrar');

Route::get('/convocatoria', 'App\Http\Controllers\ConvocatoriaController@create');
Route::post('/convocatoria', 'App\Http\Controllers\ConvocatoriaController@store')->name('convocatoria.store');
Route::get('/asignacion', [MesaController::class, 'mostrarVistaAsignacion'])->name('mostrarVistaAsignacion');
Route::post('/guardar-asignacion', [MesaController::class, 'guardarAsignacion'])->name('guardarAsignacion');

Route::get('/votante_mesa/{num_mesa}', 'App\Http\Controllers\MesaController@ver_votantes');
Route::get('/agregarInfo', function () {
    return view('agregarInfo');
});
Route::get('/agregarInfo/{numeroMesa}', 'App\Http\Controllers\MesaController@agregarInfo')->name('agregarInfo');
Route::patch('/guardar-informacion/{numeroMesa}', 'App\Http\Controllers\MesaController@guardarInformacion')->name('guardarInformacion');
Route::get('/ActaDeInicio/{numeroMesa}', 'App\Http\Controllers\MesaController@mostrarActaDeInicio');
