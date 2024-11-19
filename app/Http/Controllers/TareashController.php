<?php

namespace App\Http\Controllers;
use Illuminate\Support\Collection; //Muy importante para transformar array en coleccion
use App\Models\Tareash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Equipo;
use App\Models\Protocolo;
use App\Models\Plan;
use App\Models\Equipoplansejecut;
use App\Models\User;

//ESTA ES LA TABLA PIVOT ENTRE EQUIPO Y TAREAS !!!!!!!!!!

class TareashController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    // Recuperar datos de la solicitud
    $equipo_id = $request->equipo_id;
    $plans = $request->plans; // Código de plan
    $tareas = $request->tareas;
    $tcheck = $request->estados;
    $operario = $request->operario;
    $supervisor = $request->supervisor;
    $detalle = $request->detalle;
    
    // Variables para la gestión de los planes
    $contadorPlan = $request->contadorPlan;
    $pendiente = $request->pendiente;
    $observacion = $request->observacion;
    $tecnico = $request->tecnico;
    $supervisor1Id = $request->supervisor1; // IDs de supervisores
    $ejecucion = $request->ejecucion;
    $planId = $request->planId;
    $equipoId = $request->equipoId;

    // Obtener nombres de supervisores a partir de los IDs
    $supervisor1 = is_array($supervisor1Id) ? array_map(fn($id) => User::find($id)?->name, $supervisor1Id) : null;

    // Procesar cada plan ejecutado o pendiente
    for ($i = 0; $i < $contadorPlan; $i++) {
        // Crear un nuevo registro para Equipoplansejecut
        $equipolansejecut = new Equipoplansejecut();

        // Verificar que el técnico y el supervisor estén definidos
        if (isset($tecnico[$i], $supervisor1[$i]) && !empty($tecnico[$i]) && !empty($supervisor1[$i])) {
            // Obtener el plan actual
            $plan = Plan::find($planId[$i]);

            // Asignar datos al objeto Equipoplansejecut
            $equipolansejecut->pendiente = $pendiente[$i];
            $equipolansejecut->observacion = $observacion[$i];
            $equipolansejecut->tecnico = $tecnico[$i];
            $equipolansejecut->user_id = $supervisor1Id[$i]; // ID del supervisor
            $equipolansejecut->supervisor1 = $supervisor1[$i]; // Nombre del supervisor
            $equipolansejecut->ejecucion = $ejecucion[$i];
            $equipolansejecut->plan_id = $planId[$i];
            $equipolansejecut->equipo_id = $equipoId[$i];
            $equipolansejecut->codigoPlan = $plan->codigo;
            $equipolansejecut->frecuencia = $plan->frecuencia;

            // Calcular la frecuencia en días según la unidad
            $frecuenciaEnDias = match($plan->unidad) {
                'Días' => $plan->frecuencia,
                'Meses' => $plan->frecuencia * 30,
                'Años' => $plan->frecuencia * 365,
                default => 0,
            };
            $equipolansejecut->frecuenciaPlanEnDias = $frecuenciaEnDias;

            // Guardar el registro en Equipoplansejecut
            $equipolansejecut->save();

            // Obtener el último ID de formulario guardado para vincularlo con las tareas
            $numFormulario = $equipolansejecut->id; // ID del registro guardado
            $equipolansejecut->numFormulario = $numFormulario; // Almacenar en numFormulario
            $equipolansejecut->save(); // Actualizar con el número de formulario

            // Guardar las tareas asociadas a este formulario
            foreach ($tareas as $j => $tarea) {
                if (!empty($tcheck[$j])) { // Solo guardar si hay novedades en la tarea
                    $tareash = new Tareash();
                    $tareash->tarea_id = $tarea;
                    $tareash->equipo_id = $equipo_id[$j];
                    $tareash->plan_id = $plans[$j]; // Código de plan en la tabla pivot
                    $tareash->numFormulario = $numFormulario; // Vincular al formulario actual
                    $tareash->tcheck = $tcheck[$j];
                    $tareash->detalle = $detalle;
                    $tareash->operario = $operario;
                    $tareash->supervisor = $supervisor;
                    $tareash->save();
                }
            }
        }
    }
    
    // Redirigir a la vista de historial de mantenimiento preventivo del equipo
    return redirect()->route('historialPreventivoEjecut', $request->equipo_id);
}



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tareash  $tareash
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuarios = User::all();
        $equipo = Equipo::find($id);
        $plans = $equipo->equiposPlans;
        
        $PlanP = [];
        $ProtocoloP = [];
        $Tareas = [];
    
        foreach ($plans as $plan) {
            $plan_id = $plan->pivot->plan_id;
            $planParciales = Plan::find($plan_id);
    
            $PlanP[] = array(
                'id' => $planParciales->id,
                'codigo' => $planParciales->codigo,
                'nombre' => $planParciales->nombre,
                'descripcion' => $planParciales->descripcion,
                'frecuencia' => $planParciales->frecuencia,
                'unidad' => $planParciales->unidad
            );
    
            $protocolos = $planParciales->plansProtocolos;
    
            foreach ($protocolos as $protocolo) {
                $proto_id = $protocolo->pivot->proto_id;
                $protocolosParciales = Protocolo::find($proto_id);
    
                $ProtocoloP[] = array(
                    'id' => $protocolosParciales->id,
                    'codProto' => $protocolosParciales->codigo,
                    'descripcion' => $protocolosParciales->descripcion,
                    'plan_id' => $plan_id
                );
    
                //$tareas = $protocolosParciales->protocolosTareas;
                $tareas = $protocolosParciales->protocolosTareas()->orderBy('prototarea.id', 'asc')->get(); //2024
                //$tareas = $protocolosParciales->protocolosTareas()->get(); //Ya vienen ordenada por id tabla pivote desde el modelo. 2024

                foreach ($tareas as $tarea) {
                    $Tareas[] = array(
                        'tarea_id' => $tarea->id,
                        'cod' => $protocolosParciales->codigo,
                        'codigoTar' => $tarea->codigo,
                        'descripcion' => $tarea->descripcion,
                        'duracion' => $tarea->duracion,
                        'unidad' => $tarea->unidad,
                        'proto_id' => $proto_id,
                        

                    );
                }
            }
        }
    
        $PlanP = collect($PlanP)->map(function ($item) {
            return (object) $item;
        });
    
        $ProtocoloP = collect($ProtocoloP)->map(function ($item) {
            return (object) $item;
        });
    
        $Tareas = collect($Tareas)->map(function ($item) {
            return (object) $item;
        });
        //return $Tareas;
        return view('tareash.equipoTareasEdit', compact('equipo', 'PlanP', 'ProtocoloP', 'Tareas', 'usuarios'));
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tareash  $tareash
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tareash $tareash)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tareash  $tareash
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tareash $tareash)
    {
        //
    }
}
