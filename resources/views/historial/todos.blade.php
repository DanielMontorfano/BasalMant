{{-- @extends('layouts.plantilla') --}}
@extends('adminlte::page') 
@section('title', 'Historial de' . " " . $equipo->codEquipo)
@section('content_header')

@include('layouts.partials.menuEquipo')
@stop
@section('css')


@endsection

@section('content')
<div class="container">
  <div class="card border-primary" style="background: linear-gradient(to left,#495c5c,#030007); ">
    <div class="card-body" style="background: linear-gradient(to left,#495c5c,#030007);">
      <div class="text-white card-body">
        <h6 STYLE="text-align:center; font-size: 30px;
          background: -webkit-linear-gradient(rgb(1, 103, 71), rgb(239, 236, 217));
          -webkit-background-clip: text;
          -webkit-text-fill-color: transparent;">Historial de {{$equipo->codEquipo}} </h6>
      
    <div class="table-responsive">
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
    </div> {{-- resposive --}}
</div>
</div>
</div> 

</div> {{-- Container --}}
<div class="container"> 
  @include('layouts.partials.footer')
</div>

@endsection


