<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Equipo;
use App\Models\Tareash;
use Illuminate\Support\Facades\DB;


class HistorialController extends Controller
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
    

    

    public function historialPreventivo($id) //entro con id de Equipo
    {   
        $equipo=Equipo::find($id);
        $tareas=Equipo::find($id)->equiposTareash; //Todas las tareas sobre este equipo
        $tareash=Tareash::all();
        
       /*  foreach ($tareas as $tarea) {
          
                echo $tarea->pivot->updated_at;
           
            
        } */
        

      return view('historial.preventivo',compact('tareas','equipo'));
      // return  ;

    }
    public function  historialCorrectivo($id) //entro con id de Equipo
    {   
        $equipo=Equipo::find($id);
        $ots_e=Equipo::find($id)->ordentrabajo; 
        /*
        foreach ($ots_e1 as $ot) {
            if($ot->created_at == $ot->updated_at){
                $ot->fecha2='---';
            }
            
        }*/
        

       return view('historial.correctivo',compact('ots_e','equipo'));
      // return  ;

    } 



    public function  historialTodos($id) //entro con id de Equipo
    {   
        $equipo=Equipo::find($id);
        $ots_e=Equipo::find($id)->ordentrabajo; 

        $tareas=Equipo::find($id)->equiposTareash; //Todas las tareas sobre este equipo
        $tareash=Tareash::all();
        $tareasR=DB::table('tareashes')->where('equipo_id', $id)->get();
        $trabajosRealizados = $ots_e->concat( $tareasR);
        $numero = count($trabajosRealizados)-1;  //Contamos la cantidad de registros a guardar2
        foreach( $tareas as $tarea){
          $descripcion= $tarea->descripcion;
          $tcheck= $tarea->pivot->tcheck;
          $fecha=  $tarea->updated_at;
          $fecha= substr($tarea->updated_at, 0, 10); //Para tomar solo la fecha sin hora
          $plan=$tarea->pivot->plan_id;
          $operario=$tarea->pivot->operario;

          $detalle=$descripcion . "(" . $tcheck . ") " ; 
          $registro1[] =array('detalle'=> $detalle, 'origen' => $plan, 'fecha'=>$fecha,  'operario' => $operario);
          // echo $tarea;
          $descripcion1[]= $detalle;
          $plan_id[]=$plan;
        }
      //  echo "************************************";
        foreach( $ots_e as $ot_e){
            $det2= $ot_e->det2;
            $estado= $ot_e->estado;
            $fecha= substr($ot_e->updated_at, 0, 10); //Para tomar solo la fecha sin hora
            $Norden="O.d.T " . $ot_e->id;
            $operario= $ot_e->per_cierra;
            $detalle=$det2 ." " ."(". $estado .")"; 
            $registro2[] =array('detalle'=> $detalle, 'origen' => $Norden, 'fecha'=>$fecha,  'operario' => $operario);
            $descripcion2[]=$detalle;
            $Norden1[]= $Norden;

           }
           //********************************************************** */
          /* foreach($tareas as $tarea){
            // echo $plan->id . "*" . $protocolo->codigo . "*" . $tarea->codigo .  "*" .  $tarea->descripcion . "<br>";
                
              $Tareas[] =array('cod'=>$protocolosParciales->codigo, 'codigoTar' => $tarea->codigo, 'descripcion' => $tarea->descripcion, $tarea->duracion);
           
        }*/
           //var_export ($detalles1);
          // var_export ($detalles2);
           //echo "************************************";
           $registros= array_merge($registro1, $registro2);
           $origenes= array_merge($plan_id, $Norden1);

           //var_export ( $origen);
             
       /* foreach($detalles as $detalle){
            echo $detalle;
        }*/


       return view('historial.todos',compact('tareas', 'ots_e', 'equipo', 'registros'));
       return $registros;

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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
