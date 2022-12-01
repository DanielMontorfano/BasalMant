<?php

namespace App\Http\Controllers;
use App\Models\Equipo;
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
               $pdf = PDF::loadView('imprimir', compact('equipo', 'repuestos', 'plans','equiposB'));
               return $pdf->download('imprimir2.pdf'); 
               
              //return $equipo; 
              //return view('imprimir'); 
            //  return view('imprimir2', compact('equipo'));
             // return  view('imprimir');
       
           }
    

}