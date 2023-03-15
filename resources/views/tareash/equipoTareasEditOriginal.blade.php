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
  
  margin-top: 15px; /* Ajusta este valor para lograr el espacio deseado */
  
 }
 a {
      color: rgb(197, 166, 11);
    }
    a:hover {
      color: rgba(119, 238, 15, 0.758);
    }   
    .tarea-container {
  border-bottom: 1px solid rgb(209, 209, 158);
  padding-bottom: 10px; /* Añade un poco de espacio entre cada elemento y la línea */

}

.detalle-container {
  text-align: left;
  background-color: transparent;
  border: none;
  outline: none;
  color: white;
  
}
 

.protocolo-container {
  padding-top: 15px;
  border-bottom: 2px solid rgb(111, 213, 9);
  padding-bottom: 20px; /* Añade un poco de espacio entre cada elemento y la línea */
}
.btn-submit {
  background: linear-gradient(to right, #495c5c, #030007);
  border-color:  rgb(209, 209, 158);
  margin: 0 auto;
  display: block;
}



.form-group {
  display: flex;
  align-items: center;
  justify-content: flex-start;
  flex-wrap: wrap;
}
.form-group label {
  margin-right: 10px; /* ajusta el valor según sea necesario */
  flex-basis: 20%; /* ajusta el valor según sea necesario */
}
.form-group input {
  flex-basis: 80%; /* ajusta el valor según sea necesario */
}
#tabla2 {
  margin-top: 20px; /* ajusta el valor según sea necesario */
  margin-bottom: 20px; /* ajusta el valor según sea necesario */
  margin-left: 150px;
  }
#tabla2  tr, td, input {
  
  padding-left: 60px;
  padding-bottom: 0px; /* Añade un poco de espacio entre cada elemento y la línea */
  padding-top: 20
}
#observacion{
    
    margin-left: 190px;
    padding-left: 10px;
    width:600px;
    text-align: left;
    
   
    outline: none;
    color: white;
    
  }
  
</style>
@endsection

@section('content')
@include('layouts.partials.menuEquipo')

<div class="card" STYLE="background: linear-gradient(to right,#5c5649,#030007);" >
  <div class="card-header" STYLE="background: linear-gradient(to right,#201f1e,#030007);">
    
  
  
    <h6 STYLE="text-align:center; font-size: 30px;
                background: -webkit-linear-gradient(rgb(1, 103, 71), rgb(239, 236, 217));
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;">Formulario de ficha plan</h6>
                



        {{-- <p ><a  class="text-white " href={{route('equipoTareash.show', $equipo->id)}}>editar tareas de este equipo</a></p> --}}
        
        <form id="cargaPlan" action="{{route('equipoTareash.store')}}" method="POST" class="form-horizontal" STYLE="background: linear-gradient(to right,#495c5c,#030007);">
          @csrf
        @if(isset($PlanP))
        @foreach($PlanP as $plan)
        <table class="table-bordered">
          <tr>
            <td class="col-2" title="Editar este plan">
              <strong>
                <a href="{{route('plans.edit', $plan->id)}}">{{$plan->codigo}}</a>
              </strong><br>
              
              {{$plan->descripcion}}

            </td>
            <td class="col-8">
              @if(isset($ProtocoloP))
              @foreach($ProtocoloP as $protocolo)
              <div class="col-12 protocolo-container" title="Editar este procedimiento">
                <strong>
                  <a href="{{route('protocolos.edit', $protocolo->id)}}">{{$protocolo->codProto}}</a>
                </strong>
                ( {{$protocolo->descripcion}} )
              </div>
              <div class="row">
                
                @foreach($Tareas as $tarea)
                
                @if($protocolo->codProto ==$tarea->cod)
                <div >
                  
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
                </div>
                
                <div class="col-9 tarea-container ">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}. &nbsp;{{$tarea->descripcion}}  </div>
                <div class="col-1 tarea-container">{{$tarea->duracion}} {{$tarea->unidad}}</div>
              
                @endif 
                @endforeach  
                <div>&nbsp;</div>
                
        
        
      @endforeach
      @endif
      
    </div>
    @endforeach  
    @endif
  </td>
</tr>
</table>
   <br>
   <div >
 
    


   </form>
    <input id="observacion" placeholder="(Observación)" autocomplete="off" class="form-control"  STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);"type="text" name="detalle" value={{old('detalle')}}>
    


    <table id="tabla2">
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
  </div>
               <div class="form-group">
                <button form="cargaPlan" class="btn btn-primary btn-submit" type="submit">Enviar</button>
               </div>
               <br>   
   
      
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




