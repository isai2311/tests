<?php

use App\Http\Controllers\Usuario\UsuarioController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Controllers
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BMenu\BMenuController;
use App\Http\Controllers\Prueba\PruebaController;
use App\Http\Controllers\Pregunta\PreguntaController;
use App\Http\Controllers\Opcion\OpcionController;



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

 Route::get('/', function () {
    return view('auth.login');
});
Auth::routes();

Route::group(['middleware' => 'auth'], function () {

    Route::get('menu', [BMenuController::class, 'index'])->name('menu');
    Route::get('home', [HomeController::class, 'index'])->name('home');

    Route::get('pruebas/paginado', [PruebaController::class, 'paginate']);
    Route::get('pruebas/usuario', [PruebaController::class, 'usuarios']);
    Route::post('preguntas/cargar/{prueba}', [PruebaController::class, 'importarPreguntas']);
    Route::resource('pruebas',PruebaController::class, ['only'=>['index','show','store', 'update', 'destroy']]);
    Route::resource('preguntas',PreguntaController::class, ['only'=>['destroy']]);
    Route::resource('opciones',OpcionController::class, ['only'=>['destroy']]);
    Route::get('template/excel', [PruebaController::class, 'downloadTemplateExcel']);
    Route::resource('usuarios',UsuarioController::class, ['only'=>['index','show','store', 'update', 'destroy']]);
    Route::get('usuarios/paginado', [UsuarioController::class, 'paginate']);

});
