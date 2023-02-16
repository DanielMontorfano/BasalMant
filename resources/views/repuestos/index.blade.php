{{-- @extends('layouts.plantilla') --}}
@extends('adminlte::page')
@section('title', 'Tareas')
@section('css')
@endsection
@section('content_header')
<h6 STYLE="text-align:center; font-size: 30px;
background: -webkit-linear-gradient(rgb(1, 103, 71), rgb(239, 236, 217));
-webkit-background-clip: text;
-webkit-text-fill-color: transparent;">Listado de todos los repuestos</h6>
@stop
@section('content')
<div class="card border-primary" style="background: linear-gradient(to left,#495c5c,#030007); ">
<div class="card-body "  style="max-width: 95;">
<div class="text-white card-body "  style="max-width: 95;">
<p ><a title="Permite dar de alta un repuesto" class="text-white " href={{route('repuestos.create')}}> Crear repuesto</a></p> 
<table id="listado3" class="table table-striped table-success  table-hover border-4" >
    <thead class="table-dark" style="text-align: left;" >
        
        <td>Código</td>
        <td style="text-align: center;">Descripción</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td> 
    <tbody>
      @foreach ($repuestos as $repuesto)
      <tr STYLE="color: #090a0a; font-family: Times New Roman;  font-size: 14px; ">
        <td STYLE="font-weight:bold; color: #090a0a; font-family: Times New Roman;   font-size: 14px; ">
          {{$repuesto->codigo}}
        </td>
      
        <td >
          {{$repuesto->descripcion}}
        </td>
        <td ></td>
        <td STYLE="color: #090a0a; font-family: Times New Roman;  font-size: 14px; ">
          
        </td>
        <td STYLE="color: #ffffff; font-family: Times New Roman;  font-size: 14px; ">
        <a class="bi bi-pencil-fill" href="{{route('repuestos.edit', $repuesto->id)}}"></a> 
        </td>
       <td>
        <a class="bi bi-eye" href="{{route('repuestos.show', $repuesto->id)}}"></a>
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







