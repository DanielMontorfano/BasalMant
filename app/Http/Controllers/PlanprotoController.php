<?php

namespace App\Http\Controllers;

use App\Models\Planproto;
use Illuminate\Http\Request;
use App\Http\Requests\StorePlanProtoRequest;
use App\Models\Plan;
use App\Models\Protocolo;

class PlanprotoController extends Controller
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
    // public function store(StorePlanProtoRequest $request) //esto funciona una vez creado StoreEquipo de Request
    public function store(Request $request) //esto funciona una vez creado StoreEquipo de Request
    {
        
       // dd(request()->all());
       // return;

        //$request->validate(['codEquipo'=>'required|max:8', 'marca'=>'required|min:3', 'modelo'=>'required']);
        //return $request->all();  //Para probar que recibo todos losregistros del formulario
        $Selector=$request->get('Selector'); //toma del formulario
        
       // $repuesto_id=$request->get('repuestosSelect'); //repuesto  a agregar
      // goto salir;
       //**************** $proto_id=$request->get('proto_id'); //toma del formulario
       $plan_id=$request->get('plan_id'); //toma del formulario

       // $check1=$request->get('check1');
       // if($check1){
       //    $check1="on";
       // }
        //dd(request()->all());
       //echo "ddd:" . $check1;
       
        //$descripcion= substr("$search", 10, 50);
        // *********************$protocolo=Protocolo::find($proto_id);
        $plan=Plan::find($plan_id);
        // $repuesto_id2=Repuesto::where('');
        //echo $search;
        //$querys=Repuesto::where('descripcion','LIKE','%'.$descripcion.'%')->get();
        //foreach($querys as $query){
        //$descripcion =$query->descripcion;   //Ojo el simbolo => es para arrays
        //}
        //echo"----- $Selector";
        if ($Selector=="Agregarproto"){  
        $search=$request->get('search'); //toma cadena completa del formulario
        $protoCodigo = substr("$search", 0, 12); //Extrae solo la descripcion
        $proto_id=Protocolo::where('codigo',$protoCodigo)->first()->id;       
        //goto salir; 
        //$equipo=Equipo::find($equipo_id); //de la tabla equipos**Puede andar pero no graba con time at 
        // $equipo->equiposRepuestos()->attach($repuesto_id); //**Puede andar pero no graba con time at

        $existeVinculo = $plan->plansProtocolos()->where('proto_id', $proto_id)->exists();
        if($existeVinculo){
        echo "existe el Vinculo";  
        $mensaje='existe el Vinculo'; 
        goto salir;
        }
        $mensaje='';
        $P_P= new Planproto();
        $P_P->plan_id=$plan_id;
        $P_P->proto_id=$proto_id;
              
        // $equipo=Equipo::find($equipo_id); // Solo leo este registro para poder retornar correctamente
        $P_P->save();
        goto salir; }
         
         if ($Selector=="BorrarProto"){  
         $protoBorrar_id=$request->get('protoBorrar_id');   //toma del formulario
         //$equipo=Equipo::find($equipo_id);   
         $plan->plansProtocolos()->detach( $protoBorrar_id); //de la tabla equipo_repuesto   
        // echo " Debemos Borrar";   
         goto salir;
        }
         
        
        // salir:  $par="$Selector,$repuesto_id,$equipo_id";
        //return $par ; 
        salir:
        return redirect()->route('plans.edit', $plan->id); //Buenisimo, de una clase a otra clase
       //echo  $tareaCodigo ;
        echo $Selector;
       // echo $tarea_id;
        echo  $tareaBorrar_id;
        echo $proto_id;
        return ;
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Planproto  $planproto
     * @return \Illuminate\Http\Response
     */
    public function show(Planproto $planproto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Planproto  $planproto
     * @return \Illuminate\Http\Response
     */
    public function edit(Planproto $planproto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Planproto  $planproto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Planproto $planproto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Planproto  $planproto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Planproto $planproto)
    {
        //
    }
}
