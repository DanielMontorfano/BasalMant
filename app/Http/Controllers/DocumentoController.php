<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use App\Models\Equipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;   ///Importante para documentos

class DocumentoController extends Controller
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
        $Selector=$request->get('Selector'); // toma del formulario
       // dd ($request->all());
        if ($Selector=="BorrarDocu"){ 
            //$Selector=$request->get('Selector');

            $docu_id=$request->get('docu_id');
            $docu = Documento::find($docu_id);
            $docu->delete();
            $id=$request->get('equipo_id'); // toma del formulario
            
            
           
            $id=$request->equipo_id;  //lo traigo oculto en el formulario
            $equipo= Equipo::find($id);
            echo "adentro 2" ."Selector". $Selector . "id equipo=".$id . "docu_id=".$docu_id . "docu=".$docu  ." equipo=".$equipo; 
            goto salir;
        }; 
        if ($Selector=="AgregarDocu"){    
                    $id=$request->equipo_id;  //lo traigo oculto en el formulario
                    $nombreDocu=$request->nombreDocu;
                    $equipo= Equipo::find($id);
                    //goto salir;
                    // $repuestos=$equipo->equiposRepuestos;
                    $request->validate(['file1'=>'required|mimes:pdf|max:2048']);
                    $nombreConExtension=$request->file('file1')->getClientOriginalName(); //Nombre completo con extension
                    // Obtener solo el nombre de la imagen, sin la extension
                     $nombre_imagen = pathinfo( $nombreConExtension,PATHINFO_FILENAME);
                      //Obtener solo la extension de la imagen
                     $extension_imagen = $request->file('file1')->getClientOriginalExtension();
                     $nombre_a_guardar = $nombre_imagen.'_'.time().'.'.$extension_imagen; //Con un numero aleatorio

                   //***** $documentos= $request->file('file1')->store('public/imagenesEquipos');  //para que se guarde dentro de la capeta public
                    $documentos= $request->file('file1')->storeAs('public/documentosEquipos', $nombre_a_guardar);
                    
                    $url=Storage::url($documentos);
                    $imagen=$url;
                    Documento::create([  'equipo_id'=>$id,
                                    'nombreDocu'=>$nombreDocu,
                                    'rutaDocu'=>$url]);  //IMPORTANTE agregar protected $fillable en el modelo Documento

        }
                   //$imagenes=Foto::select("*")->where('equipo_id', '=',  $id)->get();  
                    //return redirect()->route('equipos.index');
                    // return redirect()->route('equipos.show', $equipo->id);
                    //echo $codEquipo;
                    //return;
                    //*****return redirect()->route('equipos.edit', $equipo->id); //va todo el registro
                    //route('equipos.edit', $equipo->id)
        salir:
                   //  echo "Selector=" . $Selector . "<br>";
                   //   echo "nombreDocu=" . $nombreDocu . "<br>";
                   //  echo "equipo=" . $equipo->id . "<br>";
                   // echo "Foto id=" . $foto_id . "<br>";
                   // echo "Nombre:" . $documentos. "<br>";
                  // echo "adentro"; 
                   //return;
       return redirect()->route('equipos.edit', $equipo->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Documento  $documento
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $equipo= Equipo::find($id);
        $docuTodos=Equipo::find($id)->documentos;
         
        


        return view('documentos.show', compact('equipo', 'docuTodos'));
       // return $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Documento  $documento
     * @return \Illuminate\Http\Response
     */
    public function edit(Documento $documento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Documento  $documento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Documento $documento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Documento  $documento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Documento $documento)
    {
        //
    }
}
