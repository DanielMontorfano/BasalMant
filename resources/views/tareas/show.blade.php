
@extends('adminlte::page') 
@section('title', 'Ver ' . $tarea->codigo)
@section('content')

<style>
    h6 {
        text-align:center; font-size: 30px;
                        background: -webkit-linear-gradient(rgb(1, 103, 71), rgb(239, 236, 217));
                        -webkit-background-clip: text;
                        -webkit-text-fill-color: transparent;

    }

    .form-control { color: #f2baa2;
         font-family: Times New Roman;
         font-size: 18px;
         background: linear-gradient(to right,#030007, #495c5c);

    }

    
    
</style>

<br> 
<h6>Ver tarea</h6>   
<br>
    <div  class="container" > {{-- container principal --}}
      <div class="row"> {{-- row principal --}}
                  <div class="col col-md-1">
                      {{-- columna1 Del medio --}}
                  </div>{{-- columna1 Del medio --}}
                    <div STYLE="background: linear-gradient(to right,#495c5c,#030007);" class="col col-md-10">{{-- div del container dentro de columna 2 --}} 
                      {{-- columna2 --}}
                           <form id="nuevoTarea"  action="{{route('tareas.store')}}" method="POST" class="form-horizontal" >
                              @csrf  {{-- Envía un token de seguridad. Siempre se debe poner!!! sino no funca --}}
                                <div class="p-3 mb-2  text-white">
                                  <div class="container">
                                    <div class="row"> {{-- ***** div de la primera fila dentro del form--}}
                                            <div class="col col-md-3">
                                                <div class="form-group">
                                                  <label class="control-label" for="codigo">Codigo:</label> 
                                                  <input disabled  class="form-control" type="text" name="codigo" value="{{old('codigo', $tarea->codigo)}}" > 
                                                  @error('codigo')
                                                  <small>*{{$message}}</small>
                                                  @enderror
                                                </div>
                                                <br><br>
                                                <div style="text-align:left;"><a title="Crear otra tarea" class="text-white " href={{route('tareas.create')}}>&lt; &lt; &nbsp; Otra</a></div>
                                                </div> 
                                            <div class="col col-md-7">
                                                    <div class="form-group">
                                                      <label class="control-label" for="descripcion">Descripción:</label> 
                                                      <input disabled class="form-control" type="text"  name="descripcion" value="{{old('descripcion', $tarea->descripcion)}}" > 
                                                      @error('descripcion')
                                                      <small>*{{$message}}</small>
                                                      @enderror
                                                    </div>
                                                        <br>
                                                        <br>    
                                            </div> 
                                            <div class="col col-md-2">
                                                  <div class="form-group">
                                                    <label class="control-label" for="duracion">Duración: </label>
                                                    <input disabled class="form-control" type="text" STYLE="text-align: right;" name="duracion" value="{{$tarea->duracion ." ". $tarea->unidad}}" > {{-- old() mantiene en campo con el dato--}} 
                                                    @error('duracion')
                                                    <small>*{{$message}}</small>
                                                    @enderror
                                                  </div>
                                                  <br><br>
                                                  <div style="text-align:right;"><a  title="Ir a listado de tareas" class="text-white " href={{route('tareas.index')}}> Salir &nbsp; &gt;&gt;</a></div>
                                                      
                                            </div> 
                                    </div> 
                                  </div>{{-- div del container dentro de columna 2 --}} 
                              </div>  {{-- div del Letra blanca --}}  
                            </form>
                            

                  </div>{{-- columna2 Del medio--}}
                  <div class="col col-md-1">
                      {{-- columna 3 --}}

                  </div> {{-- columna 3 Del medio--}}

      </div>  {{-- div del row1 Principal --}}
  </div> {{-- div del container Principal--}}

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>


<div class="container"> 
  @include('layouts.partials.footer')
</div>

@endsection




