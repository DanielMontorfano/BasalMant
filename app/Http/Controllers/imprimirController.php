<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;



class imprimirController extends Controller
{
    public function imprimir(){
        
        $pdf = \PDF::loadView('imprimir');
        return $pdf->download('imprimir.pdf');
    }
}