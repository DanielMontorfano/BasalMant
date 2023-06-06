@extends('adminlte::page')
@section('title', 'Historial de' . " ")

@section('content_header')
<head>
    <title>Tabla de datos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
  @include('layouts.partials.menuEquipo')
@stop
@section('css') 

<style>


    .border {
        border-width: 1px;
        border-style: solid;
        border-radius: 5px;
    }

    .degradado-gris {
        background: linear-gradient(to bottom, #181818 0%, #1b1919 100%);
    }
    .table th,
    .table td {
        border-width: 1px;
    }
    .table tbody td {
        color: white;
    }

    .table tbody td.ejecutado {
        color: green;
    }

    .table tbody td.pendiente {
        color: red;
    }
</style>
@endsection

@section('content')

<div class="container">
    
   
    
    <body>
        <div class="container">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th>Nº formulario</th>
                        <th>Fecha</th>
                        <th>Técnico</th>
                        <th>Supervisor</th>
                        @foreach ($planes as $plan)
                            <th>{{ $plan }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datos as $numFormulario => $item)
                        <tr>
                            {{-- <td><a href="{{ route('nombre_de_la_ruta', ['numFormulario' => $numFormulario]) }}">{{ $numFormulario }}</a></td> --}}
                            <td><a href="{{ route('formularioShow', $numFormulario) }}">{{ $numFormulario }}</a></td>
                            <td>{{ $item['fecha'] }}</td>
                            <td>{{ $item['tecnico'] }}</td>
                            <td>{{ $item['supervisor1'] }}</td>
                            @foreach ($planes as $plan)
                                <td>
                                    @if (isset($item[$plan]))
                                        @if ($item[$plan] === 'E')
                                            <button class="btn btn-success">{{ $item[$plan] }}</button>
                                        @elseif ($item[$plan] === 'P')

                                        <form action="{{ route('equipoplansejecut.edit', $equipo->id) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="fecha" value="{{ $item['fecha'] }}">
                                            <input type="hidden" name="numFormulario" value="{{ $numFormulario }}"> 
                                           
                                            <button type="submit" class="btn btn-danger">{{ $item[$plan] }}</button>
                                        </form>
                                        @elseif ($item[$plan] === 'C')
                                        <button type="button" class="btn btn-warning">C</button>



                                            
                                        @else
                                            {{ $item[$plan] }}
                                        @endif
                                    @endif
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
            
        </div>
    
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </body>

    

</div>



<div class="container">
    <!-- ... código de la tabla ... -->
</div>

<div class="container mt-4">
    <div class="border border-secondary p-2">
        <div class="row align-items-center">
            <div class="col-auto">
                <label for="desde" class="mr-2">Desde:</label>
            </div>
            <div class="col-auto">
                <input type="date" id="desde" class="form-control form-control-sm">
            </div>
            <div class="col-auto">
                <label for="hasta" class="mr-2">Hasta:</label>
            </div>
            <div class="col-auto">
                <input type="date" id="hasta" class="form-control form-control-sm">
            </div>
            <div class="col-auto">
                <button id="filtrar-btn" class="btn btn-primary">Filtrar</button>
            </div>
        </div>
    </div>
</div>

<div class="container mt-4">
    <p><strong>E:</strong> <span class="text-success">Ejecutado</span></p>
    <p><strong>P:</strong> <span class="text-danger">Pendiente</span></p>
    <p><strong>C:</strong> <span class="text-warning">Corregido</span></p>
</div>

<div class="container">
    @include('layouts.partials.footer')
</div>


<script>
    document.getElementById('filtrar-btn').addEventListener('click', function () {
        var desde = document.getElementById('desde').value;
        var hasta = document.getElementById('hasta').value;

        var filas = document.querySelectorAll('.table tbody tr');

        for (var i = 0; i < filas.length; i++) {
            var fecha = filas[i].querySelector('td:nth-child(2)').textContent;
            if (fecha < desde || fecha > hasta) {
                filas[i].style.display = 'none';
            } else {
                filas[i].style.display = '';
            }
        }
    });
</script>


@endsection
