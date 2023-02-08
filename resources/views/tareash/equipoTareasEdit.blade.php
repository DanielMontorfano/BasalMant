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

<div class="card" STYLE="background: linear-gradient(to right,#5c5649,#030007);" >
  <div class="card-header" STYLE="background: linear-gradient(to right,#201f1e,#030007);">
    
  
  
    <h6 STYLE="text-align:center; font-size: 30px;
                background: -webkit-linear-gradient(rgb(1, 103, 71), rgb(239, 236, 217));
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;">Ficha plan</h6>
                



        {{-- <p ><a  class="text-white " href={{route('equipoTareash.show', $equipo->id)}}>editar tareas de este equipo</a></p> --}}
        
        <form id="cargaPlan" action="{{route('equipoTareash.store')}}" method="POST" class="form-horizontal" STYLE="background: linear-gradient(to right,#495c5c,#030007);">
          @csrf
        @if(isset($PlanP))
        @foreach($PlanP as $plan)
        <table  class="table-bordered" >
          <tr >
              <td class="col-2" align="left"><strong>{{$plan['codigo']}}</strong></td>

              <td class="col-8" align="center" >
                      @if(isset($ProtocoloP))
                      @foreach($ProtocoloP as $protocolo)
                      <div class="col-12" align="left"><strong>{{$protocolo['codProto']}}</strong>  ( {{$protocolo['descripcion']}} )</div>
                      <div class="row align-items-end">
                        @foreach($Tareas as $tarea) 
                        @if($protocolo['codProto'] ==$tarea['cod'])
                        <div class="col-2" align="left">
                          
                            <input type="hidden" name="equipo_id[]" value="{{$equipo->id}}" readonly > 
                            <input type="hidden" name="plans[]" value="{{$plan['codigo']}}" readonly > 
                            <input type="hidden" name="protocolos[]" value="{{$protocolo['codProto']}}" readonly >  
                            <input type="hidden" name="tareas[]" value="{{$tarea['tarea_id']}}" readonly > 
                            <select name="estados[]" id="estado">
                              <option value=""></option>
                              <option value="NR">NR</option>
                              <option value="R">R</option>
                              <option value="INC">INC</option>
                              <option value="OP">OP</option>
                             </select>
                          
                        </div>
                        <div class="col-5" align="left"><li>{{$tarea['descripcion']}}</li></div>
                        <div class="col-5" align="left">{{$tarea['duracion']}} {{$tarea['unidad']}}</div>
                        
                        
                       
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

   <br>
               <div class="form-group">
                   <button form="cargaPlan" class="btn btn-primary" type="submit" STYLE="background: linear-gradient(to right,#495c5c,#030007);">Enviar</button>
               </div>
               <br>   
   </form>
      
{{-- ************************************************************************************** --}}
{{-- ****LAS SIGUIENTES LINEAS SE COMENTAN POR RAZONES DE SER CODIGO MAESTRO --}}
{{-- <p><strong>Marca:</strong>{{$equipo->marca}}</p>
<p><strong>Modelo:</strong>{{$equipo->modelo}}</p>
<p><strong>Seccion:</strong>{{$equipo->idSecc}}</p>
<p><strong>Subsección:</strong>{{$equipo->idSubSecc}}</p>
<p><strong>Caractrística 1:</strong>{{$equipo->det1}}</p>
<p><strong>Caractrística 2:</strong>{{$equipo->det2}}</p>
<p><strong>Caractrística 3:</strong>{{$equipo->det3}}</p>
<p><strong>Caractrística 4:</strong>{{$equipo->det4}}</p>
<p><strong>Caractrística 5:</strong>{{$equipo->det5}}</p>
<p><strong>Repuestos:</strong></p>
 
<h3>Listado de repuestos</h3>

@foreach($repuestos as $repuesto)
<table>
   <tr>
    
    <td><li>*{{$repuesto->pivot->cant}}* - - {{ $repuesto->codigo }} - {{ $repuesto->descripcion}} </li> </td>
      
  </tr>

</table>
         
@endforeach --}}
{{-- ************************************************************************************** --}}

{{-- <h3>Estoy en equipos.show.blade </h3> --}}
 




</div>
</div>

<div class="container"> 
  @include('layouts.partials.footer')
</div>
@endsection




