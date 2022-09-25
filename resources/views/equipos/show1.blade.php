@extends('layouts.plantilla')
@section('title', 'Ver ' . $equipo->marca)
@section('content')

{{-- ESTO ES UN COMENTARIO <h1>Aqui podras ver el equipo: <?php echo $variable;?></h1> --}}
{{-- <h1>Aqui podras ver el equipo: {{ $variable}}</h1> --}}
<h1>Aqui podras ver el equipo: {{ $equipo->codEquipo}}</h1>

<a href="{{route('equipos.index')}}"> Volver a cursos</a>
<br>
<a href={{route('equipos.edit', $equipo)}}> Editar curso</a>
<p><strong>Marca:</strong>{{$equipo->marca}}</p>
<p><strong>Modelo:</strong>{{$equipo->modelo}}</p>
<p><strong>Seccion:</strong>{{$equipo->idSecc}}</p>
<p><strong>Repuestos:</strong></p>
 {{--
@foreach($repuestos as $repuesto)
         <li> {{ $repuesto->codigo }} - {{ $repuesto->descripcion}} </li>
      @endforeach

 comment --}}
<form action={{route('equipos.destroy', $equipo)}} method="POST"> {{--$equipo viene por la url cuando seleciono --}}
   @method('delete')
   @csrf
    <button type="submit">Borrar registro</button>
</form>
@endsection



