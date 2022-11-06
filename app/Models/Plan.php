<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;
    //relacion de muchos a muchos
   /* public function plansEquipos()
    {
        return $this->belongsToMany('App\Models\Equipo')
        ->withPivot('check1','detalle');
        
    } */

    public function plansProtocolos()
    {
        return $this->belongsToMany('App\Models\Protocolo','planprotos','plan_id','proto_id')
        ->withPivot('check1');
        
    } 
    
    //relacion de muchos a muchos
    public function plansEquipos()
    {
        return $this->belongsToMany('App\Models\Equipo','equipoplans','equipo_id','plan_id');
       // ->withPivot('cant','unidad');
        
        
    } 

    

}
