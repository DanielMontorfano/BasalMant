{{-- @extends('layouts.plantilla') --}}
@extends('adminlte::page') 
@section('title', 'Ver ' . $equipo->marca)
@section('css')
{{-- https://datatables.net/ **IMPORTANTE PLUG IN PARA LAS TABLAS --}}
{{-- Para que sea responsive se agraga la tercer libreria --}}
{{-- Todo lo de plantilla --}}
{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}


@endsection

@section('content')
@include('layouts.partials.menuEquipo')
<div class="card border-primary" style="background: linear-gradient(to left,#495c5c,#030007); ">
  <div class="card-body "  style="max-width: 95;">
  
  
    <h6 STYLE="text-align:center; font-size: 30px;
                background: -webkit-linear-gradient(rgb(1, 103, 71), rgb(239, 236, 217));
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;">Plan de mantenimiento: {{$equipo->codEquipo}} </h6>
                
      
        <p ><a  class="text-white " href={{route('equipoTareash.edit', $equipo->id)}}>Cargar ficha plan</a></p>
        
        @if(isset($PlanP))
        @foreach($PlanP as $plan)
        <table  id="listado" class="table-bordered" >
          <tr >
              <td class="col-2" align="left"><strong>{{$plan['codigo']}}</strong> <br> {{$plan['descripcion']}}</td>

              <td class="col-8" align="center" >
                      @if(isset($ProtocoloP))
                      @foreach($ProtocoloP as $protocolo)
                      <div class="col-12" align="left"><strong>{{$protocolo['codProto']}}</strong>  ( {{$protocolo['descripcion']}} )</div>
                      <div class="row align-items-end">
                        @foreach($Tareas as $tarea) 
                        @if($protocolo['codProto'] ==$tarea['cod'])
                       
                        <div class="col-6" align="left"><li>{{$tarea['descripcion']}}</li></div>
                        <div class="col-6" align="left">{{$tarea['duracion']}} {{$tarea['unidad']}}</div>
                        
                        
                       
                        @endif 
                        @endforeach  
                        <div>&nbsp;</div>
                      </div>
                      @endforeach  
                      @endif
              </td>

              
          </tr>
         
      </table>
      @endforeach
      @endif 
  </div>
</div>
  <div class="container"> 
    @include('layouts.partials.footer')
  </div>
  
@endsection




