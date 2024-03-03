<?php
// app/Services/MantenimientoPlanService.php

namespace App\Services;
use App\Models\OrdenTrabajo;



class MantenimientoOrdenService

{
    public function getPlanesPendientes()
    {
        return OrdenTrabajo::where('estado', 'Abierta')->get();
    }

    // Otros métodos de consulta de mantenimiento...
}
