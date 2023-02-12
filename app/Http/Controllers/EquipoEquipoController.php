<?php

namespace App\Http\Controllers;

use App\Models\equipoEquipo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Equipo;

class EquipoEquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
         //dd(request()->all());
         //return;
 
         $Selector=$request->get('Selector'); //toma del formulario
         $equipo_id=$request->get('equipo_id'); //toma del formulario
         $equipo=Equipo::find($equipo_id);
         $mensaje='Antes de preguntar'; 
         if ($Selector=="AgregarEquipo"){  
         $search=$request->get('BuscaEquipo'); //toma cadena completa del formulario
         $equipoCodigo = substr("$search", 0, 12); //Extrae solo la codEquipo
         $EquipoB_id=Equipo::where('codEquipo',$equipoCodigo)->first()->id;       
         $existeVinculo = $equipo->equiposAEquiposB()->where('vinc_id', $EquipoB_id)->exists();
         if($existeVinculo){
         echo "existe el Vinculo";  
         $mensaje='existe el Vinculo'; 
         goto salir;
         }
        // $mensaje='ENTRE A GRABAR';
        // goto salir;
         $E_E= new equipoEquipo();
         $E_E->equipo_id=$equipo_id;
         $E_E->vinc_id=$EquipoB_id;
               
         
         $E_E->save();
         goto salir; }
          
          if ($Selector=="BorrarEquipo"){  
          $equipoBorrar_id=$request->get('equipoBBorrar_id');   //toma del formulario
         
          $equipo->equiposAEquiposB()->detach( $equipoBorrar_id); //de la tabla equipoplans  
         // echo " Debemos Borrar";   
          goto salir;
         }
          
         
         // salir:  $par="$Selector,$repuesto_id,$equipo_id";
         //return $par ; 
         salir:
         
        return redirect()->route('equipos.edit', $equipo->id); //Buenisimo, de una clase a otra clase
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\equipoEquipo  $equipoEquipo
     * @return \Illuminate\Http\Response
     */
    public function show(equipoEquipo $equipoEquipo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\equipoEquipo  $equipoEquipo
     * @return \Illuminate\Http\Response
     */
    public function edit(equipoEquipo $equipoEquipo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\equipoEquipo  $equipoEquipo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, equipoEquipo $equipoEquipo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\equipoEquipo  $equipoEquipo
     * @return \Illuminate\Http\Response
     */
    public function destroy(equipoEquipo $equipoEquipo)
    {
        //
    }
}
