<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdenTrabajo extends Model
{
    use HasFactory;
    protected $fillable = [
        'equipo_id',
        'de',
        'para',
        'codEquipo',
        'det1',
        'estado',
        'creador',
        
    ];
    

    public function equipos(){

        return $this->belongsTo('App\Models\Equipo'); //Por ahora no cambio conveniccion de nombres
    }
}
