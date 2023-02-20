<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\Equipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;   ///Importante para imagenes

class FotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view('equipos.index',compact('equipos'));
        return view('equipos.index');

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
    public function store(Request $request) //esto funciona una vez creado StoreImagen de Request (Ver use arriba)
    {   
        $Selector=$request->get('Selector'); // toma del formulario
       
        if ($Selector=="BorrarFoto"){ 
        
           // $equipo_id=$request->get('equipo_id'); // toma del formulario
            $foto_id=$request->get('foto_id');
            $foto = Foto::find($foto_id);
            $foto->delete();
            $id=$request->equipo_id;  //lo traigo oculto en el formulario
            $equipo= Equipo::find($id);
            goto salir;
        }; 
        if ($Selector=="AgregarFoto"){    
                    $id=$request->equipo_id;  //lo traigo oculto en el formulario
                    $nombreFoto=$request->nombreFoto;
                    $equipo= Equipo::find($id);
                    //goto salir;
                    // $repuestos=$equipo->equiposRepuestos;
                    $request->validate(['file'=>'required|image|max:2048']);
                    $imagenes= $request->file('file')->store('public/fotos');  //para que se guarde dentro de la capeta public
                    $url=Storage::url($imagenes);
                    $imagen=$url;
                    Foto::create([  'equipo_id'=>$id,
                                    'nombreFoto'=>$nombreFoto,
                                    'rutaFoto'=>$url]);  //IMPORTANTE agregar protected $fillable en el modelo Foto

        }
                   //$imagenes=Foto::select("*")->where('equipo_id', '=',  $id)->get();  
                    //return redirect()->route('equipos.index');
                    // return redirect()->route('equipos.show', $equipo->id);
                    //echo $codEquipo;
                    //return;
                    //*****return redirect()->route('equipos.edit', $equipo->id); //va todo el registro
                    //route('equipos.edit', $equipo->id)
        salir:
                    // echo "Selector=" . $Selector . "<br>";
                    // echo "equipo_id=" . $equipo_id . "<br>";
                    //echo "Foto id=" . $foto_id . "<br>";
                    //return ;
        return redirect()->route('equipos.edit', $equipo->id);

        }
          
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Foto  $foto
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   $equipo= Equipo::find($id);
        $fotosTodos=Equipo::find($id)->fotos;
         
        


        return view('fotos.show', compact('equipo', 'fotosTodos'));
       // return $id;
    } 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Foto  $foto
     * @return \Illuminate\Http\Response
     */
    public function edit(Foto $foto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Foto  $foto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Foto $foto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Foto  $foto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Foto $foto)
    {
        //
    }
}
