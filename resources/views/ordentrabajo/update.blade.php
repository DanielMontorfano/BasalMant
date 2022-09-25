@extends('layouts.plantilla')
@section('title', 'actualizar')
@section('content')
<h1>Aqui podras actualizar el equipo</h1>
<form action="{{route('equipos.update', $equipo)}}" method="POST">
    {{-- Envía un token de seguridad. Siempre se debe poner!!! sino no funca --}}
    @csrf
    {{-- Metodo PUT no existe en html, por eso indicamos a laravel como sigue --}}
    @method('put')

   <label>
       <br>    
   Código:
   <input type="text" name="codEquipo" value={{old('codEquipo', $equipo->codEquipo)}}> 
   </label>
   @error('codEquipo')
   <br>
   <small>*{{$message}}</small>
   <br>  
   @enderror

   <label>
   <br>
   Marca:
   <input type="text" name="marca" value={{old('marca', $equipo->marca)}}> 
   </label>
   @error('marca')
     <br>
     <small>*{{$message}}</small>
     <br>  
   @enderror
   <label>
   <br>
   Modelo:
   <input type="text" name="modelo" value={{old('modelo', $equipo->modelo)}}> 
   </label>
   @error('modelo')
     <br>
     <small>*{{$message}}</small>
     <br>  
   @enderror
   <label>
   <br>
   Sección:
   <input type="text" name="idSecc" value={{old('idSecc', $equipo->idSecc)}}> 
   </label>
   @error('idSecc')
     <br>
     <small>*{{$message}}</small>
     <br>  
   @enderror
   <br>
   Subsección:
   <input type="text" name="idSubSecc" value={{old('idSubSecc', $equipo->idSubSecc)}}> 
   </label>
   @error('idSubSecc')
     <br>
     <small>*{{$message}}</small>
     <br>  
   @enderror
   <br>
   Característica 1:
   <input type="text" name="det1" value={{old('det1', $equipo->det1)}}> 
   </label>
   @error('det1')
     <br>
     <small>*{{$message}}</small>
     <br>  
   @enderror
   <br>
   Característica 2:
   <input type="text" name="det2" value={{old('det2', $equipo->det1)}}> 
   </label>
   @error('det2')
     <br>
     <small>*{{$message}}</small>
     <br>  
   @enderror
   <br>
   Característica 3:
   <input type="text" name="det3" value={{old('det3', $equipo->det3)}}> 
   </label>
   @error('det3')
     <br>
     <small>*{{$message}}</small>
     <br>  
   @enderror
   <br>
   Característica 4:
   <input type="text" name="det4" value={{old('det4', $equipo->det4)}}> 
   </label>
   @error('det4')
     <br>
     <small>*{{$message}}</small>
     <br>  
   @enderror
   <br>
   Característica 5:
   <input type="text" name="det5" value={{old('det5', $equipo->det5)}}> 
   </label>
   @error('det5')
     <br>
     <small>*{{$message}}</small>
     <br>  
   @enderror
   <br>







   
   <button type="submit">Actualizar Formulario</button>

</form>
@endsection



