@extends('adminlte::page')

@section('title', 'O.d.T.')

@section('content_header')
@include('layouts.partials.menuEquipo')
@stop

@section('content')
<h6 STYLE="text-align:center; font-size: 30px;
background: -webkit-linear-gradient(rgb(1, 103, 71), rgb(239, 236, 217));
-webkit-background-clip: text;
-webkit-text-fill-color: transparent;">Listado de ordenes de {{$equipo->codEquipo}}</h6>



<div class="card border-primary" style="background: linear-gradient(to left,#495c5c,#030007); ">
  <div class="card-body "  style="max-width: 95;">
<p ><a  class="text-white " href={{route('ordentrabajo.createorden', $equipo->id)}}> Crear Orden de trabajo</a></p> 




<table id="listado" class="table table-striped table-success  table-hover border-4" >
  <thead class="table-dark" >
      <td>Nº de Orden</td>
      <td>Solicitante/Receptor</td>
      <td>Fecha de apertura</td>
      <td>Estado</td>
      <td>Fecha de cierre</td>
      
     
  <tbody>
    @foreach ($ots_e as $ot)
    <tr STYLE="text-align:left; color: #090a0a; font-family: Times New Roman;  font-size: 14px; ">
      <td><a title="{{$ot->det1}}" href="{{route('ordentrabajo.show', $ot->id)}}">O.d.T-{{$ot->id}}</a></td>
      <td>{{$ot->solicitante}}/{{$ot->asignadoA}}</td>
      <td>{{$ot->created_at}}</td>
      <td> <a href="{{route('ordentrabajo.showCerrar', $ot->id)}}">{{$ot->estado}}</a></td>
      <td>{{$ot->updated_at}}</td>
  
    </tr>
      @endforeach
  </tbody>
</table>
</div>
</div>


<div class="container"> 
  @include('layouts.partials.footer')
 </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>

    <script>
      $(document).ready(function () {
      $('#equipos').DataTable({
        
        reponsive: true,
        autoWidth: false,
        
        "language": {
              "lengthMenu": "Mostrar _MENU_",
              "zeroRecords": "No se encontró ningún registro - disculpe",
              "info": "Viendo _PAGE_ de _PAGES_",
              "infoEmpty": "No hay registros disponibles",
              "infoFiltered": "(filtrados desde _MAX_ total registros)",
              "search":"Buscar:",
              "paginate":{
              "next":"Siguiente",
              "previous":"Anterior"
            }
  
          }
      });
  });
  </script>
@stop








