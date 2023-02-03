{{-- @extends('layouts.plantilla') --}}
@extends('adminlte::page') 
@section('title', 'Historial de' . " " . $equipo->codEquipo)
@section('css')
{{-- https://datatables.net/ **IMPORTANTE PLUG IN PARA LAS TABLAS --}}
{{-- Para que sea responsive se agraga la tercer libreria --}}
{{-- Todo lo de plantilla --}}
@endsection

@section('content')
@include('layouts.partials.menuEquipo')
{{--<h1></h1> --}}
{{-- https://datatables.net/ **IMPORTANTE PLUG IN PARA LAS TABLAS --}}
{{-- <a href="/Equipos/crear" > Crear curso</a> **Laravel no recomienda direccionar asi--}}

<div class="card border-primary" style="background: linear-gradient(to left,#495c5c,#030007); ">
  <div class="card-body "  style="max-width: 95;">

  <h6 STYLE="text-align:center; font-size: 30px;
  background: -webkit-linear-gradient(rgb(1, 103, 71), rgb(239, 236, 217));
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;">Mantenimientos realizados</h6>

  <div class="dropdown">
    <a title="Reportes" class=" fa-solid fa-screwdriver-wrench btn btn-success dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
          <a class="dropdown-item" href="{{ route('historialPreventivo', $equipo->id) }}">Sólo planes</a>
          <a class="dropdown-item" href="{{ route('historialCorrectivo', $equipo->id) }}">Sólo ordenes</a>
          <a class="dropdown-item" href="{{ route('historialTodos', $equipo->id) }}">Ambos</a>
        </div>
  </div>
  <br>

    <table id="listado" class="table table-striped table-success  table-hover border-4" >
      <thead class="table-dark" >
          
          <td>O.d.T</td>
          <td>Descripción/Estado</td>
          <td>Fecha</td>
          <td>Aprobó</td>
          <td></td>
         
      <tbody>
       {{--  @foreach ($tareas as $tarea) --}}
       @foreach ($ots_e as $ot)
        <tr STYLE="text-align:left; color: #090a0a; font-family: Times New Roman;  font-size: 14px; ">
          
          <td STYLE="font-weight:bold; text-align:left; color: #090a0a; font-family: Times New Roman;  font-size: 14px; "><a href="{{route('ordentrabajo.show', $ot->id)}}">{{$ot->id}}</a></td> 
          <td>{{$ot->det2}}{{"(" . $ot->estado . ")"}}</td>
          <td>{{$ot->updated_at}}</td>
          <td>{{$ot->aprobadoPor}}</td> 
  
          <td>
            <a class="bi bi-eye" href="{{route('ordentrabajo.show', $ot->id)}}"></a>
          </td>
        </tr>
       @endforeach
      </tbody>
  </table>
</div>
</div>
</div>

<div class="container"> 
  @include('layouts.partials.footer')
</div>

@endsection


