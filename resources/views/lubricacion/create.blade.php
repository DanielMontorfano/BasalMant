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
        <h3 class="card-title">Crear Lubricación</h3>
    </div>
    <div class="card-body">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        
        <form action="{{ route('lubricacion.store') }}" method="POST">
            @csrf

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
                <input type="text" name="descripcion" class="form-control">
            </div>

            <div class="form-group">
                <label for="lubricante">Lubricante</label>
                <input type="text" name="lubricante" class="form-control">
            </div>

            <div class="form-group">
                <label for="recipiente">Recipiente</label>
                <input type="text" name="recipiente" class="form-control" readonly>
            </div>
            

            <div class="form-group">
                <label for="color">Color</label>
                <select name="color" class="form-control" id="colorSelect">
                    <option value="A">A: Aceites convensionales. Recipiente: "Alcuza"</option>
                    <option value="B">B: Grasas convensionales. Recipiente: "Grasera"</option>
                    <option value="C">C: Aceites Grado alimenticio (H1). Recipiente: "Alcuza"</option>
                    <option value="D">D: Grasas Grado Alimenticio (H1). Recipiente: "Grasera"</option>
                </select>
            </div>

            <div class="form-group">
                <label for="inspecciones">Inspecciones</label>
                <select name="frecuencia" class="form-control">
                    <option value="Turno">Turno</option>
                    <option value="Dia">Día</option>
                    <option value="Semana">Semana</option>
                    <option value="Mes">Mes</option>
                    
                </select>
            </div>

            <div class="form-group">
                <label for="frecuencia">Frecuencia</label>
                <select name="frecuencia" class="form-control">
                    <option value="Turno">Turno</option>
                    <option value="Día">Día</option>
                    <option value="Semana">Semana</option>
                    <option value="Mes">Mes</option>
                    
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
