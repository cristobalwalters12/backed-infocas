<?php

namespace App\Http\Controllers;

use App\Models\nombreSensor;
use Illuminate\Http\Request;

class nombreSensorController extends Controller
{

    public function index()
    {
        $nombre = nombreSensor::all();
        return response()->json($nombre);
    }   
    
    public function getNombre(Request $req)
    {
        $nombre = nombreSensor::where('id_sensor', $req->id_sensor)->first();
        return response()->json($nombre);   
    }
}
