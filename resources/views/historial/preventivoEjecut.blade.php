@extends('adminlte::page') 
@section('title', 'Historial de' . " ")
@section('css') <style>
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


{{-- https://datatables.net/ **IMPORTANTE PLUG IN PARA LAS TABLAS --}}
{{-- Para que sea responsive se agraga la tercer libreria --}}
{{-- Todo lo de plantilla --}}
@endsection

@section('content')
@include('layouts.partials.menuEquipo')

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
          @foreach($datos as $fecha => $planData)
            <tr>
              <td>{{ $fecha }}</td>
              @foreach($planes as $plan)
                @if(isset($planData[$plan]))
                  @if($planData[$plan] === 'E')
                    <td title="Ejecutado" class="ejecutado">{{ $planData[$plan] }}</td>
                  @else
                    <td title="Pendiente" class="pendiente">{{ $planData[$plan] }}</td>
                  @endif
                @else
                  <td>***</td>
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
