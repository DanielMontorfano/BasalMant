<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipo;


class SearchEquipoController extends Controller
{  
   public function equipos(request $request){
      //$term = $request->get('term');
      //$querys=Equipo::where('marca','LIKE','%'.$term.'%');
       // goto salir;
        //return $dato;
        $term = $request->get('term');
        $length = strlen($term);  //PAra que empiece a buscar a partir de determinada longitud
        if($length>2){
        $querys=Equipo::where('codEquipo','LIKE','%'.$term.'%')
        ->orWhere('modelo','LIKE','%'.$term.'%')->get();
        //->orWhere('marca','LIKE','%'.$term.'%')->get();
        //$querys=Equipo::all();
        $data =  [];
        $id_B = [];
        foreach($querys as $query){
           $data[] = [
            'label' =>$query->codEquipo ." ". $query->modelo . " " . $query->id,    //Ojo el simbolo => es para arrays
         ];
          }

        }else{$data[] = [
         'label' =>'NADA1' ." ". 'Nada2' . " " . 'Nada3'    //Ojo el simbolo => es para arrays
      ];}
        // salir:
        //return $term;
         return $data;
        //return $querys;
        //return $term;

    }
    
}
