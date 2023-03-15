{{-- @extends('layouts.plantilla') --}}
@extends('adminlte::page') 
@section('title', 'Ver ' . $equipo->marca)
@section('css')
{{-- https://datatables.net/ **IMPORTANTE PLUG IN PARA LAS TABLAS --}}
{{-- Para que sea responsive se agraga la tercer libreria --}}
{{-- Todo lo de plantilla --}}
{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}

<style>
  .select-custom {
  background-color: #9d9074a3;
}

#table{
  /*border-collapse: collapse;*/

}
#tabla2 {
  
  margin-top: 2px; /* ajusta el valor según sea necesario */
  margin-bottom: 20px; /* ajusta el valor según sea necesario */
  margin-left: 15px;
  }
#tabla2  tr, td, input {
  
  padding-left: 15px;
  padding-bottom: 3px; /* Añade un poco de espacio entre cada elemento y la línea */
  padding-top: 20
}

</style>
@endsection

@section('content')
@include('layouts.partials.menuEquipo')

<div class="card" STYLE="background: linear-gradient(to right,#5c5649,#030007);" >
  <div class="card-header" STYLE="background: linear-gradient(to right,#201f1e,#030007);" >
    
  
  
    <h6 STYLE="text-align:center; font-size: 30px;
                background: -webkit-linear-gradient(rgb(1, 103, 71), rgb(239, 236, 217));
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;">Ficha plan</h6>
                



        {{-- <p ><a  class="text-white " href={{route('equipoTareash.show', $equipo->id)}}>editar tareas de este equipo</a></p> --}}
        
        <form id="cargaPlan" action="{{route('equipoTareash.store')}}" method="POST" class="form-horizontal" STYLE="background: linear-gradient(to right,#141E30,#243B55);">
          @csrf
        @if(isset($PlanP))
        @foreach($PlanP as $plan)
        <table class="table-bordered">
          <tr >
            <td class="col-2" title="Editar este plan">
              <strong>
                <a href="{{route('plans.edit', $plan->id)}}">{{$plan->codigo}}</a>
              </strong><br>
              
              {{$plan->descripcion}}

            </td>

              <td  align="center" >
                    <table class="tabla2">
                      @foreach($ProtocoloP as $protocolo)
                          <tr>
                            <td colspan="3"  style="padding-left: 100px;">
                             
                              <div  title="Editar este procedimiento">
                                      <strong>
                                        <a href="{{route('protocolos.edit', $protocolo->id)}}">{{$protocolo->codProto}}</a>
                                      </strong>
                                ( {{$protocolo->descripcion}} )
                              </div>
                              
                            </td>
                          </tr>
                          @foreach($Tareas as $tarea)
                          
                          @if($protocolo->codProto ==$tarea->cod)
                            <tr>
                              <td>
                                <input type="hidden" name="equipo_id[]" value="{{$equipo->id}}" readonly > 
                                <input type="hidden" name="plans[]" value="{{$plan->codigo}}" readonly > 
                                <input type="hidden" name="protocolos[]" value="{{$protocolo->codProto}}" readonly >  
                                <input type="hidden" name="tareas[]" value="{{$tarea->tarea_id}}" readonly > 
                                <select name="estados[]" id="estado" class="form-select select-custom rounded border-radius-3 border border-dark">
                                  <option value=""></option>
                                  <option value="NR">NR</option>
                                  <option value="R">R</option>
                                  <option value="INC">INC</option>
                                  <option value="OP">OP</option>
                                </select>
                              </td>
                              <td> &nbsp;{{$tarea->descripcion}}  </td>
                              <td>{{$tarea->duracion}} {{$tarea->unidad}}</td>
                            </tr>
                            @endif 
                            @endforeach 

                          @endforeach 
                    </table>
              </td>

              
          </tr>
         
      </table>
      @endforeach
      @endif

   
   
   <div>
   <input id="observacion" placeholder="(Observación)" autocomplete="off" class="form-control"  STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);"type="text" name="detalle" value={{old('detalle')}}>
   <table >
    <tr>
      <td>
       
        <div class="form-group">
          <label class="control-label" for="operario"></label> 
          <input placeholder="Realizó" autocomplete="off" class="form-control" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);"  type="text" name="operario" value={{old('operario')}}> 
          @error('operario')
         <small>*{{$message}}</small>
          @enderror
        </div>
      
    </td>
      <td>
        <div class="form-group">
          <label class="control-label" for="supervisor"></label> 
        <input placeholder="Supervisó" autocomplete="off" class="form-control" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);"  type="text" name="supervisor" value={{old('supervisor')}}> 
        @error('supervisor')
       <small>*{{$message}}</small>
        @enderror
      </div>
    </td>
  
</table>
      <div class="form-group">
        <button form="cargaPlan" class="btn btn-primary btn-submit" type="submit">Enviar</button>
      </div> 

</div>
               
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
</form>
<div class="container"> 
  @include('layouts.partials.footer')
</div>
@endsection




