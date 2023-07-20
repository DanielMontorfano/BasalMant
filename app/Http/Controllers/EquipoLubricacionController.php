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


class EquipoLubricacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{
    // Obtener los datos necesarios de la base de datos
    $LubricacionesVinculadas = EquipoLubricacion::with('lubricacion', 'equipo')->get();

    // Obtener los días y turnos únicos de la tabla
    $dias = $LubricacionesVinculadas->pluck('dia')->unique();
    $turnos = $LubricacionesVinculadas->pluck('turno')->unique();

    // Pasar los datos a la vista
    return view('lubricacion.index', compact('LubricacionesVinculadas', 'dias', 'turnos'));
}





    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
            $equipoLubricacion = new EquipoLubricacion();
            $equipoLubricacion->equipo_id = $terna['equipo_id'];
            $equipoLubricacion->lubricacion_id = $terna['lubricacion_id'];
            $equipoLubricacion->dia = $terna['dia'];
            $equipoLubricacion->turno = $terna['turno'];
            $equipoLubricacion->lcheck = 'OK';// $terna['lcheck'];
            $equipoLubricacion->responsables = $responsableActual;
            
            // $equipoLubricacion->updated_at = $terna['created_at']; // Opcional, si también deseas establecer el campo 'updated_at'
    
            $equipoLubricacion->save();
        }
        return redirect()->action([EquipoLubricacionController::class, 'index']);
        // Puedes devolver la información a una vista o hacer lo que desees con ella
        return $ternasEquiposLubricaciones;
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
    public function edit(EquipoLubricacion $equipoLubricacion)
    {
        echo "Estoy adentro";
        return; 
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
