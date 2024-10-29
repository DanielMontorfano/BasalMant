<?php

namespace App\Http\Controllers;

use App\Models\Alarma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

use Illuminate\Support\Facades\Auth;
use App\Models\OrdenTrabajo;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Equipo;




use App\Http\Controllers\OrdenTrabajoController;
class AlarmaController extends Controller
{
    /**
     * Chequear alarmas y ejecutar el comando correspondiente.
     */
    public function chequearAlarmas()
    {
        // Invocar el comando de Artisan para chequear las alarmas
        Artisan::call('app:check-alarms');

        // Redirigir de vuelta con un mensaje de éxito
        return redirect()->back()->with('success', 'El chequeo de alarmas se ha ejecutado correctamente.');
    }

    public function mostrarAlarmas()
{
    // Invocar el comando de Artisan para chequear las alarmas
    Artisan::call('check-alarms');
    
    // Obtener todas las alarmas junto con las órdenes de trabajo relacionadas
    $alarmas = Alarma::with('ordenTrabajo')->get();
    $usuario = Auth::user(); // Obtener el usuario autenticado// return $alarmas;
    $ot=OrdenTrabajo::all();
    // Redirigir a la vista con las alarmas y las órdenes de trabajo relacionadas
    return view('alarmas.show', compact('alarmas','usuario','ot'));
}



public function planesVencidos()
{
    // Obtener la fecha de hoy
    $hoy = Carbon::today();

    // Consulta a la base de datos para obtener el formulario más alto por equipo
    $planesVencidos = DB::table('equipoplansejecuts')
        ->select('equipo_id', 'supervisor1', 'plan_id', 'codigoPlan', 'numFormulario', 'frecuenciaPlanEnDias', 'created_at')
        ->whereIn('numFormulario', function ($query) {
            $query->select(DB::raw('MAX(numFormulario)'))
                ->from('equipoplansejecuts')
                ->groupBy('equipo_id');
        })
        ->get()
        ->filter(function ($registro) use ($hoy) {
            // Calcular la fecha de vencimiento sumando la frecuencia en días a la fecha de actualización
            $fechaVencimiento = Carbon::parse($registro->created_at)->addDays($registro->frecuenciaPlanEnDias);
            // Comparar con la fecha de hoy para verificar si el plan ha vencido
            return $hoy->greaterThan($fechaVencimiento);
        });
    // return $planesVencidos;
    // Agrupar los planes vencidos por supervisor (supervisor1)
    foreach ($planesVencidos as $plan) {
        // Convertimos cada resultado en un objeto anónimo para usar ->
        $resultado[] = (object)[
            'supervisor1' => $plan->supervisor1,
            'equipo_id' => $plan->equipo_id,
            'plan_id' => $plan->plan_id,
            'codigoPlan' => $plan->codigoPlan,
            'numFormulario' => $plan->numFormulario,
            'frecuenciaPlanEnDias' => $plan->frecuenciaPlanEnDias,
            'fechaVencimiento' => Carbon::parse($plan->created_at)->addDays($plan->frecuenciaPlanEnDias)->toDateString(),
            'created_at' => Carbon::parse($plan->created_at)->toDateString(),  // Solo la fecha
        ];
    }
    
    //return $planesVencidos;
    // Convertir el array $resultado a una colección
    $planesVencidos = collect($resultado);

    // Enviar la colección $planesVencidos a la vista
    return view('alarmas.formVencidoshow', compact('planesVencidos'));
}


public function equiposSinRep()
{
    // Realizamos una consulta utilizando leftJoin entre equipos y equipo_repuesto.
    // Esto permite traer todos los equipos, aunque no tengan repuestos asociados.
    $equiposSinRepuestos = Equipo::leftJoin('equipo_repuesto', 'equipos.id', '=', 'equipo_repuesto.equipo_id')
        ->whereNull('equipo_repuesto.equipo_id') // Filtramos los equipos que no tienen registros en equipo_repuesto.
        ->select('equipos.id as equipoId', 
                 'equipos.codEquipo as equipo', 
                 'equipos.idSecc as seccion', 
                 'equipos.idSubSecc as subSeccion', // Añadido idSubSecc
                 'equipos.creador as creador')
        ->get(); // Ejecutamos la consulta y obtenemos los resultados.

    // Retornamos la vista con la variable que contiene la lista de equipos sin repuestos.
    return view('alarmas.sinRepuestos', compact('equiposSinRepuestos'));
}




public function equiposSinPlanes()
{
    // Realizamos una consulta utilizando leftJoin entre equipos y equipoplans.
    // Esto permite traer todos los equipos, aunque no tengan planes asociados.
    $equiposSinPlanes = Equipo::leftJoin('equipoplans', 'equipos.id', '=', 'equipoplans.equipo_id')
        ->whereNull('equipoplans.plan_id') // Filtramos los equipos que no tienen registros en equipoplans.
        ->select('equipos.id as equipoId', 
                 'equipos.codEquipo as equipo', 
                 'equipos.idSecc as seccion', 
                 'equipos.idSubSecc as subSeccion', // Añadido idSubSecc
                 'equipos.creador as creador')
        ->get(); // Ejecutamos la consulta y obtenemos los resultados.
   // return $equiposSinPlanes;
    // Retornamos la vista con la variable que contiene la lista de equipos sin planes.
    return view('alarmas.equiposSinPlanes', compact('equiposSinPlanes'));
}




}
