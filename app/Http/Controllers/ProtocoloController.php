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
       // $tareas= Protocolo::find($protocolo->id)->protocolosTareas; // Modificado para que ordene por campo updated_at 2024
        $tareas = $protocolo->protocolosTareas()->orderBy('prototarea.updated_at', 'asc')->get();
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
    {
        // Obtiene el protocolo con el ID especificado.
        // Usamos el método find($id) para recuperar el protocolo por su ID.
        $protocolo = Protocolo::find($id);
    
        // Obtiene las tareas asociadas al protocolo, ordenadas por el campo 'updated_at' en la tabla pivote 'prototarea'.
        // 'protocolosTareas()' es la relación de muchos a muchos entre Protocolo y Tarea.
        // 'orderBy('prototarea.updated_at', 'asc')' ordena las tareas según el campo 'updated_at' de la tabla pivote 'prototarea'.
       // $tareas = $protocolo->protocolosTareas()->orderBy('prototarea.updated_at', 'asc')->get();
       // $tareas = $protocolo->protocolosTareas()->get(); //Ya vienen ordenada por id tabla pivote desde el modelo. 2024
        $tareas = $protocolo->protocolosTareas()->orderBy('prototarea.id', 'asc')->get();
        // Retorna la vista 'protocolos.show' con el protocolo y las tareas ordenadas.
        // 'compact' crea un array con las variables 'protocolo' y 'tareas', que se pasarán a la vista.
        return view('protocolos.show', compact('protocolo', 'tareas'));
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
        //$tareas= Protocolo::find($id)->protocolosTareas; //"protocolosTareas" Metodo perteneciente al modelo Protocolo
        //$tareas = $protocolo->protocolosTareas()->orderBy('prototarea.updated_at', 'asc')->get();
        $tareas = $protocolo->protocolosTareas()->orderBy('prototarea.id', 'asc')->get();
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
       // $tareas=$protocolo->protocolosTareas;
        $tareas = $protocolo->protocolosTareas()->orderBy('prototarea.updated_at', 'asc')->get();
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
