@extends('layouts.plantilla')
@section('title', 'create')
@section('content')

<style>
    h6 {
        text-align:center; font-size: 30px;
                        background: -webkit-linear-gradient(rgb(1, 103, 71), rgb(239, 236, 217));
                        -webkit-background-clip: text;
                        -webkit-text-fill-color: transparent;

    }

    .input { color: #f2baa2;
         font-family: Times New Roman;
         font-size: 18px;
         background: linear-gradient(to right,#030007, #495c5c);

    }
</style>

<br>    
<div class="container"> {{-- container principal --}}
    <div class="row"> {{-- row principal --}}
                <div class="col col-md-2">
                    {{-- columna1 --}}
                </div>

                <div class="col col-md-8">
                    {{-- columna2 --}}
                    
                    <form id="nuevoEquipo"  action="{{route('equipos.store')}}" method="POST" class="form-horizontal" STYLE="background: linear-gradient(to right,#495c5c,#030007);">
                        
                        <h6>Nueva Equipo</h6>
                        @csrf  {{-- Envía un token de seguridad. Siempre se debe poner!!! sino no funca --}}
                    
                      
                        <div class="p-3 mb-2 bg-gradient-primary text-white">
                        <div class="container">
                            
                            <div class="row"> {{-- ***** div de la primera fila --}}
                              <div class="col col-md-4">
                                <div class="form-group">
                                  <label class="control-label" for="codigo">Codigo:</label> 
                                  <input autocomplete="off" class="form-control" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);" type="text" name="codEquipo" value={{old('codEquipo')}}> 
                                  @error('codigo')
                                  <small>*{{$message}}</small>
                                  @enderror
                                </div>
                              </div> 
                              <div class="col col-md-4">
                                <div class="form-group">
                                  <label class="control-label" for="marca">Marca:</label> 
                                  <input autocomplete="off" class="form-control" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);"  type="text" name="marca" value={{old('marca')}}> 
                                  @error('marca')
                                 <small>*{{$message}}</small>
                                  @enderror
                                </div>
                              </div> 
                              <div class="col col-md-4">
                                <div class="form-group">
                                  <label class="control-label" for="marca">Modelo:</label> 
                                  <input autocomplete="off" class="form-control" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);"  type="text" name="modelo" value={{old('modelo')}}> 
                                  @error('modelo')
                                  <small>*{{$message}}</small>
                                  @enderror
                                </div>
                              </div> 
                            </div> {{-- ***** div de la primera fila --}}
                            <div class="row"> {{-- ****** div de la segunda fila --}}
                                <div class="col col-md-6">
                                    <div class="form-group">
                                      <label class="control-label" for="idSecc">Sección:</label> 
                                      <input autocomplete="off" class="form-control" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);"  type="text" name="idSecc" value={{old('idSecc')}}> 
                                      @error('idSecc')
                                      <small>*{{$message}}</small>
                                      @enderror
                                    </div>
                                </div>
                                <div class="col col-md-6">
                                    <div class="form-group">
                                      <label class="control-label" for="idSubSecc">Subsección:</label> 
                                      <input autocomplete="off" class="form-control" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);"  type="text" name="idSubSecc" value={{old('idSubSecc')}}> 
                                      @error('idSubSecc')
                                      <small>*{{$message}}</small>
                                      @enderror
                                    </div>
                                </div>
                            </div> {{-- ****** div de la segunda fila --}}
                            <div class="row"> {{-- ****** div de la tercera fila --}}
                                <div class="col col-md-6">
                                    <div class="form-group">
                                      <label class="control-label" for="det1">Característica Nº1:</label> 
                                      <input autocomplete="off" class="form-control" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);" type="text" name="det1" value={{old('det1')}}>   {{-- old() mantiene en campo con el dato--}}
                                      @error('det1')
                                      <small>*{{$message}}</small>
                                      @enderror
                                    </div>
                                  </div>
                  
                                  <div class="col col-md-6">
                                    <div class="form-group">
                                      <label class="control-label" for="det2">Característica Nº2:</label> 
                                      <input autocomplete="off" class="form-control" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);" type="text" name="det2" value={{old('det2')}}>   {{-- old() mantiene en campo con el dato--}}
                                      @error('det2') {{--el 2do parametro de old es para mantener la mificacion cuando la validacion falla--}}
                                      <small class="help-block">*{{$message}}</small>
                                      @enderror
                                      </div>
                                  </div>
                            </div> {{-- ****** div de la tercera fila --}}
                            <div class="row"> {{-- ****** div de la 4ta fila   --}}  
                                <div class="col col-md-6">
                                    <div class="form-group">
                                      <label class="control-label" for="det3"> Característica Nº3:</label> 
                                      <input autocomplete="off" class="form-control" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);" type="text" name="det3" value={{old('det3')}}>   {{-- old() mantiene en campo con el dato--}}
                                      @error('det3')
                                      <small>*{{$message}}</small>
                                      @enderror
                                    </div>
                                  </div>
                  
                                  <div class="col col-md-6">
                                    <div class="form-group">
                                      <label class="control-label" for="det4">   Característica Nº4:</label> 
                                      <input autocomplete="off" class="form-control" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);" type="text" name="det4" value={{old('det4')}}>   {{-- old() mantiene en campo con el dato--}}
                                      @error('det4') {{--el 2do parametro de old es para mantener la mificacion cuando la validacion falla--}}
                                      <small class="help-block">*{{$message}}</small>
                                      @enderror
                                      </div>
                                  </div>
                           </div> {{-- ****** div de la 4ta fila --}}    
                           <div class="row"> {{-- ****** div de la 5ta fila   --}}    
                            
                                <div class="col col-md-12">
                                  <div class="form-group">
                                    <label class="control-label" for="det5"> Detalle:</label> 
                                    <input autocomplete="off" class="form-control" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);" type="text" name="det5" value={{old('det5')}}>   {{-- old() mantiene en campo con el dato--}}
                                    @error('marca')
                                    <small>*{{$message}}</small>
                                    @enderror
                                  </div>
                                </div>
                           </div> {{-- ****** div de la 5ta fila --}}    
                            <br>
                            <br>
                           <div class="form-group">
                            <button form="nuevoEquipo" class="btn btn-primary" type="submit" STYLE="background: linear-gradient(to right,#495c5c,#030007);">Enviar</button>
                            <p style="text-align: right;"><a  class="text-white " href={{route('equipos.index')}}>Salir</a></p> 
                          </div>
 

                        </div>{{-- div del container dentro de columna 2 --}}    
                        </div>{{-- div del Letra blanca --}}
                    </form>
                    </div>
                <div class="col col-md-2">
                    {{-- columna 3 --}}
                </div>
    </div>  {{-- div del row1 Principal --}}
</div> {{-- div del container Principal--}}

@endsection



