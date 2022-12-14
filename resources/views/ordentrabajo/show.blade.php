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
<div class="card-header" STYLE="background: linear-gradient(to right,#201f1e,#030007);">
  <ul class="nav nav-tabs card-header-tabs">
    <li class="nav-item">
      <a class="nav-link" href="{{route('equipos.show', $equipo->id)}}">Ficha</a>
     
    </li>
   
    <li class="nav-item">
      <a class="nav-link" href="{{route('fotos.show', $equipo->id)}}">Fotos</a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{route('historialPreventivo', $equipo->id)}}">Historial</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{route('equipos.index')}}">Protocolo</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href={{route('equipoTareash.show', $equipo->id)}}>Plan</a>
    
    <li class="nav-item">
      <a class="nav-link" href="{{route('documentos.show', $equipo->id)}}">Documentos</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href={{route('equipos.edit', $equipo->id)}}>Editar</a>
    </li>
    <li class="nav-item">
      <a  class="nav-link active" aria-current="true"  style="background-color: #1e2020;" href={{route('ordentrabajo.list', $equipo->id)}}>OT</a>
    </li>
    
    <li class="nav-item">
      <a class="nav-link" href="{{route('equipos.index')}}">Descargar</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{route('imprimirEquipo',$equipo->id )}}">Imprimir</a>
    </li>
    

  </ul>
</div>




<br>    
<div class="container"> {{-- container principal --}}
    <div class="row"> {{-- row principal --}}
                <div class="col col-md-2">
                    {{-- columna1 --}}
                </div>

                <div class="col col-md-8">

                  <div class="dropdown">
                    <a title="Reportes" class=" fa-solid fa-solid fa-print btn btn-success dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                          <a class="dropdown-item" href="{{ route('imprimirOrden', $ot->id) }}">Imprimir orden</a>
                          
                        </div>
                  </div>
                  <br>


                    {{-- columna2 --}}
                    
                    <form id="cerrarOrden"  action="{{route('ordentrabajo.update', $ot->id)}}" method="POST" class="form-horizontal" STYLE="background: linear-gradient(to right,#495c5c,#030007);">
                        <br>
                        <h6>O.d.T para:  {{$equipo->codEquipo}}</h6>
                        @csrf  {{-- Env??a un token de seguridad. Siempre se debe poner!!! sino no funca --}}
                        {{-- Metodo PUT no existe en html, por eso indicamos a laravel como sigue --}}
                        @method('put')

                      
                        <div class="p-3 mb-2 bg-gradient-primary text-white">
                        <div class="container">
                            
                            <div class="row"> {{-- ***** div de la primera fila --}}
                              <div class="col col-md-6">
                                <div class="form-group ">
                                  <label class="control-label" for="solicitante">Solicitante:</label> 
                                  <input autocomplete="off" class="form-control " readonly disabled="true" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);" type="text" name="solicitante" placeholder="{{$ot->solicitante}}" value=""> 
                                  @error('solicitante')
                                  <small>*{{$message}}</small>
                                  @enderror
                                </div>
                              </div> 
                              
                              <div class="col col-md-6">
                                <div class="form-group">
                                  <label class="control-label" for="aprobadoPor">Aprobado por:</label> 
                                  <input   autocomplete="off" class="form-control" readonly disabled="true"  STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);"  type="text" name="aprobadoPor" placeholder="{{$ot->aprobadoPor}}" value=""> 
                                  @error('aprobadoPor')
                                  <small>*{{$message}}</small>
                                  @enderror
                                </div>
                            </div>
                            </div> {{-- ***** div de la primera fila --}}
                            <div class="row"> {{-- ****** div de la segunda fila --}}
                                <div class="col col-md-6">
                                    <div class="form-group">
                                      <label class="control-label" for="fechaNecesidad	">Fecha de necesidad:</label> 
                                      <input autocomplete="off" class="form-control datepicker" readonly disabled="true" STYLE="color: #7a7979; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);"  type="date" name="fechaNecesidad" value={{$ot->fechaNecesidad}}> 
                                      @error('fechaNecesidad	')
                                      <small>*{{$message}}</small>
                                      @enderror
                                    </div>
                                </div>
                                <div class="col col-md-6">
                                    <div class="form-group">
                                      <label class="control-label" for="fechaEntrega">Fecha de entrega:</label> 
                                      <input autocomplete="off" class="form-control" readonly disabled="true" STYLE="color: #7a7979; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);"  type="date" name="fechaEntrega" placeholder="{{$ot->fechaEntrega}}" value=""> 
                                      @error('fechaEntrega')
                                      <small>*{{$message}}</small>
                                      @enderror
                                    </div>
                                </div>
                            </div> {{-- ****** div de la segunda fila --}}
                            <div class="row"> {{-- ****** div de la tercera fila --}}
                                <div class="col col-md-6">
                                    <div class="form-group">
                                      <label class="control-label" for="asignadoA">Trabajo asignado a:</label> 
                                      <input autocomplete="off" class="form-control" readonly disabled="true" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);" type="text" name="asignadoA" placeholder="{{$ot->asignadoA}}" value="">   {{-- old() mantiene en campo con el dato--}}
                                      @error('asignadoA')
                                      <small>*{{$message}}</small>
                                      @enderror
                                    </div>
                                  </div>
                  
                                  <div class="col col-md-6">
                                    <div class="form-group">
                                      <label class="control-label" for="realizadoPor">Realizado por:</label> 
                                      <input autocomplete="off" class="form-control" readonly disabled="true"  STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);" type="text" name="realizadoPor" placeholder="{{$ot->realizadoPor}}" value="">   {{-- old() mantiene en campo con el dato--}}
                                      @error('realizadoPor') {{--el 2do parametro de old es para mantener la mificacion cuando la validacion falla--}}
                                      <small class="help-block">*{{$message}}</small>
                                      @enderror
                                      </div>
                                  </div>
                            </div> {{-- ****** div de la tercera fila --}}
                            <div class="row"> {{-- ****** div de la 4ta fila   --}}  
                              <div class="col col-md-6">
                                <div class="form-group">
                                  <label class="control-label" for="prioridad ">Prioridad:</label> 
                                  <input   autocomplete="off" class="form-control" readonly disabled="true" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);" type="text" name="prioridad" placeholder="{{$ot->prioridad}}" value="">   {{-- old() mantiene en campo con el dato--}}
                                  @error('prioridad')
                                  <small>*{{$message}}</small>
                                  @enderror
                                </div>
                              </div> 
                  
                                  <div class="col col-md-6">
                                    <div class="form-group">
                                      <label class="control-label" for="fechaAprobado"> Fecha de aprobado:</label> 
                                      <input autocomplete="off" class="form-control" readonly disabled="true" STYLE="color: #7a7979; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);" type="date" name="fechaAprobado" placeholder="{{$ot->fechaAprobado}}" value="">   {{-- old() mantiene en campo con el dato--}}
                                      @error('fechaAprobado') {{--el 2do parametro de old es para mantener la mificacion cuando la validacion falla--}}
                                      <small class="help-block">*{{$message}}</small>
                                      @enderror
                                      </div>
                                  </div>
                           </div> {{-- ****** div de la 4ta fila --}}    
                           <div class="row"> {{-- ****** div de la 5ta fila   --}}    
                                <div class="col col-md-12">
                                  <div class="form-group">
                                    <label class="control-label" for="det1"> Descripci??n de la solicitud:</label> 
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
                                <label class="control-label" for="det2"> Descripci??n del trabajo realizado:</label> 
                                <textarea  disabled class="form-control" name="det2" id="det2" rows="3">{{$ot->det2}}</textarea> 
                                @error('det2')
                                <small class="text-danger"> {{$message}}</small>
                                @enderror
                              </div>
                            </div>
                           </div> {{-- ****** div de la 6ta fila --}}    
                           
                           <div class="row"> {{-- ****** div de la 7ma fila   --}}    
                            <div class="col col-md-12">
                              <div class="form-group">
                                <label class="control-label" for="det3"> Explicaci??n del trabajo incompleto:</label> 
                                <textarea disabled class="form-control" name="det3" id="det3" rows="3">{{$ot->det3}}</textarea> 
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
                                          {{--  <button form="cerrarOrden" class="btn btn-primary" type="submit" STYLE="background: linear-gradient(to right,#495c5c,#030007);">cerrar orden</button> --}}
                                         
                                          </button>
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

@endsection



