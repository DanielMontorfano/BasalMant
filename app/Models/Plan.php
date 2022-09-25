<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;
    //relacion de muchos a muchos
    public function plansEquipos()
    {
        return $this->belongsToMany('App\Models\Equipo')
        ->withPivot('check1');
        
    } 
    

}
