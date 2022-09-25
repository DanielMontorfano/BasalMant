@extends('layouts.plantilla')
@section('title', 'OT')
@section('css')
{{-- https://datatables.net/ **IMPORTANTE PLUG IN PARA LAS TABLAS --}}
{{-- Para que sea responsive se agraga la tercer libreria --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap5.min.css">
@endsection

@section('content')

{{-- <h1></h1> --}}
<h1></h1>
{{-- https://datatables.net/ **IMPORTANTE PLUG IN PARA LAS TABLAS --}}
{{-- <a href="/Equipos/crear" > Crear curso</a> **Laravel no recomienda direccionar asi--}}

<div class="card border-primary bg-secondary ">
<div class="card-body "  style="max-width: 95;">
<div class="text-white card-body "  style="max-width: 95;">

{{-- <p ><a  class="text-white " href={{route('ordentrabajo.create')}}> Crear Orden de trabajo</a></p>  --}}   
    
<table id="equipos" class="table table-striped table-success  table-hover border-4" >
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


{{-- Para hacer resposive necesito agregar las 2 ultimas librerias --}}
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script>src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"</script>
<script>src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap5.min.js"</script>

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

</div>
</div>
</div>
@endsection

