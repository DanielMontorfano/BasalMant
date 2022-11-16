<?php

namespace App\Http\Controllers;

use App\Models\Prototarea;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProtoTareasRequest;
use App\Models\Protocolo;
use App\Models\Tarea;


class PrototareaController extends Controller
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
    public function store(StoreProtoTareasRequest $request) //esto funciona una vez creado StoreEquipo de Request
    {
        
        //dd(request()->all());
        //return;
        //$request->validate(['codEquipo'=>'required|max:8', 'marca'=>'required|min:3', 'modelo'=>'required']);
        //return $request->all();  //Para probar que recibo todos losregistros del formulario
        $Selector=$request->get('Selector'); //toma del formulario
        
       // $repuesto_id=$request->get('repuestosSelect'); //repuesto  a agregar
      // goto salir;
        $proto_id=$request->get('proto_id'); //toma del formulario
       // $check1=$request->get('check1');
       // if($check1){
       //    $check1="on";
       // }
        //dd(request()->all());
       //echo "ddd:" . $check1;
       
        //$descripcion= substr("$search", 10, 50);
        $protocolo=Protocolo::find($proto_id);
        //return $protocolo;
        // $repuesto_id2=Repuesto::where('');
        //echo $search;
        //$querys=Repuesto::where('descripcion','LIKE','%'.$descripcion.'%')->get();
        //foreach($querys as $query){
        //$descripcion =$query->descripcion;   //Ojo el simbolo => es para arrays
        //}
        //echo"----- $Selector";
        if ($Selector=="AgregarTarea"){  
        $search=$request->get('search'); //toma cadena completa del formulario
        $tareaCodigo = substr("$search", 0, 12); //Extrae solo la descripcion
       // return $tareaCodigo;
        $tarea_id=Tarea::where('codigo',$tareaCodigo)->first()->id;       
        //goto salir; 
        //$equipo=Equipo::find($equipo_id); //de la tabla equipos**Puede andar pero no graba con time at 
        // $equipo->equiposRepuestos()->attach($repuesto_id); //**Puede andar pero no graba con time at

        $existeVinculo = $protocolo->ProtocolosTareas()->where('tarea_id', $tarea_id)->exists();
        if($existeVinculo){
        echo "existe el Vinculo";  
        $mensaje='existe el Vinculo'; 
        goto salir;
        }
        $mensaje='';
        $P_T= new Prototarea();
        $P_T->proto_id=$proto_id;
        $P_T->tarea_id=$tarea_id;
              
        // $equipo=Equipo::find($equipo_id); // Solo leo este registro para poder retornar correctamente
        $P_T->save();
        goto salir; }
         
         if ($Selector=="BorrarTarea"){  
         $tareaBorrar_id=$request->get('tareaBorrar_id');   //toma del formulario
         //$equipo=Equipo::find($equipo_id);   
         $protocolo->protocolosTareas()->detach( $tareaBorrar_id); //de la tabla equipo_repuesto   
        // echo " Debemos Borrar";   
         goto salir;
        }
         
        
        // salir:  $par="$Selector,$repuesto_id,$equipo_id";
        //return $par ; 
        salir:
        return redirect()->route('protocolos.edit', $protocolo->id); //Buenisimo, de una clase a otra clase
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
     * @param  \App\Models\Prototarea  $prototarea
     * @return \Illuminate\Http\Response
     */
    public function show(Prototarea $prototarea)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Prototarea  $prototarea
     * @return \Illuminate\Http\Response
     */
    public function edit(Prototarea $prototarea)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Prototarea  $prototarea
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prototarea $prototarea)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prototarea  $prototarea
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prototarea $prototarea)
    {
        //
    }
}
