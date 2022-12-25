@extends('layouts.plantilla')
@section('title', 'Home')
@section('content')
<style>
.card{
     border:none;
     /*width:400px; */
     border-radius:12px;
     color:#fff;
     background-image: linear-gradient(to right top, #30141e6f, #0b0a0b, #21080358, #1d181a, #1e191b);
 }

</style>
<h1>Bienvenidos a la Página Principal</h1>

<div class="container">
    <div class="row">
      <div class="col col-md-3">
        Columna 1
        <div class="card  text-white" >
            
            <div class="card-body">
              <img src={{asset('img\imagenes\planImagen.png')}} class="card-img-top" alt="...">
              <p>EQUIPOS</p>
              <a href="#" class="btn stretched-link"></a>
            </div>
          </div>
      </div>
      <div class="col">
        Columna 2
      </div>
      <div class="col">
        Columna 3
      </div>
      <div class="col">
        Columna 4
      </div>
    </div>
  </div>



@endsection