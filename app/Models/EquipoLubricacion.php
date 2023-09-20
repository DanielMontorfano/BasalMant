<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EquipoLubricacion extends Model
{
    protected $table = 'equipo_lubricacion';

    protected $fillable = [
        'equipo_id',
        'lubricacion_id',
        'numMuestra',
        'dia',
        'turno',
        'muestra',
        'responsables',
    ];

    public function equipo()
    {
        return $this->belongsTo(Equipo::class, 'equipo_id');
    }

    public function lubricacion()
    {
        return $this->belongsTo(Lubricacion::class, 'lubricacion_id');
    }
}

