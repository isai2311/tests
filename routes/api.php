<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PreguntaController;
use App\Http\Controllers\Api\PruebaController;
use App\Http\Controllers\Api\OpcionController;
use App\Http\Controllers\Api\UsuarioController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('pruebas', [PruebaController::class, 'index']);
Route::get('preguntas/{prueba}', [PreguntaController::class, 'index']);
Route::get('opciones/{pregunta}', [OpcionController::class, 'index']);
Route::get('usuarios/{user}', [UsuarioController::class, 'index']);

