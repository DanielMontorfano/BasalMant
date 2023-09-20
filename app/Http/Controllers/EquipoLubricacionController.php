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
        $codEquipo = $lubricacionVinculada->equipo->codEquipo;     //ASI obtengo los capos de la consulta, muy interesante
        $puntoLubric = $lubricacionVinculada->lubricacion->puntoLubric;
        $numMuestra = $lubricacionVinculada->numMuestra;
        $muestra = $lubricacionVinculada->muestra;
        $equipoLubricaion_id =$lubricacionVinculada->id;  
   
    $todos[]=array('id'=>$equipoLubricaion_id, 'codigo'=>$codEquipo, 'Punto'=>$puntoLubric, 'numMuestra'=> $numMuestra, 'muestras'=> $muestra);
    // Resto de tu código...
}

$todosFiltrado = [];

//El siguiente array multidimensional tiene 3 dimensiones las dos peimeras simples  y la 3ra en un vector que lleva los datos de la muestra
foreach ($todos as $item) { //busco generar una array donde sea no se repitan los codEquipo ni sus respectivos puntos de lubricacion
    $idValue = $item['id'];
    $codigo = $item['codigo'];
    $punto = $item['Punto'];
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




      //  return $todosFiltrado;//   $todos;*/
        return view('equipoLubricacion.index', compact('LubricacionesVinculadas', 'todosFiltrado'));
    }
    


  //  return  $contadoresPorEquipoYLubricacion;
   // return view('equipoLubricacion.index', compact('LubricacionesVinculadas'));


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
        
        // Aquí es donde estableces la relación en la tabla pivot usando save()
        $equipo = Equipo::find($equipo_id);
        $lubricacion = Lubricacion::find($lubricacion_id);
        $usuarioLogueado = Auth::user();

        $E_L = new EquipoLubricacion();

        $E_L->equipo_id=$equipo_id;
        $E_L->lubricacion_id=$lubricacion_id;
        $E_L->numMuestra = '1'; // Reemplaza 'valor_del_dia' con el valor correcto
        $E_L->dia = '1'; // Reemplaza 'valor_del_dia' con el valor correcto
        $E_L->turno = 'M'; // Reemplaza 'valor_del_turno' con el valor correcto
        $E_L->muestra = 'OK'; // Reemplaza 'valor_del_lcheck' con el valor correcto
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

    public function cumplePeriodo($id, $periodoEnHoras)
{
    // Establecer la zona horaria para Salta, Argentina (UTC -3)
    date_default_timezone_set('America/Argentina/Salta');

    $lubricacion = EquipoLubricacion::find($id);

    if (!$lubricacion) {
        // Si no se encuentra la lubricación con el ID proporcionado, puedes manejar el caso de error según tus necesidades.
        return false;
    }

    // Obtén la fecha actual en la zona horaria de Salta, Argentina
    //$fechaActual = Carbon::now();
    $fechaActual="2023-06-17";
    // Obtén la última fecha de actualización de la lubricación en la zona horaria de Salta, Argentina
    $ultimaFechaLubricacion = Carbon::parse($lubricacion->updated_at);

    // Calcula la diferencia en horas entre la fecha actual y la última fecha de lubricación
    $diferenciaEnHoras = $ultimaFechaLubricacion->diffInHours($fechaActual);

    // Salida de prueba (puedes comentar esta línea después de verificar los resultados)
     echo "Ultima fecha: " . $ultimaFechaLubricacion . " *** Fecha actual: " . $fechaActual . " *** Diferencia: " . $diferenciaEnHoras . " *** Periodo en horas: " . $periodoEnHoras;

    // Compara si la diferencia en horas es mayor o igual al período requerido
    return $diferenciaEnHoras >= $periodoEnHoras;
}



private function modificarAgregarYGuardarRegistros($registrosAsociativos)
{
    foreach ($registrosAsociativos as $registro) {
        $equipoLubricacion = new EquipoLubricacion(); // Crear una nueva instancia

        // Copiar los datos del registro existente
        foreach ($registro['equipo_lubricacion']->getAttributes() as $key => $value) {
            // Omitir el campo 'id' para permitir que se genere automáticamente
            if ($key !== 'id') {
                $equipoLubricacion->$key = $value;
            }
        }
        $frecuencia = $registro['lubricacion']->frecuencia;
        $dias=$equipoLubricacion->dia;
      //  echo $frecuencia . "******" . $dias ;
       
        
        if ($frecuencia-$dias=0) {

            if ($equipoLubricacion->turno === 'M') {
                $equipoLubricacion->dia=1;
                $equipoLubricacion->turno = 'T';
            } elseif ($equipoLubricacion->turno === 'T') {
                $equipoLubricacion->dia=1;
                $equipoLubricacion->turno = 'N';
            } elseif ($equipoLubricacion->turno === 'N') {
                $equipoLubricacion->dia=1;
                $equipoLubricacion->turno = 'M';
                
            }
        } else {
            $equipoLubricacion->lcheck = '***';
            $equipoLubricacion->dia++;
        }
        $equipoLubricacion->contador++;
        $equipoLubricacion->save(); // Guardar el nuevo registro
    }
}


function calcularDiasDesdeFechaMasReciente() {
    $fechaMasReciente = EquipoLubricacion::max('created_at');
    $fechaActual = Carbon::now();
    
    $diasTranscurridos = $fechaActual->diffInDays($fechaMasReciente);
    
    return $diasTranscurridos;
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

            $nuevoNumMuestra = $registroReciente->numMuestra + 1;
            $nuevaFecha = Carbon::now();

            // Insertar nuevo registro
            DB::table('equipo_lubricacion')->insert([
                'equipo_id' => $par->equipo_id,
                'lubricacion_id' => $par->lubricacion_id,
                'numMuestra' => $nuevoNumMuestra,
                'dia' => $registroReciente->dia,
                'turno' => $registroReciente->turno,
                'muestra' => $registroReciente->muestra,
                'responsables' => $registroReciente->responsables,
                'created_at' => $nuevaFecha,
                'updated_at' => $nuevaFecha,
            ]);
        }

        //return "Nuevos registros insertados correctamente.";
    

    return redirect()->action([EquipoLubricacionController::class, 'index']);
}




  



    //return $ultimasFechas;

    //return "Estoy adentro de carga diaria";













public function tablaCargar()
{
    $registroMasAlto = EquipoLubricacion::orderBy('id', 'desc')->first();
if ($registroMasAlto) {
    $idMasReciente= $registroMasAlto->id;
    $diaMasReciente = $registroMasAlto->dia;
    $turnoAnterior = $registroMasAlto->turno;
    // Ahora puedes utilizar $diaMasReciente y $turnoAnterior como necesites
} else {
    // Manejo en caso de que no haya registros en la tabla
}

    // Consulta SQL
    
   // return $idMasReciente . "**" . $diaMasReciente . " **" . $turnoAnterior;
    if($turnoAnterior=== 'N'){
    //return "Dentro de Mañana" . "Porque turno anterios es: " .$turnoAnterior;
    $inicio= $diaMasReciente+1;
    $mañana = "
    INSERT INTO equipo_lubricacion (equipo_id, lubricacion_id, dia, turno, lcheck, responsables, created_at, updated_at)
    SELECT equipo_id, lubricacion_id, $inicio as dia, 'M', lcheck, responsables, DATE_ADD(created_at, INTERVAL 0 DAY) as created_at, DATE_ADD(updated_at, INTERVAL 0 DAY) as updated_at
    FROM equipo_lubricacion
    WHERE dia = $inicio -1  and turno='N'";
    DB::statement($mañana);
    goto salir;
    }
    if($turnoAnterior=== 'M'){

      // return "Dentro de Tarde" . "Porque turno anterios es: " .$turnoAnterior;
    $inicio= $diaMasReciente;    
    $tarde = "
    INSERT INTO equipo_lubricacion (equipo_id, lubricacion_id, dia, turno, lcheck, responsables, created_at, updated_at)
    SELECT equipo_id, lubricacion_id, $inicio as dia,'T', lcheck, responsables, DATE_ADD(created_at, INTERVAL 0 DAY) as created_at, DATE_ADD(updated_at, INTERVAL 0 DAY) as updated_at
    FROM equipo_lubricacion
    WHERE dia = $inicio  and turno= 'M'";
    DB::statement($tarde);
    goto salir;
    }

    if($turnoAnterior=== 'T'){
       // return "Dentro de Notche" . "Porque turno anterios es: " .$turnoAnterior;
    $inicio= $diaMasReciente;    
    $noche = "
        INSERT INTO equipo_lubricacion (equipo_id, lubricacion_id, dia, turno, lcheck, responsables, created_at, updated_at)
        SELECT equipo_id, lubricacion_id, $inicio as dia, 'N', lcheck, responsables, DATE_ADD(created_at, INTERVAL 1 DAY) as created_at, DATE_ADD(updated_at, INTERVAL 1 DAY) as updated_at
        FROM equipo_lubricacion
        WHERE dia = $inicio AND turno = 'T';
    ";
    DB::statement($noche);
    goto salir;
    }
    
    salir:
    // Redireccionar al índice de EquipoLubricacionController
    return redirect()->action([EquipoLubricacionController::class, 'index']);
}






   
   
   /* ********************************FIN CARGA AUTOMATICA********************************************** */

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
