{{-- @extends('layouts.plantilla') --}}
@extends('adminlte::page') 
@section('title', 'Edit')
@section('content_header')
@include('layouts.partials.menuEquipo')
@stop
@section('content')

<style>
    
    h6 {
        text-align:center; font-size: 40px;
                        background: -webkit-linear-gradient(#243B55, #a1a7b0);
                        -webkit-background-clip: text;
                        -webkit-text-fill-color: transparent;
                        

    }
    .form-control { color: #f2baa2;
         font-family: Times New Roman;
         font-size: 14px;
         background: linear-gradient(to right,#021c31, #2c2d2d);

    }
</style>



<br><h6>Pendiente</h6>
    <div class="row"> {{-- row principal --}}
                <div class="col col-md-1">
                    {{-- columna1 --}}
                </div>

                <div class="col col-md-10">
                  
                    {{-- columna2 --}}
                    
                    <form id="pendienteEdit"  action="{{route('equipoplansejecut.update', $equipoplanejecut->id)}}" method="POST" class="form-horizontal" style="background: linear-gradient(to right,#243B55,#a1a7b0);">
                      @csrf  {{-- Envía un token de seguridad. Siempre se debe poner!!! sino no funca --}}
                        @method('put')
                         
                        <div class="p-3 mb-2  text-white">
                        <div class="container">
                            <div class="row"> {{-- ***** div de la primera fila --}}
                              <div class="col col-md-12">
                                <div class="form-group">
                                  <label class="control-label" for="pendiente">Pendiente:</label> 
                                  <input readonly maxlength="11" minlength="11" autocomplete="off" class="form-control"  type="text" name="codigo" value="{{old('pendiente', $equipoplanejecut->pendiente)}}"> 
                                  @error('pendiente')
                                  <small>*{{$message}}</small>
                                  @enderror
                                </div>
                              </div> 
                            </div> {{-- ***** div de la primera fila --}}
                            
                            <div class="row"> {{-- ***** div de la segunda fila --}}
                              <div class="col col-md-7">
                                <div class="form-group">
                                  <label class="control-label" for="solución">Solución:</label> 
                                  <input readonly maxlength="11" minlength="11" autocomplete="off" class="form-control"  type="text" name="codigo" value="{{old('pendiente', $equipoplanejecut->pendiente)}}"> 
                                  @error('solucion')
                                  <small>*{{$message}}</small>
                                  @enderror
                                </div>
                              </div>
                               
                              <div class="col col-md-2">
                                <div class="form-group">
                                  <label class="control-label" for="corregido">&nbsp;</label> 
                                  <br>
                                  <a href="{{route('ordentrabajo.createorden', $equipo->id)}}" class="btn btn-primary">Corregido</a>
                                </div>
                              </div> 
                              <div class="col col-md-3">
                                <div class="form-group">
                                  <label class="control-label" for="genero">&nbsp;</label> 
                                  <br>
                                  <button id="generar-odt-btn" class="btn btn-primary generar-odt-btn" type="button" style="background: linear-gradient(to right,#495c5c,#030007);">Se generó O.d.T.</button>

                                </div>
                              </div> 
                               


                              <div class="col col-md-3">
                                <div class="form-group">
                                  <label class="control-label" for="genero">&nbsp;</label>
                                  <br>
                                  
                                  <select id="odt-select" class="form-control" style="display:none;"></select>
                                </div>
                              </div>
                              

 
                              <div class="col-md-12">
                                <div class="d-flex justify-content-end">
                                  <a href="{{ route('tareas.index') }}" class="btn btn-primary ml-auto">Salir</a>
                                </div>
                              </div>
                              
                            


                                                        

                            <br>
                            <br>
                           
                          
                         
                          <div class="form-group">
                            <button form="pendienteEdit" class="btn btn-primary" type="submit" STYLE="display: none; background: linear-gradient(to right,#495c5c,#030007);">Corregir</button>
                          </div>
                           
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

<script>
  var odtSelect = document.getElementById("odt-select");
  var generarOdtBtn = document.querySelector(".generar-odt-btn");

  generarOdtBtn.addEventListener("click", function() {
    // Simulamos la obtención de datos del servidor
    var data = ["ODT-001", "ODT-002", "ODT-003"];

    // Llenamos el select con las opciones obtenidas
    odtSelect.innerHTML = "";
    data.forEach(function(value) {
      var option = document.createElement("option");
      option.text = value;
      odtSelect.add(option);
    });

    // Mostramos el select
    odtSelect.style.display = "block";
  });
</script>

@endsection


