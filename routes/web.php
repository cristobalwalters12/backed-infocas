<?php

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
Route::get('/nombre-sensor', [RespaldoNombreSensorController::class, 'index']);
Route::get('/nombre-sensor/{id_sensor}', [RespaldoNombreSensorController::class, 'getNombre']); 

Route::get('/', function () {
    return view('welcome');
});
