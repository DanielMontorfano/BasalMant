<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Protocolo;
use App\Models\Equipo;
use App\Models\Tarea;
use App\Models\PlanProto;
use App\Models\ProtoTarea;
use Illuminate\Http\Request;
use App\Http\Requests\StorePlanRequest;
use Illuminate\Support\Facades\DB;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$equipos= Equipo::all();  //Trae todos los registro
        //$plans= Plan::orderBy('id','desc')->get();//paginate();
        $plans= Plan::all();
       // return $equipos;   //Sirve para ver la consulta
        return view('plans.index',compact('plans')); //Envío todos los registro en cuestión.La consulta va sin simbolo de pesos
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('plans.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePlanRequest $request) //esto funciona una vez creado StoreEquipo de Request
    //public function store(Request $request) //Antes de usar archivo StoreEquipo en Request
    {
        //$request->validate(['codEquipo'=>'required|max:8', 'marca'=>'required|min:3', 'modelo'=>'required']);
        //return $request->all();  //Para probar que recibo todos losregistros del formulario
      
        // las siguentes lineas seria en forma manual, 
        $plan= new Plan();
       // $plan->codigo=$request->codigo;
        $plan->nombre=$request->nombre;
        $plan->frecuencia=$request->frecuencia;
        $plan->unidad=$request->unidadSelect;
        $plan->descripcion=$request->descripcion;
        $plan->save();

        $id_ultimo= "PL-" . str_pad($plan->id,"8","0", STR_PAD_LEFT); //Formato para codigo
        $plan= Plan::find($plan->id);
        $plan->codigo= $id_ultimo;
        $plan->save();

        
        //Asi se realizará con Asignacion Masiva, es mas simple, pero se debe colocar 
        //en el modelo Equipo "protected $fillable=[array que se desea]"
        //esto asigna todo el formulario de una vez, y hace el save() automaticamente
        //$equipo=Equipo::create($request->all());
        return redirect()->route('plans.show', $plan->id); //se puede omitir ->id, igual funciona
        //return $plan;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        //$equipo=Equipo::find($id);
        $ProtocoloP = [];
        $Tareas=[];

        $plan= Plan::find($id); // Ver la linea de abajo alternativa
        $protocolos= Plan::find($id)->plansProtocolos; // otra alternativa: $repuestos= Equipo::find($id)->equiposRepuestos; en una sola linea. 
        if ($protocolos->isEmpty()) {
            $ProtocoloP[]=array('idProto'=> '','codProto'=> '', 'descripcion'=> 'Este plan no tiene procedimientos de mantenimientos vinculados');
            $Tareas[] =array('cod'=>'', 'codigoTar' => '', 'descripcion' => '', '');
            //return $protocolos;
            goto salir;
         }
         
        foreach($protocolos as $protocolo){
                $proto_id= $protocolo->pivot->proto_id; //busco el id del protocolo relacionado
                $protocolosParciales= Protocolo::find( $proto_id); // traigo la coleccion de ese protocolo
                $ProtocoloP[]=array('idProto'=>$protocolosParciales->id,'codProto'=> $protocolosParciales->codigo, 'descripcion'=> $protocolosParciales->descripcion);
                $tareas=$protocolosParciales->protocolosTareas; // traigo todas las tareas de ese protocolo
            foreach($tareas as $tarea){
                // echo $plan->id . "*" . $protocolo->codigo . "*" . $tarea->codigo .  "*" .  $tarea->descripcion . "<br>";
                    
                  $Tareas[] =array('cod'=>$protocolosParciales->codigo, 'codigoTar' => $tarea->codigo, 'descripcion' => $tarea->descripcion, $tarea->duracion);
               
            }
           
         }  
           // LAs lineas siguientes fueron de practica arrays//
           /*
           var_export ($ProtocoloP);
            echo "<br>";
            echo "<br>";
           var_export ($Tareas);
           echo "<br>";
           echo "<br>";
           
           foreach($ProtocoloP as $protocolo){
           //echo key($P);
           echo $protocolo['codProto'];
           $Proto=$protocolo['codProto'];
           echo "<br>";
           foreach($Tareas as $Tarea){
            if($Proto==$Tarea['cod']){   
            echo $Tarea['cod'] . $Tarea['codigoTar'];
            echo "<br>";
            }
            } 
                  
            }*/
            
        
          salir: 
          return view('plans.show', compact('plan','ProtocoloP', 'Tareas'));  
         // return ; //$Tareas ;// $matriz2;



    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   $equipo=Equipo::find($id);
        $protosTodos=Protocolo::all();
        $plan=Plan::find($id);
        $protocolos= Plan::find($id)->plansProtocolos; //"plansProtocolos" Metodo perteneciente al modelo Plan
       // $fotosTodos=Equipo::find($id)->fotos; //Aqui hago referencia al Metodo fotos perteneciente al modelo Equipo que trae los registro del modelo fotos vinculados a este equipo
        //$repuesto=$equipo->equiposRepuestos;
        //foreach($repuestos as $repuesto){
            //<p>factura: {{ $entrada->factura }}</p>
            //<p>fecha entrada: {{ $entrada->fecha }}</p>
            //if($repuesto->pivot->cant )
           // if(!is_null($repuesto->pivot->cant)){
            //echo  $repuesto->pivot->cant . '***' .$repuesto->codigo . '<br>';
            //}
      //  }
        //return $tareas;
        return view('plans.edit', compact('equipo','plan','protocolos', 'protosTodos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    { //$request trae lo del formulario, $id el id de equipo, trae lo que tengo en el registro sin modificar                                  
       // $request->validate(['codEquipo'=>'required', 'marca'=>'required', 'modelo'=>'required']);
                // las siguentes lineas seria en forma manual, 
        $plan= Plan::find($id);
        $plan->codigo=$request->codigo;
        $plan->nombre=$request->nombre;
        $plan->frecuencia=$request->frecuencia;
        $plan->unidad=$request->unidadSelect;
        $plan->descripcion=$request->descripcion;
       

        $plan->save();
       

        //return $equipo;
        //return view('Equipos.update');;
        /************************************** */
        //Asi se realizará con Asignacion Masiva, es mas simple, pero se debe colocar 
        //en el modelo Equipo "protected $fillable=[array que se desea]"
        //esto asigna todo el formulario de una vez, y hace el save() automaticamente
       // $equipo->update($request->all()); //lo suspendi porque dejo de funcionar 
      // return view('plans.show', compact('plan')); //Envío show todo el registro en cuestión, sin $
       return redirect()->route('plans.show', $plan->id);
       //return $repuestos;
    }
      
    public function copiar($id){
        $plan= Plan::find($id);
        $protocolos=$plan->plansProtocolos;
        //$tareas=$protocolos->protocolosTareas;
        
        //return $equiposB;
              
       // $codEquipo="XX-CLON-XX-XX";
        $copyPlan= new Plan();
       // $plan->codigo=$request->codigo;
       $copyPlan->nombre=$plan->nombre;
       $copyPlan->frecuencia=$plan->frecuencia;
       $copyPlan->unidad=$plan->unidadSelect;
       $copyPlan->descripcion=$plan->descripcion;
       $copyPlan->save();

        $id_ultimo= "PL-" . str_pad($copyPlan->id,"8","0", STR_PAD_LEFT); //Formato para codigo
        $copyPlan= Plan::find($copyPlan->id);  //lineas abajo es el nuevo id, es decir el de la copia
        $copyPlan->codigo= $id_ultimo;
        $copyPlan->save();
       
        // copia protocolos asociacios con nuevo id
        foreach($protocolos as $protocolo){
        $copyProto= new Protocolo();
        $copyProto->descripcion=$protocolo->descripcion;
        $copyProto->save();
        $id_ultimo= "PDM-" . str_pad($copyProto->id,"8","0", STR_PAD_LEFT); //Formato para codigo
        $copyProto->codigo= $id_ultimo;
        $copyProto->save();
        $tareas= Protocolo::find($protocolo->id)->protocolosTareas;
                    foreach($tareas as $tarea){                   //tareas de cada protocolo
                    $copyTarea = new Tarea();
                    $copyTarea->descripcion=$tarea->descripcion;
                    $copyTarea->duracion=$tarea->duracion;
                    $copyTarea->unidad=$tarea->uniTiempoSelect;
                    $copyTarea->save();
                    $id_ultimo= "TAR-" . str_pad( $copyTarea->id,"8","0", STR_PAD_LEFT); //Formato para codigo
                    $copyTarea= Tarea::find( $copyTarea->id);
                    $copyTarea->codigo= $id_ultimo;
                    $copyTarea->save();
                        // **************************** Asignamos nuevastareas a nuevos protocolos ********************
                        $P_T= new Prototarea();
                        $P_T->proto_id=$copyProto->id;
                        $P_T->tarea_id=$copyTarea->id;
                        $P_T->save();
                    } //Fin foreach de tareas
                        // **************************** Asignamos nuevas protocolos a nuevos planes ******************** 
                        $P_P= new Planproto();
                        $P_P->plan_id=$copyPlan->id;
                        $P_P->proto_id=$copyProto->id;
                        $P_P->save();


        }   //Fin foreach de protocolos
           $plan = Plan::latest()->first();
        return redirect()->route('plans.show', $plan->id);
    }  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plan $plan)
    {
        //
    }
}
