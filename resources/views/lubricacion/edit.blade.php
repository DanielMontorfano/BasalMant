@extends('adminlte::page')

@section('title', 'Lubricaciones')



@section('content_header')
    <h6 style="text-align: center; font-size: 30px; color: #000000;
        background: -webkit-linear-gradient(rgb(1, 103, 71), rgb(239, 236, 217));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;">
        Lubricaciones
    </h6>
@stop

@section('content')
<style>
    .gradient-bg {
        background: linear-gradient(to right,#495c5c,#030007);
    }
</style>

<div class="card gradient-bg">
    <div class="card-header">
        <h3 class="card-title">Modificar Lubricación</h3>
    </div>
    <div class="card-body">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        
        <form action="{{ route('lubricacion.update', $lubricacion->id)}}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="puntoLubric">Punto de Lubricación</label>
                <select name="puntoLubric" class="form-control" required>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                </select>
            </div>
            

            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <input type="text" name="descripcion" value="{{ old('descripcion', $lubricacion->descripcion) }}">
 
            </div>

            <div class="form-group">
                <label for="lubricante">Lubricante</label>
               
                <input type="text" name="lubricante" value="{{ old('lubricante', $lubricacion->lubricante) }}">
            </div>

            <div class="form-group">
                <label for="recipiente">Recipiente</label>
                <input type="text" name="recipiente" value="{{ old('recipiente', $lubricacion->recipiente) }} " readonly>
            </div>
            

            <div class="form-group">
                <label for="color">Color</label>
                <select name="color" class="form-control" id="colorSelect">
                    <option value="A" {{ old('color', $lubricacion->color) === 'A' ? 'selected' : '' }}>
                        A: Aceites convencionales. Recipiente: "Alcuza"
                    </option>
                    <option value="B" {{ old('color', $lubricacion->color) === 'B' ? 'selected' : '' }}>
                        B: Grasas convencionales. Recipiente: "Grasera"
                    </option>
                    <option value="C" {{ old('color', $lubricacion->color) === 'C' ? 'selected' : '' }}>
                        C: Aceites Grado alimenticio (H1). Recipiente: "Alcuza"
                    </option>
                    <option value="D" {{ old('color', $lubricacion->color) === 'D' ? 'selected' : '' }}>
                        D: Grasas Grado Alimenticio (H1). Recipiente: "Grasera"
                    </option>
                </select>
            </div>
            <div class="form-group">
                <label for="inspecciones">Inspecciones</label>
                <select name="frecuencia" class="form-control">
                    <option value="Turno" {{ old('frecuencia', $lubricacion->inspecciones) === 'Turno' ? 'selected' : '' }}>
                        Turno
                    </option>
                    <option value="Dia" {{ old('frecuencia', $lubricacion->inspecciones) === 'Dia' ? 'selected' : '' }}>
                        Día
                    </option>
                    <option value="Semana" {{ old('frecuencia', $lubricacion->inspecciones) === 'Semana' ? 'selected' : '' }}>
                        Semana
                    </option>
                    <option value="Mes" {{ old('frecuencia', $lubricacion->inspecciones) === 'Mes' ? 'selected' : '' }}>
                        Mes
                    </option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="frecuencia">Frecuencia</label>
                <select name="frecuencia" class="form-control">
                    <option value="Turno" {{ old('frecuencia', $lubricacion->frecuencia) === 'Turno' ? 'selected' : '' }}>
                        Turno
                    </option>
                    <option value="Día" {{ old('frecuencia', $lubricacion->frecuencia) === 'Día' ? 'selected' : '' }}>
                        Día
                    </option>
                    <option value="Semana" {{ old('frecuencia', $lubricacion->frecuencia) === 'Semana' ? 'selected' : '' }}>
                        Semana
                    </option>
                    <option value="Mes" {{ old('frecuencia', $lubricacion->frecuencia) === 'Mes' ? 'selected' : '' }}>
                        Mes
                    </option>
                </select>
            </div>
            
            <div class="d-flex justify-content-center">
    <button type="submit" class="btn btn-primary mr-2">Guardar</button>
    <!-- Agrega el botón de "Volver" -->
    <a href="javascript:history.go(-1)" class="btn btn-primary ml-2">Volver</a>
</div>

            
            

        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var colorSelect = document.getElementById('colorSelect');
        colorSelect.style.backgroundColor = getColorBackground(colorSelect.value);
        setRecipiente(colorSelect.value);
    });

    var colorSelect = document.getElementById('colorSelect');

    colorSelect.addEventListener('change', function() {
        var selectedColor = colorSelect.value;
        colorSelect.style.backgroundColor = getColorBackground(selectedColor);
        setRecipiente(selectedColor);
    });

    function getColorBackground(color) {
        switch (color) {
            case 'A':
                return 'peachpuff';
            case 'B':
                return 'peachpuff';
            case 'C':
                return 'lightgreen';
            case 'D':
                return 'lightgreen';
            default:
                return '';
        }
    }

    function setRecipiente(color) {
        var recipienteInput = document.getElementsByName('recipiente')[0];
        switch (color) {
            case 'A':
                recipienteInput.value = 'Alcuza';
                break;
            case 'B':
                recipienteInput.value = 'Grasera';
                break;
            case 'C':
                recipienteInput.value = 'Alcuza';
                break;
            case 'D':
                recipienteInput.value = 'Grasera';
                break;
            default:
                recipienteInput.value = '';
        }
    }
</script>

@endsection
