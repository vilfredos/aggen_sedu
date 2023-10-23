<?php

use App\Http\Controllers\VotanteController;
use App\Models\Votante;
use Illuminate\Support\Facades\Route;

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
Route::get('/resultados', function () {
    return view('resultados');
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