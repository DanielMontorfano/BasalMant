<?php

namespace App\Http\Controllers;

use App\Models\OrdenTrabajo;
use App\Models\Equipo;
use Illuminate\Http\Request;
use App\Http\Requests\StoreOrdenRequest;

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
       // $equipos= Equipo::all();  //Trae todos los registro
        
        $ots= OrdenTrabajo::orderBy('id','desc')->paginate();
       
        //$odenesDeEsteEquipo=Equipo::find($id)->ordentrabajo;
       // $equipos= Equipo::orderBy('id','desc')->paginate();
       // return $equipos;   //Sirve para ver la consulta
       return view('ordentrabajo.index',compact('ots')); //Envío todos los registro en cuestión.La consulta va sin simbolo de pesos
       
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
    public function createorden($id) //entro con id de Equipo
    {
        //$equipos= Equipo::all();
        $equipo=Equipo::find($id); //SOlo el equipo a quien voy a crear la OT
        //return $repuestos;
        
       // return view('equipos.create',compact('repuestos'));
       return view('ordentrabajo.create', compact('equipo'));
       //return $equipo;

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrdenRequest $request) //esto funciona una vez creado StoreEquipo de Request
    //public function store(Request $request) //Antes de usar archivo StoreEquipo en Request
    {
        //$request->validate(['codEquipo'=>'required|max:8', 'marca'=>'required|min:3', 'modelo'=>'required']);
        //return $request->all();  //Para probar que recibo todos losregistros del formulario
       // echo "codigo de equipo:" . $request->equipo_id;
         //goto salir;
        // las siguentes lineas seria en forma manual, 
        $orden= new OrdenTrabajo();
        $id=$request->equipo_id;
        $orden->equipo_id=$request->equipo_id; //Ojo con las variables recibidas
        $orden->de=$request->de;
        $orden->para=$request->para;
        $orden->det1=$request->det1;
        $orden->estado="Abierta"; //si viene de abrir siempre será abieta
        $orden->per_abre=$request->per_abre;
        $orden->fecha1=$request->created_at;
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
        //return;

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
       return view('ordentrabajo.show', compact('equipo', 'ot' ));

      // return  $equipo;
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
    public function update(Request $request, $id)
    { //$request trae lo del formulario, $id el id de equipo, trae lo que tengo en el registro sin modificar                                  
       /* $request->validate(['codEquipo'=>'required', 'marca'=>'required', 'modelo'=>'required']);
        $ot= OrdenTrabajo::find($id);
        $repuestos=$equipo->equiposRepuestos;
        $equipo->codEquipo=$request->codEquipo;
        $equipo->marca=$request->marca;
        $equipo->modelo=$request->modelo;
        $equipo->idSecc=$request->idSecc;
        $equipo->idSubSecc=$request->idSubSecc;
        $equipo->det1=$request->det1;
        $equipo->det2=$request->det2;
        $equipo->det3=$request->det3;
        $equipo->det4=$request->det4;
        $equipo->det5=$request->det5;
        $equipo->save();
       
        
        return view('equipos.show', compact('equipo','repuestos')); //Envío show todo el registro en cuestión, sin $
        */
       // return view('equipos.show', compact('equipo','repuestos'));
       $ot= OrdenTrabajo::find($id);
       $equipo_id=$ot->equipo_id;
       $ot->det2=$request->det2;
       $ot->per_cierra=$request->per_cierra;
       $ot->estado=$request->estado;
       $ot->fecha2=$request->updated_at;
       $vars= getdate();
       
        /*foreach ($vars as $var) {
            if($ot->created_at == $ot->updated_at){
                $ot->fecha2='---';
            }*/
            
        
        
       //$ot->fecha2='hola';
       $ot->save();
      
        // return $request;
       
       $equipo=Equipo::find($equipo_id);
       $ots_e=Equipo::find($equipo_id)->ordentrabajo; 
       return view('ordentrabajo.list',compact('ots_e','equipo'));
       //return redirect()->route('ordentrabajo.list', $equipo->id);
       //return $vars;
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
