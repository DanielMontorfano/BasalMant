<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Repuesto;


class SearchRepuestosController extends Controller
{  
    public function repuestos(request $request){
        //$aux="adentro";
       // return $aux; //$request;
        $term = $request->get('term');
        $length = strlen($term);  //PAra que empiece a buscar a partir de determinada longitud
        if($length>2){
        $querys=Repuesto::where('codigo','LIKE','%'.$term.'%')
        ->orWhere('descripcion','LIKE','%'.$term.'%')->get();
        $data =  [];
        foreach($querys as $query){
           $data[] = [
            //'label' =>$query->codigo ." ". $query->descripcion . " " . $query->id    //agrego query->id para depurar
            'label' =>$query->codigo ." ". $query->descripcion     //Ojo el simbolo => es para arrays 
         ];
         }

        }else{$data = [];}
         
         return $data;
        //return $querys;
        //return $term;

    }
    
}
