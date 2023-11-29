<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\nombreSensorController;
use App\Http\Controllers\SensorController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/nombreSensor', 'nombreSensorController@index');
Route::post('/nombreSensor/{id_sensor}', 'nombreSensorController@getNombre');
Route::get('/nombre-sensor', [nombreSensorController::class, 'index']);
Route::get('/nombre-sensor/{id_sensor}', [nombreSensorController::class, 'getNombre']); 
Route::get('/sensor', [SensorController::class, 'getData']);



Route::post('/login', [UsuarioController::class, 'auth'])->name('login');
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
