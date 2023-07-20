<?php

namespace App\Http\Controllers;

use App\Models\EquipoLubricacion;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Equipo;
use Illuminate\Support\Facades\Response;

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
    public function create()
    {
        //
    }
    

    public function store(Request $request)
    {  echo"estoy dentrobbbbbbbbbbbbb";
       return; 
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function tablaCargar()
{
    

    // Obtén los registros con los equipos distintos ordenados por el último created_at
    $equipos = EquipoLubricacion::whereIn('id', function ($query) {
        $query->selectRaw('MAX(id)')
            ->from('equipo_lubricacion')
            ->groupBy('equipo_id')
            ->orderBy('created_at', 'desc');
    })
    ->orderBy('created_at', 'desc')
    ->get();
    

//return $equipos;
foreach ($equipos as $equipo) {
// Obtén el último registro para cada equipo_id
$equipoLubricacionOriginal = EquipoLubricacion::where('equipo_id', $equipo->equipo_id)
    ->orderBy('created_at', 'desc')
    ->first();

// Crea un nuevo registro con los cambios deseados
$nuevoEquipoLubricacion = new EquipoLubricacion();
$nuevoEquipoLubricacion->equipo_id = $equipoLubricacionOriginal->equipo_id;
$nuevoEquipoLubricacion->lubricacion_id = $equipoLubricacionOriginal->lubricacion_id;

// Aplica la lógica de rotación de turnos y días
if ($equipoLubricacionOriginal->turno === 'M') {
    $nuevoEquipoLubricacion->turno = 'T';
    $nuevoEquipoLubricacion->dia = $equipoLubricacionOriginal->dia;
} elseif ($equipoLubricacionOriginal->turno === 'T') {
    $nuevoEquipoLubricacion->turno = 'N';
    $nuevoEquipoLubricacion->dia = $equipoLubricacionOriginal->dia;
} elseif ($equipoLubricacionOriginal->turno === 'N') {
    $nuevoEquipoLubricacion->turno = 'M';
    $nuevoEquipoLubricacion->dia = strval(intval($equipoLubricacionOriginal->dia) + 1);

}

// Asigna los demás campos y guarda el nuevo registro
$nuevoEquipoLubricacion->lcheck = "OK";
//$nuevoEquipoLubricacion->responsables = $equipoLubricacionOriginal->responsables;
$nuevoEquipoLubricacion->responsables = auth()->user()->name;

$nuevoEquipoLubricacion->save();
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
    public function edit(EquipoLubricacion $equipoLubricacion)
    {
        //
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
