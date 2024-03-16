{{-- @extends('layouts.plantilla') --}}

@extends('adminlte::page')
@section('title', 'Crear')
@section('content_header')
<h6 STYLE="text-align:center; font-size: 30px;
background: -webkit-linear-gradient(rgb(1, 103, 71), rgb(239, 236, 217));
-webkit-background-clip: text;
-webkit-text-fill-color: transparent;">Crear un nuevo equipo</h6>
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

    .error-message {
    color: rgb(60, 255, 0);
}

    @keyframes blinking {
        0% {
            opacity: 1;
        }
        50% {
            opacity: 0;
        }
        100% {
            opacity: 1;
        }
    }

    .blinking {
        animation: blinking 1.5s infinite;
    }
</style>
@error('campo')
<small class="error-message blinking">*{{ $message }}</small>
@enderror
<br>    
<div class="container">
  {{-- container principal --}}
  <div class="row">
      {{-- row principal --}}
      <div class="col col-md-2">
          {{-- columna1 --}}
      </div>
      <div class="col col-md-8">
          {{-- columna2 --}}
          <form id="nuevoEquipo" action="{{ route('equipos.store') }}" method="POST" class="form-horizontal" style="background: linear-gradient(to right,#495c5c,#030007);">
              @csrf
              {{-- Envía un token de seguridad. Siempre se debe poner!!! sino no funca --}}
              <div class="p-3 mb-2 text-white">
                  <div class="container">
                      <div class="row">
                          {{-- ***** div de la primera fila --}}
                          <div class="col col-md-4">
                              <div class="form-group">
                                  <label class="control-label" for="codigo">Codigo:</label>
                                  <input autocomplete="off" class="form-control" style="color: #f2baa2; font-family: Times New Roman; font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);" type="text" name="codEquipo" value="{{ old('codEquipo') }}">
                                  @error('codEquipo')
                                  <small class="error-message blinking">*{{ $message }}</small>
                                  @enderror
                              </div>
                          </div>
                          <div class="col col-md-4">
                              <div class="form-group">
                                  <label class="control-label" for="marca">Marca:</label>
                                  <input autocomplete="off" class="form-control" style="color: #f2baa2; font-family: Times New Roman; font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);" type="text" name="marca" value="{{ old('marca') }}">
                                  @error('marca')
                                  <small class="error-message blinking">*{{ $message }}</small>
                                  @enderror
                              </div>
                          </div>
                          <div class="col col-md-4">
                              <div class="form-group">
                                  <label class="control-label" for="modelo">Modelo:</label>
                                  <input autocomplete="off" class="form-control" style="color: #f2baa2; font-family: Times New Roman; font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);" type="text" name="modelo" value="{{ old('modelo') }}">
                                  @error('modelo')
                                  <small class="error-message blinking">*{{ $message }}</small>
                                  @enderror
                              </div>
                          </div>
                      </div>
                      {{-- ***** div de la primera fila --}}
                      <div class="row">
                          {{-- ****** div de la segunda fila --}}
                          <div class="col col-md-6">
                              <div class="form-group">
                                  <label class="control-label" for="idSecc">Sección:</label>
                                  <input autocomplete="off" class="form-control" style="color: #f2baa2; font-family: Times New Roman; font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);" type="text" name="idSecc" value="{{ old('idSecc') }}">
                                  @error('idSecc')
                                  <small class="error-message blinking">*{{ $message }}</small>
                                  @enderror
                              </div>
                          </div>
                          <div class="col col-md-6">
                              <div class="form-group">
                                  <label class="control-label" for="idSubSecc">Subsección:</label>
                                  <input autocomplete="off" class="form-control" style="color: #f2baa2; font-family: Times New Roman; font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);" type="text" name="idSubSecc" value="{{ old('idSubSecc') }}">
                                  @error('idSubSecc')
                                  <small class="error-message blinking">*{{ $message }}</small>
                                  @enderror
                              </div>
                          </div>
                      </div>
                      {{-- ****** div de la segunda fila --}}
                      <div class="row">
                          {{-- ****** div de la tercera fila --}}
                          <div class="col col-md-6">
                              <div class="form-group">
                                  <label class="control-label" for="det1">Característica Nº1:</label>
                                  <input autocomplete="off" class="form-control" style="color: #f2baa2; font-family: Times New Roman; font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);" type="text" name="det1" value="{{ old('det1') }}">
                                  {{-- old() mantiene en campo con el dato --}}
                                  @error('det1')
                                  <small class="error-message blinking">*{{ $message }}</small>
                                  @enderror
                              </div>
                          </div>
                          <div class="col col-md-6">
                              <div class="form-group">
                                  <label class="control-label" for="det2">Característica Nº2:</label>
                                  <input autocomplete="off" class="form-control" style="color: #f2baa2; font-family: Times New Roman; font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);" type="text" name="det2" value="{{ old('det2') }}">
                                  {{-- old() mantiene en campo con el dato --}}
                                  @error('det2')
                                  <small class="error-message blinking">*{{ $message }}</small>
                                  @enderror
                              </div>
                          </div>
                      </div>
                      {{-- ****** div de la tercera fila --}}
                      <div class="row">
                          {{-- ****** div de la 4ta fila --}}
                          <div class="col col-md-6">
                              <div class="form-group">
                                  <label class="control-label" for="det3">Característica Nº3:</label>
                                  <input autocomplete="off" class="form-control" style="color: #f2baa2; font-family: Times New Roman; font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);" type="text" name="det3" value="{{ old('det3') }}">
                                  {{-- old() mantiene en campo con el dato --}}
                                  @error('det3')
                                  <small class="error-message blinking">*{{ $message }}</small>
                                  @enderror
                              </div>
                          </div>
                          <div class="col col-md-6">
                              <div class="form-group">
                                  <label class="control-label" for="det4">Característica Nº4:</label>
                                  <input autocomplete="off" class="form-control" style="color: #f2baa2; font-family: Times New Roman; font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);" type="text" name="det4" value="{{ old('det4') }}">
                                  {{-- old() mantiene en campo con el dato --}}
                                  @error('det4')
                                  <small class="error-message blinking">*{{ $message }}</small>
                                  @enderror
                              </div>
                          </div>
                      </div>
                      {{-- ****** div de la 4ta fila --}}
                      <div class="row">
                          {{-- ****** div de la 5ta fila   --}}
                          <div class="col col-md-12">
                              <div class="form-group">
                                  <label class="control-label" for="det5">Detalle:</label>
                                  <input autocomplete="off" class="form-control" style="color: #f2baa2; font-family: Times New Roman; font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);" type="text" name="det5" value="{{ old('det5') }}">
                                  {{-- old() mantiene en campo con el dato --}}
                                  @error('det5')
                                  <small class="error-message blinking">*{{ $message }}</small>
                                  @enderror
                              </div>
                          </div>
                      </div>
                      {{-- ****** div de la 5ta fila --}}
                      <br>
                      <br>
                      <div class="form-group">
                          <button form="nuevoEquipo" class="btn btn-primary" type="submit" style="background: linear-gradient(to right,#495c5c,#030007);">Enviar</button>
                          <p style="text-align: right;"><a class="text-white " href="{{ route('equipos.index') }}">Salir</a></p>
                      </div>
                  </div>
                  {{-- div del container dentro de columna 2 --}}
              </div>
              {{-- div del Letra blanca --}}
          </form>
      </div>
      <div class="col col-md-2">
          {{-- columna 3 --}}
      </div>
  </div>
  {{-- div del row1 Principal --}}
</div>
{{-- div del container Principal--}}



<div class="container"> 
  @include('layouts.partials.footer')
 </div>
@endsection
