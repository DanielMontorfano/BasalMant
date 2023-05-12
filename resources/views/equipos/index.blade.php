
{{-- @extends('layouts.plantillaLTE') --}}

@extends('adminlte::page',$id[]=array($equipo->id))
@section('title', 'Equipos')
@section('css')
{{-- https://datatables.net/ **IMPORTANTE PLUG IN PARA LAS TABLAS --}}
{{-- Para que sea responsive se agraga la tercer libreria --}}
{{-- Todo lo de plantilla --}}
@endsection

@section('content_header')
<h6 STYLE="text-align:center; font-size: 30px;
background: -webkit-linear-gradient(rgb(1, 103, 71), rgb(239, 236, 217));
-webkit-background-clip: text;
-webkit-text-fill-color: transparent;">Listado de todos los equipos</h6>
@stop
@section('content')
{{--<h1></h1> --}}
<h1></h1>
{{-- https://datatables.net/ **IMPORTANTE PLUG IN PARA LAS TABLAS --}}
{{-- <a href="/Equipos/crear" > Crear curso</a> **Laravel no recomienda direccionar asi--}}

<div class="card border-primary" style="background: linear-gradient(to left,#495c5c,#030007); ">
<div class="card-body "  style="max-width: 95;">
<div class="text-white card-body "  style="max-width: 95;">
<p ><a  class="text-white " href={{route('equipos.create')}}> Crear equipo</a></p> 

   

<table id="listado" class="table table-striped table-success  table-hover border-4" >
    <thead class="table-dark" >
        
        <td>Equipo</td>
        <td>Modelo</td>
        <td>Detalle</td>
        <td></td>
        <td></td>
       
    <tbody>
      @foreach ($equipos as $equipo)
      <tr STYLE="text-align:left; color: #090a0a; font-family: Times New Roman;  font-size: 14px; ">
        
        <td STYLE="font-weight:bold; text-align:left; color: #090a0a; font-family: Times New Roman;  font-size: 14px; ">{{$equipo->codEquipo }}</td>
        <td>{{$equipo->Modelo}}</td>
        <td>{{$equipo->det5}}</td>
        <td STYLE="color: #ffffff; font-family: Times New Roman;  font-size: 14px; ">
          <a class="bi bi-pencil-fill" href="{{route('equipos.edit', $equipo->id)}}"></a> 
        </td>
        <td>
          <a class="bi bi-eye" href="{{route('equipos.show', $equipo->id)}}"></a>
        </td>
      </tr>
        @endforeach
    </tbody>
</table>

</div>

</div>
      <div class="container"> 
        @include('layouts.partials.menuListados')
      </div>
</div>

<div class="container"> 
  @include('layouts.partials.footer')
 </div>
{{-- aqui Todos los script ver plantilla--}}


@endsection
@section('js')
<script>
 
 /* var logoUrl = '{{ asset('dataprint/LogoIngenio2.png') }}';

  var titulo ='Listado de todos los equipos';
  var url = "{{route('imprimirListado','equipos')}}" */
</script>

@stop



