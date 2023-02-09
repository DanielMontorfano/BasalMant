
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

    .input { color: #f2baa2;
         font-family: Times New Roman;
         font-size: 18px;
         background: linear-gradient(to right,#030007, #495c5c);

    }
    #menuhorizontal {
margin:0;
padding:0;
list-style-type:none;
} #menuhorizontal a { width:50px;
text-decoration:none;
text-align:center;
color:#ff0000;
background-color:transparent;
padding:3px 5px;
/*border-right:1px solid blue;*/
display:block; }
#menuhorizontal li {
float:left;
}

#menuhorizontal a:hover {
background-color:#02462c;
}
</style>

<br> 
<h6>Ver tarea</h6>   
<br>
<div class="container"> {{-- container principal --}}
    <div class="row"> {{-- row principal --}}
                <div class="col col-md-1">
                    {{-- columna1 --}}
                </div>

                <div class="col col-md-10">
                    {{-- columna2 --}}
                    
                    <form id="nuevoTarea"  action="{{route('tareas.store')}}" method="POST" class="form-horizontal" STYLE="background: linear-gradient(to right,#495c5c,#030007);">
                        
                      
                        @csrf  {{-- Envía un token de seguridad. Siempre se debe poner!!! sino no funca --}}
                    
                      
                        <div class="p-3 mb-2  text-white">
                        <div class="container">
                            
                            <div class="row"> {{-- ***** div de la primera fila --}}
                              <div class="col col-md-3">
                                <div class="form-group">
                                  <label class="control-label" for="codigo">Codigo:</label> 
                                  <input disabled  class="form-control" type="text" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 13px; background: linear-gradient(to right,#030007, #495c5c);"  name="codigo" value="{{old('codigo', $tarea->codigo)}}" > 
                                  @error('codigo')
                                  <small>*{{$message}}</small>
                                  @enderror
                                </div>
                              </div> 
                              <div class="col col-md-7">
                                <div class="form-group">
                                  <label class="control-label" for="descripcion">Descripción:</label> 
                                  <input disabled class="form-control" type="text" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 13px; background: linear-gradient(to right,#030007, #495c5c);"   name="descripcion" value="{{old('descripcion', $tarea->descripcion)}}" > 
                                  @error('descripcion')
                                 <small>*{{$message}}</small>
                                  @enderror
                                </div>
                              </div> 
                              <div class="col col-md-2">
                                <div class="form-group">
                                  <label class="control-label" for="duracion">Duración: </label>
                                  <input disabled class="form-control" type="text" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 13px; background: linear-gradient(to right,#030007, #495c5c); text-align: right;" name="duracion" value="{{$tarea->duracion ." ". $tarea->unidad}}" > {{-- old() mantiene en campo con el dato--}} 
                                  
                                   @error('duracion')
                                  <small>*{{$message}}</small>
                                  @enderror
                                </div>
                              </div> 
                              </div> {{-- ***** div de la primera fila --}}
                              <div class="row"> {{-- ***** div de la segunda fila --}}
                                          <br>
                                          <br>
                                          <br>
                                          <div class="form-group">
                                            <nav>
                                              <ul id="menuhorizontal">
                                                  <li><a  class="text-white " href={{route('tareas.create')}}>Otra</a></li>
                                                  <li><a  class="text-white " href={{route('tareas.index')}}>Salir</a></li>
                                              </ul>
                                            </nav>
                                         </div>
                              </div>{{-- ***** div de la segunda --}}
  
                            

                        </div>{{-- div del container dentro de columna 2 --}}    
                        </div>{{-- div del Letra blanca --}}
                    </form>
                    </div>
                <div class="col col-md-1">
                    {{-- columna 3 --}}
                </div>
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
<br>


<div class="container"> 
  @include('layouts.partials.footer')
</div>

@endsection




