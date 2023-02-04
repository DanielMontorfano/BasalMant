@extends('layouts.plantilla')
@section('title', 'Edit')
@section('css')
{{-- https://datatables.net/ **IMPORTANTE PLUG IN PARA LAS TABLAS --}}
{{-- Para que sea responsive se agraga la tercer libreria --}}

@endsection
@section('content')
<h1></h1>


<section class="main row ">
 <div class="container ">
  <div class="card" STYLE="background: linear-gradient(to right,#495c5c,#030007);" >
            <br>
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
                  <h6 STYLE="text-align:center; font-size: 30px;
                  background: -webkit-linear-gradient(rgb(1, 103, 71), rgb(239, 236, 217));
                  -webkit-background-clip: text;
                  -webkit-text-fill-color: transparent;">Editar de procedimiento</h6>
                  @csrf  {{-- Envía un token de seguridad. Siempre se debe poner!!! sino no funca --}}
                  @method('put') {{-- Metodo PUT no existe en html, por eso indicamos a laravel como sigue --}}
                  
                  <div class="p-3 mb-2 text-white">
      
                    <div class="container">
                      <div class="row">
                        <div class="col col-md-3">
                          <div class="form-group">
                            <label class="control-label" for="codigo">Código:</label> 
                            <input readonly maxlength="11" minlength="11" autocomplete="off" class="form-control" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);"  type="text" name="codigo" value="{{old('codigo', $protocolo->codigo)}}"> 
                            @error('codigo')
                            <small>*{{$message}}</small>
                            @enderror
                          </div>
                        </div>
                        <div class="col col-md-9">
                          <div class="form-group">
                            <label class="control-label " for="descripcion">Descripción:</label>
                            <input autocomplete="off" class="form-control" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);" type="text" name="descripcion" value="{{old('descripcion', $protocolo->descripcion)}}" placeholder="Código de equipo"> {{-- old() mantiene en campo con el dato--}}
                            @error('descripcion') {{--el 2do parametro de old es para mantener la mificacion cuando la validacion falla--}}
                            <small class="help-block">*{{$message}}</small>
                            @enderror
                          </div>
                        </div>
      
                        
                    </div> {{-- cierra row 1--}}
                          
                  </form >  {{-- Cierra Formulario Nº1 --}} 
                 
                  {{--INICIO DE SEGUNDO FORMULARIO --}}
                  <div class="card " STYLE="background: linear-gradient(to right,#495c5c,#030007);">
                    <div class="card-header " STYLE="background: linear-gradient(to right,#495c5c,#030007);">            
                                 {{-- MUESTRA PROTOCOLOS --}} 
                          <table  id="listado" class="table table-striped table-success  table-hover border-4">
                                 <thead >
                                    <tr>
                                      <th style="text-align: center; color: #ffffff;" scope="col">Código</th>
                                      <th style="text-align: center; color: #ffffff;" scope="col">Descripción</th>
                                      <th style="text-align: center; color: #ffffff;" scope="col"></th>
                                      
                                    </tr>
                                  </thead>
                                  @foreach($tareas as $tarea)
                                    <form action="{{route('prototarea.store')}}" method="POST">
                                      @csrf
                                       
                                        <tbody>
                                              <tr STYLE="color: #c12a2a; font-family: Times New Roman;  font-size: 14px; ">
                                                <input type="hidden" name="Selector" value="BorrarTarea" readonly >
                                                <input type="hidden" name="proto_id" value={{$protocolo->id}} readonly >
                                                <input type="hidden" name="tareaBorrar_id" value={{$tarea->id}} readonly >
                                                <th>{{ $tarea->codigo }}</th>
                                                <td>{{ $tarea->descripcion}}</td>
                                                <td> <button class="bi bi-trash3-fill btn btn-link"  type="submit" ></button></td>
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
            </div>
          </div>
            <br>
               <div class="form-group">
                   <button form="encabezado" class="btn btn-primary" type="submit" STYLE="background: linear-gradient(to right,#495c5c,#030007);">Enviar</button>
               </div>
               <br>   
              </div>             
</section>
 
{{-- $$$$$$$$$$$$$$$$$$$$$$  Segundo grupo de  formularios $$$$$$$$$$$$$$$ --}}
<br>

<section class="main row ">
  <div class="container">
    <div class="card" STYLE="background: linear-gradient(to right,#495c5c,#030007);" >
     <br>
     <br>
     <div class="container ">
      
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
                        
                        <td style="text-align: right;"><button class="btn btn-primary" type="submit" type="submit" STYLE="background: linear-gradient(to right,#495c5c,#030007);">Agregar</button> </td>
                        
                      </tr>
                </table>
            </form>
        </div> 
      </div> 
    </div> 
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


