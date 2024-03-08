<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Equipo;
use App\Models\Tareash;
use App\Models\Equipoplansejecut;
use Illuminate\Support\Facades\DB;
use App\Models\OrdenTrabajo;
use App\Models\Equipoplan;
use App\Models\Plan;
use App\Models\Protocolo;

class HistorialController extends Controller
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
    

    

    public function historialPreventivo($id) //entro con id de Equipo
    {   
        $equipo=Equipo::find($id);
        $tareas=Equipo::find($id)->equiposTareash; //Todas las tareas sobre este equipo
        //$tareas = Equipo::find($id)->equiposTareash()->orderByDesc('created_at')->get();
        // dd(Equipo::find($id)->equiposTareash()->orderByDesc('created_at')->get());
        //$tareash=Tareash::all();
        //$tareash=Equipo::find($id);
       /*  foreach ($tareas as $tarea) {
          
                echo $tarea->pivot->updated_at;
           
            
        } */
        //dd(request()->all());
       // echo $tareas;
       // return;
      return view('historial.preventivo',compact('tareas','equipo'));
      // return  ;

    }
    public function  historialCorrectivo($id) //entro con id de Equipo
    {   
        $equipo=Equipo::find($id);
        $ots_e=Equipo::find($id)->ordentrabajo; 
        /*
        foreach ($ots_e1 as $ot) {
            if($ot->created_at == $ot->updated_at){
                $ot->fecha2='---';
            }
            
        }*/
        

       return view('historial.correctivo',compact('ots_e','equipo'));
      // return  ;

    } 



    public function  historialTodos($id) //entro con id de Equipo, mezcla los origenes Preventivo y Correctivo
    {   
        $equipo=Equipo::find($id);
        $ots_e=Equipo::find($id)->ordentrabajo; 
        $tareas=Equipo::find($id)->equiposTareash; //Todas las tareas sobre este equipo
        $tareash=Tareash::all();
        $tareasR=DB::table('tareashes')->where('equipo_id', $id)->get();
        $trabajosRealizados = $ots_e->concat( $tareasR);
        $numero = count($trabajosRealizados)-1;  //Contamos la cantidad de registros a guardar2
         // Primero compruebo que la consulta no sea vacia //
        if($tareas->isEmpty()) { //OJO que si no hay ordenes (consulta nula, implica ARRAY vacio) ERROR 
            $registro1[] =array('detalle'=> "No se encontraron resultados", 'origen' => "", 'fecha'=>"",  'operario' => "");
            $descripcion1=[];
            $plan_id=[];
            goto salir1;  
        }
        
        // Si consulta no vacia //
          foreach( $tareas as $tarea){
          $descripcion= $tarea->descripcion;
          $tcheck= $tarea->pivot->tcheck;
          $fecha=  $tarea->updated_at;
          $fecha= substr($tarea->updated_at, 0, 10); //Para tomar solo la fecha sin hora
          $plan=$tarea->pivot->plan_id;
          $operario=$tarea->pivot->operario;
          $detalle=$descripcion . "(" . $tcheck . ") " ; 
          $registro1[] =array('detalle'=> $detalle, 'origen' => $plan, 'fecha'=>$fecha,  'operario' => $operario);
          // echo $tarea;
          $descripcion1[]= $detalle;
          $plan_id[]=$plan;
         
        }
        salir1:
        // Primero compruebo que la consulta no sea vacia //
        if($ots_e->isEmpty()) { //OJO que si no hay ordenes (consulta nula, implica ARRAY vacio) ERROR 
        $registro2[] =array('detalle'=> "", 'origen' => "", 'fecha'=>"",  'operario' => "");
        $descripcion2=[];
        $Norden1=[];
        goto salir;
      }
      
        // Si consulta no vacia //
        foreach( $ots_e as $ot_e){
            $det2= $ot_e->det2;
            $estado= $ot_e->estado;
            $fecha= substr($ot_e->updated_at, 0, 10); //Para tomar solo la fecha sin hora
            $Norden="O.d.T " . $ot_e->id;
            $operario= $ot_e->per_cierra;
            $detalle=$det2 ." " ."(". $estado .")"; 
            $registro2[] =array('detalle'=> $detalle, 'origen' => $Norden, 'fecha'=>$fecha,  'operario' => $operario);
            $descripcion2[]=$detalle;
            $Norden1[]= $Norden;
            }

            salir:
           $registros= array_merge($registro1, $registro2);
           $origenes= array_merge($plan_id, $Norden1);
        return view('historial.todos',compact('tareas', 'ots_e', 'equipo', 'registros'));
       
     //  echo"No Hay Ordenes";
      // return;

    }

   /* public function historialPreventivoEjecut1($id) //PRIMERA VERIOSION entro con id de Equipo
    {   
        //dd(request()->all());

        $equipo=Equipo::find($id);
        $planesEsteEquipo=Equipoplan::where('equipo_id',$equipo->id)->get();
        $equipoplansejecuts = Equipoplansejecut::whereIn('plan_id', $planesEsteEquipo->pluck('plan_id'))
    ->where('equipo_id', $equipo->id)
    ->get();
        //return $equipoplansejecuts;
        //$planes = $equipoplansejecuts::select('codigoPlan')->distinct()->orderBy('codigoPlan')->pluck('codigoPlan');
       $planes = $equipoplansejecuts->pluck('codigoPlan')->unique()->sort()->values();

        //return $planes ;
        $datos = Equipoplansejecut::select('equipo_id','created_at', 'codigoPlan', 'ejecucion', 'numFormulario')
                    ->orderByDesc('created_at')
                    ->where('equipo_id',$equipo->id)
                    ->get()
                   // ->groupBy('fecha')
                    ->groupBy('numFormulario')
                    ->map(function ($item) { // Solo para permitirme mostrar en forma adecuada
                      // $planData = $item->pluck('ejecucion', 'codigoPlan')->toArray();
                       $planData = $item->pluck('ejecucion', 'codigoPlan')->toArray();
                      // return $item;
                     // return array_merge(['numFormulario' => $item[0]->numFormulario], $planData );
                      return array_merge(['fecha' => $item[0]->created_at->format('Y-m-d')], $planData );
                   })
                    ->toArray();
                    
       // $datos = collect($datos)->sortByDesc('numFormulario')->toArray(); 
       $datos = collect($datos)->sortByDesc('fecha')->toArray(); 
       //return $planes;
       // dd($datos);
        return view('historial.preventivoEjecut', compact('datos', 'planes','equipo'));
        
    
        
         
 
    } */

    public function historialPreventivoEjecut($id)
{
    $equipo = Equipo::find($id);
    $planesEsteEquipo = Equipoplan::where('equipo_id', $equipo->id)->get();
    $equipoplansejecuts = Equipoplansejecut::whereIn('plan_id', $planesEsteEquipo->pluck('plan_id'))
        ->where('equipo_id', $equipo->id)
        ->get();
    
    $planes = $equipoplansejecuts->pluck('codigoPlan')->unique()->sort()->values();
    
    $datos = Equipoplansejecut::select('equipo_id', 'created_at', 'codigoPlan', 'ejecucion', 'numFormulario', 'tecnico', 'supervisor1')
        ->orderByDesc('created_at')
        ->where('equipo_id', $equipo->id)
        ->get()
        ->groupBy('numFormulario')
        ->map(function ($item) {
            $planData = $item->pluck('ejecucion', 'codigoPlan')->toArray();
            return array_merge(['fecha' => $item[0]->created_at->format('Y-m-d'), 'tecnico' => $item[0]->tecnico, 'supervisor1' => $item[0]->supervisor1], $planData);
        })
        ->toArray();

    $datos = collect($datos)->sortByDesc('fecha')->toArray();
    // dd($datos);
    return view('historial.preventivoEjecut', compact('datos', 'planes', 'equipo'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $fecha=$request->fecha;
        $plan=$request->plan;
        $resultado = Equipoplansejecut::where('created_at', $fecha)
                              ->where('codigoPlan', $plan)
                              ->get();
        return $resultado;
      
    }
    
    public function formularioshow($formulario_id)
    {
              
        //echo "estoy adentro de formulario show" .  $formulario;
        $formulario = Equipoplansejecut::where('id', '=', $formulario_id)->first(); //Registro completo
        $tareash= Tareash::where('numFormulario', '=', $formulario_id)->get();
        $equipo_id=$formulario->equipo_id;
        $plan_id=$formulario->plan_id; 
       // ************************************************** $resultado = Equipoplansejecut::first(['id' => $formulario]);

       $equipo= Equipo::find($equipo_id); // Ver la linea de abajo alternativa
       // $plans=Equipo::find($id)->equiposPlans; 
       $PlanP= [];
       $ProtocoloP = [];
       $Tareas=[];


       //foreach($plans as $plan){
       //$plan_id=$plan->pivot->plan_id;
       $planParciales= Plan::find( $plan_id); 
       $PlanP[]=array('id'=>$planParciales->id,'codigo'=>$planParciales->codigo, 'nombre'=> $planParciales->nombre, 'descripcion'=> $planParciales->descripcion, 'frecuencia'=> $planParciales->frecuencia, 'unidad'=> $planParciales->unidad);
       $protocolos=$planParciales->plansProtocolos;

       foreach($protocolos as $protocolo){
           $proto_id= $protocolo->pivot->proto_id; //busco el id del protocolo relacionado
           $protocolosParciales= Protocolo::find( $proto_id); // traigo la coleccion de ese protocolo
           $ProtocoloP[]=array('id'=> $protocolosParciales->id,'codProto'=> $protocolosParciales->codigo, 'descripcion'=> $protocolosParciales->descripcion);
           $tareas=$protocolosParciales->protocolosTareas; // traigo todas las tareas de ese protocolo
       foreach($tareas as $tarea){
                    
            $tcheck = tareash::where('tarea_id', '=', $tarea->id)
            ->where('numFormulario', '=', $formulario->id)
            ->pluck('tcheck')
            ->first();
        

             //return $tcheck;
             $Tareas[] =array('tarea_id'=>$tarea->id, 'cod'=>$protocolosParciales->codigo, 'codigoTar' => $tarea->codigo, 'descripcion' => $tarea->descripcion, 'duracion' =>$tarea->duracion, 'unidad' =>$tarea->unidad, 'ejecucion'=>$formulario->ejecucion, 'numFormulario'=>$formulario->numFormulario, 'tcheck'=>$tcheck);
                 
            
      
      
      
      
            }
     }  
   //}
   
  /* $PlanP = collect($PlanP)->map(function ($item) { //Conversión del array asociociativo, objetos
       return (object) $item;
   });
   
   $ProtocoloP = collect($ProtocoloP)->map(function ($item) { //Conversión del array asociociativo, objetos
       return (object) $item;
   });
   
   $Tareas = collect($Tareas)->map(function ($item) { //Conversión del array asociociativo, objetos
       return (object) $item;
   });*/
   


 // return $formulario;

  // return view('tareash.equipoTareasEdit', compact('equipo','PlanP', 'ProtocoloP','Tareas')); 
  return View('historial.equipoFormularioShow', compact('equipo','PlanP', 'ProtocoloP','Tareas','formulario'));              
        return $ProtocoloP;
      
    }








    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request) //Para solucionar Pendiente
    {
        $fecha=$request->fecha;
        $numFormulario=$request->numFormulario;
        //dd($request);
        
        $equipoplanejecut = Equipoplansejecut::where('numFormulario', $numFormulario)
                              //->where('codigoPlan', $plan)
                              ->first();  //puedo hacerlo con get() pero debo recorrer con foreach
        //return $equipoplanejecut;                      
        $id=$equipoplanejecut->id;
        $equipo_id=$equipoplanejecut->equipo_id;

        $equipo=Equipo::find($equipo_id);
        $plan_id=$equipoplanejecut->plan_id;

        $ODT=Equipo::find($equipo_id)->ordentrabajo;
       // return $ots_e;

       // return $id;         
        return view('historial.pedientesEdit', compact('equipoplanejecut','equipo','ODT'));   
        return $id;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //dd($request);
        $numFormulario=$request->numFormulario;
        $solucion=$request->solucion;
        $correccion="";
        $resultado = Equipoplansejecut::where('numFormulario', $numFormulario)
        ->first();  //puedo hacerlo con get() pero debo recorrer con foreach
       // return $resultado;
        if($solucion=="A"){
            $correccion=$request->textoSolucionA; //toma  texto de la solución A
        }
        if($solucion=="B"){
            $correccion="Se generó la ODT-" . $request->selectSolucionB; //toma  Select de la solución B
        }
        
       // return $correccion;
        $equipoplanejecut= Equipoplansejecut::find($numFormulario); 
        $equipoplanejecut->correccion=$correccion;
        $equipoplanejecut->ejecucion="C";
        $equipoplanejecut->save();

        $equipo_id=$equipoplanejecut->equipo_id;
        //name('historialPreventivoEjecut')
        return redirect()->route('historialPreventivoEjecut', $equipo_id); //se puede omitir ->id, igual funciona
        return $equipoplanejecut;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
