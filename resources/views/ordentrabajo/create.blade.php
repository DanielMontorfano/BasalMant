@extends('adminlte::page')
@section('title', 'Ordenes de trabajo')
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
                    {{-- columna2 --}}
                    
                    <form id="nuevaOrden"  action="{{route('ordentrabajo.store')}}" method="POST" class="form-horizontal" STYLE="background: linear-gradient(to right,#495c5c,#030007);">
                        <br>
                        <h6>O.d.T para:  {{$equipo->codEquipo}}</h6>
                        @csrf  {{-- Envía un token de seguridad. Siempre se debe poner!!! sino no funca --}}
                        
                      
                        <div class="p-3 mb-2  text-white">
                        <div class="container">
                            
                            <div class="row"> {{-- ***** div de la primera fila --}}
                              <div class="col col-md-6">
                                <div class="form-group">
                                  <label class="control-label" for="solicitante">Solicitante:</label> 
                                  <input autocomplete="off" class="form-control" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);" type="text" name="solicitante" value={{old('solicitante')}}> 
                                  @error('solicitante')
                                  <small>*{{$message}}</small>
                                  @enderror
                                </div>
                              </div> 
                              
                              <div class="col col-md-6">
                                <div class="form-group">
                                  <label class="control-label" for="aprobadoPor">Aprobado por:</label> 
                                  <input Style="background-color: rgb(137, 138, 140);" readonly disabled="true" autocomplete="off" class="form-control" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);"  type="text" name="aprobadoPor" value={{old('aprobadoPor')}}> 
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
                                      <input autocomplete="off" class="form-control datepicker" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);"  type="date" name="fechaNecesidad" value={{old('fechaNecesidad')}}> 
                                      @error('fechaNecesidad	')
                                      <small>*{{$message}}</small>
                                      @enderror
                                    </div>
                                </div>
                                <div class="col col-md-6">
                                    <div class="form-group">
                                      <label class="control-label" for="fechaEntrega">Fecha de entrega:</label> 
                                      <input  Style="background-color: rgb(137, 138, 140);" readonly disabled="true" autocomplete="off" class="form-control" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);"  type="date" name="fechaEntrega" value={{old('fechaEntrega')}}> 
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
                                      <input autocomplete="off" class="form-control" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);" type="text" name="asignadoA" value={{old('asignadoA')}}>   {{-- old() mantiene en campo con el dato--}}
                                      @error('asignadoA')
                                      <small>*{{$message}}</small>
                                      @enderror
                                    </div>
                                  </div>
                  
                                  <div class="col col-md-6">
                                    <div class="form-group">
                                      <label class="control-label" for="realizadoPor	">Realizado por:</label> 
                                      <input Style="background-color: rgb(137, 138, 140);" readonly disabled="true" autocomplete="off" class="form-control" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);" type="text" name="realizadoPor	" value={{old('realizadoPor	')}}>   {{-- old() mantiene en campo con el dato--}}
                                      @error('realizadoPor	') {{--el 2do parametro de old es para mantener la mificacion cuando la validacion falla--}}
                                      <small class="help-block">*{{$message}}</small>
                                      @enderror
                                      </div>
                                  </div>
                            </div> {{-- ****** div de la tercera fila --}}
                            <div class="row"> {{-- ****** div de la 4ta fila   --}}  
                              <div class="col col-md-6">
                                <div class="form-group">
                                  <label class="control-label" for="prioridad">Prioridad:</label> 
                                    <select name="prioridad" class="form-select" aria-label="Default select example" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);">
                                    <option selected>Sin prioridad</option>
                                    <option value="Alta">Alta</option>
                                    <option value="Muy alta">Muy alta</option>
                                    <option value="Baja">Baja</option>
                                    </select>
                                  @error('prioridad')
                                  <small>*{{$message}}</small>
                                  @enderror
                                </div>
                              </div> 
                  
                                  <div class="col col-md-6">
                                    <div class="form-group">
                                      <label class="control-label" for="fechaAprobado"> Fecha de aprobado:</label> 
                                      <input Style="background-color: rgb(137, 138, 140);" readonly disabled="true" autocomplete="off" class="form-control" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);" type="date" name="fechaAprobado" value={{old('fechaAprobado')}}>   {{-- old() mantiene en campo con el dato--}}
                                      @error('fechaAprobado') {{--el 2do parametro de old es para mantener la mificacion cuando la validacion falla--}}
                                      <small class="help-block">*{{$message}}</small>
                                      @enderror
                                      </div>
                                  </div>
                           </div> {{-- ****** div de la 4ta fila --}}    
                           <div class="row"> {{-- ****** div de la 5ta fila   --}}    
                                <div class="col col-md-12">
                                  <div class="form-group">
                                    <label class="control-label" for="det1"> Descripción de la solicitud:</label> 
                                    <textarea  class="form-control" name="det1" id="det1" rows="3" value={{old('det1')}} ></textarea> 
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
                                <textarea Style="background-color: rgb(137, 138, 140);" readonly disabled="true" class="form-control" name="det2" id="exampleFormControlTextarea1" rows="3"></textarea> 
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
                                <textarea Style="background-color: rgb(137, 138, 140);" readonly  disabled="true" class="form-control" name="det3" id="exampleFormControlTextarea1" rows="3"></textarea> 
                                @error('det3')
                                <small class="text-danger"> {{$message}}</small>
                                @enderror
                              </div>
                            </div>
                           </div> {{-- ****** div de la 7ma fila --}}    




                            <br>
                            <br>
                           <div class="form-group">
                            <input type="hidden" name="equipo_id" value={{$equipo->id}} readonly >
                            <button form="nuevaOrden" class="btn btn-primary" type="submit" STYLE="background: linear-gradient(to right,#495c5c,#030007);">Crear orden</button>
                            <p style="text-align: right;"><a  class="text-white " href={{route('equipos.index')}}>Salir</a></p> 
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



