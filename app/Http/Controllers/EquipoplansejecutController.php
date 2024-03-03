<?php

namespace App\Http\Controllers;

use App\Services\MantenimientoPlanService;
use App\Services\MantenimientoOrdenService; // Agrega el servicio MantenimientoOrdenService
use App\Models\Equipoplansejecut;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EquipoplansejecutController extends Controller
{
    protected $mantenimientoPlanService;
    protected $mantenimientoOrdenService; // Declara la propiedad para MantenimientoOrdenService

    public function __construct(
        MantenimientoPlanService $mantenimientoPlanService,
        MantenimientoOrdenService $mantenimientoOrdenService // Inyecta el servicio MantenimientoOrdenService
    ) {
        $this->mantenimientoPlanService = $mantenimientoPlanService;
        $this->mantenimientoOrdenService = $mantenimientoOrdenService; // Asigna el servicio MantenimientoOrdenService
    }
  
    public function index()
    {
        
      return view('seguimientos.menuSeguimientos');
      
    }
     
    public function pendientes()
    {
      // Usar el servicio MantenimientoPlanService
      $planesPendientes = $this->mantenimientoPlanService->getPlanesPendientes();

      // Usar el servicio MantenimientoOrdenService
      $ordenesAbiertas = $this->mantenimientoOrdenService->getPlanesPendientes();
      $equiposSinPlan  = $this->mantenimientoPlanService->getEquiposSinPlan();
      // Aquí puedes hacer cualquier otra lógica con los datos obtenidos de los servicios

    /*  return [
          'planes_pendientes' => $planesPendientes,
          'ordenes_abiertas' => $ordenesAbiertas,
      ];
    */
    //return $planesPendientes;
   // return $equiposSinPlan;
      return view('seguimientos.index',compact('planesPendientes'));
      
    }
    
    public function sinPlan()
    {
     
      $equiposSinPlanes  = $this->mantenimientoPlanService->getEquiposSinPlan();
     
    //return $planesPendientes;
   // return $equiposSinPlan;
      return view('seguimientos.equiposSinPlan',compact('equiposSinPlanes'));
      
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Equipoplansejecut  $equipoplansejecut
     * @return \Illuminate\Http\Response
     */
    public function show(Equipoplansejecut $equipoplansejecut)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Equipoplansejecut  $equipoplansejecut
     * @return \Illuminate\Http\Response
     */
    public function edit(Equipoplansejecut $equipoplansejecut)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Equipoplansejecut  $equipoplansejecut
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Equipoplansejecut $equipoplansejecut)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Equipoplansejecut  $equipoplansejecut
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipoplansejecut $equipoplansejecut)
    {
        //
    }
}
