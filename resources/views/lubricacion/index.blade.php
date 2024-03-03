
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
        <td>Caraterísticas</td>
        <td></td>
        <td></td>
        <td>s</td>
    </thead>   
    <tbody>
      @foreach ($lubricaciones as $lubricacion)
      <tr STYLE="text-align:left; color: #090a0a; font-family: Times New Roman;  font-size: 14px; ">
        
        <td STYLE="font-weight:bold; text-align:left; color: #090a0a; font-family: Times New Roman;  font-size: 14px; ">{{$lubricacion->id}}</td>
        
        <td>
          Punto: <span style="color: rgb(94, 7, 102);">{{$lubricacion->puntoLubric}}</span> <br> 
          Frecuencia:
          @switch($lubricacion->frecuencia)
              @case(0)
                  <span style="color: rgb(94, 7, 102);">Turno</span> <br>
                  @break
              @case(2)
                  <span style="color: rgb(94, 7, 102);">Diaria</span> <br>
                  @break
              @case(20)
                  <span style="color: rgb(94, 7, 102);">Semanal</span> <br>
                  @break
              @case(83)
                  <span style="color: rgb(94, 7, 102);">Mensual</span> <br>
                  @break
              @default
                  <span style="color: rgb(94, 7, 102);">Desconocida</span> <br>
          @endswitch
          Descripción:<span style="color: rgb(94, 7, 102);">{{$lubricacion->descripcion}}</span> <br>
          Lubricante: <span style="color: rgb(94, 7, 102);">{{$lubricacion->lubricante}}</span> <br>
          Color: 
          <span style="color: rgb(94, 7, 102);">
              {{ $lubricacion->color }}
          </span>
          <span style="color: rgb(94, 7, 102);">
              @switch($lubricacion->color)
                  @case('A')
                      - Aceites convensionales.
                      @break
          
                  @case('B')
                      - Grasas convensionales.
                      @break
          
                  @case('C')
                      -  Aceites Grado alimenticio (H1).
                      @break
          
                  @case('D')
                      - Grasas Grado Alimenticio (H1).
                      @break
          
                  @default
                      - Texto por defecto o manejo de casos no previstos
              @endswitch
          </span>
          <br>
          
          Recipiente: <span style="color: rgb(94, 7, 102);">{{$lubricacion->recipiente}}</span> <br>
      </td>
      
        <td></td>
        <td></td>
        <td STYLE="color: #ffffff; font-family: Times New Roman;  font-size: 14px; ">
          <a class="bi bi-pencil-fill" href="{{route('lubricacion.edit', $lubricacion->id)}}"></a> 
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
@stop
