<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Equipo;

class Repuesto extends Model
{
    use HasFactory;
    //public function equipo_repuesto(){
      //  return $this->hasMany('App\Models\Equipo_Repuesto');
      // }


    //relacion de muchos a muchos
       public function repuestosEquipos()
    {
        return $this->belongsToMany('App\Models\Equipo')
        ->withPivot('cant','unidad');
        
        
    } 
}