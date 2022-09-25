<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipoplan extends Model
{
    use HasFactory;
    public function planEquipos(){
        return $this->belongsTo('App\Models\Equipo');
    }
    public function equiposPlans(){
        return $this->belongsTo('App\Models\Plan');
    }

}
