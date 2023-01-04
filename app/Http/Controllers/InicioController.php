<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InicioController extends Controller
{
    //
    public function __invoke() {
        return view('welcome');
       // return view('home');
      }

      

    public function home()
    {
       
        
        return view('home');
    }
    

    


}
