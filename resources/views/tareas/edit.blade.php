{{-- @extends('layouts.plantilla') --}}
@extends('adminlte::page') 
@section('title', 'Edit')
@section('content_header')

<h6 STYLE="text-align:center; font-size: 30px;
background: -webkit-linear-gradient(rgb(1, 103, 71), rgb(239, 236, 217));
-webkit-background-clip: text;
-webkit-text-fill-color: transparent;">Editar tarea</h6>
@stop
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
         font-size: 14px;
         background: linear-gradient(to right,#030007, #495c5c);

    }
</style>
<br>
    <div class="row"> {{-- row principal --}}
                <div class="col col-md-1">
                    {{-- columna1 --}}
                </div>

                <div class="col col-md-10">
                    {{-- columna2 --}}
                    
                    <form id="nuevaTarea"  action="{{route('tareas.update', $tarea->id)}}" method="POST" class="form-horizontal" STYLE="background: linear-gradient(to right,#495c5c,#030007);">
                      @csrf  {{-- Envía un token de seguridad. Siempre se debe poner!!! sino no funca --}}
                        @method('put')
                      
                        <div class="p-3 mb-2  text-white">
                        <div class="container">
                            <div class="row"> {{-- ***** div de la primera fila --}}
                              <div class="col col-md-2">
                                <div class="form-group">
                                  <label class="control-label" for="codigo">Codigo:</label> 
                                  <input readonly maxlength="11" minlength="11" autocomplete="off" class="form-control"  type="text" name="codigo" value={{old('codigo', $tarea->codigo)}}> 
                                  @error('codigo')
                                  <small>*{{$message}}</small>
                                  @enderror
                                </div>
                              </div> 
                              <div class="col col-md-6">
                                <div class="form-group">
                                  <label class="control-label" for="marca">Descripción:</label> 
                                  <input id="descripcion" name="descripcion" autofocus autocomplete="off" class="form-control" style="color: #f2baa2;"  type="text"  value="{{old('descripcion', $tarea->descripcion)}}"> 
                                 
                                  @error('descripcion')
                                 <small>*{{$message}}</small>
                                  @enderror
                                </div>
                              </div> 
                              <div class="col col-md-2">
                                <div class="form-group">
                                  <label class="control-label" for="marca">Duración:</label> 
                                  <input type="number" min="1" max="99" autocomplete="off" class="form-control" name="duracion" id="duracion"   name="duracion" value="{{old('duracion', $tarea->duracion)}}"> 
                                   
                                  @error('duracion')
                                  <small>*{{$message}}</small>
                                  @enderror
                                </div>
                              </div> 
                              <div class="col col-md-2">
                                <div class="form-group">
                                  <label class="control-label" for="unidad">Unidad:</label> 
                                  <select id="uniTiempoSelect" name="uniTiempoSelect" class="form-control"    value="{{old('Unidad',$tarea->unidad)}}">
                                  <option value=""></option>
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
                           
                          <table class="table">
                            <h5>Tarea a editar:</h5>
                            <tbody>
                          
                              <tr>
                                <td class="col-2">{{ $tarea->codigo }}</td>
                                <td class="col-8">{{ $tarea->descripcion }}</td>
                                <td class="col-2">{{ $tarea->duracion }} {{ $tarea->unidad }}</td>
                                
      
                              </tr>
                             
                            </tbody>
                          </table>
      
                         
                          <div class="form-group">
                            <button form="nuevaTarea" class="btn btn-primary" type="submit" STYLE="display: none; background: linear-gradient(to right,#495c5c,#030007);">Enviar</button>
                            <p style="text-align: right;"><a  class="text-white " href={{route('tareas.index')}}>Salir</a></p> 
                          </div>
                           
                        </div>{{-- div del container dentro de columna 2 --}}    
                        </div>{{-- div del Letra blanca --}}
                        

                    </form>
                    </div>
                    




                <div class="col col-md-1">
                    {{-- columna 3 --}}
                </div>
    </div>  {{-- div del row1 Principal --}}

<br>
<br>
<br>
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

<script>
  var select = document.getElementById("uniTiempoSelect");
  select.addEventListener("change", function() {
    select.blur(); // desenfoca el select
    document.getElementById("descripcion").focus(); // enfoca otro elemento
  });
</script>
@endsection


