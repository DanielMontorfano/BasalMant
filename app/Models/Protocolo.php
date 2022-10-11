<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Protocolo extends Model
{
    use HasFactory;

    //relacion de muchos a muchos
   /* public function protocolosPlans()
    {
        return $this->belongsToMany('App\Models\Plan')
        ->withPivot('check1');
        
    } */

    public function protocolosTareas()
    {
        return $this->belongsToMany('App\Models\Tarea','prototarea','proto_id') //Personalizo nombre la tabla  pivot  y el campo clave primaria
        ->withPivot('check1');
        
    } 
     
    

}
