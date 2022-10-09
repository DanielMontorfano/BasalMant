<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipo;
use App\Models\EquipoRepuesto;
use App\Models\Repuesto;
use Illuminate\Support\Facades\DB;

use App\Http\Requests\StoreEquipoRepuestoRequest;
use SebastianBergmann\CodeCoverage\Driver\Selector;

class EquipoRepuestoController extends Controller
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
    public function store(StoreEquipoRepuestoRequest $request) //esto funciona una vez creado StoreEquipo de Request
    {
        
        //dd(request()->all());
        //return;
        //$request->validate(['codEquipo'=>'required|max:8', 'marca'=>'required|min:3', 'modelo'=>'required']);
        //return $request->all();  //Para probar que recibo todos losregistros del formulario
        $Selector=$request->get('Selector'); //toma del formulario
        
       // $repuesto_id=$request->get('repuestosSelect'); //repuesto  a agregar
      // goto salir;
        $equipo_id=$request->get('equipo_id'); //toma del formulario
        $unidad=$request->get('unidad');
        $check1=$request->get('check1');

       // if($check1){
       //    $check1="on";
       // }
        //dd(request()->all());
       //echo "ddd:" . $check1;
       
        //$descripcion= substr("$search", 10, 50);
        $equipo=Equipo::find($equipo_id);
        // $repuesto_id2=Repuesto::where('');
        //echo $search;
        //$querys=Repuesto::where('descripcion','LIKE','%'.$descripcion.'%')->get();
        //foreach($querys as $query){
        //$descripcion =$query->descripcion;   //Ojo el simbolo => es para arrays
        //}
        //echo"----- $Selector";
        if ($Selector=="AgregarRep"){  
        $cant=$request->get('cant'); //toma del formulario
        $search=$request->get('search'); //toma cadena completa del formulario
        $repuestoCodigo = substr("$search", 0, 9); //Extrae solo la descripcion
        $repuesto_id=Repuesto::where('codigo',$repuestoCodigo)->first()->id;        
        //$equipo=Equipo::find($equipo_id); //de la tabla equipos**Puede andar pero no graba con time at 
        // $equipo->equiposRepuestos()->attach($repuesto_id); //**Puede andar pero no graba con time at 
        $existeVinculo = $equipo->equiposRepuestos()->where('repuesto_id', $repuesto_id)->exists();
        if($existeVinculo){
        echo "existe el Vinculo";  
        $mensaje='existe el Vinculo'; 
        goto salir;
        }
        $mensaje='';
        $E_R= new EquipoRepuesto();
        $E_R->equipo_id=$equipo_id;
        $E_R->repuesto_id=$repuesto_id;
        $E_R->unidad=$unidad;
        $E_R->cant=$cant;
        $E_R->check1=$check1;
        
        // $equipo=Equipo::find($equipo_id); // Solo leo este registro para poder retornar correctamente
        $E_R->save();
        goto salir; }
         
         if ($Selector=="BorrarRep"){  
         $repuestoBorrar_id=$request->get('repuestoBorrar_id');   //toma del formulario
         //$equipo=Equipo::find($equipo_id);   
         $equipo->equiposRepuestos()->detach( $repuestoBorrar_id); //de la tabla equipo_repuesto   
        // echo " Debemos Borrar";   
         goto salir;
        }
         
        
        // salir:  $par="$Selector,$repuesto_id,$equipo_id";
        //return $par ; 
        salir:
        return redirect()->route('equipos.edit', $equipo->id); //Buenisimo, de una clase a otra clase
       // echo  $repuesto_id;
       // echo $Selector;
        //echo $repuestoBorrar_id;
       // return ;
    }
    
    


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)  //paso previo a adicionar links de repuestos
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    


    public function destroy($id) // ya se instancia modelo EquipoRepuesto en $equipoRepuesto
    {   
       //
    }
    
    

}
