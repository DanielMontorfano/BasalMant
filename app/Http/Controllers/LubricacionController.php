<?php

namespace App\Http\Controllers;

use App\Models\Lubricacion;
use App\Models\EquipoLubricacion;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Equipo;



class LubricacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  /*  public function index()
    {
        echo "dentro de Lubricacion controller";
        return;
        //$equipoLubricaciones = EquipoLubricacion::orderBy('equipo_id')->get();
        $equipoLubricaciones = EquipoLubricacion::with('equipo')->orderBy('equipo_id')->get(); //Interesante, la consulta va con larelacion de la tabla equipo
        return view('lubricacion.index', compact('equipoLubricaciones'));
    }*/
    public function index()
    {
      //  echo "dentro de Lubricacion controller, metodo index";
       $lubricaciones=Lubricacion::All();
       //return $lubricaciones;
       //return $lubricaciones;
       return view('lubricacion.index',compact('lubricaciones'));


    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('lubricacion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    // Validar y guardar los datos recibidos del formulario
    $data = $request->validate([
        'puntoLubric' => 'required',
        'descripcion' => 'nullable',
        'lubricante' => 'nullable',
        'recipiente' => 'nullable',
        'color' => 'nullable',
        'inspecciones' => 'nullable',
        'frecuencia' => 'nullable',
    ]);

    // Mapear las opciones de frecuencia a sus valores correspondientes
   /* $frecuenciaOptions = [
        'Turno' => 8,   // Turno
        'Dia' => 24,     // Día
        'Semana' => 168,  // Semana
        'Mes' => 720,    // Mes
    ];*/

    $frecuenciaOptions = [
        'Turno' => 0,   // Turno
        'Dia' => 2,     // Día
        'Semana' => 20,  // Semana
        'Mes' => 83,    // Mes
    ];


    // Verificar si 'frecuencia' se envió desde el formulario
    if (isset($data['frecuencia'])) {
        // Verificar si existe en el mapeo y asignar el valor correspondiente
        if (array_key_exists($data['frecuencia'], $frecuenciaOptions)) {
            $data['frecuencia'] = $frecuenciaOptions[$data['frecuencia']];
        } else {
            // Manejar caso de opción inválida aquí, por ejemplo, mostrar un error o establecer un valor predeterminado.
        }
    }

    Lubricacion::create($data);

    // Redirigir o mostrar un mensaje de éxito
    return redirect()->route('lubricacion.create')->with('success', 'Lubricación creada correctamente.');
}



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lubricacion  $lubricacion
     * @return \Illuminate\Http\Response
     */
    public function show(Lubricacion $lubricacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lubricacion  $lubricacion
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lubricacion=Lubricacion::find($id);
        $punto=$lubricacion->$id;
        $hola="Hola" . $id;
        //return  $lubricacion;
        return view('lubricacion.edit', compact('lubricacion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lubricacion  $lubricacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
{
    $lubricacion = Lubricacion::find($id);
    $lubricacion->puntoLubric = $request->puntoLubric;
    $lubricacion->descripcion = $request->descripcion;
    $lubricacion->lubricante = $request->lubricante;
    $lubricacion->recipiente = $request->recipiente;
    $lubricacion->color = $request->color;
    $lubricacion->inspecciones = $request->inspecciones;
   
    // Mapeo de opciones a valores numéricos
    $frecuenciaMapping = [
        'Turno' => 0,
        'Día' => 2,
        'Semana' => 20,
        'Mes' => 83,
    ];

    // Asignar el valor numérico basado en la opción seleccionada
    $lubricacion->frecuencia = $frecuenciaMapping[$request->frecuencia];

    $lubricacion->save();

    // Lógica para actualizar los datos

    return redirect()->route('lubricacion.index')->with('success', 'Lubricación actualizada correctamente');
}
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lubricacion  $lubricacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lubricacion $lubricacion)
    {
        //
    }
}
