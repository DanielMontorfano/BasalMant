@extends('layouts.plantilla')
@section('title', 'Edit')
@section('content')
<h1></h1>


<section class="main row ">
 
<div class="container ">
  
  <div class="card" STYLE="background: linear-gradient(to right,#495c5c,#030007);" >
          <div class="card-header" STYLE="background: linear-gradient(to right,#1e2020,#030007);">
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
                <a class="nav-link active; "  style="background-color: #1e2020;" aria-current="true" href={{route('equipos.edit', $equipo->id)}}>Editar</a>
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
               
          {{-- Probando Col --}}
          <div class="container">
            <div class="row">
              <div class="col col-md-2">
                Columna
                
              </div>
              <div class="col col-md-8">
                Columna2
                <form id="encabezado" action="{{route('equipos.update', $equipo->id)}}" method="POST" class="form-horizontal" STYLE="background: linear-gradient(to right,#495c5c,#030007);">
                  <h6 STYLE="text-align:center; font-size: 30px;
                  background: -webkit-linear-gradient(rgb(1, 103, 71), rgb(239, 236, 217));
                  -webkit-background-clip: text;
                  -webkit-text-fill-color: transparent;">Ficha de equipo </h6>
                  @csrf  {{-- Envía un token de seguridad. Siempre se debe poner!!! sino no funca --}}
                  @method('put') {{-- Metodo PUT no existe en html, por eso indicamos a laravel como sigue --}}
                  
                  <div class="p-3 mb-2 bg-gradient-primary text-white">
      
                    <div class="container">
                      <div class="row">
                        <div class="col col-md-4">
                          <div class="form-group">
                            <label class="control-label" for="marca">Marca:</label> 
                            <input autocomplete="off" class="form-control" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);"  type="text" name="marca" value={{old('marca', $equipo->marca)}}> 
                            @error('marca')
                            <small>*{{$message}}</small>
                            @enderror
                          </div>
                        </div>
                        <div class="col col-md-4">
                          <div class="form-group">
                            <label class="control-label " for="codEquipo">Código:</label>
                            <input autocomplete="off" class="form-control" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);" type="text" name="codEquipo" value={{old('codEquipo', $equipo->codEquipo)}} placeholder="Código de equipo"> {{-- old() mantiene en campo con el dato--}}
                            @error('codEquipo') {{--el 2do parametro de old es para mantener la mificacion cuando la validacion falla--}}
                            <small class="help-block">*{{$message}}</small>
                            @enderror
                          </div>
                        </div>
      
                        <div class="col col-md-4">
                          <div class="form-group">
                            <label class="control-label" for="modelo">Modelo:</label>  
                            <input autocomplete="off" class="form-control" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);" type="text" name="modelo" value={{old('modelo', $equipo->modelo)}}>
                            @error('codEquipo') {{--el 2do parametro de old es para mantener la mificacion cuando la validacion falla--}}
                            <small class="help-block">*{{$message}}</small>
                            @enderror
                          </div>    
                        </div>
                    </div> {{-- cierra row 1--}}
      
                    <div class="row">
                      <div class="col col-md-6">
                        <div class="form-group">
                          <label class="control-label" for="idSecc">Sección:</label>  
                          <input autocomplete="off" class="form-control" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);"type="text" name="idSecc" value={{old('idSecc', $equipo->idSecc)}}>  {{-- old() mantiene en campo con el dato--}}
                          @error('marca')
                          <small>*{{$message}}</small>
                          @enderror
                        </div>
                      </div>
      
                      <div class="col col-md-6">
                        <div class="form-group">
                          <label class="control-label" for="idSubSecc">Subsección:</label> 
                          <input autocomplete="off" class="form-control" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);" type="text" class="form-control" name="idSubSecc" value={{old('idSubSecc', $equipo->idSubSecc)}}>   {{-- old() mantiene en campo con el dato--}}
                          @error('codEquipo') {{--el 2do parametro de old es para mantener la mificacion cuando la validacion falla--}}
                          <small class="help-block">*{{$message}}</small>
                          @enderror
                          </div>
                      </div>
                    </div> {{-- cierra row 2 --}}
                    
                    <div class="row">
                      <div class="col col-md-6">
                        <div class="form-group">
                          <label class="control-label" for="det1">Característica Nº1:</label> 
                          <input autocomplete="off" class="form-control" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);" type="text" name="det1" value={{old('det1', $equipo->det1)}}>   {{-- old() mantiene en campo con el dato--}}
                          @error('marca')
                          <small>*{{$message}}</small>
                          @enderror
                        </div>
                      </div>
      
                      <div class="col col-md-6">
                        <div class="form-group">
                          <label class="control-label" for="det2">Característica Nº2:</label> 
                          <input autocomplete="off" class="form-control" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);" type="text" name="det2" value={{old('det2', $equipo->det2)}}>   {{-- old() mantiene en campo con el dato--}}
                          @error('codEquipo') {{--el 2do parametro de old es para mantener la mificacion cuando la validacion falla--}}
                          <small class="help-block">*{{$message}}</small>
                          @enderror
                          </div>
                      </div>
                    </div> {{-- cierra row 3 --}}
      
                    <div class="row">
                      <div class="col col-md-6">
                        <div class="form-group">
                          <label class="control-label" for="det3"> Característica Nº3:</label> 
                          <input autocomplete="off" class="form-control" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);" "type="text" name="det3" value={{old('det3', $equipo->det3)}}>   {{-- old() mantiene en campo con el dato--}}
                          @error('marca')
                          <small>*{{$message}}</small>
                          @enderror
                        </div>
                      </div>
      
                      <div class="col col-md-6">
                        <div class="form-group">
                          <label class="control-label" for="det4">   Característica Nº4:</label> 
                          <input autocomplete="off" class="form-control" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);" type="text" name="det4" value={{old('det4', $equipo->det4)}}>   {{-- old() mantiene en campo con el dato--}}
                          @error('codEquipo') {{--el 2do parametro de old es para mantener la mificacion cuando la validacion falla--}}
                          <small class="help-block">*{{$message}}</small>
                          @enderror
                          </div>
                      </div>
                    </div> {{-- cierra row 4 --}}
      
      
                    <div class="row">
                      <div class="col col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="det5"> Detalle:</label> 
                          <input autocomplete="off" class="form-control" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);" type="text" name="det5" value={{old('det5', $equipo->det5)}}>   {{-- old() mantiene en campo con el dato--}}
                          @error('marca')
                          <small>*{{$message}}</small>
                          @enderror
                        </div>
                      </div>
                  
                    </div> {{-- cierra row 5 --}}
                    
                    
                  </form >  {{-- Cierra Formulario Nº1 --}} 
                  <br>
                  {{--INICIO DE SEGUNDO FORMULARIO --}}
                  <div class="card " STYLE="background: linear-gradient(to right,#495c5c,#030007);">
                    <div class="card-header " STYLE="background: linear-gradient(to right,#495c5c,#030007);">            
                                 {{-- MUESTRA REPUESTOS --}} 
                          <table class="table" STYLE="background: linear-gradient(to right,#495c5c,#030007);">
                                 <thead>
                                    <tr>
                                      <th style="text-align: center; color: #ffffff;" scope="col">Código</th>
                                      <th style="text-align: center; color: #ffffff;" scope="col">Descripción</th>
                                      <th style="text-align: center; color: #ffffff;" scope="col">Cantidad</th>
                                      <th style="text-align: center; color: #ffffff;" scope="col">fffff</th>
                                    </tr>
                                  </thead>
                                  @foreach($repuestos as $repuesto)
                                    <form action="{{route('equipoRepuesto.store')}}" method="POST">
                                      @csrf
                                       
                                        <tbody>
                                              <tr>
                                                <input type="hidden" name="Selector" value="BorrarRep" readonly >
                                                <input type="hidden" name="equipo_id" value={{$equipo->id}} readonly >
                                                <input type="hidden" name="repuestoBorrar_id" value={{$repuesto->id}} readonly >
                                                <th STYLE="color: #ffffff; font-family: Times New Roman;  font-size: 14px; "scope="row">{{ $repuesto->codigo }}</th>
                                                <td STYLE="color: #ffffff; font-family: Times New Roman;  font-size: 14px; ">{{ $repuesto->descripcion}}</td>
                                                <td STYLE="color: #ffffff; font-family: Times New Roman;  font-size: 14px; ">{{$repuesto->pivot->cant}}</td>
                                                <td STYLE="color: #ffffff; font-family: Times New Roman;  font-size: 14px; "> <button type="submit" class="bi bi-trash3-fill"></button></td>
                                              </tr>
                                        </tbody>
                                         @endforeach
                                    </form>

                          </table>
                      </div> {{-- div del card3 --}}
                      </div> {{-- div del card4 --}}
                      <br>
                       
                      
                  <div class="card " STYLE="background: linear-gradient(to right,#495c5c,#030007);">
                  <div class="card-header " STYLE="background: linear-gradient(to right,#495c5c,#030007);">            
                           {{-- MUESTRA NOMBRE FOTOS --}} 
                    <table class="table" STYLE="background: linear-gradient(to right,#495c5c,#030007);">
                           <thead>
                              <tr>
                                <th style="text-align: center;  color: #ffffff;" scope="col"></th>
                                <th style="text-align: center;  color: #ffffff;" scope="col">Imágenes</th>
                                <th style="text-align: center;  color: #ffffff;" scope="col"></th>
                                <th style="text-align: center;  color: #ffffff;" scope="col"></th>
                              </tr>
                            </thead>
                            @foreach($fotosTodos as $foto)
                              <form action="{{route('equipoRepuesto.store')}}" method="POST">
                              @csrf
                            <tbody>
                              <tr>
                                {{-- <input type="hidden" name="Selector" value="BorrarRep" readonly > --}}
                                {{-- <input type="hidden" name="equipo_id" value={{$equipo->id}} readonly > --}}
                                {{-- <input type="hidden" name="repuestoBorrar_id" value={{$repuesto->id}} readonly > --}}
                                <th STYLE="color: #ffffff; font-family: Times New Roman;  font-size: 14px; " scope="row"></th>
                                <td STYLE="color: #ffffff; font-family: Times New Roman;  font-size: 14px; ">{{ $foto->nombreFoto}}</td>
                                <td STYLE="color: #ffffff; font-family: Times New Roman;  font-size: 14px; "></td>
                                <td STYLE="color: #ffffff; font-family: Times New Roman;  font-size: 14px; text-align: right; "> <button type="submit" class="bi bi-trash3-fill"></button></td>
                              </tr>
                            </tbody>
                        @endforeach
                          </form>
                    </table>
                  </div> {{-- div del card5 --}} 
                  </div>   {{-- div del card6 --}}
                  <br>





                  <div class="card " STYLE="background: linear-gradient(to right,#495c5c,#030007);">
                    <div class="card-header " STYLE="background: linear-gradient(to right,#495c5c,#030007);">            
                             {{-- MUESTRA NOMBRE FOTOS --}} 
                      <table class="table" STYLE="background: linear-gradient(to right,#495c5c,#030007);">
                             <thead>
                                <tr>
                                  <th style="text-align: center;  color: #ffffff;" scope="col"></th>
                                  <th style="text-align: center;  color: #ffffff;" scope="col">Documentos</th>
                                  <th style="text-align: center;  color: #ffffff;" scope="col"></th>
                                  <th style="text-align: center;  color: #ffffff;" scope="col"></th>
                                </tr>
                              </thead>
                              @foreach($fotosTodos as $foto)
                                <form action="{{route('equipoRepuesto.store')}}" method="POST">
                                @csrf
                              <tbody>
                                <tr>
                                  {{-- <input type="hidden" name="Selector" value="BorrarRep" readonly > --}}
                                  {{-- <input type="hidden" name="equipo_id" value={{$equipo->id}} readonly > --}}
                                  {{-- <input type="hidden" name="repuestoBorrar_id" value={{$repuesto->id}} readonly > --}}
                                  <th STYLE="color: #ffffff; font-family: Times New Roman;  font-size: 14px; " scope="row"></th>
                                  <td STYLE="color: #ffffff; font-family: Times New Roman;  font-size: 14px; ">{{ $foto->nombreFoto}}</td>
                                  <td STYLE="color: #ffffff; font-family: Times New Roman;  font-size: 14px; "></td>
                                  <td STYLE="color: #ffffff; font-family: Times New Roman;  font-size: 14px; text-align: right; "> <button type="submit" class="bi bi-trash3-fill"></button></td>
                                </tr>
                              </tbody>
                          @endforeach
                            </form>
                      </table>
                    </div> {{-- div del card7 --}} 
                    </div>   {{-- div del card8 --}}







              <div class="col col-md-2">
                Columna
              </div>
            </div>
          </div>


          
        <br>
                   
        

            <br>
               <div class="form-group">
                   <button form="encabezado" class="btn btn-primary" type="submit" STYLE="background: linear-gradient(to right,#495c5c,#030007);">Enviar</button>
               </div>
               <br>   
              </div>             
</section>
   
</div>
</div>

{{-- $$$$$$$$$$$$$$$$$$$$$$  Segundo grupo de  formularios $$$$$$$$$$$$$$$ --}}

<section class="main row ">
<div class="container">
    <div class="col col-md-12">
      
      <div class="container ">
        <div class="card" STYLE="background: linear-gradient(to right,#495c5c,#030007);" >
          <div class="card-header" STYLE="background: linear-gradient(to right,#1e2020,#030007);">
      
            <h6 STYLE="text-align:center; font-size: 30px;
                        background: -webkit-linear-gradient(rgb(1, 103, 71), rgb(239, 236, 217));
                        -webkit-background-clip: text;
                        -webkit-text-fill-color: transparent;">Adjuntar</h6>
      
      
        <form action="{{route('equipoRepuesto.store')}}" method="POST" class="form-horizontal" STYLE="background: linear-gradient(to right,#495c5c,#030007);">
          @csrf
          <input type="hidden" name="Selector" value="AgregarRep" readonly >
          <input type="hidden" name="equipo_id" value={{$equipo->id}} readonly >
               <table class="table table-sm" STYLE="background: linear-gradient(to right,#495c5c,#030007);" >
                 <tr>
                    <td><input type="text" class='form-control' name="search" id="search" autocomplete="off" placeholder="Buscar repuesto"class="form-control" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);"> </td>
                    <td > <input type="number" class='form-control' name="cant" id="cant" value="1" min="1" max="99" placeholder="Cantidad" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);"></td>
                    <td style="text-align: right;"><button class="btn btn-primary" type="submit" type="submit" STYLE="background: linear-gradient(to right,#495c5c,#030007);">Agregar</button> </td>
                 </tr>
            </table>
        </form>
         {{-- *****************Inicio tercer formulario******************************************* --}}  
        <h5>Hola mundo1</h5>
        <form id="formImagenes" action="{{route('fotos.store', $equipo->id)}}" enctype="multipart/form-data" method="POST" class="form-horizontal ">
          @csrf
              <input type="hidden" name="equipo_id" value={{$equipo->id}} readonly >
              <label for="imagen">Buscar imagen:</label> 
            <table class="table table-sm" STYLE="background: linear-gradient(to right,#495c5c,#030007);">
              <tr>
                <td style="text-align: right;"><input type="text" class='form-control' name="nombreFoto" id="" accept="" autocomplete="off" placeholder="Nombre de imagen" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);" >
                  @error('nombreFoto')
                  <small class="text-danger"> {{$message}}</small>
                  @enderror
                <td><input type="file" class='form-control' name="file" id="" accept="image/*" autocomplete="off" placeholder="Buscar repuesto" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);" >
                @error('file')
                <small class="text-danger"> {{$message}}</small>
                @enderror
                <td style="text-align: right;"><button class="btn btn-primary" type="submit" STYLE="background: linear-gradient(to right,#495c5c,#030007);">Agregar</button> </td>
              </tr>
            </table>
        </form>
         
        <h5>Hola mundo2</h5>
        <form id="formImagenes" action="{{route('fotos.store', $equipo->id)}}" enctype="multipart/form-data" method="POST" class="form-horizontal ">
          @csrf
              <input type="hidden" name="equipo_id" value={{$equipo->id}} readonly >
              <label for="imagen">Buscar imagen:</label> 
            <table class="table table-sm" STYLE="background: linear-gradient(to right,#495c5c,#030007);">
              <tr>
                <td style="text-align: right;"><input type="text" class='form-control' name="nombreFoto" id="" accept="" autocomplete="off" placeholder="Nombre de imagen" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);" >
                  @error('nombreFoto')
                  <small class="text-danger"> {{$message}}</small>
                  @enderror
                <td><input type="file" class='form-control' name="file" id="" accept="image/*" autocomplete="off" placeholder="Buscar repuesto" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);" >
                @error('file')
                <small class="text-danger"> {{$message}}</small>
                @enderror
                <td style="text-align: right;"><button class="btn btn-primary" type="submit" STYLE="background: linear-gradient(to right,#495c5c,#030007);">Agregar</button> </td>
              </tr>
            </table>
        </form>

      </div> 
     </div> 
    </div> 
    </div>
  
</div>
</section>


{{-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
<div class="container ">
  <div class="card" STYLE="background: linear-gradient(to right,#495c5c,#030007);" >
    <div class="card-header" STYLE="background: linear-gradient(to right,#1e2020,#030007);">

      <h6 STYLE="text-align:center; font-size: 30px;
                  background: -webkit-linear-gradient(rgb(1, 103, 71), rgb(239, 236, 217));
                  -webkit-background-clip: text;
                  -webkit-text-fill-color: transparent;">Adjuntar</h6>


  <form action="{{route('equipoRepuesto.store')}}" method="POST" class="form-horizontal" STYLE="background: linear-gradient(to right,#495c5c,#030007);">
    @csrf
    <input type="hidden" name="Selector" value="AgregarRep" readonly >
    <input type="hidden" name="equipo_id" value={{$equipo->id}} readonly >
         <table class="table table-sm" STYLE="background: linear-gradient(to right,#495c5c,#030007);" >
           <tr>
              <td><input type="text" class='form-control' name="search" id="search" autocomplete="off" placeholder="Buscar repuesto"class="form-control" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);"> </td>
              <td > <input type="number" class='form-control' name="cant" id="cant" value="1" min="1" max="99" placeholder="Cantidad" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);"></td>
              <td><button class="btn btn-primary" type="submit" type="submit" STYLE="background: linear-gradient(to right,#495c5c,#030007);">Agregar</button> </td>
           </tr>
      </table>
  </form>
</div> 
</div> 
</div> 
{{-- *****************Fin tercer formulario******************************************* --}}
{{-- $$$$$$$$$$$$$$$$$$$$$$  Tercer formulario IMAGENES $$$$$$$$$$$$$$$ --}}

<div class="container ">
<div class="card ">
<div class="card-header ">
  <form id="formImagenes" action="{{route('fotos.store', $equipo->id)}}" enctype="multipart/form-data" method="POST" class="form-horizontal ">
    @csrf
        <input type="hidden" name="equipo_id" value={{$equipo->id}} readonly >
        <label for="imagen">Buscar imagen:</label> 
      <table class="table table-primary table-sm">
        <tr>
          <td><input type="text" class='form-control' name="nombreFoto" id="" accept="" >
            @error('nombreFoto')
            <small class="text-danger"> {{$message}}</small>
            @enderror
          <td><input type="file" class='form-control' name="file" id="" accept="image/*" >
          @error('file')
          <small class="text-danger"> {{$message}}</small>
          @enderror
          <td><button class="btn btn-primary" type="submit">Agregar</button> </td>
        </tr>
      </table>
  </form>
</div> 
</div> 
</div> 
{{-- *****************Fin cuarto formulario******************************************* --}}
{{-- $$$$$$$$$$$$$$$$$$$$$$  Cuarto formulario $$$$$$$$$$$$$$$ --}}

<div class="container ">
<div class="card ">
<div class="card-header ">
  <form>
   
      <label for="search">Buscar documento:</label> 
      <table class="table table-primary table-sm">
        <tr>
          <td><input type="file" class='form-control' name="search" id="search"> </td>
          
          <td><button class="btn btn-primary" type="submit">Agregar</button> </td>
        </tr>
      </table>
  </form>
</div> 
</div> 
</div> 
{{-- *****************Fin cuarto formulario******************************************* --}}







            



{{-- *****************Esto agrega desde select (option)******************************************* --}}
          <form action="{{route('equipoRepuesto.store')}}" method="POST">
            @csrf
            <label>
                <br>    
                Código:
                <input type="hidden" name="Selector" value="AgregarRep" readonly >
                <input type="hidden" name="equipo_id" value={{$equipo->id}} readonly >
            </label>    
            
            <select name="repuestosSelect">
                          @foreach ($repuestosTodos as $repuesto)
                            <li>
                              <option value="{!! $repuesto->id !!}">{!! $repuesto->codigo !!}</option> 
                            </li>
                          @endforeach
              </select>
                  <input type="number" name="cant" value="1" min="1" max="99">
                  <button type="submit">Agregar</button> {{-- Voy a la tabla pivot,me llevo $equipo_id y $repuesto_id --}}  
          </form>
{{-- *************************************************************************** --}}


{{-- inicio  tabla repuestos mostrar  --}}
      <div class="container"> 
      <h3>Listado de repuestos</h3>
      @foreach($repuestos as $repuesto)
      <table>
        <form action="{{route('equipoRepuesto.store')}}" method="POST">
        @csrf
        <tr>
          <input type="hidden" name="Selector" value="BorrarRep" readonly >
          <input type="hidden" name="equipo_id" value={{$equipo->id}} readonly >
          <input type="hidden" name="repuestoBorrar_id" value={{$repuesto->id}} readonly >
          
          <td>{{ $repuesto->codigo }}</td>
          <td>{{ $repuesto->descripcion}}</td>
          <td>{{$repuesto->pivot->cant}} </td>
          
          <td> <button type="submit" class="bi bi-trash3-fill"></button></td>
        </tr>
      </form>
      </table>
              
        @endforeach
      </div>
{{-- fin  tabla repuestos mostrar  --}}
    
  
      





 
<form action={{route('equipos.destroy', $equipo->id)}} method="POST"> {{--$equipo viene por la url cuando seleciono --}}
  @method('delete')
  @csrf
   <button type="submit">Borrar registro</button>
</form>









<script>
      $( "#search" ).autocomplete({
      source: function(request, response){
        
              $.ajax({
              url:"{{route('search.repuestos')}}",
               dataType: 'json',
              data:{
                     term: request.term
                    },
                    success: function(data) {
                    response(data)  
            }

        });
      }
    });
  </script> 

   {{-- Este es el script de la pagian oficial
     <script>
    $( function() {
      var availableTags = [
        "ActionScript",
        "AppleScript",
        "Asp",
        "BASIC",
        "C",
       
      ];
      $( "#search" ).autocomplete({
        source: availableTags
      });
    } );
    </script>  --}}

@endsection


