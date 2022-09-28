@extends('layouts.plantilla')
@section('title', 'Ver ' . $tarea->descripcion)
@section('content')
<h1>Aqui se verá una tarea en particular {{$tarea->descripcion}}</h1>
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
                    
                    <form id="nuevoTarea"  action="{{route('tarea.store')}}" method="POST" class="form-horizontal" STYLE="background: linear-gradient(to right,#495c5c,#030007);">
                        
                        <h6>Ver tarea</h6>
                        @csrf  {{-- Envía un token de seguridad. Siempre se debe poner!!! sino no funca --}}
                    
                      
                        <div class="p-3 mb-2 bg-gradient-primary text-white">
                        <div class="container">
                            
                            <div class="row"> {{-- ***** div de la primera fila --}}
                              <div class="col col-md-2">
                                <div class="form-group">
                                  <label class="control-label" for="codigo">Codigo:</label> 
                                  <input disabled  class="form-control" type="text" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);"  name="codigo" value={{old('codigo')}} > 
                                  @error('codigo')
                                  <small>*{{$message}}</small>
                                  @enderror
                                </div>
                              </div> 
                              <div class="col col-md-6">
                                <div class="form-group">
                                  <label class="control-label" for="descripcion">Descripción:</label> 
                                  <input disabled class="form-control" type="text" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);"   name="descripcion" value={{old('descripcion')}} > 
                                  @error('descripcion')
                                 <small>*{{$message}}</small>
                                  @enderror
                                </div>
                              </div> 
                              <div class="col col-md-2">
                                <div class="form-group">
                                  <label class="control-label" for="duracion">Duración:</label>
                                  <input disabled class="form-control" type="text" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);" name="duracion" value={{old('duracion')}} > {{-- old() mantiene en campo con el dato--}} 
                                  
                                   @error('duracion')
                                  <small>*{{$message}}</small>
                                  @enderror
                                </div>
                              </div> 
                              <div class="col col-md-2">
                                <div class="form-group">
                                  <label class="control-label" for="unidad">Unidad:</label> 
                                  <input disabled  class="form-control" type="text"  STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);" name="unidad"   value={{old('unidad')}} >  {{-- value={{old('de', $ot->de)}} disabled --}}
                                  @error('unidad')
                                  <small>*{{$message}}</small>
                                  @enderror
                                </div>
                            </div>
                            </div> {{-- ***** div de la primera fila --}}
                            <br>
                            <br>
                            <div class="form-group">
                                <p style="text-align: right;"><a  class="text-white " href={{route('tarea.index')}}>Salir</a></p> 
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




