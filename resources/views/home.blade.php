@extends('adminlte::page')
@section('title', 'Home')
@section('content')
<style>
.card{
     border:none;
     /*width:400px; */
     border-radius:15px;
     color:rgb(237, 30, 30);
     background-image: linear-gradient(to right top, #30141e6f, #0b0a0b, #21080358, #1d181a, #1e191b);
 }

 .card-img-top {
    width: 100%;
    height: 12vw;
    /*color:rgb(212, 41, 41);*/
    object-fit: cover;
}

</style>
<h1>Bienvenidos a la Página Principal</h1>

<div class="container">
    <div class="row">
            <div class="col col-md-3">
              Columna 1
              <div class="card  text-white" >
                  
                  <div class="card-body" align='center'>
                    <img src={{asset('img\imagenes\CentrifugaSilver2.png')}}  class="card-img-top" alt="...">
                    <p>Equipos</p>
                    <a href="#" class="btn stretched-link"></a>
                  </div>
                </div>
            </div>
            <div class="col col-md-3">
              Columna 2
              <div class="card  text-white" >
                  
                <div class="card-body">
                  <img src={{asset('img\imagenes\planImagen.png')}} class="card-img-top" alt="...">
                  <p>Planes de Mantenimiento</p>
                  <a href="#" class="btn stretched-link"></a>
                </div>
              </div>
          </div>
      
      <div class="col col-md-3">
        Columna 3
        <div class="card  text-white" >
            
          <div class="card-body">
            <img src={{asset('img\imagenes\OrdenDeTrabajo2.png')}} class="card-img-top" alt="...">
            <p>Ordenes de Trabajo</p>
            <a href="#" class="btn stretched-link"></a>
          </div>
        </div>
      </div>
    
      <div class="col">
        Columna 3
        <div class="card  text-white" >
            
          <div class="card-body">
            <img src={{asset('img\imagenes\checkList.png')}} class="card-img-top" alt="...">
            <p>Procedimientos de mantenimiento</p>
            <a href="#" class="btn stretched-link"></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection