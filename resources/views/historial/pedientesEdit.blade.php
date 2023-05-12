{{-- @extends('layouts.plantilla') --}}
@extends('adminlte::page') 
@section('title', 'Edit')
@section('content_header')
  <head>
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  </head>

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

    
    .titulo-pendiente {
        text-align:center; 
        font-size: 40px;
        background: -webkit-linear-gradient(#243B55, #a1a7b0);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .input-control {
        color: #f2baa2;
        font-family: Times New Roman;
        font-size: 14px;
        background: linear-gradient(to right,#021c31, #2c2d2d);
        width: 70%;
    }


</style>


<br><h6 class="titulo-pendiente">Pendiente</h6>
    <div class="row"> {{-- row principal --}}
                <div class="col col-md-1">
                    {{-- columna1 --}}
                </div>

                <div class="col col-md-8">
                  
                    {{-- columna2 --}}
                    
                    <form id="pendienteEdit" action="{{route('equipoplansejecut.update', $equipoplanejecut->id)}}" method="POST" class="form-horizontal" style="background: linear-gradient(to right,#243B55,#a1a7b0); padding: 30px;">
                        @csrf
                        @method('put')
                        <div class="form-group">
                          <label for="pendiente">Pendiente:</label>
                          <input type="text" class="form-control form-control-sm input-control" id="pendiente" value="{{$equipoplanejecut->pendiente}}" readonly >
                        </div>
                        <div class="form-group">
                          <label for="solucion">Solución:</label><br>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="solucion" id="solucionA" value="A" checked>
                            <label class="form-check-label" for="solucionA">Solución simple</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="solucion" id="solucionB" value="B">
                            <label class="form-check-label" for="solucionB">Se tuvo que generar una O.d.T.</label>
                          </div>
                        </div>
                        <div class="form-group" id="solucionATexto">
                          <label for="textoSolucionA">Que solución simple se realizó:</label>
                          <input type="text" class="form-control form-control-sm input-control" id="textoSolucionA" name="textoSolucionA" value="">
                        </div>
                        <div class="form-group" id="solucionBSelect" style="display:none;">
                          <label for="selectSolucionB">Qué Nº de orden se generó?:</label>
                          <select class="form-control form-control-sm input-control" id="selectSolucionB" name="selectSolucionB">
                            @foreach ($ODT as $odt)
                              <option value="{{ $odt->id }}">ODT-{{ $odt->id }} : {{ $odt->det1 }} </option>
                            @endforeach
                          </select>
                        </div>
                        <input type="hidden" name="numFormulario" value="{{$equipoplanejecut->numFormulario}}">
                        <button type="submit" class="btn btn-primary btn-block mt-4" id="submitButton">Enviar</button>
                      </form>
                      
                      <script>
                        const radioA = document.getElementById('solucionA');
                        const radioB = document.getElementById('solucionB');
                        const selectB = document.getElementById('solucionBSelect');
                        const inputA = document.getElementById('solucionATexto');
                      
                        function toggleElements() {
                          if (radioB.checked) {
                            selectB.style.display = 'block';
                            inputA.style.display = 'none';
                          } else {
                            selectB.style.display = 'none';
                            inputA.style.display = 'block';
                          }
                        }
                      
                        radioA.addEventListener('change', toggleElements);
                        radioB.addEventListener('change', toggleElements);
                      </script>
                      
                      
                      
                      
                    
                      
                    
                    
                    
                  
                    
                    
                    
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
    const radioA = document.getElementById('solucionA');
    const radioB = document.getElementById('solucionB');
    const selectB = document.getElementById('solucionBSelect');
    const inputA = document.getElementById('solucionATexto');
  
    function toggleElements() {
      if (radioB.checked) {
        selectB.style.display = 'block';
        inputA.style.display = 'none';
      } else {
        selectB.style.display = 'none';
        inputA.style.display = 'block';
      }
    }
  
    radioA.addEventListener('change', toggleElements);
    radioB.addEventListener('change', toggleElements);
  </script>
  
  
 



    

@endsection


