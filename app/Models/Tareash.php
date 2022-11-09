<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tareash extends Model
{
    use HasFactory;
     //Importantisimo personalisar el nombre de la tabla, sobre todo en tablas pivot!!!!!
     protected $table = 'tareashes';
     protected $fillable =['equipo_id',
     'tarea_id'
     ];
 
 
     public function tareasEquipos(){
         return $this->belongsTo('App\Models\Equipo');
     }
     public function equiposTareas(){
         return $this->belongsTo('App\Models\Tarea');
     }
     
    
    
}
