<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipoRepuesto extends Model
{
    use HasFactory;
   
        //Importantisimo personalisar el nombre de la tabla, sobre todo en tablas pivot!!!!!
        protected $table = 'equipo_repuesto';
     
   



    protected $fillable =['equipo_id',
    'repuesto_id'
    ];



    public function repuestoEquipos(){
        return $this->belongsTo('App\Models\Equipo');
    }
    public function equiposRepuestos(){
        return $this->belongsTo('App\Models\Repuesto');
    }
    

}
