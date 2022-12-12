@extends('layouts.plantilla')
@section('title', 'create')
@section('content')
<div class="card " STYLE="color: #FFFFFF; font-family: Verdana; font-weight: bold; font-size: 12px; background-color: #72A4D2;" >
  <div class="card-header">
    <ul class="nav nav-tabs card-header-tabs">
      <li class="nav-item">
        <a class="nav-link active" aria-current="true" href="{{route('equipos.show', $equipo->id)}}">Ficha</a>
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
  <div class="card-body" STYLE="background: linear-gradient(to right,#030007,#495c5c);">
    <h6 STYLE="text-align:center; font-size: 30px;
                        background: -webkit-linear-gradient(rgb(1, 103, 71), rgb(239, 236, 217));
                        -webkit-background-clip: text;
                        -webkit-text-fill-color: transparent;">Abrir orden de trabajo</h6>
    <p class="card-text"></p>
    <div class="card" STYLE="background: linear-gradient(to right,#495c5c,#030007);" >
    <div class="card-body "  style="max-width: 85;">
     
     
    
    
     <div class="container">
      <div class="row">
        <div class="col">
          {{--  Column 1 --}}
            </div>
        <div class="col">
          {{-- Column 2 --}}
          
          <div class="card border-primary" style="background: linear-gradient(to left,#495c5c,#030007);">
            <div class="card-body "  style="max-width: 85;">
            <form action="{{route('ordentrabajo.store')}}" method="POST">
            {{-- Envía un token de seguridad. Siempre se debe poner!!! sino no funca --}}
            @csrf
            <br>
            <br>
            <div class="form-group">
            <label class="sr-only" for="equipo">Sobre el equipo:  {{$equipo->modelo}}</label> 
            
            </div>
             <br>
             <div class="form-group">
              <label class="sr-only" for="codEquipo">De:</label> 
              <input class="form-control" type="text" name="de" value={{old('de')}}> {{-- old() mantiene en campo con el dato--}}
              @error('de')                                          {{--el 2do parametro de old es para mantener la mificacion cuando la validacion falla--}}
              <small class="text-danger"> {{$message}}</small>
              @enderror
              </div>
           <br>
           <div class="form-group">
            <label class="sr-only" for="marca"> Para:</label> 
            <input class="form-control" type="text" name="para" value={{old('para')}}> 
            @error('para')
            <small class="text-danger"> {{$message}}</small>
            @enderror
            </div>
           <br>
            
           <div class="form-group">
            <label class="sr-only" for="det1">Detalle:</label> 
             {{-- <input class="form-control" type="text" name="det1" value={{old('det1')}}>  --}}
            <textarea class="form-control" name="det1" id="exampleFormControlTextarea1" rows="4"></textarea> 
           
            @error('det1')
            <small class="text-danger"> {{$message}}</small>
            @enderror
            </div>
           <br>
           <br>
       
           <div class="form-group">
           
            <input class="form-control" type="hidden" name="estado" value="Abierta" style="font-size: 14px; width:100px; height: 30px" readonly> 
            @error('estado')
            <small class="text-danger"> {{$message}}</small>
            @enderror
            </div>
            
            <div class="form-group">
           
              <input class="form-control" type="hidden" name="equipo_id" value= {{$equipo->id}} style="font-size: 14px; width:100px; height: 30px" readonly> 
              @error('equipo_id')
              <small class="text-danger"> {{$message}}</small>
              @enderror
              </div>

                     
           <div class="form-group ">
           <label class="sr-only" for="per_abre"> Firma:</label> 
           <input class="form-control"  type="text" name="per_abre" value={{old('per_abre')}}> 
           @error('per_abre')
           <small class="text-danger"> {{$message}}</small>
           @enderror
           </div>
           <br>
            <br>
            
            <br>
           <div class="form-group" >
           <div class="mx-auto" style="text-center: right; width: 150px;">
           <button type="submit" class="btn btn-default" STYLE=" background: linear-gradient(to right,#495c5c,#e7efed);"  >Enviar</button>
           </div>
        </div>   
        
       
       </form>
      </div> 
      </div> 
        </div>
        <div class="col">
         {{--  Column 3 --}}
        </div>


      </div>
    </div> 
  </div>
</div>
</div>
</div> 
@endsection



