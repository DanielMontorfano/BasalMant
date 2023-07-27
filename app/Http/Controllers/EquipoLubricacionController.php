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
    //echo"Estoy dentro de EquipoLubricacion.index";

    // Obtener los datos necesarios de la base de datos
    $LubricacionesVinculadas = EquipoLubricacion::with('lubricacion', 'equipo')->get();
    //return  $LubricacionesVinculadas;
    // Obtener los días y turnos únicos de la tabla
    $dias = $LubricacionesVinculadas->pluck('dia')->unique();
    $turnos = $LubricacionesVinculadas->pluck('turno')->unique();
  
    // Pasar los datos a la vista equipoLubricacion.index
    return view('equipoLubricacion.index', compact('LubricacionesVinculadas', 'dias', 'turnos'));
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
        $E_L->dia = '1'; // Reemplaza 'valor_del_dia' con el valor correcto
        $E_L->turno = 'M'; // Reemplaza 'valor_del_turno' con el valor correcto
        $E_L->lcheck = 'OK'; // Reemplaza 'valor_del_lcheck' con el valor correcto
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
    $fechaActual = Carbon::now();

    // Obtén la última fecha de actualización de la lubricación en la zona horaria de Salta, Argentina
    $ultimaFechaLubricacion = Carbon::parse($lubricacion->updated_at);

    // Calcula la diferencia en horas entre la fecha actual y la última fecha de lubricación
    $diferenciaEnHoras = $ultimaFechaLubricacion->diffInHours($fechaActual);

    // Salida de prueba (puedes comentar esta línea después de verificar los resultados)
     echo "Ultima fecha: " . $ultimaFechaLubricacion . " *** Fecha actual: " . $fechaActual . " *** Diferencia: " . $diferenciaEnHoras . " *** Periodo en horas: " . $periodoEnHoras;

    // Compara si la diferencia en horas es mayor o igual al período requerido
    return $diferenciaEnHoras >= $periodoEnHoras;
}

    





    public function tablaCargar()
    {
        // Obtener las fechas más recientes para cada combinación de "equipo_id" y "lubricacion_id" en la tabla pivot
        $ultimasFechas = DB::table('equipo_lubricacion')
            ->select('equipo_id', 'lubricacion_id', DB::raw('MAX(created_at) as max_created_at'))
            ->groupBy('equipo_id', 'lubricacion_id');
    
        // Realizar el join entre lubricaciones, equipos y la subconsulta de las últimas fechas
        $lubricacionesConEquipos = Lubricacion::joinSub($ultimasFechas, 'ultimas_fechas', function ($join) {
            $join->on('lubricacions.id', '=', 'ultimas_fechas.lubricacion_id');
        })
        ->join('equipo_lubricacion', function ($join) {
            $join->on('lubricacions.id', '=', 'equipo_lubricacion.lubricacion_id')
                ->on('ultimas_fechas.max_created_at', '=', 'equipo_lubricacion.created_at');
        })
        ->join('equipos', 'equipos.id', '=', 'equipo_lubricacion.equipo_id')
        ->select(
            'equipos.id as equipo_id',
            'lubricacions.id as lubricacion_id',
            'equipo_lubricacion.id as pivot_id',
            'equipo_lubricacion.dia',
            'equipo_lubricacion.turno',
            'equipo_lubricacion.lcheck',
            'equipo_lubricacion.responsables',
            'ultimas_fechas.max_created_at'
        )
        ->orderBy('ultimas_fechas.max_created_at', 'desc') // Ordenar por la fecha más reciente
        ->get();
    
        // Array para almacenar las ternas de "id", "equipo_id", "lubricacion_id", y campos adicionales
        $ternasEquiposLubricaciones = [];
    
        // Recorrer todas las ternas obtenidas
        foreach ($lubricacionesConEquipos as $terna) {
                // Agregar la nueva terna con 'turno' modificado según la ley
            if ($terna->turno === 'M') {
                $ternasEquiposLubricaciones[] = [
                    'id' => $terna->pivot_id,
                    'equipo_id' => $terna->equipo_id,
                    'lubricacion_id' => $terna->lubricacion_id,
                    'dia' => $terna->dia,
                    'turno' => 'T',
                    'lcheck' => $terna->lcheck,
                    'responsables' => $terna->responsables,
                    'created_at' => $terna->max_created_at,
                ];
            } elseif ($terna->turno === 'T') {
                $ternasEquiposLubricaciones[] = [
                    'id' => $terna->pivot_id,
                    'equipo_id' => $terna->equipo_id,
                    'lubricacion_id' => $terna->lubricacion_id,
                    'dia' => $terna->dia,
                    'turno' => 'N',
                    'lcheck' => $terna->lcheck,
                    'responsables' => $terna->responsables,
                    'created_at' => $terna->max_created_at,
                ];
            } elseif ($terna->turno === 'N') {
                $dia = intval($terna->dia) + 1;
                $ternasEquiposLubricaciones[] = [
                    'id' => $terna->pivot_id,
                    'equipo_id' => $terna->equipo_id,
                    'lubricacion_id' => $terna->lubricacion_id,
                    'dia' => strval($dia),
                    'turno' => 'M',
                    'lcheck' => $terna->lcheck,
                    'responsables' => $terna->responsables,
                    'created_at' => $terna->max_created_at,
                ];
            }
        }
        $responsableActual = Auth::user()->name; // Cambia "name" por el nombre del campo que almacena el nombre de usuario en tu tabla de usuarios.
        foreach ($ternasEquiposLubricaciones as $terna) {
            $frecuencia = Lubricacion::find($terna['lubricacion_id'])->frecuencia;
           // return $frecuencia;
            $frecuenciasEnHoras = [
                'Día' => 24,
                'Turno' => 8,
                'Semana' => 168,
                'Mes' => 672,
            ];
            // Verifica si la frecuencia está presente en el array y asigna el valor en horas correspondiente
            $periodoEnHoras = $frecuenciasEnHoras[$frecuencia];
            // return  $periodoEnHoras;
            //En cada registro verifica segun periodo si le corresponde actualizar el registro
            $id=$terna['id'];
            //$periodoEnHoras = 4;   // Aquí se define el periodo en horas (por ejemplo, 30 días)
            $cumplePeriodo = $this->cumplePeriodo($id, $periodoEnHoras); //Llama a la funcion "cumplePeriodo" de la mismo controlador o Clase
            // La variable $cumplePeriodo ahora contiene verdadero o falso dependiendo si se cumple el período o no.
            //return;
            $otraCondicion= true;
            if($cumplePeriodo || $otraCondicion){ //Entra solo si se cumpli la frecuencia de lubricacion
            $equipoLubricacion = new EquipoLubricacion();
            $equipoLubricacion->equipo_id = $terna['equipo_id'];
            $equipoLubricacion->lubricacion_id = $terna['lubricacion_id'];
            $equipoLubricacion->dia = $terna['dia'];
            $equipoLubricacion->turno = $terna['turno'];
            $equipoLubricacion->lcheck = 'OK';// $terna['lcheck'];
            $equipoLubricacion->responsables = $responsableActual;
            
            // $equipoLubricacion->updated_at = $terna['created_at']; // Opcional, si también deseas establecer el campo 'updated_at'
    
            $equipoLubricacion->save();
            } // del if $cumpleperiodo
        }
        return redirect()->action([EquipoLubricacionController::class, 'index']); //para mostrar la tabla
        // Puedes devolver la información a una vista o hacer lo que desees con ella
        return $ternasEquiposLubricaciones;
    }

   /* ************************************************CARGA Automatica ********************************* */

   public function cargaAutom()
   {
       // 1) Define la fecha de inicio
       $fechaInicio = "2023-07-25";
       $fechaActual = Carbon::createFromFormat('Y-m-d', $fechaInicio)->startOfDay();
   
       // 2) Obtén los registros ordenados por "id" ascendente
       $registros = DB::table('equipo_lubricacion')->orderBy('id', 'asc')->get();
   
       // 3) Nombres de responsables en forma aleatoria
       $nombresResponsables = ['Apaza', 'Cabana', 'Estrada', 'oficial', 'medio oficial'];
   
       // 4) Recorre los registros y actualiza los campos "updated_at", "created_at", y "responsables"
       foreach ($registros as $index => $registro) {
           // Define la hora y turno según el patrón dado
           $hora = null;
           $turno = null;
           if ($index % 3 == 0) {
               $hora = "12:00:00";
               $turno = 'M';
           } elseif ($index % 3 == 1) {
               $hora = "20:00:00";
               $turno = 'T';
           } elseif ($index % 3 == 2) {
               $hora = "23:00:00";
               $turno = 'N';
               // Incrementa la fecha después del turno 'N' solo si no es la primera iteración
               if ($index > 0) {
                   $fechaActual->addDay();
               }
           }
   
           // Formatea la fecha con la hora y turno correspondientes
           $createdAt = Carbon::createFromFormat('Y-m-d H:i:s', $fechaActual->toDateString() . ' ' . $hora);
   
           // Obtén un nombre de responsable aleatorio
           $responsable = $nombresResponsables[random_int(0, count($nombresResponsables) - 1)];
   
           // Actualiza los campos "created_at", "updated_at", y "responsables"
           DB::table('equipo_lubricacion')
               ->where('id', $registro->id)
               ->update([
                   'created_at' => $createdAt,
                   'updated_at' => $createdAt,
                   'turno' => $turno,
                   'responsables' => $responsable,
               ]);
       }
   
       return redirect()->action([EquipoLubricacionController::class, 'index']); //para mostrar la tabla
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
       
        if ($lubricacion->lcheck === 'OK') {
            $lubricacion->lcheck = 'E';
        } elseif ($lubricacion->lcheck === 'E') {
            $lubricacion->lcheck = 'I';
        } elseif ($lubricacion->lcheck === 'I') {
            $lubricacion->lcheck = 'OK';
        }
    
        $lubricacion->save();
    
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
