<?php

use App\Http\Controllers\nombreSensorController;
use App\Http\Controllers\SensorController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/nombre-sensor', [nombreSensorController::class, 'index']);
Route::get('/nombre-sensor/{id_sensor}', [nombreSensorController::class, 'getNombre']); 
Route::get('/sensor', [SensorController::class, 'getData']);
Route::get('/', function () {
    return view('welcome');
});
