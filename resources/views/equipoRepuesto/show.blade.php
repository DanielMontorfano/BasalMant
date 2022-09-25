@extends('layouts.plantilla')
@section('title', 'Ver ' . $equipo->marca)
@section('content')

{{-- ESTO ES UN COMENTARIO <h1>Aqui podras ver el equipo: <?php echo $variable;?></h1> --}}
{{-- <h1>Aqui podras ver el equipo: {{ $variable}}</h1> --}}
<h1>Aqui podras ver los repuestos vinculados al equipo: {{ $equipo->codEquipo}}</h1>

<a href="{{route('equipos.index')}}"> Volver a cursos</a>
<br>
<a href={{route('equipos.edit', $equipo->id)}}> Editar curso</a>
<br>

<p><strong>Marca:</strong>{{$equipo->marca}}</p>
<p><strong>Modelo:</strong>{{$equipo->modelo}}</p>
<p><strong>Seccion:</strong>{{$equipo->idSecc}}</p>
<p><strong>Subsección:</strong>{{$equipo->idSubSecc}}</p>
<p><strong>Caractrística 1:</strong>{{$equipo->det1}}</p>
<p><strong>Caractrística 2:</strong>{{$equipo->det2}}</p>
<p><strong>Caractrística 3:</strong>{{$equipo->det3}}</p>
<p><strong>Caractrística 4:</strong>{{$equipo->det4}}</p>
<p><strong>Caractrística 5:</strong>{{$equipo->det5}}</p>
<p><strong>Repuestos:</strong></p>

<h1>Agregar repuestos</h1>
<form action="{{route('equipoRepuesto.store')}}" method="POST">
   @csrf
   <label>
       <br>    
   Código:
   <input type="hidden" name="equipo_id" value={{$equipo->id}} readonly >
   </label>    

<select name="repuesto_id">
   
 @foreach ($repuestosTot as $repuesto_id)
    <li>
      <option value="{!! $repuesto_id->id !!}">{!! $repuesto_id->codigo !!}</option> 
    </li>
@endforeach

</select>
<button type="submit">Agregar</button>   
</form>



<h1>Listado Actual</h1>
@foreach($repuestos as $repuesto)
         <li> {{ $repuesto->codigo }} - {{ $repuesto->descripcion}} </li>
@endforeach

<h1>{{$equipo_id}};{{$repuesto_id->id}}</h1>
  

</form> 

 
<form action={{route('equipos.destroy', $equipo->id)}} method="POST"> {{--$equipo viene por la url cuando seleciono --}}
   @method('delete')
   @csrf
    <button type="submit">Borrar registro</button>
</form>
@endsection



