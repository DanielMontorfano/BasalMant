@extends('adminlte::page')

@section('title', 'Alarmas')

@section('css')
<style>
  .custom-button {
    padding: 5px 10px;
    margin-left: 10px;
    background-color: rgb(2, 58, 60);
    color: rgb(136, 224, 171);
    border: none;
    border-radius: 8px;
  }

  .custom-button:hover {
    background-color: rgb(39, 83, 57);
  }

  .custom-button:active {
    background-color: rgb(2, 39, 25);
  }

  /* Estilo para las filas de la tabla con fondo degradado */
  .table-striped tbody tr {
    background: linear-gradient(to right, rgb(18, 23, 18), #06170b, #000000);
    color: #ffffff; /* Color del texto */
  }

  /* Estilo para el encabezado de la tabla */
  .table-dark {
    background-color: #000000 !important; /* Color negro para el encabezado */
    color: #ffffff !important; /* Color del texto del encabezado */
  }

  /* Estilo para el modal */
  .modal-content {
    background: linear-gradient(to right, rgb(18, 23, 18), #06170b, #000000); /* Fondo del modal */
    color: #ffffff; /* Color del texto del modal */
  }

  .modal-header {
    background-color: #333333; /* Fondo del encabezado del modal */
    color: #ffffff; /* Color del texto del encabezado del modal */
  }

  .modal-footer .btn-secondary {
    background-color: #555555; /* Fondo del botón Cerrar */
    color: #ffffff; /* Color del texto del botón */
  }

  .modal-footer .btn-secondary:hover {
    background-color: #777777; /* Fondo del botón Cerrar al pasar el ratón */
  }
</style>
<!-- Incluir CSS de jQuery UI -->
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endsection

@section('content_header')
<h4 style="text-align:center; font-size: 30px;
background: -webkit-linear-gradient(rgb(1, 103, 71), rgb(239, 236, 217));
-webkit-background-clip: text;
-webkit-text-fill-color: transparent;">Equipos sin repuestos cargados</h4>
@stop

@section('content')
{{-- Contenedor principal de la tarjeta --}}
<div class="card border-primary" style="background: linear-gradient(to left,#495c5c,#030007)">
    <div class="card-body" style="max-width: 100%;">
        <div class="text-white card-body" style="max-width: 100%;">
           

            {{-- Tabla de alarmas --}}
            <table id="listado" class="table table-primary table-striped">
              <thead class="table-dark">
                  <tr>
                      <th>Código de Equipo</th>
                      <th>Sección</th>
                      <th>Subsección</th> <!-- Nueva columna para subsección -->
                      <th>Creador</th>
                      <th>Acciones</th>
                      <th></th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($equiposSinRepuestos as $equipo)
                      <tr>
                          <td>{{ $equipo->equipo }}</td>
                          <td>{{ $equipo->seccion }}</td>
                          <td>{{ $equipo->subSeccion }}</td> <!-- Mostrar subsección -->
                          <td>{{ $equipo->creador }}</td>
                          <td>
                              <a class="btn btn-primary" href="{{ route('equipos.show', $equipo->equipoId) }}">Ir</a>
                          </td>
                          <td></td>
                      </tr>
                  @endforeach
              </tbody>
          </table>
          
        </div>
    </div>
</div>

{{-- Inclusión del menú de listados --}}
<div class="container">
    @include('layouts.partials.menuListados')
</div>

{{-- Inclusión del pie de página --}}
<div class="container">
    @include('layouts.partials.footer')
</div>
@endsection

@section('js')


@endsection

