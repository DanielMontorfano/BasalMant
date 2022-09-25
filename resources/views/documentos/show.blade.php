@extends('layouts.plantilla')
@section('title', 'Ver ' . $equipo->marca)
@section('content')

<h1></h1>
<div class="card" STYLE="background: linear-gradient(to right,#495c5c,#030007);" >
    <div class="card-header" STYLE="background: linear-gradient(to right,#1e2020,#030007);">
      <ul class="nav nav-tabs card-header-tabs">
        <li class="nav-item">
          <a class="nav-link active" aria-current="true" href="{{route('equipos.show', $equipo->id)}}">Ficha</a>
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
          <a class="nav-link" href="{{route('documentos.show', $equipo->id)}}">Documentos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href={{route('equipos.edit', $equipo->id)}}>Editar</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href={{route('ordentrabajo.list', $equipo->id)}}>OT</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="{{route('equipos.index')}}">Descargar</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('equipos.index')}}">Imprimir</a>
        </li>
        
  
      </ul>
    </div>


<div class="table-responsive">
    <table class="table table-responsive table-sm table-dark table-striped table-bordered table-hover">
          @foreach($docuTodos as $docu)
                                  
            <tbody>
                <tr>
                    {{-- <td>{{ $docu->nombreDocu}}</td> --}}
               
                <td> <iframe
                src="..{{ $docu->rutaDocu}}"
                width=90% height=600></iframe></td>
               {{-- <td><img src="..{{ $docu->rutaDocu}}" width="200" height="200"></td> --}}
                
                </tr>
            </tbody>
        @endforeach
            
    </table>
</div>

@endsection
