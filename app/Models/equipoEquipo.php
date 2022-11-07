<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class equipoEquipo extends Model
{
    use HasFactory;
     //Importantisimo personalisar el nombre de la tabla, sobre todo en tablas pivot!!!!!
     protected $table = 'equipo_equipos';
     protected $fillable =['equipo_id',
     'vinc_id'
     ];
    public function equiposAEquiposB(){
         return $this->belongsTo('App\Models\Equipo');
     }
     public function equiposBEquiposA(){
         return $this->belongsTo('App\Models\Equipo');
     }
}
