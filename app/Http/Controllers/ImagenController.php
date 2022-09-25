<?php

namespace App\Http\Controllers;
use App\Models\Imagen;
use Illuminate\Http\Request;
use App\Http\Requests\StoreImagenRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;   ///Importante para imagenes
use App\Models\Equipo;

class ImagenController extends Controller
{   
    //subiendo con move
    public function index(){ //esto funciona una vez creado StoreEquipo de Request (Ver use arriba)
        
        return view('equipos.edit');
    }



    public function store(Request $request) //esto funciona una vez creado StoreImagen de Request (Ver use arriba)
    {  
      $id=$request->equipo_id;
      $equipo= Equipo::find($id);
      $repuestos=$equipo->equiposRepuestos;
      $request->validate(['file'=>'required|image|max:2048']);
      $imagenes= $request->file('file')->store('public/imagenesEquipos');  //para que se guarde dentro de la capeta public
      $url=Storage::url($imagenes);
      $imagen=$url;
      Imagen::create(['equipo_id'=>$id,
                      'imagen'=>$imagen]);

      $imagenes=Imagen::select("*")->where('equipo_id', '=',  $id)->get();  
      //return redirect()->route('equipos.index');
     // return redirect()->route('equipos.show', $equipo->id);
      //echo $codEquipo;
      //return;
      return redirect()->route('equipos.edit', $equipo->id); //va todo el registro
      //route('equipos.edit', $equipo->id)
    // return $imagenes;
    }
}
