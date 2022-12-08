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
        <a class="nav-link active" aria-current="true"  style="background-color: #1e2020;" href="{{route('equipos.show', $equipo->id)}}">Ficha</a>
       
      </li>
     
      <li class="nav-item">
        <a class="nav-link" href="{{route('fotos.show', $equipo->id)}}">Fotos</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{route('historialPreventivo', $equipo->id)}}">Historial</a>
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
  <div>

  <div class="card-body "  style="max-width: 95;">  
  
  <div class="dropdown">
    <a class=" fa-solid fa-screwdriver-wrench btn btn-success dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
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
            <td>Check</td>
            <td>Fecha</td>
            <td>Plan</td>
            <td></td>
         </thead> 
           <tbody> 
              @foreach($tareas as $tarea) 
                  <tr STYLE="text-align:left; color: #090a0a; font-family: Times New Roman;  font-size: 14px; ">
                      <td STYLE="font-weight:bold; text-align:left; color: #090a0a; font-family: Times New Roman;  font-size: 14px; ">{{$tarea->descripcion}} </td> 
                      <td>{{$tarea->pivot->tcheck}} &nbsp;</td>
                      <td>{{$tarea->updated_at}}  &nbsp; </td>
                      <td>{{$tarea->pivot->plan_id}}  &nbsp;</td> 
                      <td></td>
                  </tr>
              @endforeach
      
         </tbody>
         </table>
    
   
  {{-- aqui Todos los script ver plantilla--}}
  </div>
</div>
</div>

  @endsection
   






