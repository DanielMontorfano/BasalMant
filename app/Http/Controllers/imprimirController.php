<?php

namespace App\Http\Controllers;
use App\Models\Equipo;
use App\Models\OrdenTrabajo;
use App\Models\Plan;
use App\Models\Protocolo;
use App\Models\Equipoplansejecut; 
use App\Models\Tareash;
use App\Models\Repuesto;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use Barryvdh\DomPDF\Facade\Pdf; 
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Dompdf; 
class imprimirController extends Controller
{
    public function imprimir(){
        
    
 /*
        $dompdf = new Dompdf();
        
        $html = file_get_contents(resource_path('views\imprimir.blade.php'));
        $dompdf->loadHtml($html); 
         
// (Optional) Setup the paper size and orientation 
$dompdf->setPaper('A4', 'landscape'); 
 
// Render the HTML as PDF 
$dompdf->render();     
 
// Output the generated PDF to Browser 
$dompdf->stream(); */

       
        $pdf = PDF::loadView('imprimir');
        return $pdf->download('imprimir2.pdf'); 
        
       //return $equipos; 
       //return view('imprimir'); 

       return  view('imprimir');

    }

    public function imprimirEquipo($id){
        
    
                
               $equipo= Equipo::find($id); // Ver la linea de abajo alternativa 
               $repuestos=$equipo->equiposRepuestos;
               $plans=Equipo::find($id)->equiposPlans; 
               $equiposB=Equipo::find($id)->equiposAEquiposB; 
               $pdf = PDF::loadView('impresiones.imprimirFichaEquipo', compact('equipo', 'repuestos', 'plans','equiposB'));
               $variable="Ficha " . $equipo->codEquipo .".pdf";
               return $pdf->download($variable); 
               
              //return $equipo; 
              //return view('imprimir'); 
            //  return view('imprimir2', compact('equipo'));
             // return  view('imprimir');
       
           }
    
           public function imprimirOrden($id){
        
    
            $ot=OrdenTrabajo::find($id);
            $equipo_id=$ot->equipo_id;    
            $equipo= Equipo::find($equipo_id); // Ver la linea de abajo alternativa
            //return view('impresiones.ordenTrabajoImp', compact('equipo', 'ot')); 
            //$repuestos=$equipo->equiposRepuestos;
           // $plans=Equipo::find($id)->equiposPlans; 
            //$equiposB=Equipo::find($id)->equiposAEquiposB; 
            $pdf = PDF::loadView('impresiones.ordenTrabajoImp', compact('equipo', 'ot'));
            $variable="O.d.T-" . $ot->id .".pdf";
           
            return $pdf->download($variable); 
            
           //return $equipo; 
           //return view('imprimir'); 
         //  return view('imprimir2', compact('equipo'));
          // return  view('imprimir');
    
        }

        public function imprimirPlan($id){
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
                  
                $Tareas[] =array('tarea_id'=>$tarea->id, 'cod'=>$protocolosParciales->codigo, 'codigoTar' => $tarea->codigo, 'descripcion' => $tarea->descripcion, 'duracion'=>$tarea->duracion, 'unidad'=>$tarea->unidad);
               // echo "bb" . $protocolosParciales->codigo;
          }
        }  
      }
        

        $pdf = PDF::loadView('impresiones.imprimirPlanEquipo', compact('equipo','PlanP', 'ProtocoloP','Tareas'));
        $variable="PLAN-" .$equipo->codEquipo.".pdf";
        return $pdf->download($variable); 

       // return view('tareash.equipoTareasShow', compact('equipo','PlanP', 'ProtocoloP','Tareas')); //Envío todo el registro en cuestión
      
       // echo "FIN";  
        //   return;
        
  
  
  
         // return view('Equipos.show');
      }
  
     // ************************************************************************************************

     public function imprimirListado($id){
      if ($id='equipos') {
        $listado=[];
        $equipos= Equipo::all();
       //$equipos = Equipo::latest()->paginate(300);

        foreach($equipos as $equipo){
        $listados[]=array('var1'=>$equipo->codEquipo, 'var2'=>$equipo->marca, 'var3'=>$equipo->modelo, 'var4'=>'', 'var5'=>'');
       
      }
      $titulo=$id; 
      $T1="Equipo";
      $T2="Descripción";
      $T3="Marca";
      $T4="";
      $T5="";

      } 
      //$titulo=$id;
      //echo'ENTRO';
      $pdf = PDF::loadView('impresiones.imprimirListado', compact('listados','titulo','T1','T2','T3','T4','T5'));
      $variable="Listado" . $id .".pdf";
      return $pdf->download($variable); 
     // return view('impresiones.imprimirListado', compact('listados','titulo'));
     // return;

     }



     public function imprimirFormulario($formulario_id)
    {
              
       // echo "estoy adentro de imprimir formulario " .  $formulario_id;
       // return;
        $formulario = Equipoplansejecut::where('id', '=', $formulario_id)->first(); //Registro completo
        $tareash= Tareash::where('numFormulario', '=', $formulario_id)->get();
        $equipo_id=$formulario->equipo_id;
        $plan_id=$formulario->plan_id; 
       // ************************************************** $resultado = Equipoplansejecut::first(['id' => $formulario]);

       $equipo= Equipo::find($equipo_id); // Ver la linea de abajo alternativa
       // $plans=Equipo::find($id)->equiposPlans; 
       $PlanP= [];
       $ProtocoloP = [];
       $Tareas=[];

       $planParciales= Plan::find( $plan_id); 
       $PlanP[]=array('id'=>$planParciales->id,'codigo'=>$planParciales->codigo, 'nombre'=> $planParciales->nombre, 'descripcion'=> $planParciales->descripcion, 'frecuencia'=> $planParciales->frecuencia, 'unidad'=> $planParciales->unidad);
       $protocolos=$planParciales->plansProtocolos;

       foreach($protocolos as $protocolo){
           $proto_id= $protocolo->pivot->proto_id; //busco el id del protocolo relacionado
           $protocolosParciales= Protocolo::find( $proto_id); // traigo la coleccion de ese protocolo
           $ProtocoloP[]=array('id'=> $protocolosParciales->id,'codProto'=> $protocolosParciales->codigo, 'descripcion'=> $protocolosParciales->descripcion);
           $tareas=$protocolosParciales->protocolosTareas; // traigo todas las tareas de ese protocolo
       foreach($tareas as $tarea){
                    
            $tcheck = tareash::where('tarea_id', '=', $tarea->id)
            ->where('numFormulario', '=', $formulario->id)
            ->pluck('tcheck')
            ->first();
        

             //return $tcheck;
             $Tareas[] =array('tarea_id'=>$tarea->id, 'cod'=>$protocolosParciales->codigo, 'codigoTar' => $tarea->codigo, 'descripcion' => $tarea->descripcion, 'duracion' =>$tarea->duracion, 'unidad' =>$tarea->unidad, 'ejecucion'=>$formulario->ejecucion, 'numFormulario'=>$formulario->numFormulario, 'tcheck'=>$tcheck);
            }
     }  
   //}
  
        $pdf = PDF::loadView('impresiones.imprimirFormulario', compact('equipo','PlanP', 'ProtocoloP','Tareas','formulario'));
        $variable="Formulario" . $formulario_id .".pdf";
        return $pdf->download($variable);       
      
    }

    // ********IMPRIMIR LUBRICACIONES****************************************************************************************

    
    public function imprimirLubric($codigo)
    {
        // Buscar el equipo por su id
        $equipo = Equipo::where('codEquipo', $codigo)->first();
        //$equipo = Equipo::find($equipo_id);
    
        // Verificar si el equipo existe
        if (!$equipo) {
            return "El equipo no existe.";
        }
    
        // Obtener todas las lubricaciones relacionadas con el equipo
        $lubricaciones = $equipo->lubricaciones;
    
        // Agrupar las lubricaciones por punto de lubricación
        $lubricacionArray = [];
        foreach ($lubricaciones as $lubricacion) {
            $puntoLubric = $lubricacion->puntoLubric;
            $lubricacionArray[$puntoLubric][] = [
                'descripcion' => $lubricacion->descripcion,
                'lubricante' => $lubricacion->lubricante,
                'muestra' => $lubricacion->pivot->muestra,
            ];
        }
        
        $pdf = PDF::loadView('impresiones.imprimirLubric', compact('lubricacionArray', 'equipo'));
        $variable="Lubricacion de:" .  $equipo->codEquipo  . ".pdf";
        return $pdf->download($variable);

        return view('impresiones.imprimirLubric', compact('lubricacionArray', 'equipo'));
    }


}