{{-- @extends('layouts.plantilla') --}}
@extends('adminlte::page') 
@section('title', 'Historial de' . " " . $equipo->codEquipo)
@section('content_header')

@include('layouts.partials.menuEquipo')
@stop
@section('css')
<style>
  
/*Esto establecerá un ancho máximo para la columna de descripción y hará que el texto se recorte y se muestre con puntos suspensivos en lugar de desbordarse. Puedes ajustar el ancho máximo según tus necesidades.*/
.r {
    max-width: 5px; /* O el ancho máximo que desees */
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}





</style>
{{-- https://datatables.net/ **IMPORTANTE PLUG IN PARA LAS TABLAS --}}
{{-- Para que sea responsive se agraga la tercer libreria --}}
{{-- Todo lo de plantilla --}}
@endsection

@section('content')
<div class="container">
 
{{--<h1></h1> --}}
{{-- https://datatables.net/ **IMPORTANTE PLUG IN PARA LAS TABLAS --}}
{{-- <a href="/Equipos/crear" > Crear curso</a> **Laravel no recomienda direccionar asi--}}

<div class="card border-primary" style="background: linear-gradient(to left,#495c5c,#030007); ">
  <div class="card-body "  style="max-width: 95;">
  <h6 STYLE="text-align:center; font-size: 30px;
  background: -webkit-linear-gradient(rgb(1, 103, 71), rgb(239, 236, 217));
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;">Historial de {{$equipo->codEquipo}} </h6>
  
      <div class="dropdown">
    <a title="Reportes" class=" fa-solid fa-screwdriver-wrench btn btn-success dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuLink"> 
          <a class="dropdown-item" href="{{ route('historialPreventivoEjecut', $equipo->id) }}">Estado general</a> 
          <a class="dropdown-item" href="{{ route('historialPreventivo', $equipo->id) }}">Preventivos</a>
          <a class="dropdown-item" href="{{ route('historialCorrectivo', $equipo->id) }}">Correctivos</a>
          <a class="dropdown-item" href="{{ route('historialTodos', $equipo->id) }}">Ambos</a>
        </div>
      </div>
  <br>
    <table id="listado1" class="table table-striped table-success  table-hover border-4" >
    <thead class="table-dark" >
        <td>Estado</td>
        <td>Descripción</td>
        <td>Fecha</td>
        <td>Realizó/Supervisó</td>
        <td></td>
       
    <tbody>
      @foreach ($tareas as $tarea)
      <tr STYLE="text-align:left; color: #090a0a; font-family: Times New Roman;  font-size: 14px; ">
        <td STYLE="font-weight:bold; text-align:left; color: #022a2a; font-family: Times New Roman;  font-size: 14px; ">{{$tarea->pivot->tcheck}}</td> 
        <td class="descripcion">{{$tarea->descripcion}}</td>
        <td >{{$tarea->pivot->updated_at}}</td>
        <td class="r">{{$tarea->pivot->operario}}/{{$tarea->pivot->supervisor}}</td> 

        <td>
          <a class="bi bi-eye" href="{{route('equipos.show', $equipo->id)}}"></a>
        </td>
      </tr>
        @endforeach
    </tbody>
    </table>
  </div>
</div>


</div> {{-- Container --}}
<div class="container"> 
  @include('layouts.partials.footer')
</div>


@endsection




