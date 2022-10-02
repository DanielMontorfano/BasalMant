<?php

namespace App\Http\Controllers;

use App\Models\Protocolo;
use App\Models\Tarea;
use App\Models\Equipo;
use Illuminate\Http\Request;

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
        $protocolos= Protocolo::orderBy('id','desc')->paginate();
        
       // return $protocolos;   //Sirve para ver la consulta
        return view('protocolos.index',compact('protocolos')); //Envío todos los registro en cuestión.La consulta va sin simbolo de pesos
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
    public function store(Request $request)
    {
      //$request->validate(['duracion'=>'required|max:60', 'descripcion'=>'required, 'codigo'=>'required']);
        //return $request->all();  //Para probar que recibo todos losregistros del formulario
      
        // las siguentes lineas seria en forma manual, 
        $protocolo= new Protocolo();
        $protocolo->codigo=$request->codigo;
        $protocolo->descripcion=$request->descripcion;
        
        
        $protocolo->save();
     
        //Asi se realizará con Asignacion Masiva, es mas simple, pero se debe colocar 
        //en el modelo Equipo "protected $fillable=[array que se desea]"
        //esto asigna todo el formulario de una vez, y hace el save() automaticamente
        //$equipo=Equipo::create($request->all());
       //***** return redirect()->route('equipos.show', $tarea->id); //se puede omitir ->id, igual funciona
        //return view('Equipos.store');
       return "LISTA";
    }  

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Protocolo  $protocolo
     * @return \Illuminate\Http\Response
     */
    public function show(Protocolo $protocolo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Protocolo  $protocolo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {    $equipo=Equipo::find($id);
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
        return view('protocolos.edit', compact('equipo','protocolo','tareas', 'tareasTodos'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Protocolo  $protocolo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Protocolo $protocolo)
    {
        //
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
