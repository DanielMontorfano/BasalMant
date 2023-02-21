{{-- @extends('layouts.plantilla') --}}

@extends('adminlte::page')
@section('title', 'create')
@section('content_header')
<h6 STYLE="text-align:center; font-size: 30px;
background: -webkit-linear-gradient(rgb(1, 103, 71), rgb(239, 236, 217));
-webkit-background-clip: text;
-webkit-text-fill-color: transparent;">Crear un nuevos repuestos</h6>
@stop
@section('content')

<style>
    h6 {
        text-align:center; font-size: 30px;
                        background: -webkit-linear-gradient(rgb(1, 103, 71), rgb(239, 236, 217));
                        -webkit-background-clip: text;
                        -webkit-text-fill-color: transparent;

    }

    .form-control { 
        
         color: #f2baa2;
         font-family: Times New Roman;
         font-size: 18px;
         background: linear-gradient(to right,#030007, #495c5c);}

   
  
</style>
<br>    
<div class="container"> {{-- container principal --}}
    <div class="row"> {{-- row principal --}}
                <div class="col col-md-2">
                    {{-- columna1 --}}
                </div>

                <div class="col col-md-8">
                    {{-- columna2 --}}
                    
                    <form id="nuevoRepuesto"  action="{{route('repuestos.store')}}" method="POST" class="form-horizontal" STYLE="background: linear-gradient(to right,#495c5c,#030007);">
                        @csrf  {{-- Envía un token de seguridad. Siempre se debe poner!!! sino no funca --}}
                        <div class="p-3 mb-2  text-white">
                        <div class="container">
                            
                            <div class="row"> {{-- ***** div de la primera fila --}}
                              
                              <div class="col col-md-3"> {{-- ***** div de la primera fila --}}
                                <div class="form-group">
                                  <label class="control-label" for="codigo">Código:</label> 
                                  <input  name="codigo" autofocus  autocomplete="off" placeholder="Ej.: 6914 0035" class="form-control" style="color: #f2baa2;" type="text" value="{{ old('codigo') }}"> 
                                  @error('codigo')
                                 <small>*{{$message}}</small>
                                  @enderror
                                </div>
                              </div> 
                              <div class="col col-md-9"> {{-- ***** div de la primera fila --}}
                                <div class="form-group">
                                  <label class="control-label" for="descripcion">Descripción:</label> 
                                  <input autocomplete="off"  class="form-control" style="color: #f2baa2;" type="text" name="descripcion" value="{{old('descripcion')}}"> 
                                  @error('descripcion')
                                 <small>*{{$message}}</small>
                                  @enderror
                                </div>
                              </div>
                              
                            </div> {{-- ***** div de la primera fila --}}
                            
                                

                            
                            <br>
                           <div class="form-group">
                            {{-- Boton no visible --}}
                            <button form="nuevoRepuesto" class="btn btn-primary" type="submit" STYLE="display: none; background: linear-gradient(to right,#495c5c,#030007);">Enviar</button> 
                            </div>
                            
                            <table class="table">
                              <h5>Ultimos repuestos creados:</h5>
                              
                             
                              <tbody>
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
                <div class="col col-md-2">
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



