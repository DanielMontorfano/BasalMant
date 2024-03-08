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
    public function store(Request $request) // ojo! almacena en  2 tablas Equipoplansejecut y Tareash, 
    {
       // echo"Hasta aqui llegamos";
       // dd(request()->all());
        $equipo_id=$request->equipo_id;
        $plans=$request->plans;  //codigo de plan
        $protocolos=$request->protocolos;
        $tareas=$request->tareas;
        $tcheck=$request->estados;
        $operario=$request->operario;
        $supervisor=$request->supervisor;
        $detalle=$request->detalle;
        
        $contadorPlan=$request->contadorPlan-1;
        $pendiente=$request->pendiente;
        $observacion=$request->observacion;
        $tecnico=$request->tecnico;
        $supervisor1=$request->supervisor1;
        $ejecucion=$request->ejecucion;
        $planId=$request->planId;
        $equipoId=$request->equipoId;
       
        
        //Primero obtenemos el numero de formulario (tratamiento de planes ejecutados o pendientes)
        for ($i = 0; $i <=$contadorPlan; $i++){
        $equipolansejecut= new Equipoplansejecut();
        
        if (!empty($tecnico[$i]) && !empty($supervisor1[$i])) { //Iniciamos guardado solo si firmaron
        $plan=Plan::find($planId[$i]);  
        $equipolansejecut->pendiente=$pendiente[$i];
        $equipolansejecut->observacion=$observacion[$i]; //Agregado 08/03/2024
        $equipolansejecut->tecnico=$tecnico[$i]; 
        $equipolansejecut->supervisor1=$supervisor1[$i];
        $equipolansejecut->ejecucion=$ejecucion[$i];
        $equipolansejecut->plan_id=$planId[$i];
        $equipolansejecut->equipo_id=$equipoId[$i];
        $equipolansejecut->codigoPlan=$plan->codigo;
        $equipolansejecut->save();
        $formulario= $equipolansejecut::latest()->first(); //para tomar el ultmo registro guardado
        $numFormulario=$formulario->id; // tomo el ultimo id para vincular cada formulario a las tareash
        $equipolansejecut->numFormulario=$numFormulario;
        $equipolansejecut->save(); //Con esto podre filtarar en tabla tareash, cada formulario cargado
      //*******  Etapa de guardar tareas (muy vinculado Equipoplansejecut y Tareash)*********
      $numero = count($tareas)-1;  //Contamos la cantidad de registros a guardar
      for ($i = 0; $i <=$numero; $i++){
      $tareash= new Tareash();  
      $tareash->tarea_id=$tareas[$i];
      $tareash->equipo_id=$equipo_id[$i];
      $tareash->plan_id= $plans[$i]; //guarda codigo deolan en pivot
      $tareash->numFormulario= $numFormulario;  //guarda numero de formulario, para saber a que grupo pertenece
      if($tcheck[$i]<>""){  // Solo guarda si las tareas que tuvieron alguna novedad
      $tareash->tcheck=$tcheck[$i]; 
      $tareash->detalle=$detalle; 
      $tareash->operario=$operario;
      $tareash->supervisor=$supervisor;
      $tareash->save(); } 
      }
       
        }}







	  

     return redirect()->route('historialPreventivoEjecut', $request->equipo_id); //Intento mostrar el plan
     }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tareash  $tareash
     * @return \Illuminate\Http\Response
     */
    /*public function show($id)
    {

    echo"Hola Mundo" ;
    return; 

        //
    }*/

    public function Show($id)  //Segunda Manera de Recuperar el registro pasando el id
        {
        $equipo= Equipo::find($id); // Ver la linea de abajo alternativa
        $plans=Equipo::find($id)->equiposPlans; 
        $PlanP= [];
        $ProtocoloP = [];
        $Tareas=[];


        foreach($plans as $plan){
        $plan_id=$plan->pivot->plan_id;
        $planParciales= Plan::find( $plan_id); 
        $PlanP[]=array('id'=>$planParciales->id, 'codigo'=>$planParciales->codigo, 'nombre'=> $planParciales->nombre, 'descripcion'=> $planParciales->descripcion, 'frecuencia'=> $planParciales->frecuencia, 'unidad'=> $planParciales->unidad);
        $protocolos=$planParciales->plansProtocolos;

        foreach($protocolos as $protocolo){
            $proto_id= $protocolo->pivot->proto_id; //busco el id del protocolo relacionado
            $protocolosParciales= Protocolo::find( $proto_id); // traigo la coleccion de ese protocolo
            $ProtocoloP[]=array('id'=>$protocolosParciales->id,'codProto'=> $protocolosParciales->codigo, 'descripcion'=> $protocolosParciales->descripcion);
            $tareas=$protocolosParciales->protocolosTareas; // traigo todas las tareas de ese protocolo
        foreach($tareas as $tarea){
            // echo $plan->id . "*" . $protocolo->codigo . "*" . $tarea->codigo .  "*" .  $tarea->descripcion . "<br>";
                
              $Tareas[] =array('tarea_id'=>$tarea->id, 'cod'=>$protocolosParciales->codigo, 'codigoTar' => $tarea->codigo, 'descripcion' => $tarea->descripcion, 'duracion'=>$tarea->duracion, 'unidad'=>$tarea->unidad);
             // echo "bb" . $protocolosParciales->codigo;
        }
      }  
    }
      //No convierto a array asociativo de objetos para tener la posibilidad de elejir en futuros proyectos(ej: edit de abajo)
     
     

      return view('tareash.equipoTareasShow', compact('equipo','PlanP', 'ProtocoloP','Tareas')); //Envío todo el registro en cuestión
    
     // echo "FIN";  
      //   return;
      



       // return view('Equipos.show');
    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tareash  $tareash
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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


   
     return view('tareash.equipoTareasEdit', compact('equipo','PlanP', 'ProtocoloP','Tareas')); //Envío todo el registro en cuestión

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
