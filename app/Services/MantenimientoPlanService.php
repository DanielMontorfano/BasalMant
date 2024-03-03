<?php
// app/Services/MantenimientoPlanService.php

namespace App\Services;
use App\Models\Equipoplansejecut;
use App\Models\Equipo;


class MantenimientoPlanService
{
    public function getPlanesPendientes()
    {

        return Equipo::join('equipoplansejecuts', 'equipos.id', '=', 'equipoplansejecuts.equipo_id')
            ->where('equipoplansejecuts.ejecucion', 'P')
            ->get();
        //return Equipoplansejecut::where('ejecucion', 'P')->get();
    }
    
    public function getEquiposSinPlan()
    {
        return Equipo::leftJoin('equipoplans', 'equipos.id', '=', 'equipoplans.equipo_id')
            ->whereNull('equipoplans.id')
            ->get();
    }
    // Otros métodos de consulta de mantenimiento...
}
