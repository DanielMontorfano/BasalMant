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
        
        public function protocolosTareas()
{
    return $this->belongsToMany(
        Tarea::class,      // Modelo relacionado
        'prototarea',      // Nombre de la tabla pivote
        'proto_id',        // Llave foránea en la tabla pivote referente a este modelo
        'tarea_id'         // Llave foránea en la tabla pivote referente al modelo relacionado
    )->withPivot('id')    // Incluye el campo `id` de la tabla pivote en las consultas
     ->orderBy('id', 'asc'); // Ordena por el campo `id` de la tabla pivote
}

   

}
