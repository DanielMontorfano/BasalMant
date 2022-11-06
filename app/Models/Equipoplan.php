<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipoplan extends Model
{
    use HasFactory;
    //Importantisimo personalisar el nombre de la tabla, sobre todo en tablas pivot!!!!!
    protected $table = 'equipoplans';
    protected $fillable =['equipo_id','plan_id'];


    public function planEquipos(){
        return $this->belongsTo('App\Models\Equipo');
    }
    public function equiposPlans(){
        return $this->belongsTo('App\Models\Plan');
    }



    
}
