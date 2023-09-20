<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Lubricacion extends Model
{
    use HasFactory;
    //Importante para que funcione asignacion masiva en el controlador metodo create
    protected $fillable = ['puntoLubric', 'descripcion', 'lubricante', 'recipiente', 'color', 'inspecciones', 'frecuencia']; 

    // Importantisimo personalisar el nombre de la tabla, sobre todo en tablas pivot!!!!!
    protected $table = 'lubricacions';

   /* public function lubricEquipos()
    {
        return $this->belongsToMany(Equipo::class, 'equipo_lubricacion', 'lubricacion_id', 'equipo_id');
    }*/

    public function equipos()
    {
        return $this->belongsToMany(Equipo::class, 'equipo_lubricacion', 'lubricacion_id', 'equipo_id')
            ->withPivot(['numMuestra', 'dia', 'turno', 'muestra', 'responsables']);
    }


}

