@extends('adminlte::page')

@section('title', 'Lubricaciones')

@section('content_header')
    <h6 style="text-align: center; font-size: 30px; color: #000000;
        background: -webkit-linear-gradient(rgb(1, 103, 71), rgb(239, 236, 217));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;">
        Lubricaciones
    </h6>
@stop

@section('content')
<style>
    .small-font {
        font-size: 10px;
        margin-top: 4px;
    }

    .custom-card {
        background: linear-gradient(to bottom, #2C3E50, #605959);
        border: none;
    }
</style>

<div class="card custom-card">
    <div class="card-body">
        @php
            $turnos = ['M', 'T', 'N']; // Definir los turnos en el orden deseado

            $LubricacionesVinculadas = $LubricacionesVinculadas->sortBy(function ($item) use ($turnos) {
                $turnoIndex = array_search($item->turno, $turnos);
                return ($item->dia * 100) + ($turnoIndex !== false ? $turnoIndex : 999);
            });
        @endphp

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>codEquipo</th>
                        <th>puntoLubric</th>
                        @php
                            $contadorColumnas = 0;
                        @endphp
                        @foreach ($LubricacionesVinculadas->unique('dia') as $item)
                            @foreach ($turnos as $turno)
                            <th>{{ $turno }} <br><small class="small-font">Recorrido Nº: {{ ++$contadorColumnas }}</small></th>
                            @endforeach
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @php
                        $codEquipoAnterior = null;
                    @endphp
                    @foreach ($LubricacionesVinculadas->unique('equipo_id') as $item)
                        @php
                            $codEquipo = $item->equipo->codEquipo;
                            $puntoLubricaciones = $LubricacionesVinculadas->where('equipo_id', $item->equipo_id)->unique('lubricacion.puntoLubric');
                            $rowCount = $puntoLubricaciones->count();
                        @endphp
                        @foreach ($puntoLubricaciones as $puntoLubric)
                            <tr>
                                @if ($puntoLubric === $puntoLubricaciones->first())
                                <td rowspan="{{ $rowCount }}">
                                    <a href="{{ route('equipos.edit', $item->equipo_id) }}" class="btn btn-primary">
                                        {{ $codEquipo }}
                                    </a>
                                </td>
                                @endif
                                <td>{{ $puntoLubric['lubricacion']['puntoLubric'] }}</td>
                                @foreach ($LubricacionesVinculadas->where('equipo_id', $item->equipo_id)->where('lubricacion.puntoLubric', $puntoLubric['lubricacion']['puntoLubric']) as $lubricacion)
                                    <td>
                                        <a href="{{ route('tablaLubricaciones.edit', $lubricacion->id) }}"
                                           class="btn {{ $lubricacion->lcheck === 'OK' ? 'btn-success' : ($lubricacion->lcheck === 'E' ? 'btn-warning' : 'btn-danger') }}">
                                            {{ $lubricacion->lcheck }} - {{ $lubricacion->created_at->format('d/m/y') }} - {{ $lubricacion->responsables }}
                                        </a>
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="text-center mt-2">
    <a href="{{ route('tablaCargar') }}" class="btn btn-primary">Control Realizado</a>
</div>
@endsection
