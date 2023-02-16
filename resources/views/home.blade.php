@extends('adminlte::page')
@section('title', 'Home')
@section('content')
<style>
  h1{
  background: -webkit-linear-gradient(yellow,red);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  color: tomato;  
  }
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
    object-fit:  fill /*cover*/;
}

</style>
<h1 align='center'>BasalMant</h1>

<div class="container">
    <div class="row">
            <div class="col col-md-3">
              {{-- Columna 1 --}}
              <div class="card  text-white" >
                  
                  <div class="card-body" align='center'>
                    <img src={{asset('img\imagenes\CentrifugaSilver2.png')}}  class="card-img-top" alt="...">
                    <p>Equipos</p>
                    <a href="{{route('equipos.index')}}" class="btn stretched-link"></a>
                  </div>
                </div>
            </div>
            <div class="col col-md-3">
              {{-- Columna 2 --}}
              <div class="card  text-white" align="center" >
                  
                <div class="card-body">
                  <img src={{asset('img\imagenes\planImagen.png')}} class="card-img-top" alt="...">
                  <p>Planes de Mantenimientos</p>
                  <a href="{{route('plans.index')}}" class="btn stretched-link"></a>
                </div>
              </div>
          </div>
      
      <div class="col col-md-3">
        {{-- Columna 3 --}}
        <div class="card  text-white" align="center" >
            
          <div class="card-body">
            <img src={{asset('img\imagenes\OrdenDeTrabajo2.png')}} class="card-img-top" alt="...">
            <p>Ordenes de Trabajo</p>
            <a href="{{route('ordentrabajo.index')}}" class="btn stretched-link"></a>
          </div>
        </div>
      </div>
    
      <div class="col">
        {{-- Columna 3 --}}
        <div class="card  text-white" >
            
          <div class="card-body" align="center">
            <img src={{asset('img\imagenes\checkList.png')}} class="card-img-top" alt="...">
            <p>Proced. de mantenimiento</p>
            <a href="{{route('protocolos.index')}}" class="btn stretched-link"></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
          <div class="col col-md-3">
            {{-- Columna 1 --}}
            <div class="card  text-white" >
                
                <div class="card-body" align="center" >
                  <img src={{asset('img\imagenes\tarea2.png')}}  class="card-img-top" alt="...">
                  <p>Tareas</p>
                  <a href="{{route('tareas.index')}}" class="btn stretched-link"></a>
                </div>
              </div>
          </div>
          <div class="col col-md-3">
            {{-- Columna 2 --}}
            <div class="card  text-white" >
                
              <div class="card-body" align="center">
                <img src={{asset('img\imagenes\Analisis2.png')}} class="card-img-top" alt="...">
                <p>Datos</p>
                <a href="#" class="btn stretched-link"></a>
              </div>
            </div>
        </div>
    
    <div class="col col-md-3">
      {{-- Columna 3 --}}
      <div class="card  text-white" align="center">
          
        <div class="card-body">
          <img src={{asset('img\imagenes\Repuestos2.png')}} class="card-img-top" alt="...">
          <p>Repuestos</p>
          <a href="{{route('repuestos.index')}}" class="btn stretched-link"></a>
        </div>
      </div>
    </div>
  
    <div class="col">
      {{-- Columna 3 --}}
      <div class="card  text-white" >
          
        <div class="card-body" align="center">
          <img src={{asset('img\imagenes\Evolución2.png')}} class="card-img-top" alt="...">
          <p>Control de versiones</p>
          <a href="#" class="btn stretched-link"></a>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<div class="container"> 
  @include('layouts.partials.footer')
 </div>

@endsection  


