{{-- @extends('layouts.plantilla') --}}
@extends('adminlte::page') 
@section('title', 'Edit')


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

<br>    
<h6>Editar Repuesto</h6>
<br>
    <div class="row"> {{-- row principal --}}
                <div class="col col-md-1">
                    {{-- columna1 --}}
                </div>

                <div class="col col-md-10">
                    {{-- columna2 --}}
                    
                    <form id="nuevoRepuesto"  action="{{route('repuestos.update', $repuesto->id)}}" method="POST" class="form-horizontal" STYLE="background: linear-gradient(to right,#495c5c,#030007);">
                        
                      
                        @csrf  {{-- Envía un token de seguridad. Siempre se debe poner!!! sino no funca --}}
                        @method('put')
                      
                        <div class="p-3 mb-2  text-white">
                        
                        </div>
                        <div class="container">
                            
                            <div class="row"> {{-- ***** div de la primera fila --}}
                              <div class="col col-md-2">
                                <div class="form-group">
                                  <label class="control-label" for="codigo">Codigo:</label> 
                                  <input readonly class="form-control" name="codigo" maxlength="9" minlength="9" autocomplete="off" STYLE="padding: 7px; color: #f2baa2; font-family: Times New Roman;  font-size: 14px; background: linear-gradient(to right,#030007, #495c5c);" value="{{old('codigo', $repuesto->codigo)}}">
                                  
                                  @error('codigo')
                                  <small>*{{$message}}</small>
                                  @enderror
                                </div>
                              </div> 
                              <div class="col col-md-10">
                                <div class="form-group">
                                  <label class="control-label" for="marca">Descripción:</label> 
                                  <input  autocomplete="off" class="form-control" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 14px; background: linear-gradient(to right,#030007, #495c5c);"  type="text" name="descripcion" value="{{old('descripcion', $repuesto->descripcion)}}"> 
                                  @error('descripcion')
                                 <small>*{{$message}}</small>
                                  @enderror
                                </div>
                              </div> 
                            
                              </div> {{-- ***** div de la primera fila --}}
                            
                                

                            <br>
                            <br>
                           <div class="form-group">
                            <button form="nuevoRepuesto" class="btn btn-primary" type="submit" STYLE="display: none;background: linear-gradient(to right,#495c5c,#030007);">Enviar</button>
                        
                          </div>
                          
                          <table class="table">
                            <tbody>
                              <tr>
                                <td class="col-2">{{ $repuesto->codigo }}</td>
                                <td class="col-10">{{ $repuesto->descripcion }}</td>
                              </tr>
                              @foreach ($ultimosRepuestos as $repuesto)
                              <tr>
                                <td class="col-2">{{ $repuesto->codigo }}</td>
                                <td class="col-10">{{ $repuesto->descripcion }}</td>
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                          <p style="text-align: right;"><a  class="text-white " href={{route('repuestos.index')}}>Salir</a></p> 
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

<div class="container"> 
  @include('layouts.partials.footer')
</div>
@endsection


