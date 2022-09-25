<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    use HasFactory;
    protected $fillable = [
        'equipo_id',
        'nombreDocu',
        'rutaDocu',
        
    ];

    public function equipos(){

        return $this->belongsTo('App\Models\Equipo'); //Por ahora no cambio conveniccion de nombres
    }
}
