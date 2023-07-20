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
    public function index()
    {
        echo "dentro de Lubricacion controller";
        return;
        //$equipoLubricaciones = EquipoLubricacion::orderBy('equipo_id')->get();
        $equipoLubricaciones = EquipoLubricacion::with('equipo')->orderBy('equipo_id')->get(); //Interesante, la consulta va con larelacion de la tabla equipo
        return view('lubricacion.index', compact('equipoLubricaciones'));
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
    public function edit(Lubricacion $lubricacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lubricacion  $lubricacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lubricacion $lubricacion)
    {
        //
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
