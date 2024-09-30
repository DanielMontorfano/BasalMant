@extends('adminlte::page')
@section('title', 'Ordenes de trabajo')
@section('css')
{{-- https://datatables.net/ **IMPORTANTE PLUG IN PARA LAS TABLAS --}}
{{-- Para que sea responsive se agraga la tercer libreria --}}
{{-- Todo lo de plantilla --}}
@endsection
@section('content_header')
<h6 STYLE="text-align:center; font-size: 30px;
background: -webkit-linear-gradient(rgb(1, 103, 71), rgb(239, 236, 217));
-webkit-background-clip: text;
-webkit-text-fill-color: transparent;">Listado de todas las O.d.T.</h6>
@stop
@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<div class="card border-primary" style="background: linear-gradient(to left,#495c5c,#030007); ">
<div class="card-body "  style="max-width: 95;">
<div class="text-white card-body "  style="max-width: 95;">

   

<table id="listado" class="table table-striped table-success  table-hover border-4" >
    <thead class="table-dark" >
        
      <td>Nº de Orden</td>
      <td>Solicitante/Receptor</td>
      <td>Fecha de apertura</td>
      <td>Estado</td>
      <td>Fecha de cierre</td>
    </thead>   
    <tbody>
      @foreach($ots as $ot)
          @php
              $diferencia = $ot->created_at->diffInDays(now());

           
            $estado = '';
          
              if ($ot->estado === 'Cerrada') {
                  $estado = 'estado1'; // Cerrada, estado rojo
              } elseif ($ot->estado === 'Abierta' && $diferencia >90) {
                  $estado = 'estado3'; // Abierta y más de 100 días, estado rojo
              } else {
                  $estado = 'estado2'; // Abierta pero menos de 100 días, estado amarillo
              }
          @endphp
  
          <tr STYLE="text-align:left; color: #090a0a; font-family: Times New Roman;  font-size: 14px; ">
            <td title="
            @if($estado === 'estado1')
                Orden cerrada correctamente
            @elseif($estado === 'estado2')
                Orden en ejecución
            @elseif($estado === 'estado3')
                Ya pasaron 3 meses!!
            @endif
        ">
            <x-semaforo :estado="$estado" /> <a href="{{route('ordentrabajo.show', $ot->id)}}">O.d.T-{{$ot->id}}</a>
        </td>
              <td>{{$ot->solicitante}}/{{$ot->asignadoA}}</td>
              <td>{{$ot->created_at}}</td>
              <td>{{$ot->estado}}</td>
              <td>
                  @if($ot->estado === 'Abierta')
                      ---
                  @else
                      {{$ot->updated_at}}
                  @endif
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
{{-- aqui Todos los script ver plantilla--}}

@endsection
@section('js')
<script>
    var usuarioNombre = @json($usuario->name);

    // Función para mostrar la alerta después de 10 segundos
    setTimeout(function() {
        // Mostrar alerta personalizada con SweetAlert2
        Swal.fire({
            title: usuarioNombre + ':',
            text: 'El plazo para hacer algunos trabajos ya se cumplió',
            icon: 'warning',
            timer: 3000, // 3 segundos
            timerProgressBar: true,
            showConfirmButton: false,
            showCancelButton: true, // Mostrar botón de cancelar
            cancelButtonText: 'Inspeccionar', // Texto del botón de cancelar
            cancelButtonColor: 'green', // Color del botón de cancelar
            background: 'linear-gradient(to right, rgb(86, 103, 86), black)', // Fondo degradado de verde a negro
            border: '2px solid red', // Borde rojo
            cancelButtonAriaLabel: 'Inspeccionar', // Atributo ARIA del botón de cancelar
            cancelButtonClass: 'custom-inspect-button', // Clase personalizada del botón de cancelar
            customClass: {
                title: 'swal2-title-custom',
                content: 'swal2-content-custom',
                popup: 'custom-swal-popup'
            }
        }).then((result) => {
            // Manejar el clic en el botón de cancelar
            if (result.dismiss === Swal.DismissReason.cancel) {
                // Redirigir al usuario a la ruta /chequear-alarmas
                window.location.href = '/chequear-alarmas';
            }
        });
    }, 5000); // 5 segundos
</script>

<style>
    .custom-swal-popup {
        position: fixed;
        bottom: 20px; /* Ajusta según sea necesario */
        left: 20px; /* Ajusta según sea necesario */
        width: 250px !important; /* Ajusta el ancho según sea necesario */
        padding: 10px !important; /* Ajusta el padding según sea necesario */
        margin: 0 !important;
    }
    .swal2-title-custom {
        font-size: 1.2em; /* Ajusta el tamaño de la fuente del título */
    }
    .swal2-content-custom {
        font-size: 1em; /* Ajusta el tamaño de la fuente del contenido */
    }
    .custom-inspect-button {
        font-size: 0.9em; /* Ajusta el tamaño de la fuente del botón de cancelar */
    }
</style>
@endsection



