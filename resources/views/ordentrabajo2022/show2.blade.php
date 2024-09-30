@extends('layouts.plantilla')
@section('title', 'Ver ' . $equipo->marca)
@section('content')



   <ul class="nav nav-tabs card-header-tabs">
       <li class="nav-item">
         <a class="nav-link" href="{{route('equipos.show', $equipo->id)}}">Ficha</a>
       </li>
       <li class="nav-item">
       </li>
       <li class="nav-item">
         <a class="nav-link" href="{{route('fotos.show', $equipo->id)}}">Fotos</a>
       </li>
 
       <li class="nav-item">
         <a class="nav-link" href="{{route('equipos.index')}}">Historial</a>
       </li>
       <li class="nav-item">
         <a class="nav-link" href="{{route('equipos.index')}}">Protocolo</a>
       </li>
       <li class="nav-item">
         <a class="nav-link" href="{{route('equipos.index')}}">Plan</a>
       
       <li class="nav-item">
         <a class="nav-link" href="{{route('equipos.index')}}">Documentos</a>
       </li>
       <li class="nav-item">
         <a class="nav-link;" href={{route('equipos.edit', $equipo->id)}}>Editar</a>
       </li>
       <li class="nav-item">
         <a class="nav-link active;" style="background-color: #1e2020;" aria-current="true" href={{route('ordentrabajo.list', $equipo->id)}}>OT</a>
       </li>
       
       <li class="nav-item">
         <a class="nav-link" href="{{route('equipos.index')}}">Descargar</a>
       </li>
       <li class="nav-item">
         <a class="nav-link" href="{{route('equipos.index')}}">Imprimir</a>
       </li>
    </ul>
   
    
   


@endsection



