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
    $plans = $request->plans;  // código de plan
    $protocolos = $request->protocolos;
    $tareas = $request->tareas;
    $tcheck = $request->estados;
    $operario = $request->operario;
    $supervisor = $request->supervisor;
    $detalle = $request->detalle;

    // Variables para la gestión de los planes
    $contadorPlan = $request->contadorPlan - 1;
    $pendiente = $request->pendiente;
    $observacion = $request->observacion;
    $tecnico = $request->tecnico;
    $supervisor1Id = $request->supervisor1; // IDs de supervisores
    $ejecucion = $request->ejecucion;
    $planId = $request->planId;
    $equipoId = $request->equipoId;

    // Verificar que la variable de supervisor1Id sea un array y obtener los nombres de los supervisores
    if (is_array($supervisor1Id)) {
        $supervisores = User::whereIn('id', $supervisor1Id)->get();
        $supervisor1 = $supervisores->pluck('name')->toArray();
    } else {
        $supervisor1 = null; // Manejar caso donde no sea un array
    }

    // Procesar cada plan ejecutado o pendiente
    for ($i = 0; $i <= $contadorPlan; $i++) {
        $equipolansejecut = new Equipoplansejecut();

        // Verificar si el técnico y el supervisor están definidos antes de guardar
        if (!empty($tecnico[$i]) && !empty($supervisor1[$i])) {
            $plan = Plan::find($planId[$i]);

            // Asignar datos al objeto Equipoplansejecut
            $equipolansejecut->pendiente = $pendiente[$i];
            $equipolansejecut->observacion = $observacion[$i];
            $equipolansejecut->tecnico = $tecnico[$i];
            $equipolansejecut->user_id = $supervisor1Id[$i];
            $equipolansejecut->supervisor1 = $supervisor1[$i];
            $equipolansejecut->ejecucion = $ejecucion[$i];
            $equipolansejecut->plan_id = $planId[$i];
            $equipolansejecut->equipo_id = $equipoId[$i];
            $equipolansejecut->codigoPlan = $plan->codigo;
            $equipolansejecut->frecuencia = $plan->frecuencia;
            $equipolansejecut->unidad = $plan->unidad;

            // Calcular la frecuencia en días según la unidad
            if ($plan->unidad === 'Días') {
                $equipolansejecut->frecuenciaPlanEnDias = $plan->frecuencia;
            } elseif ($plan->unidad === 'Meses') {
                $equipolansejecut->frecuenciaPlanEnDias = $plan->frecuencia * 30;
            } elseif ($plan->unidad === 'Años') {
                $equipolansejecut->frecuenciaPlanEnDias = $plan->frecuencia * 365;
            }

            // Guardar el registro en Equipoplansejecut
            $equipolansejecut->save();

            // Obtener el último ID de formulario guardado para vincularlo con las tareas
            $numFormulario = $equipolansejecut->id;
            $equipolansejecut->numFormulario = $numFormulario;
            $equipolansejecut->save(); // Actualizar con el número de formulario

            // Guardar las tareas asociadas a este formulario
            $numero = count($tareas) - 1;
            for ($j = 0; $j <= $numero; $j++) {
                if ($tcheck[$j] != "") { // Solo guardar si hay novedades en la tarea
                    $tareash = new Tareash();
                    $tareash->tarea_id = $tareas[$j];
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
        $usuarios=User::all();
        $equipo= Equipo::find($id); // Ver la linea de abajo alternativa
        $plans=Equipo::find($id)->equiposPlans; 
        $PlanP= [];
        $ProtocoloP = [];
        $Tareas=[];


        foreach($plans as $plan){
        $plan_id=$plan->pivot->plan_id;
        $planParciales= Plan::find( $plan_id); 
        $PlanP[]=array('id'=>$planParciales->id,'codigo'=>$planParciales->codigo, 'nombre'=> $planParciales->nombre, 'descripcion'=> $planParciales->descripcion, 'frecuencia'=> $planParciales->frecuencia, 'unidad'=> $planParciales->unidad);
        $protocolos=$planParciales->plansProtocolos;

        foreach($protocolos as $protocolo){
            $proto_id= $protocolo->pivot->proto_id; //busco el id del protocolo relacionado
            $protocolosParciales= Protocolo::find( $proto_id); // traigo la coleccion de ese protocolo
            $ProtocoloP[]=array('id'=> $protocolosParciales->id,'codProto'=> $protocolosParciales->codigo, 'descripcion'=> $protocolosParciales->descripcion);
            $tareas=$protocolosParciales->protocolosTareas; // traigo todas las tareas de ese protocolo
        foreach($tareas as $tarea){
            // echo $plan->id . "*" . $protocolo->codigo . "*" . $tarea->codigo .  "*" .  $tarea->descripcion . "<br>";
                
              $Tareas[] =array('tarea_id'=>$tarea->id, 'cod'=>$protocolosParciales->codigo, 'codigoTar' => $tarea->codigo, 'descripcion' => $tarea->descripcion, 'duracion' =>$tarea->duracion, 'unidad' =>$tarea->unidad);
           
        }
      }  
    }
    
    $PlanP = collect($PlanP)->map(function ($item) { //Conversión del array asociociativo, objetos
        return (object) $item;
    });
    
    $ProtocoloP = collect($ProtocoloP)->map(function ($item) { //Conversión del array asociociativo, objetos
        return (object) $item;
    });
    
    $Tareas = collect($Tareas)->map(function ($item) { //Conversión del array asociociativo, objetos
        return (object) $item;
    });


   
     return view('tareash.equipoTareasEdit', compact('equipo','PlanP', 'ProtocoloP','Tareas','usuarios')); //Envío todo el registro en cuestión

       // return view('Equipos.show');
      // return;
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
