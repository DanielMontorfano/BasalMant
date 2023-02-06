<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan;


class SearchPlansController extends Controller
{  
   public function plans(request $request){
        //dd(request()->all());
        $term = $request->get('term');
        $length = strlen($term);  //PAra que empiece a buscar a partir de determinada longitud
        if($length>3){
        $querys=Plan::where('codigo','LIKE','%'.$term.'%')
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
