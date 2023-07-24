
{{-- @extends('layouts.plantillaLTE') --}}

@extends('adminlte::page')
@section('title', 'Lubricaciones')
@section('css')
<style>
 
  </style>

@endsection

@section('content_header')
<h6 STYLE="text-align:center; font-size: 30px;
background: -webkit-linear-gradient(rgb(1, 103, 71), rgb(239, 236, 217));
-webkit-background-clip: text;
-webkit-text-fill-color: transparent;">Listado de puntos de lubricación</h6>
@stop
@section('content')
<div class="card border-primary" style="background: linear-gradient(to left,#495c5c,#030007); ">
<div class="card-body "  style="max-width: 100%;">
<div class="text-white card-body "  style="max-width: 100%;">

<table id="listado" class="table table-striped table-success  table-hover border-4" >
    <thead class="table-dark" >
        
        <td>Referencia</td>
        <td>Nº de punto</td>
        <td>Detalle</td>
        <td>Lubricante</td>
        <td>Color</td>
       
    <tbody>
      @foreach ($lubricaciones as $lubricacion)
      <tr STYLE="text-align:left; color: #090a0a; font-family: Times New Roman;  font-size: 14px; ">
        
        <td STYLE="font-weight:bold; text-align:left; color: #090a0a; font-family: Times New Roman;  font-size: 14px; ">{{$lubricacion->id}}</td>
        
        <td>{{$lubricacion->puntoLubric}}</td>
        <td>{{$lubricacion->Descripción}}</td>
        <td>{{$lubricacion->lubricante}}</td>
        <td>{{$lubricacion->color}}</td>
        
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
@stop
