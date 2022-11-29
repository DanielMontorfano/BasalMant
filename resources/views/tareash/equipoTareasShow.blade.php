@extends('layouts.plantilla')
@section('title', 'Ver ' . $equipo->marca)
@section('css')
{{-- https://datatables.net/ **IMPORTANTE PLUG IN PARA LAS TABLAS --}}
{{-- Para que sea responsive se agraga la tercer libreria --}}
{{-- Todo lo de plantilla --}}
{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}


@endsection

@section('content')

<h1>Ahora eatas en tareash Ver tareas</h1>
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
        <a class="nav-link" href="{{route('equipos.index')}}">Imprimir</a>
      </li>
      

    </ul>
  </div>
  
    <h6 STYLE="text-align:center; font-size: 30px;
                background: -webkit-linear-gradient(rgb(1, 103, 71), rgb(239, 236, 217));
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;">Datos técnicos</h6>
                <div class="row align-items-end">
                  <div class="col-4">Columna 1</div>
                  <div class="col-4">Columna 2</div>
                  <div class="col-4">Columna 3</div>
               </div>
      
        <p ><a  class="text-white " href={{route('equipoTareash.edit', $equipo->id)}}>Cargar tareas</a></p>
        
        @if(isset($PlanP))
        @foreach($PlanP as $plan)
        <table  class="table-bordered" >
          <tr >
              <td >{{$plan['codigo']}}</td>
        
              <td>Protocolo
                @if(isset($ProtocoloP))
                @foreach($ProtocoloP as $protocolo)
                <div class="row align-items-end">
                  
                  @foreach($Tareas as $tarea) 
                  @if($protocolo['codProto'] ==$tarea['cod'])
                  <div class="col-4">{{$tarea['descripcion']}}</div>
                  <div class="col-4">{{$tarea['codigoTar']}}</div>
                  <div class="col-4">Columna 3</div>
                  @endif 
                  @endforeach  
                  
               </div>
              
               @endforeach  
               @endif

               
              </td>
          </tr>
         
      </table>
      @endforeach
      @endif 
       
       
       
       
       
       
       
       
        <table class="table" STYLE="background: linear-gradient(to right,#495c5c,#030007);">
          <thead>
             <tr>
               
               <th style="text-align: center; color: #ffffff;" scope="col">Código</th>
               <th style="text-align: center; color: #ffffff;" scope="col">Descripción</th>
               
               
             </tr>
           </thead>

        @if(isset($PlanP))
          @foreach($PlanP as $plan)
           <tr>
          
            <th STYLE="color: #9f2206; font-family: Times New Roman;  font-size: 14px; "scope="row">{{$plan['codigo']}}</th>
            <td STYLE="color: #9f2206; font-family: Times New Roman;  font-size: 14px; ">{{$plan['descripcion']}}</td>
           
          </tr>
           
           @if(isset($ProtocoloP))
           @foreach($ProtocoloP as $protocolo)
                <tbody>
                       <tr>
                        
                         <th STYLE="color: #1c0df1; font-family: Times New Roman;  font-size: 14px; "scope="row">{{$protocolo['codProto']}}</th>
                         <td STYLE="color: #1c0df1; font-family: Times New Roman;  font-size: 14px; ">{{$protocolo['descripcion']}}</td>
                        
                        </tr>
                       @foreach($Tareas as $tarea) 
                       @if($protocolo['codProto'] ==$tarea['cod'])
                       <tr>
                       
                       
                       <td STYLE="color: #0f0e0e; font-family: Times New Roman;  font-size: 14px; "scope="row">{{$tarea['codigoTar']}}</td>
                       <td STYLE="color: #0f0f0f; font-family: Times New Roman;  font-size: 14px; ">{{$tarea['descripcion']}}</td>
                     
                      </tr>
                       @endif
                       @endforeach
                 </tbody>
               @endforeach
             @endif
          @endforeach {{-- Para Plans --}}
        @endif {{-- Para Plans --}}

   </table>
      


    







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




