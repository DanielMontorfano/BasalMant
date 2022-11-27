@extends('layouts.plantilla')
@section('title', 'Procedimientos de mantenimiento')
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
  <div class="card-body "  style="max-width: 95;">
    <h6 STYLE="text-align:center; font-size: 30px;
    background: -webkit-linear-gradient(rgb(1, 103, 71), rgb(239, 236, 217));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;">Listado de todos Procedimientos</h6>

<div class="text-white card-body "  style="max-width: 95;">
<p ><a  class="text-white " href={{route('protocolos.create')}}> Crear Procedimiento</a></p> 
   

<table id="listado" class="table table-striped table-success  table-hover border-4" >
     <thead class="table-dark" >
        <td>Código</td>
        <td>Descripción</td>
        <td></td>
        <td></td>
    </thead>  
    <tbody>
      @foreach ($protocolos as $protocolo)
      <tr STYLE="text-align:left; color: #090a0a; font-family: Times New Roman;  font-size: 14px; ">
        <td >{{$protocolo->codigo}}</td>
        <td >{{$protocolo->descripcion}}</td>
        <td >
          <a class="bi bi-pencil-fill" href="{{route('protocolos.edit', $protocolo->id)}}"></a> 
        </td>
        <td>
          <a class="bi bi-eye" href="{{route('protocolos.show', $protocolo->id)}}"></a>
        </td>
      </tr>
        @endforeach
    </tbody>
</table>
</div>
</div>
</div>
{{-- aqui Todos los script ver plantilla--}}

@endsection




