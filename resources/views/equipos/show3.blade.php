@extends('layouts.plantilla')
@section('title', 'Ver ' . $equipo->marca)

@section('content')

<h1></h1>
{{-- ESTO ES UN COMENTARIO <h1>Aqui podras ver el equipo: <?php echo $variable;?></h1> --}}
{{-- <h1>Aqui podras ver el equipo: {{ $variable}}</h1> --}}
<div class="card" STYLE="background: linear-gradient(to right,#5c5649,#030007);" >
  <div class="card-header" STYLE="background: linear-gradient(to right,#201f1e,#030007);">
    <ul class="nav nav-tabs card-header-tabs">
      <li class="nav-item">
        <a class="nav-link active" aria-current="true"  style="background-color: #1e2020;" href="{{route('equipos.show', $equipo->id)}}">Ficha</a>
       
      </li>
     
      <li class="nav-item">
        <a class="nav-link" href="{{route('fotos.show', $equipo->id)}}">Fotos</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{route('equipos.index')}}">Historial</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('equipos.index')}}">Protocolo</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('equipos.index')}}">Plan</a>
      
      <li class="nav-item">
        <a class="nav-link" href="{{route('documentos.show', $equipo->id)}}">Documentos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href={{route('equipos.edit', $equipo->id)}}>Editar</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href={{route('ordentrabajo.list', $equipo->id)}}>OT</a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="{{route('equipos.index')}}">Descargar</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('equipos.index')}}">Imprimir</a>
      </li>
      

    </ul>
  </div>
  
    <h6 STYLE="text-align:center; font-size: 30px;
                background: -webkit-linear-gradient(rgb(1, 103, 71), rgb(239, 236, 217));
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;">Datos técnicos</h6>
    
    
      <table id="listado" class="table table-striped table-success  table-hover border-4" >
        <thead>
          <tr>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
            
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">Equipo: </th>
            <td>{{ $equipo->codEquipo}}</td>
            <td></td>
            
          </tr>
          <tr>
            <th scope="row">Marca: </th>
            <td>{{$equipo->marca}}</td>
            <td></td>
            
            
          </tr>
          <tr>
            <th scope="row">Modelo: </th>
            <td>{{$equipo->modelo}}</td>
            <td></td>
          </tr>
          <tr>
            <th scope="row">Sección: </th>
            <td>{{$equipo->idSecc}}</td>
            <td></td>
          </tr>
          <tr>
            <th scope="row">Subsección: </th>
            <td>{{$equipo->idSubSecc}}</td>
            <td></td>
          </tr>
          <tr>
            <th scope="row">Caractrística Nº1: </th>
            <td>{{$equipo->det1}}</td>
            <td></td>
          </tr>
          <tr>
            <th scope="row">Caractrística Nº2: </th>
            <td>{{$equipo->det2}}</td>
            <td></td>
          </tr>
          <tr>
            <th scope="row">Caractrística Nº3: </th>
            <td>{{$equipo->det3}}</td>
            <td></td>
          </tr>
          <tr>
            <th scope="row">Caractrística Nº4: </th>
            <td>{{$equipo->det4}}</td>
            <td></td>
          </tr>
          <tr>
            <th scope="row">Caractrística Nº5: </th>
            <td>{{$equipo->det5}}</td>
            <td></td>
          </tr>

          
        <thead>
          <tr>
            <th scope="col" class="text-center"></th>
            <th scope="col" class="text-center">Repuestos</th>
            <th scope="col" class="text-center"></th>
          </tr>
        </thead>
        <thead>
          <tr>
            <th scope="col" class="text-center">Código</th>
            <th scope="col" class="text-center">Descripción</th>
            <th scope="col" class="text-center">Cantidad</th>
          </tr>
        </thead>
        @foreach($repuestos as $repuesto)
        @if(!$repuesto->pivot->check1 =='on') {{-- Para saber si es repuesto o no --}}
        <tr>
          <th scope="row" class="text-center">{{ $repuesto->codigo }}</th>
          <td>{{ $repuesto->descripcion}} </td>
          <td class="text-center">{{$repuesto->pivot->cant}} {{$repuesto->pivot->unidad}} </td>
        </tr>
        @endif
        @endforeach
        


       {{-- ACESORIOS --}}
        <thead>
          <tr>
            <th scope="col" class="text-center"></th>
            <th scope="col" class="text-center">Acesorios</th>
            <th scope="col" class="text-center"></th>
          </tr>
        </thead>
        <thead>
          <tr>
            <th scope="col" class="text-center">Código</th>
            <th scope="col" class="text-center">Descripción</th>
            <th scope="col" class="text-center">Cantidad</th>
           
          </tr>
        </thead>
        @foreach($repuestos as $repuesto)
        @if($repuesto->pivot->check1 =='on') {{-- Para saber si es accesorio o no --}}
        <tr>
          <th scope="row" class="text-center">{{ $repuesto->codigo }}</th>
          <td>{{ $repuesto->descripcion}} </td>
          <td class="text-center">{{$repuesto->pivot->cant}} {{$repuesto->pivot->unidad}} </td>
         
        </tr>
        @endif
        @endforeach


        {{-- Prueba --}}

       {{-- PLAN VINCULADOS --}}

       <thead>
        <tr>
          <th scope="col" class="text-center"></th>
          <th scope="col" class="text-center">Plan</th>
          <th scope="col" class="text-center"></th>
        </tr>
      </thead>
      <thead>
        <tr>
          <th scope="col" class="text-center">Código</th>
          <th scope="col" class="text-center">Descripción</th>
          <th scope="col" class="text-center"></th>
         
        </tr>
      </thead>
      @foreach($plans as $plan)
     
      <tr>
        <th scope="row" class="text-center">{{ $plan->codigo }}</th>
        <td>{{ $plan->descripcion}} </td>
        <td STYLE="color: #ffffff; font-family: Times New Roman;  font-size: 14px; ">
          <a class="bi bi-check2-square" href="{{route('equipos.edit', $equipo->id)}}"></a> 
        </td>
       
      </tr>
     
      @endforeach
      
      {{-- Equipos Vinculados --}}
      <thead>
        <tr>
          <th scope="col" class="text-center"></th>
          <th scope="col" class="text-center">Equipos</th>
          <th scope="col" class="text-center"></th>
        </tr>
      </thead>

      <thead>
        <tr>
          <th scope="col" class="text-center">Código</th>
          <th scope="col" class="text-center">Marca</th>
          <th scope="col" class="text-center">Modelo</th>
          <th scope="col" class="text-center"></th>
        </tr>
      </thead>
      @foreach($equiposB as $equipoB)
      <tr>
        <th scope="row" class="text-center">{{ $equipoB->codEquipo }}</th>
        <td>{{ $equipoB->marca}} </td>
        <td>{{ $equipoB->modelo}} </td>
        <td STYLE="color: #ffffff; font-family: Times New Roman;  font-size: 14px; ">
          <a class="bi bi-check2-square" href="{{route('equipos.edit', $equipoB->id)}}"></a> 
        </td>
       
      </tr>
     
      @endforeach
        </tbody>
    </table>
        
</div>




{{-- ************************************************************************************** --}}
{{-- ****LAS SIGUIENTES LINEAS SE COMENTAN POR RAZONES DE SER CODIGO MAESTRO --}}
{{-- <p><strong>Marca:</strong>{{$equipo->marca}}</p>
<p><strong>Modelo:</strong>{{$equipo->modelo}}</p>
<p><strong>Seccion:</strong>{{$equipo->idSecc}}</p>
<p><strong>Subsección:</strong>{{$equipo->idSubSecc}}</p>
<p><strong>Caractrística 1:</strong>{{$equipo->det1}}</p>
<p><strong>Caractrística 2:</strong>{{$equipo->det2}}</p>
<p><strong>Caractrística 3:</strong>{{$equipo->det3}}</p>
<p><strong>Caractrística 4:</strong>{{$equipo->det4}}</p>
<p><strong>Caractrística 5:</strong>{{$equipo->det5}}</p>
<p><strong>Repuestos:</strong></p>
 
<h3>Listado de repuestos</h3>

@foreach($repuestos as $repuesto)
<table>
   <tr>
    
    <td><li>*{{$repuesto->pivot->cant}}* - - {{ $repuesto->codigo }} - {{ $repuesto->descripcion}} </li> </td>
      
  </tr>

</table>
         
@endforeach --}}
{{-- ************************************************************************************** --}}

{{-- <h3>Estoy en equipos.show.blade </h3> --}}
 







@endsection




