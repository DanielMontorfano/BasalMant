@extends('adminlte::page')

@section('title', 'Lubricaciones')
@section('css')
<style>
   
    .small-font {
        font-size: 10px;
        margin-top: 4px;
    }

    .custom-card {
        background: linear-gradient(to bottom, #2C3E50, #605959);
        border: none;
    }

 
    .reference-text {
        margin: 10px;
        font-size: 14px;
        font-weight: bold;
    }

    .reference-excess {
        color: yellow;
    }

    .reference-incomplete {
        color: red;
    }

    .reference-correct {
        color: green;
    }
    
    . /* Tus estilos CSS actuales */

    .custom-card {
    background: linear-gradient(to bottom, #2C3E50, #605959);
    border: none;
    overflow-x: auto;
    display: flex;
    justify-content: flex-end;
    scroll-behavior: smooth;
}


.table-responsive {
    overflow-x: auto;
    overflow-y: auto;
    max-height: calc(100vh - 200px);
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
@if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error:</strong> {{ $errors->first('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

<div class="text-center mt-2">
    <a href="{{ route('tablaCargar') }}" class="btn btn-primary">Control Realizado</a>
</div>
<div class="text-center mt-2">
    <a href="{{ route('cargaDiaria') }}" class="btn btn-primary">Carga Diaria</a>
</div>
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
                            $equipo_id = $item->equipo->id;
                            $id = $item->id;
                            $det5 = $item->equipo->det5;
                            $puntoLubricaciones = $LubricacionesVinculadas->where('equipo_id', $item->equipo_id)->unique('lubricacion.puntoLubric');
                            $rowCount = $puntoLubricaciones->count();
                        @endphp
                        @foreach ($puntoLubricaciones as $puntoLubric)
                            <tr>
                                @if ($puntoLubric === $puntoLubricaciones->first())
                                <td rowspan="{{ $rowCount }}">
                                    <a href="{{ route('equipos.edit', $item->equipo_id) }}" class="btn btn-primary" style="font-size: 12px;">
                                        {{ $codEquipo }}
                                    </a> <br>
                                    
                                    <small class="small-font"> {{$id}}</small> 
                                    <small class="small-font"> {{$equipo_id}}</small> 
                                    <small class="small-font"> {{$det5}}</small>
                                    <button style="background-color: Transparent;border: none;" title="Imprimir ficha check"><a  class="bi bi-printer" href={{route('imprimirLubric', $item->equipo_id)}}>  </a></button>
                                </td>
                                @endif
                                <td>{{ $puntoLubric['lubricacion']['puntoLubric'] }} <br>
                                    <small class="small-font">{{ $puntoLubric['lubricacion']['lubricante'] }} <br> </small>
                                    <small class="small-font">Frecc:&nbsp; {{ $puntoLubric['lubricacion']['frecuencia']}}  <br> </small>
                                    <small class="small-font">Recip:&nbsp; {{ $puntoLubric['lubricacion']['recipiente'] }} <br></small>
                                    <small class="small-font">Color:&nbsp; {{ $puntoLubric['lubricacion']['color'] }} <br></small>
                                </td>
                                @foreach ($LubricacionesVinculadas->where('equipo_id', $item->equipo_id)->where('lubricacion.puntoLubric', $puntoLubric['lubricacion']['puntoLubric']) as $lubricacion)
                                <td>
                                    <a href="{{ route('equipoLubricacion.edit', $lubricacion->id) }}"
                                       class="btn {{ $lubricacion->lcheck === 'OK' ? 'btn-success' : ($lubricacion->lcheck === 'E' ? 'btn-warning' : 'btn-danger') }}"
                                       title="{{ $lubricacion->lcheck }} {{ $lubricacion->created_at->format('d/m/y') }}  {{ $lubricacion->responsables }}">
                                       {{ $lubricacion->contador }}--{{ $lubricacion->lcheck }} {{ $lubricacion->turno }}  {{ $lubricacion->responsables }} 



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
    <span class="reference-text reference-excess">E: Exceso</span>
    <span class="reference-text reference-incomplete">I: Incompleto</span>
    <span class="reference-text reference-correct">OK: Correcto</span>
</div>
<div class="text-center mt-2">
    <a href="{{ route('tablaCargar') }}" class="btn btn-primary">Control Realizado</a>
</div>


@endsection

