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
        
}
