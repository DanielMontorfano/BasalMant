{{-- @extends('layouts.plantilla') --}}
@extends('adminlte::page') 
@section('title', 'Historial de' . " ")
@section('css')
{{-- https://datatables.net/ **IMPORTANTE PLUG IN PARA LAS TABLAS --}}
{{-- Para que sea responsive se agraga la tercer libreria --}}
{{-- Todo lo de plantilla --}}
@endsection

@section('content')
@include('layouts.partials.menuEquipo')
<table class="table border bg-gradient">
    <thead>
        <tr>
            <th>Fecha</th>
            @foreach($planes as $plan)
                <th>{{ $plan }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($datos as $planes)
            <tr>
                <td>{{ date('Y-m-d', strtotime($planes['fecha'])) }}</td>
                @foreach($planes as $key => $value)
                    @if($key !== 'fecha')
                        <td class="{{ $value === 'E' ? 'text-success' : ($value === 'P' ? 'text-danger' : '') }}">{{ $value ?: '*' }}</td>
                    @endif
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>


<div class="container"> 
  @include('layouts.partials.footer')
</div>

@endsection


