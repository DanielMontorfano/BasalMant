<?php

namespace App\Http\Controllers;

use App\Models\Protocolo;
use App\Models\Tarea;
use App\Models\Equipo;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProtocoloRequest;


class ProtocoloController extends Controller
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
        //$protocolos= Protocolo::orderBy('id','desc')->paginate();//->paginate();
        $protocolos= Protocolo::all();
       // return $protocolos;   //Sirve para ver la consulta
        return view('protocolos.index',compact('protocolos')); //Envío todos los registro en cuestión.La consulta va sin simbolo de pesos
      // dd($protocolos->all());
      // return;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tareas= Tarea::all();
        //return $repuestos;
        
        return view('protocolos.create',compact('tareas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProtocoloRequest $request)
    {
      //$request->validate(['duracion'=>'required|max:60', 'descripcion'=>'required, 'codigo'=>'required']);
        //return $request->all();  //Para probar que recibo todos losregistros del formulario
        // return "Sali";
        // las siguentes lineas seria en forma manual, 
        $protocolo= new Protocolo();
       // $protocolo->codigo=$request->codigo;
        $protocolo->descripcion=$request->descripcion;
        $protocolo->save();
        $id_ultimo= "PDM-" . str_pad($protocolo->id,"8","0", STR_PAD_LEFT); //Formato para codigo
        $tarea= Protocolo::find($protocolo->id);
        $protocolo->codigo= $id_ultimo;
        $protocolo->save();
        
        $tareasTodos=Tarea::all();
        $protocolo=Protocolo::find($protocolo->id);
        $tareas= Protocolo::find($protocolo->id)->protocolosTareas;
        return view('protocolos.edit', compact('protocolo','tareas', 'tareasTodos'));
     
       //Asi se realizará con Asignacion Masiva, es mas simple, pero se debe colocar 
       //en el modelo Equipo "protected $fillable=[array que se desea]"
       //esto asigna todo el formulario de una vez, y hace el save() automaticamente
       //$equipo=Equipo::create($request->all());
       // *****return redirect()->route('protocolos.show', $protocolo->id); //se puede omitir ->id, igual funciona
       //return view('Equipos.store');
       //return "LISTA";
    }  

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Protocolo  $protocolo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {  //******* $equipo=Equipo::find($id);
       //******* $plan=$equipo->equiposPlans;
        //$plans=Equipo::find($id)->equiposPlans;
        $protocolo= Protocolo::find($id); // Ver la linea de abajo alternativa
        $tareas=$protocolo->protocolosTareas; // otra alternativa: $repuestos= Equipo::find($id)->equiposRepuestos; en una sola linea. 
        
        //return $equipo;
        //return 'hhhhhhhhhhhhhhhh' . $repuestos;
        //return view('Equipos.show', ['variable'=>$equipo]); video anterior

       return view('protocolos.show', compact('protocolo','tareas')); //Envío todo el registro en cuestión

       // return view('Equipos.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Protocolo  $protocolo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   //$equipo=Equipo::find($id);
        $tareasTodos=Tarea::all();
        $protocolo=Protocolo::find($id);
        $tareas= Protocolo::find($id)->protocolosTareas; //"protocolosTareas" Metodo perteneciente al modelo Protocolo
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
        return view('protocolos.edit', compact('protocolo','tareas', 'tareasTodos'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Protocolo  $protocolo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    { //$request trae lo del formulario, $id el id de equipo, trae lo que tengo en el registro sin modificar                                  
       // $request->validate(['codigo'=>'required', 'descripcion'=>'required']);
        $protocolo= Protocolo::find($id);
        //$d=$request->descripcion;
        //return $request;
        $tareas=$protocolo->protocolosTareas;
        $protocolo->codigo=$request->codigo;
        $protocolo->descripcion=$request->descripcion;
        $protocolo->save();      
        
        return view('protocolos.edit', compact('protocolo','tareas')); //Envío show todo el registro en cuestión, sin $
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Protocolo  $protocolo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Protocolo $protocolo)
    {
        //
    }
}
