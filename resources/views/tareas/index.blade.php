{{-- @extends('layouts.plantilla') --}}
@extends('adminlte::page')
@section('title', 'Tareas')
@section('css')
@endsection
@section('content_header')
<h6 STYLE="text-align:center; font-size: 30px;
background: -webkit-linear-gradient(rgb(1, 103, 71), rgb(239, 236, 217));
-webkit-background-clip: text;
-webkit-text-fill-color: transparent;">Listado de todas tareas</h6>
@stop
@section('content')
<div class="card border-primary" style="background: linear-gradient(to left,#495c5c,#030007); ">
<div class="card-body "  style="max-width: 95;">
<div class="text-white card-body "  style="max-width: 95;">
<p ><a  class="text-white " href={{route('tareas.create')}}> Crear tarea</a></p> 
<table id="listado" class="table table-striped table-success  table-hover border-4" >
    <thead class="table-dark" style="text-align: left;" >
        
        <td>Código</td>
        <td style="text-align: center;">Descripción</td>
        <td style="text-align: center;">Duración</td>
        <td></td>
        <td></td>
        <td></td> 
    <tbody>
      @foreach ($tareas as $tarea)
      <tr STYLE="color: #090a0a; font-family: Times New Roman;  font-size: 14px; ">
        <td STYLE="font-weight:bold; color: #090a0a; font-family: Times New Roman;   font-size: 14px; ">
          {{$tarea->codigo}}
        </td>
      
        <td >
          {{$tarea->descripcion}}
        </td>
        <td STYLE="text-align:center; color: #090a0a; font-family: Times New Roman;  font-size: 14px; ">
          {{$tarea->duracion}}  {{$tarea->unidad}}
        </td>
        <td STYLE="color: #090a0a; font-family: Times New Roman;  font-size: 14px; ">
          
        </td>
        <td STYLE="color: #ffffff; font-family: Times New Roman;  font-size: 14px; ">
        <a class="bi bi-pencil-fill" href="{{route('tareas.edit', $tarea->id)}}"></a> 
        </td>
       <td>
        <a class="bi bi-eye" href="{{route('tareas.show', $tarea->id)}}"></a>
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







