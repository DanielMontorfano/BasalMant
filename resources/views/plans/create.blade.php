
{{-- @extends('layouts.plantilla') --}}
@extends('adminlte::page') 
@section('title', 'create')
@section('content')

<style>
    h6 {
        text-align:center; font-size: 60px;
                        background: -webkit-linear-gradient(rgb(1, 103, 71), rgba(228, 9, 9, 0.671));
                        -webkit-background-clip: text;
                        -webkit-text-fill-color: transparent;

    }

    .input { color: #f2baa2;
         font-family: Times New Roman;
         font-size: 18px;
         background: linear-gradient(to right,#030007, #495c5c);

    }
    
    .container { color: #f3efedd1;
         font-family: Arial;
         font-size: 14px;
        /*  background: linear-gradient(to right,#f5f8f8fd, #495c5c); */
       

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
                    <h6>Nuevo Plan</h6>
                    <form id="nuevoPlan"  action="{{route('plans.store')}}" method="POST" class="form-horizontal" STYLE="background: linear-gradient(to right,#495c5c,#030007);">
                    
                    @csrf  {{-- Envía un token de seguridad. Siempre se debe poner!!! sino no funca --}}
                    <div class="p-3 mb-2  text-white">
                        <div class="container">
                              <div class="row"> {{-- ***** div de la primera fila --}}
                              <div class="col col-md-3">
                                <div class="form-group">
                                  <label class="control-label" for="codigo">Codigo:</label> 
                                  <input maxlength="10" minlength="10" autocomplete="off" class="form-control" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);" type="text" name="codigo" value={{old('codigo')}}> 
                                  @error('codigo')
                                  <small>*{{$message}}</small>
                                  @enderror
                                </div>
                              </div> 

                              <div class="col col-md-5">
                                <div class="form-group">
                                  <label class="control-label" for="descripcion">Nombre:</label> 
                                  <input autocomplete="off" class="form-control" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);"  type="text" name="nombre" value={{old('nombre')}}> 
                                  @error('nombre')
                                 <small>*{{$message}}</small>
                                  @enderror
                                </div>
                              </div>

                              <div class="col col-md-2">
                                <div class="form-group">
                                  <label class="control-label" for="frcuencia">Frecuencia:</label> 
                                  <input autocomplete="off" class="form-control" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);"  type="text" name="frecuencia" value={{old('frecuencia')}}> 
                                  @error('frecuencia')
                                 <small>*{{$message}}</small>
                                  @enderror
                                </div>
                              </div> 
 
                              <div class="col col-md-2">
                                <div class="form-group">
                                  <label class="control-label" for="unidad">Unidad:</label> 
                                  <select name="unidadSelect" class="form-control"   STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);" value="{{old('unidad')}}">
                                    <option value=""></option> 
                                  <option value="Días">Días</option> 
                                  <option value="Meses">Meses</option> 
                                  <option value="Años">Años</option> 
                                   
                                  </select>
                                  @error('unidad')
                                  <small>*{{$message}}</small>
                                  @enderror
                                </div>
                               </div>
                            </div> {{-- ***** div de la primera fila --}}

                            <div class="row"> {{-- ***** div de la segunda fila --}}
                              <div class="col col-md-12">
                                <div class="form-group">
                                  <label class="control-label" for="descripcion">Descripción:</label> 
                                  <input autocomplete="off" class="form-control" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);"  type="text" name="descripcion" value={{old('descripcion')}}> 
                                  @error('descripcion')
                                 <small>*{{$message}}</small>
                                  @enderror
                                </div>
                              </div> 
                            </div> {{-- ***** div de la segunda fila --}}  
                              
                              
                            <br>
                            <br>
                           <div class="form-group">
                            <button form="nuevoPlan" class="btn btn-primary" type="submit" STYLE="background: linear-gradient(to right,#495c5c,#030007);">Enviar</button>
                            <p style="text-align: right;"><a  class="text-white " href={{route('plans.index')}}>Salir</a></p> 
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



