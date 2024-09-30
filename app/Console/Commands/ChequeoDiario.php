<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Alarma;
use App\Models\OrdenTrabajo;
use App\Models\Equipo;
//use App\Models\EquipoIncompleto;
use Illuminate\Console\Command;

class ChequeoDiario extends Command
{
    protected $signature = 'generar:chequeoDiario';
    protected $description = 'Realiza el chequeo diario de las alarmas y equipos incompletos.';

    public function handle()
    {
        // Vaciar la tabla de alarmas
        Alarma::truncate();

        $hoy = Carbon::now();

        // Obtener órdenes de trabajo vencidas con usuarios asignados
        $ordenesVencidas = OrdenTrabajo::where(function ($query) use ($hoy) {
                $query->whereDate('fechaNecesidad', '<', $hoy)
                      ->orWhereDate('fechaNecesidad', '=', $hoy);
            })
            ->where('estado', '!=', 'Cerrada')
            ->whereNotNull('asignadoA')
            ->get();

        foreach ($ordenesVencidas as $orden) {
            $alarma = new Alarma();
            $alarma->orden_trabajo_id = $orden->id;
            $alarma->solicitante = $orden->solicitante;
            $alarma->asignadoA = $orden->asignadoA;
            $alarma->prioridad = $orden->prioridad;
            $alarma->save();
        }

        
        $this->info('Chequeo diario completado.');
    }
}
