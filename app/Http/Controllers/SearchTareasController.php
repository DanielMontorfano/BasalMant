<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarea;


class SearchTareasController extends Controller
{  
    public function tareas(request $request){
        $term = $request->get('term');
        $length = strlen($term);  //PAra que empiece a buscar a partir de determinada longitud
        if($length>3){
        $querys=Tarea::where('codigo','LIKE','%'.$term.'%')
        ->orWhere('descripcion','LIKE','%'.$term.'%')->get();
        $data =  [];
        foreach($querys as $query){
           $data[] = [
            'label' =>$query->codigo ." ". $query->descripcion . " " . $query->id    //Ojo el simbolo => es para arrays
         ];
         }

        }else{$data = [];}
         
         return $data;
        //return $querys;
        //return $term;

    }
    
}
