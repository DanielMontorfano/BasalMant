@extends('adminlte::page')
@section('title', 'O.d.T')
@section('content_header')
@include('layouts.partials.menuEquipo')
@stop
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

    .text-danger {
        color: red; /* Cambia el color del texto a rojo */
    }
</style>

<br>    
<div class="container"> {{-- container principal --}}
  <h6>Cerrar O.d.T-{{$ot->id}} sobre:  {{$equipo->codEquipo}}</h6>
    <div class="row"> {{-- row principal --}}
                <div class="col col-md-2">
                    {{-- columna1 --}}
                </div>

                <div class="col col-md-8">
                    {{-- columna2 --}}
                    <br>
                    <form id="cerrarOrden"  action="{{route('ordentrabajo.update', $ot->id)}}" method="POST" class="form-horizontal" STYLE="background: linear-gradient(to right,#495c5c,#030007);">
                        
                        @csrf  {{-- Envía un token de seguridad. Siempre se debe poner!!! sino no funca --}}
                        {{-- Metodo PUT no existe en html, por eso indicamos a laravel como sigue --}}
                        @method('put')

                      
                        <div class="p-3 mb-2  text-white">
                        <div class="container">
                            
                            <div class="row"> {{-- ***** div de la primera fila --}}
                              <div class="col col-md-6">
                                <div class="form-group">
                                  <label class="control-label" for="solicitante">Solicitante:</label> 
                                  <input autocomplete="off" class="form-control" readonly disabled="true" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);" type="text" name="solicitante" placeholder="{{$ot->solicitante}}" value=""> 
                                  
                                  @error('solicitante')
                                  <small class="text-danger">*{{$message}}</small>
                                  @enderror
                                </div>
                              </div> 
                              
                              <div class="col col-md-6">
                                <div class="form-group">
                                  <label class="control-label" for="aprobadoPor">Aprobado por:</label> 
                                  @if ($ot->estado=='Abierta')

                                  {{-- <input   autocomplete="off" class="form-control" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);"  type="text" name="aprobadoPor" value={{$ot->aprobadoPor}}>  --}}
                                  <input id="aprobadoPor" name="aprobadoPor" value="{{ $aprobadoPor->name }}" style="color: #f2baa2; font-family: Times New Roman; font-size: 18px; background: linear-gradient(to right,#030007, #495c5c); border: 1px solid #f2baa2; border-radius: 4px; width: 100%; height: 39px;" readonly>
                               
                                  @else 
                                  <input   autocomplete="off" class="form-control" readonly disabled="true" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);"  type="text" name="aprobadoPor" value={{$ot->aprobadoPor}}> 
                                  @endif

                                  @error('aprobadoPor')
                                  <small class="text-danger">*{{$message}}</small>
                                  @enderror
                                </div>
                            </div>
                            </div> {{-- ***** div de la primera fila --}}
                            <div class="row"> {{-- ****** div de la segunda fila --}}
                                <div class="col col-md-6">
                                    <div class="form-group">
                                      <label class="control-label" for="fechaNecesidad	">Fecha de necesidad:</label> 
                                      <input autocomplete="off" class="form-control datepicker" readonly disabled="true" STYLE="color: #878585; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);"  type="date" name="fechaNecesidad" value={{$ot->fechaNecesidad}}> 
                                      @error('fechaNecesidad	')
                                      <small class="text-danger">*{{$message}}</small>
                                      @enderror
                                    </div>
                                </div>
                                <div class="col col-md-6">
                                    <div class="form-group">
                                      <label class="control-label" for="fechaEntrega">Fecha de entrega:</label> 
                                      @if ($ot->estado=='Abierta')
                                      <input autocomplete="off" class="form-control" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);"  type="date" name="fechaEntrega" value="{{$ot->fechaEntrega}}"> 
                                      @else
                                      <input autocomplete="off" class="form-control" readonly disabled="true" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);"  type="date" name="fechaEntrega" value="{{$ot->fechaEntrega}}"> 
                                      @endif
                                      @if ($errors->has('fechaEntrega'))
                                      <div class="alert alert-danger">{{ $errors->first('fechaEntrega') }}</div>
                                      @endif
                                    </div>
                                </div>
                            </div> {{-- ****** div de la segunda fila --}}
                            <div class="row"> {{-- ****** div de la tercera fila --}}
                                <div class="col col-md-6">
                                    <div class="form-group">
                                      <label class="control-label" for="asignadoA">Trabajo asignado a:</label> 
                                      <input autocomplete="off" class="form-control" readonly disabled="true" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);" type="text" name="asignadoA" placeholder="{{$ot->asignadoA}}" value="">   {{-- old() mantiene en campo con el dato--}}
                                      @error('asignadoA')
                                      <small class="text-danger">*{{$message}}</small>
                                      @enderror
                                    </div>
                                  </div>
                  
                                  <div class="col col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="realizadoPor">Realizado por:</label> 
                                        @if ($ot->estado=='Abierta')
                                        <input 
                                            autocomplete="off" 
                                            class="form-control" 
                                            STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);"
                                            type="text" 
                                            name="realizadoPor" 
                                            value="{{ old('realizadoPor', $ot->realizadoPor) }}"> {{-- old() mantiene el valor en el campo cuando la validación falla --}}
                                
                                        @else
                                        <input 
                                            autocomplete="off" 
                                            class="form-control" 
                                            readonly 
                                            disabled="true" 
                                            style="color: #f2baa2; font-family: Times New Roman; font-size: 18px; background: linear-gradient(to right, #030007, #495c5c);" 
                                            type="text" 
                                            name="realizadoPor" 
                                            value="{{ $ot->realizadoPor }}">
                                        @endif
                                
                                        @error('realizadoPor') {{-- Muestra el mensaje de error si hay algún problema de validación --}}
                                        <small  class="text-danger">*{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                
                            </div> {{-- ****** div de la tercera fila --}}
                            <div class="row"> {{-- ****** div de la 4ta fila   --}}  
                              <div class="col col-md-6">
                                <div class="form-group">
                                  <label class="control-label" for="realizadoPor	">Prioridad:</label> 
                                  <input readonly disabled="true" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);" autocomplete="off" class="form-control" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);" type="text" name="prioridad" placeholder="{{$ot->prioridad}}" value="">   {{-- old() mantiene en campo con el dato--}}
                                  @error('prioridad')
                                  <small class="text-danger"> {{$message}}</small>
                                  @enderror
                                </div>
                              </div> 
                  
                                  <div class="col col-md-6">
                                    <div class="form-group">
                                      <label class="control-label" for="fechaAprobado"> Fecha de aprobado:</label> 
                                      @if ($ot->estado=='Abierta')
                                      <input autocomplete="off" class="form-control" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);" type="date" name="fechaAprobado" value={{$ot->fechaAprobado}}>   {{-- old() mantiene en campo con el dato--}}
                                      @else
                                      <input autocomplete="off" class="form-control" readonly disabled="true" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);" type="date" name="fechaAprobado" value={{$ot->fechaAprobado}}>   {{-- old() mantiene en campo con el dato--}}
                                      @endif
                                      @error('fechaAprobado') {{--el 2do parametro de old es para mantener la mificacion cuando la validacion falla--}}
                                      <small class="text-danger"> {{$message}}</small>
                                      @enderror
                                      </div>
                                  </div>
                           </div> {{-- ****** div de la 4ta fila --}}    
                           <div class="row"> {{-- ****** div de la 5ta fila   --}}    
                                <div class="col col-md-12">
                                  <div class="form-group">
                                    <label class="control-label" for="det1"> Descripción de la solicitud:</label> 
                                    <textarea  disabled class="form-control" name="det1" id="det1" rows="3" value="">{{$ot->det1}}</textarea> 
                                    @error('det1')
                                    <small class="help-block">***{{$message}}</small>
                                    <br>
                                    <br>
                                    @enderror
                                  </div>
                                </div>
                           </div> {{-- ****** div de la 5ta fila --}}    
                           
                           <div class="row"> {{-- ****** div de la 6ta fila   --}}    
                            <div class="col col-md-12">
                              <div class="form-group">
                                <label class="control-label" for="det2"> Descripción del trabajo realizado:</label> 
                                @if ($ot->estado=='Abierta')
                                <textarea   class="form-control" name="det2" id="det2" rows="3">{{$ot->det2}}</textarea> 
                                @else
                                <textarea disabled class="form-control" name="det2" id="det2" rows="3">{{$ot->det2}}</textarea> 
                                @endif
                                @error('det2')
                                <small class="text-danger"> {{$message}}</small>
                                @enderror
                              </div>
                            </div>
                           </div> {{-- ****** div de la 6ta fila --}}    
                           
                           <div class="row"> {{-- ****** div de la 7ma fila   --}}    
                            <div class="col col-md-12">
                              <div class="form-group">
                                <label class="control-label" for="det3"> Explicación del trabajo incompleto:</label> 
                                @if ($ot->estado=='Abierta')
                                <textarea class="form-control" name="det3" id="det3" rows="3">{{$ot->det3}}</textarea> 
                                @else
                                <textarea disabled class="form-control" name="det3" id="det3" rows="3">{{$ot->det3}}</textarea>
                                @endif
                                @error('det3')
                                <small class="text-danger"> {{$message}}</small>
                                @enderror
                              </div>
                            </div>
                           </div> {{-- ****** div de la 7ma fila --}}    




                            <br>
                            <br>
                           
                          <div class="row">
                                  <div class="col-sm-4">
                                  </div>
                                  <div class="col-sm-4">
                                        <div class="form-group">
                                          <input type="hidden" name="ot_id" value={{$ot->id}} readonly >
                                          <input type="hidden" name="equipo_id" value={{$equipo->id}} readonly >
                                          @if ($ot->estado=='Abierta')
                                          <button form="cerrarOrden" class="btn btn-primary" type="submit" STYLE="background: linear-gradient(to right,#495c5c,#030007);">Liberar orden</button>
                                          </button>
                                          @else
                                        
                                          <small class="text-danger">Esta orden ya fue cerrada</small>
                                          @endif

                                        </div>
                                  </div>  
                                  <div class="col-sm-4">
                                        <p style="text-align: right;"><a  class="text-white " href ='{{route('ordentrabajo.list', $equipo->id)}}'> Salir >></a></p>
                                  </div>
                            </div> {{-- div de ROw --}} 

                        </div>{{-- div del container dentro de columna 2 --}}    
                        </div>{{-- div del Letra blanca --}}
                              
                    </form>
                    
                    </div>
                <div class="col col-md-2">
                    {{-- columna 3 --}}
                </div>
    </div>  {{-- div del row1 Principal --}}
</div> {{-- div del container Principal--}}


<div class="container"> 
  @include('layouts.partials.footer')
</div>

@endsection

@section('js')
<script>

document.addEventListener('DOMContentLoaded', function() {
  const form = document.getElementById('cerrarOrden');
  form.addEventListener('submit', function(event) {
      // Solo si hay errores
      if (form.querySelector('.text-danger')) {
          event.preventDefault(); // Evita el envío del formulario
          const firstError = form.querySelector('.text-danger');
          firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
      }
  });
});
</script>

@endsection


