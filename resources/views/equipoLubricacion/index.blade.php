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

@section('content')
<div class="text-center mt-2">
    <a href="{{ route('cargaDiaria') }}" class="btn btn-primary">Carga Diaria</a>
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
                            <th width="auto" >D{{ $i }}</th>
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
                                    <td rowspan="{{ count($puntos) }}">{{ $codigo }}</td>
                                @endif
                                <td>{{ $punto }}</td>
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
