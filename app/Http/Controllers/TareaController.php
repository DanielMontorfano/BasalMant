<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTareaRequest;
use Illuminate\Support\Facades\DB;

class TareaController extends Controller
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
       // $tareas= Tarea::orderBy('id','desc')->paginate();
        $tareas= Tarea::all();
       // return $equipos;   //Sirve para ver la consulta
        return view('tareas.index',compact('tareas')); //Envío todos los registro en cuestión.La consulta va sin simbolo de pesos
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   

        $ultimasTareas = Tarea::orderBy('created_at', 'desc')->take(5)->get();
        return view('tareas.create', ['ultimasTareas' => $ultimasTareas]);
       // return view('tareas.create');
        //return;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTareaRequest $request)
    {
      //$request->validate(['duracion'=>'required|max:60', 'descripcion'=>'required, 'codigo'=>'required']);
        //return $request->all();  //Para probar que recibo todos losregistros del formulario
      
        // las siguentes lineas seria en forma manual, 
        $tarea= new Tarea();
        //$tarea->codigo=$request->codigo;
        $tarea->descripcion=$request->descripcion;
        $tarea->duracion=$request->duracion;
        $tarea->unidad=$request->uniTiempoSelect;
        $tarea->save();
        $id_ultimo= "TAR-" . str_pad($tarea->id,"8","0", STR_PAD_LEFT); //Formato para codigo
        $tarea= Tarea::find($tarea->id);
        $tarea->codigo= $id_ultimo;
        $tarea->save();

     
        //Asi se realizará con Asignacion Masiva, es mas simple, pero se debe colocar 
        //en el modelo Equipo "protected $fillable=[array que se desea]"
        //esto asigna todo el formulario de una vez, y hace el save() automaticamente
        //$equipo=Equipo::create($request->all());
       //***** return redirect()->route('equipos.show', $tarea->id); //se puede omitir ->id, igual funciona
        //return view('Equipos.store');
        return redirect()->route('tareas.create');
       // return redirect()->route('tareas.show', $tarea->id);
    }  

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tarea= Tarea::find($id); // Ver la linea de abajo alternativa
        
        return view('tareas.show', compact('tarea')); //Envío todo el registro en cuestión
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
        
        $tarea=Tarea::find($id);

        //dd($tarea);
        //return;
        return view('tareas.edit',compact('tarea'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //$request->validate(['codigo'=>'required', 'descricion'=>'required', 'modelo'=>'required']);
        $tarea= Tarea::find($id);
        $tarea->codigo=$request->codigo;
        $tarea->descripcion=$request->descripcion;
        $tarea->duracion=$request->duracion;
        $tarea->unidad=$request->uniTiempoSelect;
        $tarea->save();
        


        $tareas= Tarea::all();
        return redirect()->route('tareas.edit',compact('tarea') );
       // return view('tareas.index', compact('tareas')); //Envío show todo el registro en cuestión, sin $
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $x= "borrar" . $id;
        return $x;
    }
}
