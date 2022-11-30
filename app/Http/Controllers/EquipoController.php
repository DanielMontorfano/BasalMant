<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEquipo;
use Illuminate\Support\Facades\DB;
use App\Models\EquipoRepuesto;
use App\Models\Repuesto;
use App\Models\Foto;
use App\Models\Documento;
use App\Models\Plan;
use App\Models\Protocolo;

//use Illuminate\Support\Collection;



class EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$equipos= Equipo::orderBy('id','desc')->paginate(); //NO le GUSTA con el PLUG IN datatable;!!!!
        $equipos= Equipo::all(); //Trae todos los registros
       // return $equipos;   //Sirve para ver la consulta
       return view('equipos.index',compact('equipos')); //Envío todos los registro en cuestión.La consulta va sin simbolo de pesos
       // dd ($equipos->all());
       //return;
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $repuestos= Repuesto::all();
        //return $repuestos;
        
        return view('equipos.create',compact('repuestos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(StoreEquipo $request) //esto funciona una vez creado StoreEquipo de Request
    //public function store(Request $request) //Antes de usar archivo StoreEquipo en Request
    {
        //$request->validate(['codEquipo'=>'required|max:8', 'marca'=>'required|min:3', 'modelo'=>'required']);
        //return $request->all();  //Para probar que recibo todos losregistros del formulario
      
        // las siguentes lineas seria en forma manual, 
        $equipo= new Equipo();
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
        
        //Asi se realizará con Asignacion Masiva, es mas simple, pero se debe colocar 
        //en el modelo Equipo "protected $fillable=[array que se desea]"
        //esto asigna todo el formulario de una vez, y hace el save() automaticamente
        //$equipo=Equipo::create($request->all());
        return redirect()->route('equipos.show', $equipo->id); //se puede omitir ->id, igual funciona
        //return view('Equipos.store');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
   public function show($id)  //Segunda Manera de Recuperar el registro pasando el id
        {
        $equipo= Equipo::find($id); // Ver la linea de abajo alternativa
        $repuestos=$equipo->equiposRepuestos; // otra alternativa: $repuestos= Equipo::find($id)->equiposRepuestos; en una sola linea. 
        //$plans=$equipo->equiposPlans; //Igual se puede porque ya tengo el registro
        $plans=Equipo::find($id)->equiposPlans; 
        $equiposB=Equipo::find($id)->equiposAEquiposB; 
        //return $equipo;
        //return 'hhhhhhhhhhhhhhhh' . $repuestos;
        //return view('Equipos.show', ['variable'=>$equipo]); video anterior

       return view('equipos.show', compact('equipo','repuestos', 'plans','equiposB')); //Envío todo el registro en cuestión

       // return view('Equipos.show');
    }
    
    public function showphoto($id)  //Segunda Manera de Recuperar el registro pasando el id
        {
        $equipo= Equipo::find($id); // Ver la linea de abajo alternativa
        $repuestos=$equipo->equiposRepuestos; // otra alternativa: $repuestos= Equipo::find($id)->equiposRepuestos; en una sola linea. 
        
        //return $equipo;
        //return 'hhhhhhhhhhhhhhhh' . $repuestos;
        //return view('Equipos.show', ['variable'=>$equipo]); video anterior

       return view('equipos.showphoto', compact('equipo','repuestos')); //Envío todo el registro en cuestión

       // return view('Equipos.show');
    }
    




   // public function show(Equipo $equipo) //de esta manera es mas elegante pero cuesta entender laravel sabe que se trata del id de un registro
   // {    
      // echo 'hola mundo';
       // $repuestos=['codEquipo'=>'wreq', 'marca'=>'fgfhfh', 'modelo'=>'mbnvmbnmnv'];
       // return view('equipos.show', compact('equipo', 'repuestos')); //Envío todo el registro en cuestión
        //return view('equipos.show', compact('equipo')); //Envío todo el registro en cuestión
        //return view('Equipos.show');
   // }
    








    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    //****************************************
    /*
    public function edit(Equipo $equipo)  //Primera marnera: Existen dos Maneras de recuperar el registro
    {
       // $equipo= Equipo::find($id);
        //return $equipo; //
        return view('equipos.edit', compact('equipo')); //para enviar a la vista el registro recuprado
    }
     */
    //*********************************** 
    public function edit($id)  //Segunda Manera de Recuperar el registro
    { 
        $repuestosTodos=Repuesto::all();
        
        $equipo=Equipo::find($id);
        $repuestos= Equipo::find($id)->equiposRepuestos; //"equiposRepuestos" Metodo perteneciente al modelo Equipo
        $fotosTodos=Equipo::find($id)->fotos; //Aqui hago referencia al Metodo fotos perteneciente al modelo Equipo que trae los registro del modelo fotos vinculados a este equipo
        $planes=Equipo::find($id)->equiposPlans; 
        $equiposB=Equipo::find($id)->equiposAEquiposB; 
        //$repuesto=$equipo->equiposRepuestos;
        //foreach($repuestos as $repuesto){
            //<p>factura: {{ $entrada->factura }}</p>
            //<p>fecha entrada: {{ $entrada->fecha }}</p>
            //if($repuesto->pivot->cant )
           // if(!is_null($repuesto->pivot->cant)){
            //echo  $repuesto->pivot->cant . '***' .$repuesto->codigo . '<br>';
            //}
      //  }
       // return ;
        return view('equipos.edit', compact('equipo','repuestos', 'repuestosTodos','fotosTodos','planes','equiposB'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    //public function update(Request $request, Equipo $equipo) //En realidad se abre una instancia Equipo, de la cual se recupera el registro enviado en $equipo
       public function update(Request $request, $id)
    { //$request trae lo del formulario, $id el id de equipo, trae lo que tengo en el registro sin modificar                                  
        $request->validate(['codEquipo'=>'required', 'marca'=>'required', 'modelo'=>'required']);
        $equipo= Equipo::find($id);
        $repuestos=$equipo->equiposRepuestos;
        $plans=$equipo->equiposPlans;
        $equiposB=$equipo->equiposAEquiposB;
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
       

        //return $equipo;
        //return view('Equipos.update');;
        /************************************** */
        //Asi se realizará con Asignacion Masiva, es mas simple, pero se debe colocar 
        //en el modelo Equipo "protected $fillable=[array que se desea]"
        //esto asigna todo el formulario de una vez, y hace el save() automaticamente
       // $equipo->update($request->all()); //lo suspendi porque dejo de funcionar 
       return view('equipos.show', compact('equipo','repuestos', 'plans','equiposB')); //Envío show todo el registro en cuestión, sin $
       //return $repuestos;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) // ya se instancia modelo Equipo en $equipo
    {    
        $equipo= Equipo::find($id);
        if(!is_null($equipo->id)){
          //  $equipo->delete();
            echo  'Se Borro: ' . $equipo->id  . '<br>';
            }else 'No hay nada que borrar';
     //   $equipo->delete();
    
      //  return view('Equipos.destroy', compact('equipo'));
       // return redirect()->route('equipos.index');
       return ;
    }

     
    public function equipoTareasShow($id)  //Segunda Manera de Recuperar el registro pasando el id
        {
        $equipo= Equipo::find($id); // Ver la linea de abajo alternativa
        $plans=Equipo::find($id)->equiposPlans; 
        $PlanP= [];
        $ProtocoloP = [];
        $Tareas=[];


        foreach($plans as $plan){
        $plan_id=$plan->pivot->plan_id;
        $planParciales= Plan::find( $plan_id); 
        $PlanP[]=array('id'=>$planParciales->id, 'codigo'=>$planParciales->codigo, 'nombre'=> $planParciales->nombre, 'descripcion'=> $planParciales->descripcion, 'frecuencia'=> $planParciales->frecuencia, 'unidad'=> $planParciales->unidad);
        $protocolos=$planParciales->plansProtocolos;

        foreach($protocolos as $protocolo){
            $proto_id= $protocolo->pivot->proto_id; //busco el id del protocolo relacionado
            $protocolosParciales= Protocolo::find( $proto_id); // traigo la coleccion de ese protocolo
            $ProtocoloP[]=array('id'=>$protocolosParciales->id,'codProto'=> $protocolosParciales->codigo, 'descripcion'=> $protocolosParciales->descripcion);
            $tareas=$protocolosParciales->protocolosTareas; // traigo todas las tareas de ese protocolo
        foreach($tareas as $tarea){
            // echo $plan->id . "*" . $protocolo->codigo . "*" . $tarea->codigo .  "*" .  $tarea->descripcion . "<br>";
                
              $Tareas[] =array('tarea_id'=>$tarea->id, 'cod'=>$protocolosParciales->codigo, 'codigoTar' => $tarea->codigo, 'descripcion' => $tarea->descripcion, 'duracion'=>$tarea->duracion);
           
        }
      }  
    }

      return view('equipos.equipoTareasShow', compact('equipo','PlanP', 'ProtocoloP','Tareas')); //Envío todo el registro en cuestión

       // return view('Equipos.show');
    }





}
