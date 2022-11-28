@extends('layouts.plantilla')
@section('title', 'Ordenes de trabajo')
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
  -webkit-text-fill-color: transparent;">Listado de todos los equipos</h6>


<div class="text-white card-body "  style="max-width: 95;">

   

<table id="listado" class="table table-striped table-success  table-hover border-4" >
    <thead class="table-dark" >
        
      <td STYLE="font-weight:bold; text-align:left; color: #edf3f3; font-family: Times New Roman;  font-size: 14px; ">Orden Nº:</td>
      <td>De:</td>
      <td>Para:</td>
      <td STYLE="color: #ffffff; font-family: Times New Roman;  font-size: 14px; ">Estado:</td>
      <td></td>
       
    <tbody>
       @foreach($ots as $ot)

      <tr STYLE="text-align:left; color: #090a0a; font-family: Times New Roman;  font-size: 14px; ">
        
        <td> <a href="{{route('ordentrabajo.show', $ot->id)}}">{{$ot->id}}</a></td>
        <td>{{$ot->de}}</td>
        <td>{{$ot->para}}</td>
        <td>{{$ot->estado}}</td>
        <td>
        
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




