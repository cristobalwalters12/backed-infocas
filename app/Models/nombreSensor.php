<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nombreSensor extends Model
{
    use HasFactory;
    protected $table = 'nombres_sensores';

    protected $primaryKey = 'id_sensor';

    public $incrementing = true;

    public $timestamps = false;

    protected $fillable = [
        'nombre_sensor',
    ];

    public function sensores()
    {
        return $this->hasMany(RespaldoSensor::class, 'id_sensor');
    }
}
