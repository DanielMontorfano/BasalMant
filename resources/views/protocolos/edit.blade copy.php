@extends('layouts.plantilla')
@section('title', 'Edit')
@section('content')
<h1>Aqui editaremos Protocolos</h1>
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
                    
                    <form id="nuevaTarea"  action="{{route('tareas.update', $tarea->id)}}" method="POST" class="form-horizontal" STYLE="background: linear-gradient(to right,#495c5c,#030007);">
                        
                        <h6>Editar tarea</h6>
                        @csrf  {{-- Envía un token de seguridad. Siempre se debe poner!!! sino no funca --}}
                        @method('put')
                      
                        <div class="p-3 mb-2 bg-gradient-primary text-white">
                        <div class="container">
                            
                            <div class="row"> {{-- ***** div de la primera fila --}}
                              <div class="col col-md-2">
                                <div class="form-group">
                                  <label class="control-label" for="codigo">Codigo:</label> 
                                  <input autocomplete="off" class="form-control" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 14px; background: linear-gradient(to right,#030007, #495c5c);" type="text" name="codigo" value={{old('codigo', $tarea->codigo)}}> 
                                  @error('codigo')
                                  <small>*{{$message}}</small>
                                  @enderror
                                </div>
                              </div> 
                              <div class="col col-md-6">
                                <div class="form-group">
                                  <label class="control-label" for="marca">Descripción:</label> 
                                  <input autocomplete="off" class="form-control" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 14px; background: linear-gradient(to right,#030007, #495c5c);"  type="text" name="descripcion" value="{{old('descripcion', $tarea->descripcion)}}"> 
                                 
                                  @error('descripcion')
                                 <small>*{{$message}}</small>
                                  @enderror
                                </div>
                              </div> 
                              <div class="col col-md-2">
                                <div class="form-group">
                                  <label class="control-label" for="marca">Duración:</label> 
                                  <input type="number" autocomplete="off" class="form-control" name="duracion" id="duracion" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 14px; background: linear-gradient(to right,#030007, #495c5c);"  type="number" name="duracion" value="{{old('duracion', $tarea->duracion)}}"> 
                                   
                                  @error('duracion')
                                  <small>*{{$message}}</small>
                                  @enderror
                                </div>
                              </div> 
                              <div class="col col-md-2">
                                <div class="form-group">
                                  <label class="control-label" for="unidad">Unidad:</label> 
                                  <select name="uniTiempoSelect" class="form-control"   STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 14px; background: linear-gradient(to right,#030007, #495c5c);" value="{{$tarea->duracion}}">
                                  <option value="Min">Min</option> 
                                  <option value="Hs">Hs</option> 
                                  <option value="Días">Días</option> 
                                  <option value="Meses">Meses</option> 
                                  </select>
                                  @error('unidad')
                                  <small>*{{$message}}</small>
                                  @enderror
                                </div>
                            </div>
                            </div> {{-- ***** div de la primera fila --}}
                            
                                

                            <br>
                            <br>
                           <div class="form-group">
                            <button form="nuevaTarea" class="btn btn-primary" type="submit" STYLE="background: linear-gradient(to right,#495c5c,#030007);">Enviar</button>
                            <p style="text-align: right;"><a  class="text-white " href={{route('tareas.index')}}>Salir</a></p> 
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


