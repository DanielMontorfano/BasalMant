<?php

namespace App\Http\Controllers;

use App\Models\EquipoLubricacion;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Equipo;
use Illuminate\Support\Facades\Response;
use App\Models\Lubricacion;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Http\Controllers\EquipoController; // Ajusta la ruta según la ubicación real de tu controlador


class EquipoLubricacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $LubricacionesVinculadas = EquipoLubricacion::with('lubricacion', 'equipo')->get(); //Consulta que entrega con las tablas vinculadas previa y posterior
    
    
       foreach ($LubricacionesVinculadas as $lubricacionVinculada) {
        $idEquipo=$lubricacionVinculada->equipo->id;
        $lubricacion_id=$lubricacionVinculada->lubricacion->id;
        $codEquipo = $lubricacionVinculada->equipo->codEquipo;     //ASI obtengo los capos de la consulta, muy interesante
        $puntoLubric = $lubricacionVinculada->lubricacion->puntoLubric;
        
        $frecuencias = [
            0 => 'Turno',
            2 => 'Día',
            20 => 'Semana',
            83 => 'Mes',
        ];
        
        
        $frecuenciaNumerica = $lubricacionVinculada->lubricacion->frecuencia;
        
        // Verificar si la clave existe en el array antes de acceder a ella
        $descripcionFrecuencia = isset($frecuencias[$frecuenciaNumerica]) ? $frecuencias[$frecuenciaNumerica] : 'Frecuencia Desconocida';
        
        $descripcion = $lubricacionVinculada->lubricacion->descripcion .", ". $lubricacionVinculada->lubricacion->lubricante .", ". $lubricacionVinculada->lubricacion->recipiente .", ". $descripcionFrecuencia;
        $numMuestra = $lubricacionVinculada->numMuestra;
        $muestra = $lubricacionVinculada->muestra;
        $equipoLubricacion_id =$lubricacionVinculada->id;
        $lubricacion_id= $lubricacionVinculada->lubricacion_id; 
   
    $todos[]=array('id'=>$equipoLubricacion_id, 'lubricacion_id'=>$lubricacion_id, 'codigo'=>$codEquipo, 'Punto'=>$puntoLubric, 'descripcion'=>$descripcion, 'numMuestra'=> $numMuestra, 'muestras'=> $muestra);
    // Resto de tu código...
}

$todosFiltrado = [];

//El siguiente array multidimensional tiene 3 dimensiones las dos peimeras simples  y la 3ra en un vector que lleva los datos de la muestra
foreach ($todos as $item) { //busco generar una array donde sea no se repitan los codEquipo ni sus respectivos puntos de lubricacion
   
    $idValue = $item['id'];
    $lubricacion_id=$item['lubricacion_id'];
    $codigo = $item['codigo'];
    $punto = $item['Punto'];
    $descripcion = $item['descripcion'];
    $numMuestra = $item['numMuestra'];
    $muestras = $item['muestras'];

    if (!isset($todosFiltrado[$codigo])) {
        $todosFiltrado[$codigo] = [];
    }

    if (!isset($todosFiltrado[$codigo][$punto])) {
        $todosFiltrado[$codigo][$punto] = [];
    }

    $todosFiltrado[$codigo][$punto][] = [
       
        'id' => $idValue,
        'lubricacion_id'=>$lubricacion_id,
        'descripcion'=>$descripcion,
        'numMuestra'=>$numMuestra,
        'muestras' => $muestras,
    ];
}

foreach ($todosFiltrado as &$codigo) {  //Ordena segun numMuestra
    foreach ($codigo as &$punto) {
        usort($punto, function($a, $b) {
            return $a['numMuestra'] - $b['numMuestra'];
        });
    }
}

// Ordenar los equipos por codEquipo y puntos por numMuestra
ksort($todosFiltrado); // Ordena los equipos por código de equipo

foreach ($todosFiltrado as &$puntos) {
    ksort($puntos); // Ordena los puntos de lubricación alfabéticamente (puedes ajustar según tus necesidades)

    foreach ($puntos as &$muestras) {
        usort($muestras, function($a, $b) {
            return $a['numMuestra'] <=> $b['numMuestra']; // Ordena las muestras por numMuestra
        });
    }
}

// ...
 //dd($todosFiltrado);

        //return $todosFiltrado;//   $todos;*/
        return view('equipoLubricacion.index', compact('LubricacionesVinculadas', 'todosFiltrado'));
    }
    

    public function codigoAequipo($codigo)
{
    $equipo = Equipo::where('codEquipo', $codigo)->first();
    
    if ($equipo) {
        return redirect()->route('equipos.show', $equipo->id);
    } else {
        // Manejar el caso en que no se encuentra el equipo con el código especificado
        // Puedes redirigir a una vista de error o tomar alguna otra acción.
    }
}
  
    public function create()
    {
        //
    }
        

    


    public function store(Request $request) //esto funciona una vez creado StoreEquipo de Request
    //public function store(Request $request) //Antes de usar archivo StoreEquipo en Request
    {   
        //dd(request()->all());
        $Selector=$request->get('Selector'); //toma del formulario
        $equipo_id=$request->get('equipo_id'); //toma del formulario
        $lubricacion_id=$request->get('lubricacion_id'); //toma del formulario
        $cadena=$request->get('BuscaLubricacion'); //toma cadena completa del formulario
        $equipo = Equipo::find($equipo_id);
        $usuarioLogueado = Auth::user();
                // Tu código para verificar si la relación existe
            $existeRelacion = Equipo::whereHas('lubricaciones', function ($query) use ($lubricacion_id) {
                $query->where('lubricacion_id', $lubricacion_id);
            })->where('id', $equipo_id)->exists();

            if ($existeRelacion) {
                // Si la relación existe, agrega un mensaje a la sesión
                session()->flash('mensaje', 'Esta lubricación ya existe');
                return redirect()->back();
            } else {
                // Si la relación no existe, agrega un mensaje a la sesión
        //session()->flash('mensaje', 'Relación no existente');
        if ($Selector=="AgregarLubricacion"){  
            $maxNumMuestra = EquipoLubricacion::max('numMuestra');
        // Aquí es donde estableces la relación en la tabla pivot usando save()
        for ($i = 0; $i < $maxNumMuestra-1; $i++) { //Carga "N" en los recorridos donde no fué definido aún
            $equipo = Equipo::find($equipo_id);
            $lubricacion = Lubricacion::find($lubricacion_id);
            $usuarioLogueado = Auth::user();
        
            $E_L = new EquipoLubricacion();
        
            $E_L->equipo_id = $equipo_id;
            $E_L->lubricacion_id = $lubricacion_id;
            $E_L->numMuestra = $i+1; // Reemplaza 'valor_del_dia' con el valor correcto
            $E_L->dia = '1'; // Reemplaza 'valor_del_dia' con el valor correcto
            $E_L->turno = 'M'; // Reemplaza 'valor_del_turno' con el valor correcto
            $E_L->muestra = 'N'; // Reemplaza 'valor_del_lcheck' con el valor correcto
            $E_L->responsables = $usuarioLogueado->name; // Reemplaza 'valor_de_responsables' con el valor correcto
            $E_L->save();
        }
            $E_L = new EquipoLubricacion();  //En la ultimo recorrido, coloca C en la muestra
            
            $E_L->equipo_id = $equipo_id;
            $E_L->lubricacion_id = $lubricacion_id;
            $E_L->numMuestra = $i+1; // Reemplaza 'valor_del_dia' con el valor correcto
            $E_L->dia = '1'; // Reemplaza 'valor_del_dia' con el valor correcto
            $E_L->turno = 'M'; // Reemplaza 'valor_del_turno' con el valor correcto
            $E_L->muestra = 'C'; // Reemplaza 'valor_del_lcheck' con el valor correcto
            $E_L->responsables = $usuarioLogueado->name; // Reemplaza 'valor_de_responsables' con el valor correcto
            $E_L->save();
        goto salir;
        } //fin Agregar Lubricaion
        if ($Selector=="BorrarLubricacion"){  
            $lubricacionBorrar_id=$request->get('lubricacionBorrar_id');   //toma del formulario
            //$equipo=Equipo::find($equipo_id);   
            $equipo->lubricaciones()->detach( $lubricacionBorrar_id); //de la tabla equipo_lubricacion 
           // echo " Debemos Borrar";   
            goto salir;
           }
     

        // Redirige a la vista anterior
        salir:
        return redirect()->back();
            }}

    
  
    //Prueba de funcion periodo cumplido

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //Prueba de funcion periodo cumplido!!

    public function cumplePeriodo($lubricacion_id, $periodoEnHoras)
{
    date_default_timezone_set('America/Argentina/Salta');

    $lubricacion = EquipoLubricacion::find(9);
    $ultimoRegistro = EquipoLubricacion::where('lubricacion_id',$lubricacion_id)
        ->latest('updated_at')
        ->first();
    
    $frecuencia = $ultimoRegistro->lubricacion->frecuencia;
    $fechaUltimaActualizacion = Carbon::parse($ultimoRegistro->updated_at);
    $fechaActual = Carbon::now();
    
    $horasTranscurridas = $fechaUltimaActualizacion->diffInHours($fechaActual);

    // Comparar $frecuencia y $horasTranscurridas y devolver true si $frecuencia es mayor o igual
    $cumplePeriodo = $frecuencia <= $horasTranscurridas;

    //dd($cumplePeriodo);

    return  $cumplePeriodo;
}

public function cumpleFrecuencia($equipo_id, $lubricacion_id)
{
    // Paso 1: Obtener el último registro relacionado con el equipo y lubricación
    $ultimoRegistro = EquipoLubricacion::where('equipo_id', $equipo_id)
        ->where('lubricacion_id', $lubricacion_id)
        ->latest('id')
        ->first();

    // Paso 2: Obtener la "frecuencia" desde la tabla "lubricacions"
    $frecuencia = Lubricacion::find($lubricacion_id)->frecuencia;
    //dd($frecuencia);
    // Paso 3: Contar la cantidad de registros con "muestra" igual a "N" desde el último registro
    $registrosConMuestraN = 0;
    $registros = EquipoLubricacion::where('equipo_id', $equipo_id)
        ->where('lubricacion_id', $lubricacion_id)
        ->where('id', '<=', $ultimoRegistro->id)
        ->orderBy('id', 'desc') // Ordena de manera descendente
        ->get();
   // dd($registros);
    foreach ($registros as $registro) {
        if ($registro->muestra === 'N') {
            $registrosConMuestraN++;
        } else {
            break; 
        }
    }
   // echo"entro en el if";
  //  dd($registrosConMuestraN++);
    // Paso 4: Comparar con la "frecuencia"
    return $registrosConMuestraN >= $frecuencia;
}

   
public function cargaDiaria()
{
 
        // Obtener los pares "equipo_id" y "lubricacion_id" distintos de registros existentes
        $paresUnicos = DB::table('equipo_lubricacion')
            ->select('equipo_id', 'lubricacion_id')
            ->distinct()
            ->get();
        
        // Obtener los datos del registro más reciente en base a los pares únicos
        foreach ($paresUnicos as $par) {
            $registroReciente = DB::table('equipo_lubricacion')
                ->where('equipo_id', $par->equipo_id)
                ->where('lubricacion_id', $par->lubricacion_id)
                ->orderBy('created_at', 'desc')
                ->first();
       
            $lubricacion_id = $registroReciente->lubricacion_id;
            $equipo_id = $registroReciente->equipo_id;
            $periodoEnHoras = Lubricacion::find($lubricacion_id)->frecuencia;
            
            $correspondeLubricar = $this->cumpleFrecuencia($equipo_id, $lubricacion_id);

            //dd($correspondeLubricar);
         
if ($correspondeLubricar) {
    // Realiza una acción si ha pasado el período requerido
            $nuevoNumMuestra = $registroReciente->numMuestra + 1;
            $nuevaFecha = Carbon::now();
            $SiCorresponde= "C";
           
            // Insertar nuevo registro
            DB::table('equipo_lubricacion')->insert([
                'equipo_id' => $par->equipo_id,
                'lubricacion_id' => $par->lubricacion_id,
                'numMuestra' => $nuevoNumMuestra,
                'dia' => $registroReciente->dia,
                'turno' => $registroReciente->turno,
                //'muestra' => $registroReciente->muestra,
                'muestra' => $SiCorresponde,
                'responsables' => $registroReciente->responsables,
                'created_at' => $nuevaFecha,
                'updated_at' => $nuevaFecha,
            ]);
            //dd($SiCorresponde);
       }else{  
        $nuevoNumMuestra = $registroReciente->numMuestra + 1;
        $nuevaFecha = Carbon::now();
        $NoCorresponde= "N";
        
        DB::table('equipo_lubricacion')->insert([
        'equipo_id' => $par->equipo_id,
        'lubricacion_id' => $par->lubricacion_id,
        'numMuestra' => $nuevoNumMuestra,
        'dia' => $registroReciente->dia,
        'turno' => $registroReciente->turno,
        'muestra' =>  $NoCorresponde,
        'responsables' => $registroReciente->responsables,
        'created_at' => $nuevaFecha,
        'updated_at' => $nuevaFecha,
    ]);
   
       }

    }

    return redirect()->action([EquipoLubricacionController::class, 'index']);
}




    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EquipoLubricacion  $equipoLubricacion
     * @return \Illuminate\Http\Response
     */
    public function show(EquipoLubricacion $equipoLubricacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EquipoLubricacion  $equipoLubricacion
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
{
    echo "Estoy adentro listo para cambiar el lcheck de Id=$id";
   
    $lubricacion = EquipoLubricacion::find($id);

    if (!$lubricacion) {
        // Si no se encuentra la lubricación con el ID proporcionado, puedes mostrar un mensaje de error o redirigir a la vista anterior.
        session()->flash('mensaje', 'Lubricación no encontrada');
        return redirect()->back();
    }

    // Verifica si el usuario es "Daniel"
    $user = auth()->user();
    if ($user->name === 'Admin') {
        // Si el usuario es "Daniel", elimina el registro completo
        $lubricacion->delete();
    } else {
        // Si no es "Daniel", cambia el valor de lcheck según el ciclo (OK -> E -> I -> OK)
        if ($lubricacion->muestra === 'C') {
            $lubricacion->muestra = 'E';
        } elseif ($lubricacion->muestra === 'E') {
            $lubricacion->muestra = 'I';
        } elseif ($lubricacion->muestra === 'I') {
            $lubricacion->muestra = 'C';
        }

        $lubricacion->save();
    }

    // Redirige a la vista anterior o a la acción index del controlador
    return redirect()->action([EquipoLubricacionController::class, 'index']);
}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EquipoLubricacion  $equipoLubricacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EquipoLubricacion $equipoLubricacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EquipoLubricacion  $equipoLubricacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(EquipoLubricacion $equipoLubricacion)
    {
        //
    }
}
