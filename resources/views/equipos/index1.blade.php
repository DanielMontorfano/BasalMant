@extends('layouts.plantilla')
@section('title', 'indice')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')
<h1>Aqui tendras el indice de equipos</h1>
{{-- <a href="/Equipos/crear" > Crear curso</a> **Laravel no recomienda direccionar asi--}}
<a href={{route('equipos.create')}}> Crear curso</a>



{{-- comment --}}
<ul>
    @foreach ($equipos as $equipo)
    {{-- <li>{{$equipo->codEquipo}}</li> --}}
    
    <li>
        {{-- En la siguiente linea mando la ruta y la variable $equipo cargado con la propiedad id
            que a su vez proviene del método index del controlador --}}
        {{--es lo mismo con o sin id <a href="{{route('equipos.show', $equipo->id)}}"> {{$equipo->codEquipo }} {{$equipo->marca}} </a> --}}
        <a href="{{route('equipos.show', $equipo->id)}}"> {{$equipo->codEquipo }} {{$equipo->marca}} </a>
        <br>
       
    </li>
    @endforeach
    {{ $equipos->links() }}       {{--//con links() hago que muestre previous-Next paginacion--}} 
</ul>


<table class="table table-striped" id="equipos">
    <thead>
        <td>Equipo</td>
        <td>Marca</td>
        <td>Modelo</td>
    </thead>
<tbody>
    @foreach ($equipos as $equipo)
    <tr>{{$equipo->codEquipo }}</tr>
    <tr>{{$equipo->marca}}</tr>
    <tr>{{$equipo->modelo}}</tr>
    @endforeach
</tbody>

</table>

@endsection
@section('js')
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function () {
    $('#equipos').DataTable();
});
</script>

@endsection

