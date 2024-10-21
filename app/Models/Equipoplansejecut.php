<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipoplansejecut extends Model
{
    use HasFactory;

    // Es importante personalizar el nombre de la tabla si el nombre no sigue la convención de Laravel.
    protected $table = 'equipoplansejecuts';

    // Los campos que se pueden asignar de forma masiva.
    protected $fillable = ['equipo_id', 'plan_id', 'user_id'];

    // Relación con el modelo Equipo
    public function equipo()
    {
        return $this->belongsTo('App\Models\Equipo');
    }

    // Relación con el modelo Plan
    public function plan()
    {
        return $this->belongsTo('App\Models\Plan');
    }

    // Relación con el modelo User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

