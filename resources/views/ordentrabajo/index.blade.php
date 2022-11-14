@extends('layouts.plantilla')
@section('title', 'Ordenes de Trabajo')
@section('css')

@endsection

@section('content')

{{-- <h1></h1> --}}
<h1></h1>
{{-- https://datatables.net/ **IMPORTANTE PLUG IN PARA LAS TABLAS --}}
{{-- <a href="/Equipos/crear" > Crear curso</a> **Laravel no recomienda direccionar asi--}}

<div class="card border-primary" style="background: linear-gradient(to left,#495c5c,#030007); ">
  <div class="card-body "  style="max-width: 95;">
    <h6 STYLE="text-align:center; font-size: 30px;
    background: -webkit-linear-gradient(rgb(1, 103, 71), rgb(239, 236, 217));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;">Ordenes de trabajo</h6>
  
  
  <div class="text-white card-body "  style="max-width: 95;">

{{-- <p ><a  class="text-white " href={{route('ordentrabajo.create')}}> Crear Orden de trabajo</a></p>  --}}   
    
<table id="listado" class="table table-striped table-success  table-hover border-4" >
    <thead class="table-dark" >
        <td>Orden Nº:</td>
        <td>De:</td>
        <td>Para:</td>
        <td>Estado:</td>

       
    <tbody>
      @foreach ($ots as $ot)
      <tr>
        <td><a href="{{route('ordentrabajo.show', $ot->id)}}">{{$ot->id}}</a></td>
        <td>{{$ot->de}}</td>
        <td>{{$ot->para}}</td>
        <td>{{$ot->estado}}</td>
      </tr>
        @endforeach
    </tbody>
</table>



</div>
</div>
</div>
{{-- aqui Todos los script ver plantilla--}}
@endsection

