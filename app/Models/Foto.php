<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    use HasFactory;
    protected $fillable = [
        'equipo_id',
        'nombreFoto',
        'rutaFoto',
        
    ];
    public function equipos(){

        return $this->belongsTo('App\Models\Equipo'); //Por ahora no cambio conveniccion de nombres
    }
}
