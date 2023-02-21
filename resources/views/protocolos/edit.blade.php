
@extends('adminlte::page') 
@section('title', 'Edit')
@section('content_header')
@include('layouts.partials.menuPdm')
@stop
@section('css')
{{--  EL MEJOR EJEMPLO DE LA PAGINA DE jquery-ui (https://jqueryui.com/autocomplete/) !!! --}}
<link rel="stylesheet" href="{{asset('jquery-ui/jquery-ui.min.css')}}"> 
<script src="{{asset('jquery/dist/jquery.js')}}"></script>
<script src="{{asset('jquery-ui/jquery-ui.min.js')}}"></script>
@endsection

 
@section('content')
<br>
<h6 STYLE="text-align:center; font-size: 30px;
                  background: -webkit-linear-gradient(rgb(1, 103, 71), rgb(239, 236, 217));
                  -webkit-background-clip: text;
                  -webkit-text-fill-color: transparent;">Editar procedimiento</h6>  

<section class="main row ">
      <div class="container "> {{-- Container 1 --}}
      <br>
       
          {{-- Probando Col --}}
          <div class="container"> {{-- Container 2 --}}
            <div class="row">
                <div class="col col-md-1">
                  {{--  Columna 1 --}}
                </div>
                <div class="col col-md-10">
                   {{--  Columna 2 --}}
                   <form id="encabezado" action="{{route('protocolos.update', $protocolo->id)}}" method="POST" class="form-horizontal" STYLE="background: linear-gradient(to right,#3c4e4e,#030007);">
                      @csrf  {{-- Envía un token de seguridad. Siempre se debe poner!!! sino no funca --}}
                      @method('put') {{-- Metodo PUT no existe en html, por eso indicamos a laravel como sigue --}}
                      <div class="p-3 mb-2 text-white">                        
                      <div class="container"> {{-- abre Contenedor 3 --}}                        
                        <div class="row">  {{-- abre div row Columna2 --}}            
                                                
                              <div class="col col-md-3"> {{-- dentro columna 2 utiliza 3 colmunas --}}
                                <div class="form-group">
                                  <label class="control-label" for="codigo">Código:</label> 
                                  <input readonly maxlength="11" minlength="11" autocomplete="off" class="form-control" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);"  type="text" name="codigo" value="{{old('codigo', $protocolo->codigo)}}"> 
                                  @error('codigo')
                                  <small>*{{$message}}</small>
                                  @enderror
                                </div>                          
                              </div>

                            <div class="col col-md-8"> {{-- dentro columna 2 utiliza 8 colmunas --}}
                              <div class="form-group">
                                <label class="control-label " for="descripcion">Descripción:</label>
                                <input autocomplete="off" class="form-control" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);" type="text" name="descripcion" value="{{old('descripcion', $protocolo->descripcion)}}" placeholder="Código de equipo"> {{-- old() mantiene en campo con el dato--}}
                                @error('descripcion') {{--el 2do parametro de old es para mantener la mificacion cuando la validacion falla--}}
                                <small class="help-block">*{{$message}}</small>
                                @enderror
                              </div>
                            </div>                      
                                                    
                                                    
                            <div class="col col-md-1"> {{-- dentro columna 2 utiliza 1 colmunas --}}
                              <div class="form-group">
                                <label class="control-label " for="Guarda">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                <button form="encabezado" class="bi bi-save btn btn-link" title="Guarda descripción" name="Guarda"  type="submit"></button>
                            </div>                         
                                                        
                                                      
                     </div> {{-- abre div row Columna2 --}}                         
                     </div> {{-- cierra Contenedor 3 --}}                       
                     </div> {{-- cierra color de texto del formulario--}}                        
                    </form >  {{-- Cierra Formulario Nº1 encavezado --}} 
                            
                  {{--INICIO DE SEGUNDO FORMULARIO --}}
                  
                                 {{-- MUESTRA PROTOCOLOS --}} 
                          <table class="table table-striped  border-4"  >
                                 <thead  >
                                    <tr>
                                      <th >Códigos</th>
                                      <th >Descripción</th>
                                      <th ></th>
                                      
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
                                                <th>{{ $tarea->codigo }}</th>
                                                <th>{{ $tarea->descripcion}}</th>
                                                <th> <button title="Elimina este item" class="bi bi-trash3-fill btn btn-link"  type="submit" ></button></th>
                                              </tr>
                                        </tbody>
                                    </form>
                                    @endforeach
                          </table>
                          {{-- Adjuntar inicio --}}     
                          <div class="card-header" STYLE="background: linear-gradient(to right,#1e2020,#030007);">
    
                            <h6 STYLE="text-align:center; font-size: 30px;
                                        background: -webkit-linear-gradient(rgb(1, 103, 71), rgb(239, 236, 217));
                                        -webkit-background-clip: text;
                                        -webkit-text-fill-color: transparent;">Adjuntar</h6>
                      
                        <br>
                              <form action="{{route('prototarea.store')}}" method="POST" class="form-horizontal" STYLE="background: linear-gradient(to right,#495c5c,#030007);">
                                @csrf
                                <input type="hidden" name="Selector" value="AgregarTarea" readonly >
                                <input type="hidden" name="proto_id" value={{$protocolo->id}} readonly >
                                    <table class="table table-sm" STYLE="background: linear-gradient(to right,#495c5c,#030007);" >
                                      <tr>
                                          <td><input class='form-control' name="search" id="search" autocomplete="off" placeholder="Buscar Tarea"class="form-control" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);"> </td>
                                          
                                          <td style="text-align: right;"><button class="btn btn-primary" type="submit"  STYLE="background: linear-gradient(to right,#495c5c,#030007);">Agregar</button> </td>
                                          
                                        </tr>
                                  </table>
                              </form>
                          </div> 
                        {{-- Adjuntar Fin --}}    
                      
                        <br>
                        <div >
                          <p style="text-align: right;"><a  class="text-white " href={{route('protocolos.index')}}>Salir</a></p> 
                          <a href="{{ URL::previous() }}" >Volver</a>
                        </div>

            </div> {{-- Container 2 --}}    
          </div> {{-- Container 1 --}}
  <div class="col col-md-1">
   {{--  Columna 3 --}}
  </div>            
</section>
 



<script>
 
  $( "#search" ).autocomplete({
   source: function(request, response){
     
           $.ajax({
           url:"{{route('search.tareas')}}",
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

@endsection
