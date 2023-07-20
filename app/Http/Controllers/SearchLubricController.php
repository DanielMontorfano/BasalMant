<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lubricacion;


class SearchLubricController extends Controller
{
    public function lubricaciones(request $request){
        //dd(request()->all());
        $term = $request->get('term');
        $length = strlen($term);  //PAra que empiece a buscar a partir de determinada longitud
        if($length>=1){
        $querys=Lubricacion::where('id','LIKE','%'.$term.'%')
        ->orWhere('descripcion','LIKE','%'.$term.'%')->get();
        $data =  [];
        foreach($querys as $query){
           $data[] = [
            'label' =>$query->puntoLubric ." ". $query->descripcion . " " . $query->lubricante . " " . $query->id    //Ojo el simbolo => es para arrays
         ];
         }

        }else{$data = [];}
         
         return $data;
        //return $querys;
        //return $term;

    }
    
}
