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
<h6 style="text-align:center; font-size: 30px;
background: -webkit-linear-gradient(rgb(1, 103, 71), rgb(239, 236, 217));
-webkit-background-clip: text;
-webkit-text-fill-color: transparent;">Alarmas de O.d.T</h6>
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
                        <th>Orden de Trabajo</th>
                        <th>Asignado A</th>
                        <th>Solicitante</th>
                        <th>Prioridad</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($alarmas as $alarma)
                    <tr class="priority-{{ strtolower($alarma->prioridad) }}">
                        <td>O.d.T-{{ $alarma->orden_trabajo_id }}</td>
                        <td>{{ $alarma->asignadoA }}</td>
                        <td>{{ $alarma->solicitante }}</td>
                        <td>{{ $alarma->prioridad }}</td>
                        <td>
                            <button class="btn btn-success" data-toggle="modal" data-target="#modalDetalle{{ $alarma->orden_trabajo_id }}">Detalles</button>
                        </td>
                    </tr>

                    <!-- Modal -->
                    <div class="modal fade" id="modalDetalle{{ $alarma->orden_trabajo_id }}" tabindex="-1" role="dialog" aria-labelledby="modalDetalleLabel{{ $alarma->orden_trabajo_id }}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalDetalleLabel{{ $alarma->orden_trabajo_id }}">Detalles de la Alarma</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p><strong>Orden de Trabajo ID:</strong> <a href="{{route('ordentrabajo.show',  $alarma->orden_trabajo_id)}}">O.d.T-{{ $alarma->orden_trabajo_id}}</a></p>
                                    
                                    <p><strong>Asignado A:</strong> {{ $alarma->asignadoA }}</p>
                                    <p><strong>Solicitante:</strong> {{ $alarma->solicitante }}</p>
                                    <p><strong>Prioridad:</strong> {{ $alarma->prioridad }}</p>
                                    <p><strong>Fecha de Creación:</strong> {{ $alarma->ordenTrabajo->updated_at->format('d/m/Y')}}</p>
                                    <p><strong>Trabajo no realizado:</strong> {{ $alarma->ordenTrabajo->det1 ?? 'N/A' }}</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
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
<!-- Incluir JS de jQuery UI -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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

    // Obtener el nombre del usuario autenticado desde Blade
    var usuario = @json($usuario->name);

    // Filtrar automáticamente por usuario al cargar la página
    datatable.column(1).search(usuario).draw();

    // Agregar botón de búsqueda general
    var searchButton = $('<button/>', {
      text: 'Buscar',
      title: 'Buscar en toda la tabla',
      class: 'custom-button', // Agregamos una clase personalizada
      click: function() {
        var searchInput = $('.dataTables_filter input').val();
        datatable.search(searchInput).draw();
      }
    });

    // Agregar botón "Todos" para mostrar la tabla completa sin filtros
    var allButton = $('<button/>', {
      text: 'Todos',
      title: 'Mostrar todas las alarmas',
      class: 'custom-button', // Agregamos una clase personalizada
      click: function() {
        // Limpiar todos los filtros
        datatable.search('').columns().search('').draw();
      }
    });

    // Agregar botón de filtrado "Mío"
    var mioButton = $('<button/>', {
      text: 'Míos',
      title: 'Buscar alarmas asignadas al usuario',
      class: 'custom-button', // Agregamos una clase personalizada
      click: function() {
        // Filtro en la columna "Asignado A"
        datatable.column(1).search(usuario).draw();
      }
    });

    // Agregar los botones al contenedor de filtro de DataTable en el orden deseado
    $('.dataTables_filter').append(searchButton).append(allButton).append(mioButton);

    // Hacer los modales arrastrables
    $('.modal-dialog').draggable({
      handle: ".modal-header"
    });
  });
</script>
@endsection
