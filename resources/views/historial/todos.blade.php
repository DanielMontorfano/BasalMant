@extends('layouts.plantilla')
@section('title', 'Historial de' . " " . $equipo->codEquipo)
@section('css')
{{-- https://datatables.net/ **IMPORTANTE PLUG IN PARA LAS TABLAS --}}
{{-- Para que sea responsive se agraga la tercer libreria --}}
{{-- Todo lo de plantilla --}}
@endsection

@section('content')

{{--<h1></h1> --}}
<h1></h1>
{{-- https://datatables.net/ **IMPORTANTE PLUG IN PARA LAS TABLAS --}}
{{-- <a href="/Equipos/crear" > Crear curso</a> **Laravel no recomienda direccionar asi--}}

<div class="card border-primary" style="background: linear-gradient(to left,#495c5c,#030007); ">
  <div class="card-header" STYLE="background: linear-gradient(to right,#201f1e,#030007);">
    <ul class="nav nav-tabs card-header-tabs">
      <li class="nav-item">
        <a class="nav-link" href="{{route('equipos.show', $equipo->id)}}">Ficha</a>
       
      </li>
     
      <li class="nav-item">
        <a class="nav-link" href="{{route('fotos.show', $equipo->id)}}">Fotos</a>
      </li>

      <li class="nav-item">
        <a class="nav-link active" aria-current="true"  style="background-color: #1e2020;" href="{{route('historialPreventivo', $equipo->id)}}">Historial</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('equipos.index')}}">Protocolo</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href={{route('equipoTareash.show', $equipo->id)}}>Plan</a>
      
      <li class="nav-item">
        <a class="nav-link" href="{{route('documentos.show', $equipo->id)}}">Documentos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href={{route('equipos.edit', $equipo->id)}}>Editar</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href={{route('ordentrabajo.list', $equipo->id)}}>OT</a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="{{route('equipos.index')}}">Descargar</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('imprimirEquipo',$equipo->id )}}">Imprimir</a>
      </li>
      

    </ul>
  </div>

  
  <h6 STYLE="text-align:center; font-size: 30px;
  background: -webkit-linear-gradient(rgb(1, 103, 71), rgb(239, 236, 217));
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;">Mantenimientos realizados</h6>

  <div class="dropdown">
    <a title="Reportes de mantenimientos" class=" fa-solid fa-screwdriver-wrench btn btn-success dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
          <a class="dropdown-item" href="{{ route('historialPreventivo', $equipo->id) }}">Sólo planes</a>
          <a class="dropdown-item" href="{{ route('historialCorrectivo', $equipo->id) }}">Sólo ordenes</a>
          <a class="dropdown-item" href="{{ route('historialTodos', $equipo->id) }}">Ambos</a>
        </div>
  </div>
  <br>

    <table id="listado" class="table table-striped table-success  table-hover border-4" >
      <thead class="table-dark" >
          
        <td>Tarea</td>
        <td>Origen</td>
        <td>Fecha</td>
        <td>Realizado por</td>
        <td></td>
          
      </thead>   
      <tbody>
       {{--  @foreach ($tareas as $tarea) --}}
       @foreach($registros as $registro) 
       <tr STYLE="text-align:left; color: #090a0a; font-family: Times New Roman;  font-size: 14px; ">
           <td STYLE="font-weight:bold; text-align:left; color: #090a0a; font-family: Times New Roman;  font-size: 14px; ">{{$registro['detalle']}} </td> 
           <td>{{$registro['origen']}}</td>
           <td>{{$registro['fecha']}}</td> 
           <td>{{$registro['operario']}}</td>
           <td></td>
       </tr>
      @endforeach

      </tbody>
  </table>

@endsection


