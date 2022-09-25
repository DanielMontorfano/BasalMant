@extends('layouts.plantilla')
@section('title', 'Fotos')
@section('content')


<div class="container "> {{-- Conainer Menu --}}
    {{-- ESTO ES UN COMENTARIO <h1>Aqui podras ver el equipo: <?php echo $variable;?></h1> --}}
    {{-- <h1>Aqui podras ver el equipo: {{ $variable}}</h1> --}}
    <div class="card" STYLE="background: linear-gradient(to right,#495c5c,#030007);" >
      <div class="card-header" STYLE="background: linear-gradient(to right,#1e2020,#030007);">
        <ul class="nav nav-tabs card-header-tabs">
           <li class="nav-item">
             <a class="nav-link" href="{{route('equipos.show', $equipo->id)}}">Ficha</a>
           </li>
           <li class="nav-item">
           </li>
           <li class="nav-item">
             <a class="nav-link active" aria-current="true"  style="background-color: #1e2020;" href="{{route('fotos.show', $equipo->id)}}">Fotos</a>
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
             <a class="nav-link"   href={{route('equipos.edit', $equipo->id)}}>Editar</a>
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
      </div>   
    </div> {{-- Container menu --}}  

<div class="container "> {{-- Conatiner Tabla --}}
<div class="table-responsive">
    <table class="table table-responsive table-sm table-dark table-striped table-bordered table-hover">
          @foreach($fotosTodos as $foto)
                                  
            <tbody>
                <tr>
                    {{-- <td>{{ $foto->nombreFoto}}</td> --}}
                
                <td style="text-align: center; vertical-align: middle;"><img src="..{{ $foto->rutaFoto}}" width="400" height="400"></td>
                </tr>
            </tbody>
        @endforeach
          
    </table>
</div>
</div> {{-- Container tabla --}}
@endsection