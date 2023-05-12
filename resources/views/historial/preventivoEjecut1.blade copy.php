@extends('adminlte::page')
@section('title', 'Historial de' . " ")

@section('content_header')
  @include('layouts.partials.menuEquipo')
@stop
@section('css') 

<style>
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
    
<table id="listado" class="table degradado-gris">
    <thead>
        <tr>
            <th>Fecha y hora</th>
            @foreach($planes as $plan)
            <th>{{ $plan }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($datos as $numFormulario => $planData)
        <tr>
            <td>{{ $numFormulario }}</td>
            @foreach($planes as $plan)
            
            @if(isset($planData[$plan]))
            @if($planData[$plan] === 'E')
            <td title="Ejecutado" class="ejecutado">
            <form action="{{ route('equipoplansejecut.edit', $equipo->id) }}" method="POST">
              @csrf
              {{-- <input type="hidden" name="fecha" value="{{ $fecha }}">
              <input type="hidden" name="plan" value="{{ $plan }}"> --}}
             
              <button type="submit" class="btn btn-success ">{{ $planData[$plan] }} </button>
          </form>
            </td>


            @else

            <td title="Pendiente" class="pendiente">
              <form action="{{ route('equipoplansejecut.edit', $equipo->id) }}" method="POST">
                @csrf
               {{--  <input type="hidden" name="fecha" value="{{ $fecha }}">
                <input type="hidden" name="plan" value="{{ $plan }}"> --}}
               
                <button type="submit" class="btn btn-danger">{{ $planData[$plan] }}</button>
            </form>
              </td> 
             
            @endif
            
            @else
            <td>***</td>
            @endif
            @endforeach
        </tr>
        @endforeach
    </tbody>
</table>

</div>
<div class="container"> 
    @include('layouts.partials.footer')
</div>

@endsection
