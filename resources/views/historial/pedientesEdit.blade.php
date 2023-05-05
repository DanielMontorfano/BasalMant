{{-- @extends('layouts.plantilla') --}}
@extends('adminlte::page') 
@section('title', 'Edit')
@section('content_header')
@include('layouts.partials.menuEquipo')
<head>
 
  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <!-- Bootstrap -->
  
</head>

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
                    
                    <form id="pendienteEdit"  action="{{route('equipoplansejecut.update', $equipoplanejecut->id)}}" method="POST" class="form-horizontal" style="background: linear-gradient(to right,#243B55,#a1a7b0); padding: 30px;">
                      @csrf
                      @method('put')
                      <div class="form-group">
                          <label for="pendiente">Pendiente:</label>
                          <input type="text" class="form-control form-control-sm input-control" id="pendiente" value="Dato correspondiente">
                      </div>
                      <div class="form-group">
                          <label for="solucion">Solución:</label><br>
                          <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="solucion" id="solucionA" value="A">
                              <label class="form-check-label" for="solucionA">Solución simple</label>
                          </div>
                          <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="solucion" id="solucionB" value="B">
                              <label class="form-check-label" for="solucionB">Se tuvo que generar una O.d.T.</label>
                          </div>
                      </div>
                      <div class="form-group" id="solucionATexto" style="display:none;">
                          <label for="textoSolucionA">Que solución simple se realizó:</label>
                          <input type="text" class="form-control form-control-sm input-control" id="textoSolucionA">
                      </div>
                      <div class="form-group" id="solucionBSelect" style="display:none;">
                          <label for="selectSolucionB">Qué Nº de orden se generó?:</label>
                          <select class="form-control form-control-sm input-control" id="selectSolucionB">
                              <option value="codODT1">ODT 1</option>
                              <option value="codODT2">ODT 2</option>
                              <option value="codODT3">ODT 3</option>
                          </select>
                      </div>

                      <button type="submit" class="btn btn-primary btn-block mt-4" id="submitButton" disabled>Enviar</button>
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
  $(document).ready(function() {
    // Mostrar u ocultar elementos según la opción seleccionada
    $('input[name="solucion"]').change(function() {
        if ($(this).val() === "A") {
            $('#solucionATexto').show();
            $('#solucionBSelect').hide();
        } else if ($(this).val() === "B") {
            $('#solucionATexto').hide();
            $('#solucionBSelect').show();
        }

        // Activar el botón de enviar
        $('#submitButton').removeAttr('disabled');
    });
});
</script>

@endsection


