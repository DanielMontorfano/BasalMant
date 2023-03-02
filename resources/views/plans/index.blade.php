{{-- @extends('layouts.plantilla') --}}
@extends('adminlte::page')
@section('title', 'Planes')
@section('css')

@endsection
@section('content_header')
<h6 STYLE="text-align:center; font-size: 30px;
background: -webkit-linear-gradient(rgb(1, 103, 71), rgb(239, 236, 217));
-webkit-background-clip: text;
-webkit-text-fill-color: transparent;">Listado de todos los planes de mantenimiento</h6>
@stop
@section('content')
<div class="card border-primary" style="background: linear-gradient(to left,#495c5c,#030007); ">
<div class="card-body "  style="max-width: 95;">
<div class="text-white card-body "  style="max-width: 95;">
<p ><a  class="text-white " href={{route('plans.create')}}> Crear plan</a></p> 
<table id="listado" class="table table-striped table-success  table-hover border-4" >
    <thead class="table-dark" >
        
        <td>Plan</td>
        <td>Nombre</td>
        <td>Detalle</td>
        <td></td>
        <td></td>
    </thead>
    <tbody>
      @foreach ($plans as $plan)
      <tr STYLE="text-align:left; color: #090a0a; font-family: Times New Roman;  font-size: 14px; ">
        
        <td STYLE="font-weight:bold; text-align:left; color: #090a0a; font-family: Times New Roman;  font-size: 14px; ">{{$plan->codigo}}</td>
        <td>{{$plan->nombre}}</td>
        <td>{{$plan->descripcion}}</td>
        <td STYLE="color: #ffffff; font-family: Times New Roman;  font-size: 14px; ">
          <a class="bi bi-pencil-fill" href="{{route('plans.edit', $plan->id)}}"></a> 
        </td>
        <td>
          <a class="bi bi-eye" href="{{route('plans.show', $plan->id)}}"></a>
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
@section('js')
<script>
  var logoUrl = '{{ asset('dataprint/LogoIngenio2.png') }}';
</script>
@stop







