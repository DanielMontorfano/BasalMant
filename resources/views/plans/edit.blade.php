@extends('adminlte::page') 
@section('title', 'Edit')
@section('content_header')
@include('layouts.partials.menuPlanes')
@stop
@section('css')
{{--  EL MEJOR EJEMPLO DE LA PAGINA DE jquery-ui (https://jqueryui.com/autocomplete/) !!! --}}
<link rel="stylesheet" href="{{asset('jquery-ui/jquery-ui.min.css')}}"> 
<script src="{{asset('jquery/dist/jquery.js')}}"></script>
<script src="{{asset('jquery-ui/jquery-ui.min.js')}}"></script>

@endsection

 
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


<section class="main row ">
         {{-- Probando Col --}}
          <div class="container">
            <br>
            <h6>Editar plan</h6>
            <br>
            <div class="row">
              <div class="col col-md-2">
                {{-- Columna 1 --}}
              </div>
              <div class="col col-md-8">
                {{-- Columna2 --}}
                <form id="encabezado" action="{{route('plans.update', $plan->id)}}" method="POST" class="form-horizontal" STYLE="background: linear-gradient(to right,#495c5c,#030007);">
                  
                  @csrf  {{-- Envía un token de seguridad. Siempre se debe poner!!! sino no funca --}}
                  @method('put') {{-- Metodo PUT no existe en html, por eso indicamos a laravel como sigue --}}
                  
                  <div class="p-3 mb-2 text-white">
      
                    <div class="container">
                      <div class="row">
                        <div class="col col-md-3">
                          <div class="form-group">
                            <label class="control-label" for="codigo">Código:</label> 
                            <input maxlength="11" minlength="11" autocomplete="off" class="form-control" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);"  type="text" name="codigo" value="{{old('codigo', $plan->codigo)}}"> 
                            @error('codigo')
                            <small>*{{$message}}</small>
                            @enderror
                          </div>
                        </div>

                        <div class="col col-md-5">
                          <div class="form-group">
                            <label class="control-label" for="descripcion">Nombre/Alcance:</label> 
                            <input autocomplete="off" class="form-control" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);"  type="text" name="nombre" value={{old('nombre', $plan->nombre)}}> 
                            @error('nombre')
                           <small>*{{$message}}</small>
                            @enderror
                          </div>
                        </div>

                        <div class="col col-md-2">
                          <div class="form-group">
                            <label class="control-label" for="frcuencia">Frecuencia:</label> 
                            <input autocomplete="off" class="form-control" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);"  type="text" name="frecuencia" value={{old('frecuencia', $plan->frecuencia)}}> 
                            @error('frecuencia')
                           <small>*{{$message}}</small>
                            @enderror
                          </div>
                        </div> 

                        <div class="col col-md-2">
                          <div class="form-group">
                            <label class="control-label" for="unidad">Unidad:</label> 
                            <select name="unidadSelect" class="form-control"   STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);" value="{{old('unidad', $plan->unidad)}}">
                            <option value="{{$plan->unidad}}">{{$plan->unidad}}</option> 
                            <option value="Días">Días</option> 
                            <option value="Meses">Meses</option> 
                            <option value="Años">Año</option> 
                             
                            </select>
                            @error('unidad')
                            <small>*{{$message}}</small>
                            @enderror
                          </div>
                         </div>
                      </div> {{-- ***** div de la primera fila --}}
                        <div class="col col-md-12">
                          <div class="form-group">
                            <label class="control-label " for="descripcion">Descripción:</label>
                            <input autocomplete="off" class="form-control" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);" type="text" name="descripcion" value="{{old('descripcion', $plan->descripcion)}}" placeholder="Código de plan"> {{-- old() mantiene en campo con el dato--}}
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
                          <table class="table" STYLE="background: linear-gradient(to right,#495c5c,#030007);">
                                 <thead>
                                    <tr>
                                      <th style="text-align: center; color: #ffffff;" scope="col">Código</th>
                                      <th style="text-align: center; color: #ffffff;" scope="col">Descripción</th>
                                      <th style="text-align: center; color: #ffffff;" scope="col"></th>
                                      
                                    </tr>
                                  </thead>
                                  @foreach($protocolos as $protocolo)
                                    <form action="{{route('planproto.store')}}" method="POST">
                                      @csrf
                                       
                                        <tbody>
                                              <tr>
                                                <input type="hidden" name="Selector" value="BorrarProto" readonly >
                                                <input type="hidden" name="plan_id" value={{$plan->id}} readonly >
                                                <input type="hidden" name="protoBorrar_id" value={{$protocolo->id}} readonly >
                                                <th STYLE="color: #ffffff; font-family: Times New Roman;  font-size: 14px; "scope="row">{{ $protocolo->codigo }}</th>
                                                <td STYLE="color: #ffffff; font-family: Times New Roman;  font-size: 14px; ">{{ $protocolo->descripcion}}</td>
                                                                                              
                                                <td STYLE="color: #ffffff; font-family: Times New Roman;  font-size: 14px; ">  <button class="bi bi-trash3-fill btn btn-link"  type="submit" ></button></td>
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
            <br>
            <div class="form-group">
            <button form="encabezado" class="btn btn-primary" type="submit" STYLE="background: linear-gradient(to right,#495c5c,#030007);">Enviar</button>
          </div>
           
                
                         
</section>
 
{{-- $$$$$$$$$$$$$$$$$$$$$$  Segundo grupo de  formularios $$$$$$$$$$$$$$$ --}}
<br>

<section class="main row ">
  <div class="container" STYLE="background: linear-gradient(to right,#495c5c,#030007);">
    <h6 STYLE="text-align:center; font-size: 30px;
                      background: -webkit-linear-gradient(rgb(1, 103, 71), rgb(239, 236, 217));
                      -webkit-background-clip: text;
                      -webkit-text-fill-color: transparent;">Adjuntar</h6>
    
    
      
       
    
          
      <br>
            <form action="{{route('planproto.store')}}" method="POST" class="form-horizontal" >
              @csrf
              <input type="hidden" name="Selector" value="Agregarproto" readonly >
              <input type="hidden" name="plan_id" value={{$plan->id}} readonly >
                  <table class="table table-sm" STYLE="background: linear-gradient(to right,#495c5c,#030007);" >
                    <tr>
                        <td><input class='form-control' name="search" id="search" autocomplete="off" placeholder="Buscar: Ej. PDM-000000254" class="form-control" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);"> </td>
                        
                        <td style="text-align: right;"><button class="btn btn-primary" type="submit" type="submit" STYLE="background: linear-gradient(to right,#495c5c,#030007);">Agregar</button> </td>
                        
                      </tr>
                </table>
            </form>
     
    </div>
  
</section>







<script>
      $( "#search" ).autocomplete({
      source: function(request, response){
        
              $.ajax({
              url:"{{route('search.protocolos')}}",   //ruta que se debe definir en web
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


