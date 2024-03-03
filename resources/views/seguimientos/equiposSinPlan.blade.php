
{{-- @extends('layouts.plantillaLTE') --}}

@extends('adminlte::page')
@section('title', 'Sin_Plan')
@section('css')
<style>
  .custom-search-button {
    padding: 5px 10px; /* Ajusta el espacio (padding) según tus preferencias */
    margin-left: 10px; /* Ajusta el espacio (margen) a la izquierda */
    background-color: rgb(86, 103, 86); /* Cambia el color de fondo a verde */
    color: rgb(214, 239, 224); /* Cambia el color del texto a blanco */
    border: none; /* Elimina el borde */
    border-radius: 8px; /* Ajusta el radio de las esquinas */
  }
  
  .custom-search-button:hover {
    background-color: rgb(73, 133, 73); /* Cambia el color de fondo a lightgreen cuando se hace hover */
  }
  
  .custom-search-button:active {
    background-color: rgb(60, 80, 60); /* Vuelve al color de fondo verde cuando se presiona */
  }
  </style>


{{-- https://datatables.net/ **IMPORTANTE PLUG IN PARA LAS TABLAS --}}
{{-- Para que sea responsive se agraga la tercer libreria --}}
{{-- Todo lo de plantilla --}}
@endsection

@section('content_header')
<h6 STYLE="text-align:center; font-size: 30px;
background: -webkit-linear-gradient(rgb(1, 103, 71), rgb(239, 236, 217));
-webkit-background-clip: text;
-webkit-text-fill-color: transparent;">Equipos sin planes de mantenimiento</h6>
@stop
@section('content')
{{--<h1></h1> --}}
<h1></h1>
{{-- https://datatables.net/ **IMPORTANTE PLUG IN PARA LAS TABLAS --}}
{{-- <a href="/Equipos/crear" > Crear curso</a> **Laravel no recomienda direccionar asi--}}

<div class="card border-primary" style="background: linear-gradient(to left,#495c5c,#030007); ">
<div class="card-body "  style="max-width: 95;">
<div class="text-white card-body "  style="max-width: 95;">


   

<table id="listado" class="table table-striped table-success  table-hover border-4" >
    <thead class="table-dark" >
        
        <td>Equipo</td>
        <td>Detalle</td>
        <td></td>
        <td></td>
        <td></td>
       
    <tbody>
      @foreach ($equiposSinPlanes as $equipoSinPlan)
      <tr STYLE="text-align:left; color: #090a0a; font-family: Times New Roman;  font-size: 14px; ">
        
        <td STYLE="font-weight:bold; text-align:left; color: #090a0a; font-family: Times New Roman;  font-size: 14px; ">{{$equipoSinPlan->codEquipo}}</td>
        <td>{{$equipoSinPlan->det5}}</td>
        <td></td>
        <td></td>
        
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
 $(document).ready(function() {
  var datatable;

  if ($.fn.DataTable.isDataTable('#listado')) {
    datatable = $('#listado').DataTable();
  } else {
    datatable = $('#listado').DataTable({
      // Configuración de DataTable
    });
  }

  // Agregar botón de filtrado
  var searchButton = $('<button/>', {
    text: 'Críticos',
    title: 'Equipos críticos',
    class: 'custom-search-button', // Agregamos una clase personalizada
    click: function() {
      var searchInput = $('.dataTables_filter input');
      searchInput.val('Crítico').trigger('keyup');
    }
  });

  $('.dataTables_filter').append(searchButton);
});

 /* var logoUrl = '{{ asset('dataprint/LogoIngenio2.png') }}';

  var titulo ='Listado de todos los equipos';
  var url = "{{route('imprimirListado','equipos')}}" */
</script>

@stop



