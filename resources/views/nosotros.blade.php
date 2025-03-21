@extends('adminlte::page')
@section('title', 'Nosotros')
@section('content')
<div> <br> </div> <!-- Espaciado superior -->

<div class="frase-motivadora-container">
    <h4 class="frase-motivadora-text">"En Ingenio Río Grande S.A., nuestra pasión por la tradición azucarera va más allá de la producción; es un legado profundamente arraigado en la calidad, el compromiso social y la excelencia. Con la innovación como guía y una búsqueda constante de la perfección, nuestro equipo trabaja con dedicación para garantizar la excelencia y la seguridad alimentaria en cada etapa del proceso. No somos simplemente un equipo; somos una familia unida por el bienestar de nuestros consumidores y comunidades, impulsando un futuro sostenible y de calidad para todos."</h4>
</div>


<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center mb-4">Nuestro Equipo</h2>
        </div>
    </div>

    <div class="row">
        <!-- Primer integrante -->
        <div class="col-md-2 mb-4 text-center">
            <img src="{{ asset('img/imagenes/Equipo/pabloMoreno.JPEG') }}" alt="Integrante 1" class="img-fluid rounded-circle equipo-img">
            <p class="mt-2 nombre-cargo">Pablo Moreno<br>Calderas</p>
        </div>
        <!-- Segundo integrante -->
        <div class="col-md-2 mb-4 text-center">
            <img src="{{ asset('img/imagenes/Equipo/roloMoreno.JPEG') }}" alt="Integrante 2" class="img-fluid rounded-circle equipo-img">
            <p class="mt-2 nombre-cargo">Rolando Moreno<br>Trapiche</p>
        </div>
        <!-- Tercer integrante -->
        <div class="col-md-2 mb-4 text-center">
            <img src="{{ asset('img/imagenes/Equipo/finnGertzen.JPEG') }}" alt="Integrante 3" class="img-fluid rounded-circle equipo-img">
            <p class="mt-2 nombre-cargo">Finn Gertzeen<br>Planta</p>
        </div>
        <!-- Cuarto integrante -->
        <div class="col-md-2 mb-4 text-center">
            <img src="{{ asset('img/imagenes/Equipo/miguelEstrada.JPEG') }}" alt="Integrante 4" class="img-fluid rounded-circle equipo-img">
            <p class="mt-2 nombre-cargo">Miguel Estrada<br>Mecánico</p>
        </div>
        <!-- Quinto integrante -->
        <div class="col-md-2 mb-4 text-center">
            <img src="{{ asset('img/imagenes/Equipo/marcianoApaza.JPEG') }}" alt="Integrante 5" class="img-fluid rounded-circle equipo-img">
            <p class="mt-2 nombre-cargo">Apaza Marciano<br>Mecánico</p>
        </div>
    </div>

    <!-- Segunda fila -->
    <div class="row">
        <!-- Sexto integrante -->
        <div class="col-md-2 mb-4 text-center">
            <img src="{{ asset('img/imagenes/Equipo/carlosAyarde.JPEG') }}" alt="Integrante 1" class="img-fluid rounded-circle equipo-img">
            <p class="mt-2 nombre-cargo">Ayarde Carlos<br>Electricista</p>
        </div>
        <!-- Séptimo integrante -->
        <div class="col-md-2 mb-4 text-center">
            <img src="{{ asset('img/imagenes/Equipo/ricardoLorente.JPEG') }}" alt="Integrante 1" class="img-fluid rounded-circle equipo-img">
            <p class="mt-2 nombre-cargo">Lorente Ricardo<br>Salón de azúcar</p>
        </div>
        <!-- Octavo integrante -->
        <div class="col-md-2 mb-4 text-center">
            <img src="{{ asset('img/imagenes/Equipo/miguelDiaz.JPEG') }}" alt="Integrante 1" class="img-fluid rounded-circle equipo-img">
            <p class="mt-2 nombre-cargo">Díaz Miguel<br>Calderas</p>
        </div>
        <!-- Noveno integrante -->
        <div class="col-md-2 mb-4 text-center">
            <!-- Aquí va el código del integrante -->
        </div>
        <!-- Décimo integrante -->
        <div class="col-md-2 mb-4 text-center">
            <!-- Aquí va el código del integrante -->
        </div>
    </div>

    <!-- Tercera fila -->
    <div class="row">
        <!-- Undécimo integrante -->
        <div class="col-md-2 mb-4 text-center">
           
        </div>
        <!-- Duodécimo integrante -->
        <div class="col-md-2 mb-4 text-center">
            <!-- Aquí va el código del integrante -->
        </div>
        <!-- Decimotercer integrante -->
        <div class="col-md-2 mb-4 text-center">
            <!-- Aquí va el código del integrante -->
        </div>
        <!-- Decimocuarto integrante -->
        <div class="col-md-2 mb-4 text-center">
            <!-- Aquí va el código del integrante -->
        </div>
        <!-- Decimoquinto integrante -->
        <div class="col-md-2 mb-4 text-center">
            <!-- Aquí va el código del integrante -->
        </div>
    </div>
</div>

@endsection


@section('css')
<style>
.equipo-img {
    width: 150px; /* Tamaño deseado para las imágenes */
    height: 150px; /* Tamaño deseado para las imágenes */
    object-fit: cover;
    border-radius: 50%;
}

.nombre-cargo {
    font-size: 12px; /* Tamaño de fuente más pequeño */
    color: rgb(159, 221, 159); /* Color verde oscuro */
    background-color: rgb(39, 38, 38); /* Fondo gris */
    border-radius: 10px; /* Bordes redondeados */
    padding: 5px 10px; /* Espaciado interno */
}

.frase-motivadora-container {
    background-color:  rgb(39, 38, 38); /* Fondo gris */
    padding: 20px; /* Espaciado interno */
    text-align: center; /* Alineación centrada */
    margin-bottom: 50px; /* Margen inferior para separar de la siguiente sección */
    border-radius: 10px; /* Bordes redondeados */
}

.frase-motivadora-text {
    font-size: 18px; /* Tamaño de fuente */
    color: rgb(159, 221, 159); /* Color del texto verde oscuro */
    /* Otros estilos personalizables */
}
</style>
@endsection

