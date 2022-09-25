<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prototarea extends Model
{
    use HasFactory;
 
        //Importantisimo personalisar el nombre de la tabla, sobre todo en tablas pivot!!!!!
        protected $table = 'prototarea';
        protected $fillable =['proto_id','tarea_id'];

        public function tareaProtocolos(){
            return $this->belongsTo('App\Models\Protocolo');
        }
        public function protocolosTareas(){
            return $this->belongsTo('App\Models\Tarea');
        }
   

}
