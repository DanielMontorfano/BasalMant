<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aviso extends Model
{
    use HasFactory;
    
        //Importantisimo personalisar el nombre de la tabla, sobre todo en tablas pivot!!!!!
    protected $table = 'avisos';
    protected $fillable =['usuario_id',
    'equipo_id'
    ];



    public function avisoUsuarios(){
        return $this->belongsTo('App\Models\User');
    }
    public function usuarioEquipos(){
        return $this->belongsTo('App\Models\Equipo');
    }
    
}
