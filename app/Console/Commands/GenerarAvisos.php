<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Aviso;
use App\Models\Equipo;
use App\Models\OrdenTrabajo;
use App\Models\User;
use Carbon\Carbon;

class GenerarAvisos extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generar:avisos'; //Nombre del comando para que se ejecute public function handle()

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Genera avisos para órdenes de trabajo vencidas y equipos incompletos.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Vaciar la tabla de avisos
        Aviso::truncate();

        $hoy = Carbon::now();
        // Obtener la cantidad total de equipos
        $totalEquipos = Equipo::count();

        // Obtener órdenes de trabajo vencidas con usuarios asignados
        $ordenesVencidas = OrdenTrabajo::where(function ($query) use ($hoy) {
                $query->whereDate('fechaNecesidad', '<', $hoy)
                      ->orWhereDate('fechaNecesidad', '=', $hoy);
            })
            ->where('estado', '!=', 'Cerrada')
            ->whereNotNull('asignadoA')
            ->get(['equipo_id', 'asignadoA', 'id']);

        // Crear avisos para cada combinación única de equipo_id y asignadoA
        foreach ($ordenesVencidas as $orden) {
            // Buscar el id del usuario a partir del nombre de usuario (asignadoA)
            $usuario = User::where('name', $orden->asignadoA)->first();

            if ($usuario) {
                $aviso = new Aviso();
                $aviso->equipo_id = $orden->equipo_id;
                $aviso->usuario_id = $usuario->id; // Utilizar el id del usuario
                $aviso->mensaje1 = 'Usted tiene la orden de trabajo Nº O.d.T-'. $orden->id .' vencida';
                $aviso->mensaje2 = 'OdT';
                $aviso->mensaje3 = $orden->id;
                $aviso->save();
            } else {
                // Manejo del caso en el que no se encuentra el usuario
                $this->warn("No se encontró un usuario con el nombre: " . $orden->asignadoA);
            }
        }

        // Obtener equipos sin planes de mantenimiento
        $equiposSinPlan = Equipo::whereDoesntHave('equiposPlans')->get(['id', 'codEquipo','creador']);
        // Calcular la cantidad de equipos sin repuestos
        $cantEqSPlan =  $equiposSinPlan->count();

        // Calcular el porcentaje de equipos sin repuestos
        $porcentaje = ($totalEquipos > 0) ? ($cantEqSPlan / $totalEquipos) * 100 : 0;

        // Crear avisos para cada equipo sin plan de mantenimiento
        foreach ($equiposSinPlan as $equipo) {
            // Buscar el id del usuario a partir del nombre de usuario (creador)
            $usuario = User::where('name', $equipo->creador)->first();

            if ($usuario) {
                $aviso = new Aviso();
                $aviso->equipo_id = $equipo->id;
                $aviso->usuario_id = $usuario->id; // Utilizar el id del usuario
                $aviso->mensaje1 = 'Usted ha creado el equipo: '. $equipo->codEquipo .' sin plan de mantenimiento';
                $aviso->mensaje2 = 'plan';
                $aviso->mensaje3 = $equipo->id;
                $aviso->save();
            } else {
                // Manejo del caso en el que no se encuentra el usuario
                $this->warn("No se encontró un usuario con el nombre: " . $equipo->creador);
            }
        }

        // Obtener equipos sin repuestos
        $equiposSinRepuestos = Equipo::whereDoesntHave('equiposRepuestos')->get(['id', 'codEquipo','creador']);

        // Calcular la cantidad de equipos sin repuestos
        $cantEqSRep = $equiposSinRepuestos->count();

        // Calcular el porcentaje de equipos sin repuestos
        $porcentaje = ($totalEquipos > 0) ? ($cantEqSRep / $totalEquipos) * 100 : 0;

        // Crear avisos para cada equipo sin repuestos
        foreach ($equiposSinRepuestos as $equipo) {
            // Buscar el id del usuario a partir del nombre de usuario (creador)
            $usuario = User::where('name', $equipo->creador)->first();

            if ($usuario) {
                $aviso = new Aviso();
                $aviso->equipo_id = $equipo->id;
                $aviso->usuario_id = $usuario->id; // Utilizar el id del usuario
                $aviso->mensaje1 = 'Usted ha creado el equipo: '. $equipo->codEquipo . ' sin repuestos';
                $aviso->mensaje2 = $totalEquipos . '-' . $cantEqSRep . '-' . number_format($porcentaje, 2); // Formato "$cantEquipos-$cantEqSRep-$porcentaje"
                $aviso->mensaje3 = $equipo->id;
                $aviso->save();
            } else {
                // Manejo del caso en el que no se encuentra el usuario
                $this->warn("No se encontró un usuario con el nombre: " . $equipo->creador);
            }
        }

        $this->info('Generar avisos completado.');
    }
}
