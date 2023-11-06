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

use App\Http\Controllers\ComiteController;




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

Route::group(['middleware' =>['auth']], function(){
    Route::resource('roles', RolController::class);
    Route::resource('usuarios', UsuarioController::class);
    Route::resource('elecciones', EleccionController::class);

});

Route::resource('cierreActa', 'ActaController');

Route::get('/poblacion',[VotanteController::class,'index']);
Route::post('votante',[VotanteController::class,'import'])->name('votante.import');

Route::get('/',[VotanteController::class,'pdf']);

Route::get('poblacion/pdf' ,[VotanteController::class,'pdf'])->name('poblacion.pdf');

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

/*para la segunda fase*/
Route::get('/comvocatoria', function () {
    return view('comvocatoria');
});
Route::get('/frente', function () {
    return view('frente');
});
Route::get('/comite', function () {
    return view('comite');
});

Route::get('/modificacionComite', function () {
    return view('modificacionComite');
});



Route::get('/papeleta', function () {
    return view('papeleta');
});
Route::get('/jurado', function () {
    return view('jurado');
});

Route::get('/mesa', function () {
    return view('mesa');
});
Route::get('/frente', function () {
    return view('frente');
});
/*para los controladores*/


/*para la base de datos */

use App\Http\Controllers\JuradoController;

Route::post('/jurado', [JuradoController::class, 'store'])->name('jurado.store');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login',[LoginController::class,'login']);
Route::post('logout',[LoginController::class,'logout'])->name('logout');


Route::get('/resultados', [JuradoController::class, 'store']);

Route::get('/resultados', function () {
    return view('resultados');
});

use App\Http\Controllers\VotosMesaController;

Route::get('/acta_escrutino', function () {
    return view('acta_escrutino');
});

Route::post('/acta_escrutino', 'App\Http\Controllers\VotosMesaController@store');

Route::get('/votosPorMesa', function () {
    return view('votosPorMesa');
});
Route::get('/votosPorMesa', 'App\Http\Controllers\VotosMesaController@mostrar');

//desde aca modificado

use App\Http\Controllers\ConvocatoriaController;

Route::post('/convocatoria', [ConvocatoriaController::class, 'store'])->name('convocatoria.store');

/*Route::get('/resultados', [JuradoController::class, 'store']);

Route::get('/resultados', function () {
    return view('resultados');
});*/

//Comite

Route::get('/miembroscomite', [ComiteController::class, 'index'])->name('comite.index');

Route::get('/comite', [ComiteController::class, 'create'])->name('comite.create');
Route::get('/modificacionComite', [ComiteController::class, 'edit'])->name('comite.edit');