@extends('adminlte::page')
@section('title', 'Nosotros')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center mb-4">Nuestro Equipo</h2>
        </div>
    </div>

    <div class="row">
        <!-- Primer integrante -->
        <div class="col-md-2 mb-4">
            <img src={{asset('img\imagenes\Check.png')}} alt="Integrante 1" class="img-fluid rounded-circle">
            <p class="text-center mt-2">Nombre del Integrante</p>
            <p class="text-center">Cargo</p>
        </div>
        <!-- Segundo integrante -->
        <div class="col-md-2 mb-4">
            <img src={{asset('img\imagenes\Check.png')}} alt="Integrante 1" class="img-fluid rounded-circle">
            <p class="text-center mt-2">Nombre del Integrante</p>
            <p class="text-center">Cargo</p>
        </div>
        <!-- Tercer integrante -->
        <div class="col-md-2 mb-4">
            <img src={{asset('img\imagenes\jefe.jfif')}} alt="Integrante 1" class="img-fluid rounded-circle">
            <p class="text-center mt-2">Nombre del Integrante</p>
            <p class="text-center">Cargo</p>
        </div>
        <!-- Cuarto integrante -->
        <div class="col-md-2 mb-4">
            <img src={{asset('img\imagenes\Check.png')}} alt="Integrante 1" class="img-fluid rounded-circle">
            <p class="text-center mt-2">Nombre del Integrante</p>
            <p class="text-center">Cargo</p>
        </div>
        <!-- Quinto integrante -->
        <div class="col-md-2 mb-4">
            <img src={{asset('img\imagenes\Check.png')}} alt="Integrante 1" class="img-fluid rounded-circle">
            <p class="text-center mt-2">Nombre del Integrante</p>
            <p class="text-center">Cargo</p>
        </div>
    </div>

    <!-- Repite esta estructura para cada fila adicional -->
</div>

@endsection
