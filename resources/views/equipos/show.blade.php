

{{-- @extends('layouts.plantilla') --}}
 @extends('adminlte::page') 

@section('title', 'Ver ' . $equipo->marca)
@section('content_header')
<h6 STYLE="text-align:center; font-size: 30px;
background: -webkit-linear-gradient(rgb(1, 103, 71), rgb(239, 236, 217));
-webkit-background-clip: text;
-webkit-text-fill-color: transparent;">Datos técnicos</h6>
<style>.button {
  position: absolute;
  top:50%;
  background-color:#0a0a23;
  color: #fff;
  border:none; 
  border-radius:10px; 
  padding:15px;
  min-height:30px; 
  min-width: 120px;
}</style>

@stop
@section('css')
{{-- https://datatables.net/ **IMPORTANTE PLUG IN PARA LAS TABLAS --}}
{{-- Para que sea responsive se agraga la tercer libreria --}}
{{-- Todo lo de plantilla --}}
{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}
@endsection

@section('content')
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> --}}

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
        <a class="nav-link" href="{{route('historialPreventivo', $equipo->id)}}">Historial</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('equipos.index')}}">Protocolo</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href={{route('equipoTareash.show', $equipo->id)}}>Plan</a>
      
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
        <a class="nav-link" href="{{route('imprimirEquipo',$equipo->id )}}">Imprimir</a>
      </li>
      

    </ul>
  </div>
  
   
      


       <p ><a  class="text-white " href={{route('equipoTareash.show', $equipo->id)}}>Ver tareas</a></p> 
   
      <table id="listado" class="table table-striped table-success  table-hover border-4" >
        {{-- <thead>
          <tr>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
            
          </tr>
        </thead> --}}
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
        </table>


    {{-- *******************************************INicio Probando acordion --}}
    <div class="accordion" id="accordionPanelsStayOpenExample">
       {{-- 1er item --}}
      <div class="accordion-item">
        <h2 class="accordion-header" id="panelsStayOpen-headingOne" >
          <button style="
          
          background-color:transparent;
          color: #fff;
          border:none; 
          border-radius:10px; 
          padding:15px;
          min-height:30px; 
          min-width: 120px;" class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
            <strong>Repuestos</strong>
          </button>
        </h2>
        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse " aria-labelledby="panelsStayOpen-headingOne">
          <div class="accordion-body">
            @foreach($repuestos as $repuesto)
                 @if(!$repuesto->pivot->check1 =='on') {{-- Para saber si es repuesto o no --}}
                 <div class="row align-items-end">
                  <div class="col-2"><strong>{{ $repuesto->codigo }} </strong></div>
                  <div class="col-6">{{ $repuesto->descripcion}} </div>
                  <div class="col-2">{{$repuesto->pivot->cant}}{{" "}}  {{$repuesto->pivot->unidad}}</div>
                  <div class="col-2"></div>
                </div>
                 @endif
            @endforeach
          </div>
        </div>
      </div>
       {{-- 2do item --}} 
      <div class="accordion-item">
        <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
            <strong>Acesorios</strong>
          </button>
        </h2>
        <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
          <div class="accordion-body">
            @foreach($repuestos as $repuesto)
               @if($repuesto->pivot->check1 =='on') {{-- Para saber si es repuesto o no --}}
               <div class="row align-items-end">
                <div class="col-2"><strong>{{ $repuesto->codigo }} *****</strong></div>
                <div class="col-6">{{ $repuesto->descripcion}} </div>
                <div class="col-2">{{$repuesto->pivot->cant}}{{" "}}  {{$repuesto->pivot->unidad}}</div>
                <div class="col-2"></div>
              </div>  

               {{-- <ol style="list-style: none;"><li><strong>{{ $repuesto->codigo }}</strong> {{ $repuesto->descripcion}} {{$repuesto->pivot->cant}} {{$repuesto->pivot->unidad}} </li></ol>   --}}
               @endif
            @endforeach
          </div>
        </div>
      </div>
       {{-- 3er item --}}
      <div class="accordion-item">
        <h2 class="accordion-header" id="panelsStayOpen-headingThree">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
            <strong>Planes asociados</strong>
          </button>
        </h2>
        <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
          <div class="accordion-body">
              @foreach($plans as $plan)
              <div class="row align-items-end">
                <div class="col-2"><strong>{{ $plan->codigo }}</strong></div>
                <div class="col-6">{{ $plan->descripcion}}</div>
                <div class="col-2">{{ $plan->frecuencia}}{{" "}}{{ $plan->unidad}} </div>
                <div class="col-2"><a class="bi bi-eye" href="{{route('plans.show', $plan->id)}}"></a></div>
              </div>
              @endforeach
          </div>
        </div>
      </div>

       {{-- 4to item --}}
      <div class="accordion-item">
        <h2 class="accordion-header" id="panelsStayOpen-headingFour">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false" aria-controls="panelsStayOpen-collapseFour">
            <strong>Equipos vinculados</strong>
          </button>
        </h2>
        <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingFour">
          <div class="accordion-body">
             @foreach($equiposB as $equipoB)
             <div class="row align-items-end">
              <div class="col-2"><strong>{{ $equipoB->codEquipo }}</strong></div>
              <div class="col-6">{{ $equipoB->marca}}</div>
              <div class="col-2">{{ $equipoB->modelo}} </div>
              <div class="col-2"><a class="bi bi-eye" href="{{route('equipos.show', $equipoB->id)}}"></a></div>
            </div>
             {{--  <ol style="list-style: none;"><li><strong>{{ $equipoB->codEquipo }}</strong>{{ $equipoB->marca}} {{ $equipoB->modelo}} <a class="bi bi-check2-square" href="{{route('equipos.edit', $equipoB->id)}}"></a> </li></ol> --}} 
              @endforeach
          </div>
        </div>
      </div>
        {{-- 5to item  vacio--}}

    </div>  {{-- DIV DE ACCORDION FINAL --}}
{{-- *******************************************FIN Probando acordion --}}        
        







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
 

<table class="table table-striped table-black  table-hover border-5">
  <tbody>
    <tr data-widget="expandable-table" aria-expanded="false">
      <td> <strong>Repuestos</strong></td>
    </tr>
    @foreach($repuestos as $repuesto)
        @if($repuesto->pivot->check1 =='on')
    <tr class="expandable-body">
        <td><strong>{{ $repuesto->codigo }}</strong></td>
        <td>{{ $repuesto->descripcion}}</td> 
        <td>{{$repuesto->pivot->cant}}{{" "}}  {{$repuesto->pivot->unidad}}</td>
     </tr>
    @endif
    @endforeach
    <tr data-widget="expandable-table" aria-expanded="false">
      <td>219</td>
    </tr>
    <tr class="expandable-body">
      <td>
        <p>
          <!-- YOUR EXPANDABLE TABLE BODY HERE -->
        </p>
      </td>
    </tr>
    <tr data-widget="expandable-table" aria-expanded="false">
      <td>657</td>
    </tr>
    <tr class="expandable-body">
      <td>
        <p>
          <!-- YOUR EXPANDABLE TABLE BODY HERE -->
        </p>
      </td>
    </tr>
  </tbody>
</table>



<script>
  $('#expandable-table-header-row').on('collapsed.lte.expandableTable', handleToggledEvent)
</script>

@endsection




