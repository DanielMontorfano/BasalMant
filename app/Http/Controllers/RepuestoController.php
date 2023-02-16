<?php

namespace App\Http\Controllers;

use App\Models\Repuesto;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRepuestoRequest;

class RepuestoController extends Controller
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
        //$repuestos= Repuesto::latest('id')->get();
        $repuestos= Repuesto::all();
       // return $equipos;   //Sirve para ver la consulta
        return view('repuestos.index',compact('repuestos')); //Envío todos los registro en cuestión.La consulta va sin simbolo de pesos
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('repuestos.create');
        //return;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRepuestoRequest $request)
    {
      //$request->validate(['duracion'=>'required|max:60', 'descripcion'=>'required, 'codigo'=>'required']);
        //return $request->all();  //Para probar que recibo todos losregistros del formulario
      
        // las siguentes lineas seria en forma manual, 
        $repuesto= new Repuesto();
        //$tarea->codigo=$request->codigo;
        $repuesto->codigo=$request->codigo;
        $repuesto->descripcion=$request->descripcion;
        $repuesto->save();
        //return 'listo';
        return redirect()->route('repuestos.index', $repuesto->id);
    }  

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Repuesto  $repuesto
     * @return \Illuminate\Http\Response
     */
    public function show(Repuesto $repuesto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Repuesto  $repuesto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
        
        $repuesto=Repuesto::find($id);
        //dd($tarea);
        //return;
        return view('repuestos.edit',compact('repuesto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Repuesto  $repuesto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //$request->validate(['codigo'=>'required', 'descricion'=>'required', 'modelo'=>'required']);
        $repuesto= Repuesto::find($id);
        $repuesto->codigo=$request->codigo;
        $repuesto->descripcion=$request->descripcion;
        $repuesto->save();
        


        $repuestos= Repuesto::all();
        return redirect()->route('repuestos.index');
       // return view('tareas.index', compact('tareas')); //Envío show todo el registro en cuestión, sin $
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Repuesto  $repuesto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Repuesto $repuesto)
    {
        //
    }
}
