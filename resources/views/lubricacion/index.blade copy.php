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
                @foreach ($LubricacionesVinculadas->unique('dia') as $item)
                    @foreach ($turnos as $turno)
                        <th>{{ $item->dia }}/{{ $turno }}</th>
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
                            <td rowspan="{{ $rowCount }}">{{ $codEquipo }}</td>
                        @endif
                        <td>{{ $puntoLubric['lubricacion']['puntoLubric'] }}</td>
                        @foreach ($LubricacionesVinculadas->where('equipo_id', $item->equipo_id)->where('lubricacion.puntoLubric', $puntoLubric['lubricacion']['puntoLubric']) as $lubricacion)
                        <td class="{{ $lubricacion->lcheck === 'OK' ? 'bg-success' : ($lubricacion->lcheck === 'E' ? 'bg-warning' : 'bg-danger') }}">
    {{ $lubricacion->lcheck }} - {{ $lubricacion->created_at->format('m/d/y') }} - {{ $lubricacion->responsables }}
</td>


                        @endforeach
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
</div>

<a href="{{ route('tablaCargar') }}">Enlace a tablaLubricaciones.store</a>
@endsection
