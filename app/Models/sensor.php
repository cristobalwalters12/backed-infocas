<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RespaldoSensor extends Model
{
    protected $table = 'respaldo_sensores';

    protected $primaryKey = 'numero_registro';

    public $incrementing = true;

    public $timestamps = false;

    protected $fillable = [
        'id_sensor', 
        'temperatura', 
        'humedad', 
        'fecha', 
        'hora'
    ];

    protected $casts = [
        'temperatura' => 'float',
        'humedad' => 'float',
        'fecha' => 'date',
        'hora' => 'time',
    ];

    public function nombreSensor()
    {
        return $this->belongsTo(nombreSensor::class, 'id_sensor');
    }
}