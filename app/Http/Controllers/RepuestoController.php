<?php

namespace App\Http\Controllers;

use App\Models\Repuesto;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRepuestoRequest;
use App\Rules\UnicoCodigoRule;
use App\Rules\NineCharacterRule;
use Illuminate\Support\Facades\Validator;

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
        $ultimosRepuestos = Repuesto::orderBy('created_at', 'desc')->take(5)->get();
        return view('repuestos.create', ['ultimosRepuestos' => $ultimosRepuestos]);
        
        //return;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $validator = Validator::make($request->all(), [            //Excelente para validar datos!!! 
            'codigo' => 'required|unique:repuestos,codigo|size:9', //No olvidar agregar use Illuminate\Support\Facades\Validator;
            // Otras reglas de validación aquí
        ]);
    
        // Si la validación falla, almacena los datos en una variable de sesión
        if ($validator->fails()) {
            $request->flash();         //El método flash() en el objeto $request para almacenar los datos antiguos en una variable de sesión.
            return redirect()->back()->withErrors($validator);
        }

      //$request->validate(['duracion'=>'required|max:60', 'descripcion'=>'required, 'codigo'=>'required']);
        //return $request->all();  //Para probar que recibo todos losregistros del formulario
        $regla = new UnicoCodigoRule;
        $validatedData = $request->validate([
        'codigo' => ['required', $regla],
        // otros campos aquí
        ]);
      
        $regla1 = new NineCharacterRule;
        $validatedData = $request->validate([
        'codigo' => ['required', $regla1],
        // otros campos aquí
        ]);



        // las siguentes lineas seria en forma manual, 
        $repuesto= new Repuesto();
        //$tarea->codigo=$request->codigo;
        $repuesto->codigo=$request->codigo;
        $repuesto->descripcion=$request->descripcion;
        $repuesto->save();
        $repuesto=Repuesto::find($repuesto->id);
        //return 'listo';
        return redirect()->route('repuestos.create');
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
    public function catchId(request $request){

        //dd( $request);
        $search=$request->get('search'); //toma cadena completa del formulario
        $repuestoCodigo = substr("$search", 0, 9); //Extrae solo la descripcion
        $dato=$repuestoCodigo;
        // crear una nueva instancia de la regla personalizada
                $regla1 = new NineCharacterRule;

                // crear un nuevo validador utilizando Validator::make
                $validador = Validator::make(['search' => $dato], [
                    'search' => ['required', $regla1],
                ]);
                
                // verificar si la validación falló o pasó
                if ($validador->fails()) {
                    $errors = $validador->errors();
                    //dd($validador->errors());
                    // hacer algo si la validación falló
                    return redirect()
                    ->back()
                    ->withInput()
                    ->withErrors($validador, 'search');
                } else {
                    // hacer algo si la validación pasó
                    //echo "Salio bien";
                    $repuesto_id=Repuesto::where('codigo',$repuestoCodigo)->first()->id; 
                    return redirect()->route('repuestos.edit', $repuesto_id);
                }

        //*****$repuesto_id=Repuesto::where('codigo',$repuestoCodigo)->first()->id; 
        
        
        //return  $repuesto_id; 
       //******* */  return redirect()->route('repuestos.edit', $repuesto_id);
    }
    
    


    public function edit($id)
    {
        $repuesto=Repuesto::find($id);
        //dd( $repuesto);
        //return;
        $ultimosRepuestos = Repuesto::orderBy('created_at', 'desc')->take(5)->get();
        //dd( $repuesto);
        //return view('repuestos.edit', ['ultimosRepuestos' => $ultimosRepuestos]);
        return view('repuestos.edit',compact('repuesto'),['ultimosRepuestos' => $ultimosRepuestos]);
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
        $validator = Validator::make($request->all(), [            //Excelente para validar datos!!! 
            'codigo' => 'required|size:9', //No olvidar agregar use Illuminate\Support\Facades\Validator;
            // Otras reglas de validación aquí
        ]);
        //'codigo' => 'required|unique:repuestos,codigo|size:9', Esta linea comprueba que sea unico, pero aqui no sirve
        // Si la validación falla, almacena los datos en una variable de sesión
        if ($validator->fails()) {
            $request->flash();         //El método flash() en el objeto $request para almacenar los datos antiguos en una variable de sesión.
            return redirect()->back()->withErrors($validator);
        }

      //$request->validate(['duracion'=>'required|max:60', 'descripcion'=>'required, 'codigo'=>'required']);
        //return $request->all();  //Para probar que recibo todos losregistros del formulario
       /* $regla = new UnicoCodigoRule;
        $validatedData = $request->validate([
        'codigo' => ['required', $regla],
        // otros campos aquí
        ]);*/
      
        $regla1 = new NineCharacterRule;
        $validatedData = $request->validate([
        'codigo' => ['required', $regla1],
        // otros campos aquí
        ]);
        //********************************************** */
        $repuesto= Repuesto::find($id);
        $repuesto->codigo=$request->codigo;
        $repuesto->descripcion=$request->descripcion;
        $repuesto->save();
        


        $repuestos= Repuesto::all();
        return redirect()->route('repuestos.edit', $repuesto->id );
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
