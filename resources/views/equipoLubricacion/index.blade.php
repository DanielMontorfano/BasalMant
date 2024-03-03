@extends('adminlte::page')

@section('title', 'Lubricaciones')
@section('css')
<style>
.custom-card {
    background-color: rgba(39, 38, 37, 0.397);
}

th, td {
    text-align: center;
    margin: 5px;
    width: auto;
    white-space: nowrap; /* Evita que el texto se divida en varias líneas */
    overflow: hidden; /* Oculta el contenido que se desborde de la celda */
    text-overflow: ellipsis; /* Muestra un indicador de truncamiento (...) si es necesario */
    border-collapse: collapse;
}

.btn {
    padding: 1px 4px; /* Ajusta estos valores según tus necesidades */
}

.table-container {
    overflow-x: auto;
}

@import url("{{ asset('dataprint/sweetalert2.min.css') }}");
</style>


@stop

@section('content_header')
<h6 style="text-align: center; font-size: 30px; color: #000000;
    background: -webkit-linear-gradient(rgb(1, 103, 71), rgb(239, 236, 217));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;">
    Lubricaciones
</h6>
@stop

<!-- A<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script> -->



@section('content')
<div class="text-center mt-2">
  
    <button onclick="mostrarAdvertencia()" class="btn btn-success">Carga Diaria</button>
    
</div>
<div class="card custom-card">
    <div class="card-body">
        <div class="table-container">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>P</th>
                        @php
                            $maxDataColumns = 0;
                        @endphp
                        @foreach ($todosFiltrado as $codigo => $puntos)
                            @foreach ($puntos as $punto => $valores)
                                @if (count($valores) > $maxDataColumns)
                                    @php
                                        $maxDataColumns = count($valores);
                                    @endphp
                                @endif
                            @endforeach
                        @endforeach
                        @for ($i = $maxDataColumns; $i >= 1; $i--) <!-- Modificado para contar hacia abajo -->
                            <th title="Recorrido" width="auto" >R{{ $i }}</th>
                        @endfor
                    </tr>
                </thead>
                <tbody>
                    @foreach ($todosFiltrado as $codigo => $puntos)
                        @php
                            $maxDataColumns = 0;
                        @endphp
                        @foreach ($puntos as $punto => $valores)
                            @if (count($valores) > $maxDataColumns)
                                @php
                                    $maxDataColumns = count($valores);
                                @endphp
                            @endif
                        @endforeach
                        @foreach ($puntos as $punto => $valores)
                            <tr>
                                @if ($loop->first)
                                    <td rowspan="{{ count($puntos) }}">
                                        <a href="{{ route('codigoAequipo',$codigo)}}">{{ $codigo }}</a>    
                                        
                                        <button style="background-color: Transparent;border: none;" title="Imprimir Lcheck"><a  class="bi bi-printer" href="{{ route('imprimirLubric',$codigo)}}">  </a></button>
                                        
                                    </td>

                                @endif
                                <td title="{{ $valores[0]['lubricacion_id'] }} - {{ $valores[0]['descripcion'] }}" style="background-color: rgb(27, 106, 109); color: rgb(228, 246, 247);">
                                    {{ $punto }}
                                </td>
                                


                                @for ($i = $maxDataColumns; $i >= 1; $i--) <!-- Modificado para contar hacia abajo -->
                                    @php
                                        $valor = isset($valores[$i - 1]) ? $valores[$i - 1] : null;
                                        $clase = '';
                                        if ($valor) {
                                            switch ($valor['muestras']) {
                                                case 'C':
                                                    $clase = 'btn-success';
                                                    break;
                                                case 'E':
                                                    $clase = 'btn-warning';
                                                    break;
                                                case 'I':
                                                    $clase = 'btn-danger';
                                                    break;
                                                case 'N':
                                                    $clase = 'btn-secondary';
                                                    break;
                                            }
                                        }
                                    @endphp
                                    <td width="auto">
                                        @if ($valor)
                                            <a href="{{ route('equipoLubricacion.edit', $valor['id']) }}"
                                                class="btn {{ $clase }} btn-sm" >
                                                {{ $valor['muestras'] }}
                                                
                                            </a>
                                        @else
                                            <td width="auto"></td>
                                        @endif
                                    </td>
                                @endfor
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>




@endsection


@section('js')
<script src="{{ asset('dataprint/sweetalert2.all.min.js') }}"></script>
<link rel="stylesheet" href="{{ asset('dataprint/sweetalert2.min.css') }}">

<style>
    .my-swal-container {
        background: linear-gradient(to bottom, #001eff, #000000);
        padding: 20px; /* Ajusta el relleno según tus necesidades */
        border-radius: 10px; /* Ajusta el radio del borde según tus necesidades */
    }
</style>

<script>
    function mostrarAdvertencia() {
        Swal.fire({
            title: '¿Está seguro que desea cargar un nuevo día de lubricaciones?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sí',
            cancelButtonText: 'No',
            customClass: {
                confirmButton: 'btn btn-success', // Cambia el color del botón 'Sí' a verde
                cancelButton: 'btn btn-danger',  // Cambia el color del botón 'No' a rojo
                popup: 'my-swal-container'  // Agrega la clase personalizada al contenedor de SweetAlert2
            },
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "{{ route('cargaDiaria') }}";
            } else {
                // Acción si se rechaza la advertencia
                // alert("Acción cancelada");
            }
        });
    }
</script>


@stop

