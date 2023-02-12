<?php

namespace App\Http\Controllers;
use App\Models\Equipo;
use App\Models\OrdenTrabajo;
use App\Models\Plan;
use App\Models\Protocolo;

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
  
  


 

}