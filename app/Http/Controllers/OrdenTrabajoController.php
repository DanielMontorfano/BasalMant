<?php

namespace App\Http\Controllers;

use App\Models\OrdenTrabajo;
use App\Models\Equipo;
use Illuminate\Http\Request;
use App\Http\Requests\StoreOrdenRequest; 
use App\Http\Requests\StoreOrdenCerrarRequest; 
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Alarma; 

class OrdenTrabajoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {       
        //
       
       $usuario = Auth::user();
       // Verificar si hay alarmas asignadas al usuario autenticado
       $aviso = Alarma::where('asignadoA', $usuario->name)->exists();
 
      //  $ots= OrdenTrabajo::orderBy('id','desc')->paginate();
        $ots= OrdenTrabajo::all();
        

        //$odenesDeEsteEquipo=Equipo::find($id)->ordentrabajo;
       // $equipos= Equipo::orderBy('id','desc')->paginate();
       // return $equipos;   //Sirve para ver la consulta
     return view('ordentrabajo.index',compact('ots', 'usuario')); //Envío todos los registro en cuestión.La consulta va sin simbolo de pesos
     
    }
    public function list($id) //entro con id de Equipo
    {   
        $equipo=Equipo::find($id);
        $ots_e=Equipo::find($id)->ordentrabajo; 
        /*
        foreach ($ots_e1 as $ot) {
            if($ot->created_at == $ot->updated_at){
                $ot->fecha2='---';
            }
            
        }*/
        

       return view('ordentrabajo.list',compact('ots_e','equipo'));
      //  return  $ots_e;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createorden($id)
{
    $equipo = Equipo::find($id);
    $usuarios=User::all();
    $solicitante = Auth::user(); // Obtener el usuario autenticado
    return view('ordentrabajo.create', compact('equipo', 'solicitante', 'usuarios'));
}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrdenRequest $request) //(StoreOrdenRequest $request) esto funciona una vez creado StoreEquipo de Request
    //public function store(Request $request) //Antes de usar archivo StoreEquipo en Request
    {
        //$request->validate(['codEquipo'=>'required|max:8', 'marca'=>'required|min:3', 'modelo'=>'required']);
       // return $request->all();  //Para probar que recibo todos losregistros del formulario
       // echo "codigo de equipo:" . $request->equipo_id;
         //goto salir;
        // las siguentes lineas seria en forma manual, 
        //dd($request->all());
       // goto salir;

        
        $orden= new OrdenTrabajo();
        $id=$request->equipo_id;
        $orden->equipo_id=$request->equipo_id; //Ojo con las variables recibidas

        $orden->solicitante=$request->solicitante;
        $orden->fechaNecesidad=$request->input('fechaNecesidad');// Para que reconozca la fecha
        $orden->asignadoA=$request->asignadoA;
        $orden->prioridad=$request->prioridad;
        $orden->det1=$request->det1;
        $orden->estado="Abierta"; //si viene de abrir siempre será abieta
         
       
        //$id=$request->equiposSelect;
        //$equipo=new Equipo();
        $equipo= Equipo::find($id);
       // $orden->codEquipo=$equipo->codEquipo;
        //echo $codEquipo;
        $orden->save();
        
        //salir:
        //Asi se realizará con Asignacion Masiva, es mas simple, pero se debe colocar 
        //en el modelo Equipo "protected $fillable=[array que se desea]"
        //esto asigna todo el formulario de una vez, y hace el save() automaticamente
        //$equipo=Equipo::create($request->all());
        return redirect()->route('ordentrabajo.list', $equipo->id); //se puede omitir ->id, igual funciona
        //return view('ordentrabajo.index');
        //return $request->all();
        //return $orden;
        salir:
       // date_default_timezone_set('America/Argentina/Salta');
        phpinfo();
        return;

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OrdenTrabajo  $ordenTrabajo
     * @return \Illuminate\Http\Response
     */
    public function show($id)  //entro con id de orden de trabajo
    {   //$equipo= OrdenTrabajo::find($id);
      //  $odenesTodos=Equipo::find($id)->fotos;
          //$odenesTodos=Equipo::find($id)->ordentrabajo;
          $ot=OrdenTrabajo::find($id);
          $aux=$ot->equipo_id; //con id de orden recupero el equipo comoleto
          $equipo= Equipo::find($aux);
         
        // return $id_orden ;
        //return view('ordentrabajo.show', compact('equipo', 'consulta','estado', 'id_orden'));
       return view('ordentrabajo.show', compact('equipo', 'ot'));

       // return  $ot;
    } 

    public function showCerrar($id)  //entro con id de orden de trabajo
    {   //$equipo= OrdenTrabajo::find($id);
      //  $odenesTodos=Equipo::find($id)->fotos;
          //$odenesTodos=Equipo::find($id)->ordentrabajo;

          $ot=OrdenTrabajo::find($id);
          $aux=$ot->equipo_id; //con id de orden recupero el equipo comoleto
          $equipo= Equipo::find($aux);
          $usuarios=User::all();
          $aprobadoPor = Auth::user(); // Obtener el usuario autenticado

        // return $id_orden ;
        //return view('ordentrabajo.show', compact('equipo', 'consulta','estado', 'id_orden'));
          return view('ordentrabajo.showCerrar', compact('equipo', 'ot','usuarios', 'aprobadoPor' ));

       // return  $ot;
    } 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OrdenTrabajo  $ordenTrabajo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {  
       $ot=OrdenTrabajo::find($id);
       $equipo_id=$ot->equipo_id;
       $equipo=Equipo::find($equipo_id);
      return view('ordentrabajo.edit', compact('ot','equipo'));
      //return $equipo;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OrdenTrabajo  $ordenTrabajo
     * @return \Illuminate\Http\Response
     */
    public function update(StoreOrdenCerrarRequest $request, $id)
    {
        
      //dd($request);
      // Buscar la orden de trabajo
        $ot = OrdenTrabajo::find($id);
    
        // Verificar si la orden de trabajo existe
        if (!$ot) {
            return redirect()->back()->with('error', 'Orden de trabajo no encontrada.');
        }
    
        // Validar todos los campos recibidos
        $validatedData = $request->validated();
        
        // Actualizar los datos de la orden de trabajo
        $ot->aprobadoPor = $validatedData['aprobadoPor'];
        $ot->realizadoPor = $validatedData['realizadoPor'];
        $ot->fechaEntrega = $request->fechaEntrega;
        $ot->fechaAprobado = $request->fechaAprobado;
        $ot->det2 = $validatedData['det2'];
        // Asegurarse de que det3 está definido antes de asignarlo
        if (isset($validatedData['det3'])) {
            $ot->det3 = $validatedData['det3'];
        }
    
        // Cambiar el estado a 'Cerrada'
        $ot->estado = "Cerrada";
        $ot->save();
    
        // Obtener el equipo y sus órdenes de trabajo
        $equipo = Equipo::find($ot->equipo_id);
        $ots_e = $equipo->ordentrabajo;
    
        // Redirigir a la vista de la lista de órdenes de trabajo
        return view('ordentrabajo.list', compact('ots_e', 'equipo'));
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrdenTrabajo  $ordenTrabajo
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrdenTrabajo $ordenTrabajo)
    {
        //
    }
}
