<?php

namespace App\Http\Controllers;

use App\Models\Tareash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Equipo;
use App\Models\Protocolo;
use App\Models\Plan;

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
       // echo"Hasta aqui llegamos";
        //dd(request()->all());
        $equipo_id=$request->equipo_id;
        $plans=$request->plans;
        $protocolos=$request->protocolos;
        $tareas=$request->tareas;
        $tcheck=$request->estados;
        
      
	   $numero = count($tareas)-1;  //Contamos la cantidad de registros a guardar
      //echo"$numero";
    
      for ($i = 0; $i <=$numero; $i++){
      $tareash= new Tareash();  
      $tareash->tarea_id=$tareas[$i];
      $tareash->equipo_id=$equipo_id[$i];
      //$tareash->plan_id=$plans[$i];   //Por  ahora no lo usamos
      $tareash->tcheck=$tcheck[$i]; 
      //echo $i; 
      //echo $tareas[$i] . "<br>"; 
      //echo $plans[$i] . "<br>";
      $tareash->save();  
      }   
      echo "FIN";  
         return;


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
        $PlanP[]=array('codigo'=>$planParciales->codigo, 'nombre'=> $planParciales->nombre, 'descripcion'=> $planParciales->descripcion, 'frecuencia'=> $planParciales->frecuencia, 'unidad'=> $planParciales->unidad);
        $protocolos=$planParciales->plansProtocolos;

        foreach($protocolos as $protocolo){
            $proto_id= $protocolo->pivot->proto_id; //busco el id del protocolo relacionado
            $protocolosParciales= Protocolo::find( $proto_id); // traigo la coleccion de ese protocolo
            $ProtocoloP[]=array('codProto'=> $protocolosParciales->codigo, 'descripcion'=> $protocolosParciales->descripcion);
            $tareas=$protocolosParciales->protocolosTareas; // traigo todas las tareas de ese protocolo
        foreach($tareas as $tarea){
            // echo $plan->id . "*" . $protocolo->codigo . "*" . $tarea->codigo .  "*" .  $tarea->descripcion . "<br>";
                
              $Tareas[] =array('tarea_id'=>$tarea->id, 'cod'=>$protocolosParciales->codigo, 'codigoTar' => $tarea->codigo, 'descripcion' => $tarea->descripcion, $tarea->duracion);
           
        }
      }  
    }

       return view('tareash.equipoTareasEdit', compact('equipo','PlanP', 'ProtocoloP','Tareas')); //Envío todo el registro en cuestión

       // return view('Equipos.show');
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
