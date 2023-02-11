{{-- @extends('layouts.plantilla') --}}
@extends('adminlte::page')
@section('title', 'Ver ' . $protocolo->codigo)
@section('content_header')
@include('layouts.partials.menuPdm')
@stop

@section('content')

<br>
<h6 STYLE="text-align:center; font-size: 30px;
                      background: -webkit-linear-gradient(rgb(1, 103, 71), rgb(239, 236, 217));
                      -webkit-background-clip: text;
                      -webkit-text-fill-color: transparent;">Ficha de procedimiento de mantenimiento</h6>
  <section class="main row ">
 
    <div class="container ">
            
               <br> 
              {{-- Probando Col --}}
              <div class="container">
                <div class="row">
                  <div class="col col-md-2">
                    {{-- Columna 1 --}}
                    
                  </div>
                  <div class="col col-md-8">
                    {{-- Columna2 --}}
                    <form id="encabezado" action="{{route('protocolos.update', $protocolo->id)}}" method="POST" class="form-horizontal" STYLE="background: linear-gradient(to right,#495c5c,#030007);">
                      
                      @csrf  {{-- Envía un token de seguridad. Siempre se debe poner!!! sino no funca --}}
                      @method('put') {{-- Metodo PUT no existe en html, por eso indicamos a laravel como sigue --}}
                      
                      <div class="p-3 mb-2 text-white">
          
                        <div class="container">
                          <div class="row">
                            <div class="col col-md-3">
                              <div class="form-group">
                                <label class="control-label" for="codigo">Código:</label> 
                                <input readonly autocomplete="off" class="form-control" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 17px; background: linear-gradient(to right,#030007, #495c5c);"  type="text" name="marca" value="{{old('codigo', $protocolo->codigo)}}"> 
                                @error('codigo')
                                <small>*{{$message}}</small>
                                @enderror
                              </div>
                            </div>
                            <div class="col col-md-9">
                              <div class="form-group">
                                <label class="control-label " for="descripcion">Descripción:</label>
                                <input readonly autocomplete="off" class="form-control" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);" type="text" name="codEquipo" value="{{old('descripcion', $protocolo->descripcion)}}" placeholder="Código de equipo"> {{-- old() mantiene en campo con el dato--}}
                                @error('descripcion') {{--el 2do parametro de old es para mantener la mificacion cuando la validacion falla--}}
                                <small class="help-block">*{{$message}}</small>
                                @enderror
                              </div>
                            </div>
          
                            
                        </div> {{-- cierra row 1--}}
                              
                      </form >  {{-- Cierra Formulario Nº1 --}} 
                      <br>
                      {{--INICIO DE SEGUNDO FORMULARIO --}}
                      <div class="card " STYLE="background: linear-gradient(to right,#495c5c,#030007);">
                        <div class="card-header " STYLE="background: linear-gradient(to right,#495c5c,#030007);">            
                                     {{-- MUESTRA PROTOCOLOS --}} 
                              <table class="table" STYLE="background: linear-gradient(to right,#495c5c,#030007);">
                                     <thead>
                                        <tr>
                                          <th style="text-align: center; color: #ffffff;" scope="col">Código</th>
                                          <th style="text-align: center; color: #ffffff;" scope="col">Descripción</th>
                                          
                                          
                                        </tr>
                                      </thead>
                                      @foreach($tareas as $tarea)
                                        <form action="{{route('prototarea.store')}}" method="POST">
                                          @csrf
                                           
                                            <tbody>
                                                  <tr>
                                                    <input type="hidden" name="Selector" value="BorrarTarea" readonly >
                                                    <input type="hidden" name="proto_id" value={{$protocolo->id}} readonly >
                                                    <input type="hidden" name="tareaBorrar_id" value={{$tarea->id}} readonly >
                                                    <th STYLE="color: #ffffff; font-family: Times New Roman;  font-size: 14px; "scope="row">{{ $tarea->codigo }}</th>
                                                    <td STYLE="color: #ffffff; font-family: Times New Roman;  font-size: 14px; ">{{ $tarea->descripcion}}</td>
                                                                                                  
                                                    
                                                  </tr>
                                            </tbody>
                                        </form>
                                        @endforeach
                              </table>
                          </div> {{-- div del card3 --}}
                          </div> {{-- div del card4 --}}
                          <br>
                       
                  <div class="col col-md-2">
                    {{-- Columna --}}
                  </div>
                  <p style="text-align: right;"><a  class="text-white " href={{route('protocolos.index')}}>Salir</a></p> 
                </div>
              </div>
    
    
              
            <br>
                       
            
    
                <br>
                   <div class="form-group">
                    {{--   <button form="encabezado" class="btn btn-primary" type="submit" STYLE="background: linear-gradient(to right,#495c5c,#030007);">Enviar</button> --}}
                    
                   </div>
                   <br>   
                            
    </section>
    <div class="container"> 
      @include('layouts.partials.footer')
    </div>

@endsection




