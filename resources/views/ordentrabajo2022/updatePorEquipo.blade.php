@extends('layouts.plantilla')
@section('title', 'actualizar')
@section('content')
<h1>Aqui podras actualizar el equipo</h1>
<form action="{{route('ordentrabajo.update', $ordendetrabajo)}}" method="POST">
    {{-- Envía un token de seguridad. Siempre se debe poner!!! sino no funca --}}
    @csrf
    {{-- Metodo PUT no existe en html, por eso indicamos a laravel como sigue --}}
    @method('put')

   <label>
       <br>    
   Trabajos realizadoso:
   {{-- <input type="text" name="codEquipo" value={{old('det2', $ordendetrabajo->det2)}}>  --}}
   
   <textarea class="form-control" value={{old('det2', $ordendetrabajo->det2)}} name="det1" id="exampleFormControlTextarea1" rows="4"></textarea> 
   </label>
   @error('de2')
   <br>
   <small>*{{$message}}</small>
   <br>  
   @enderror
 
   <br>
   <button type="submit">Actualizar Formulario</button>

</form>
@endsection



