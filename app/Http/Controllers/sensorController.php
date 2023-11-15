<?php

namespace App\Http\Controllers;
use App\Models\sensor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class sensorController extends Controller
{
    public function getData(Request $req){
        try {
            $req->validate([
                'id_sensor' => 'required',
                'start' => 'required',
                'end' => 'required',
            ]);
    
            $start = Carbon::parse($req->start);
            $end = Carbon::parse($req->end);
    
            $data = Sensor::where('id_sensor', $req->id_sensor)
                ->whereBetween(DB::raw('CONCAT(fecha, " ", hora)'), [$start->format('Y-m-d H:i:s'), $end->format('Y-m-d H:i:s')])
                ->get();
    
            return response()->json($data);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

}
