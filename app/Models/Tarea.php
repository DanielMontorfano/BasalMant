<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    use HasFactory;
     
    public function tareasProtocolos()  //defino el método
    {
        return $this->belongsToMany('App\Models\Protocolo')
        ->withPivot('check1');
        
    } 

    public function tareasEquipos()
    {
        return $this->belongsToMany('App\Models\Equipo')
        ->withPivot('plan_id','tcheck','detalle', 'operario','supervisor');
        
        
    } 
        
}
