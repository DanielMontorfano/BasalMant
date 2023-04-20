<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipoplansejecut extends Model
{
    use HasFactory;
    //Importantisimo personalisar el nombre de la tabla, sobre todo en tablas pivot!!!!!
    protected $table = 'equipoplansejecuts';
    protected $fillable =['equipo_id','plan_id'];


    public function plansejcutsEquipos(){
        return $this->belongsTo('App\Models\Equipo');
    }
    public function equiposPlansejecuts(){
        return $this->belongsTo('App\Models\Plan');
    }
}
