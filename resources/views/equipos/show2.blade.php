@extends('layouts.plantilla')
@section('title', 'Ver ' . $equipo->marca)
@section('content')
<h1></h1>
{{-- ESTO ES UN COMENTARIO <h1>Aqui podras ver el equipo: <?php echo $variable;?></h1> --}}
{{-- <h1>Aqui podras ver el equipo: {{ $variable}}</h1> --}}
<div class="card" STYLE="background: linear-gradient(to right,#495c5c,#030007);" >
  <div class="card-header" STYLE="background: linear-gradient(to right,#1e2020,#030007);">
    <ul class="nav nav-tabs card-header-tabs">
      <li class="nav-item">
        <a class="nav-link active" aria-current="true" href="{{route('equipos.show', $equipo->id)}}">Ficha</a>
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
  <div class="card-body">
    <h6 STYLE="text-align:center; font-size: 30px;
                background: -webkit-linear-gradient(rgb(1, 103, 71), rgb(239, 236, 217));
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;">Datos técnicos</h6>
    <p class="card-text"></p>
    <div class="card border-primary bg-secondary ">
    <div class="card-body "  style="max-width: 85;">
      <table class="table table-striped">
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
          <tr>
            <th scope="row" class="text-center">{{ $repuesto->codigo }}</th>
            <td>{{ $repuesto->descripcion}} </td>
            <td class="text-center">{{$repuesto->pivot->cant}}</td>
          </tr>
          @endforeach
          
        </tbody>
      </table>
      
    </table>
    </div>
    </div>
    
  </div>
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
 

{{-- Para hacer resposive necesito agregar las 2 ultimas librerias --}}
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script>src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"</script>
<script>src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap5.min.js"</script>




<script>
    $(document).ready(function () {
    $('#equipo').DataTable({
      
      reponsive: true,
      autoWidth: false,
      
      "language": {
            "lengthMenu": "Mostrar _MENU_",
            "zeroRecords": "No se encontró ningún registro - disculpe",
            "info": "Viendo _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros disponibles",
            "infoFiltered": "(filtrados desde _MAX_ total registros)",
            "search":"Buscar:",
            "paginate":{
            "next":"Siguiente",
            "previous":"Anterior"
          }

        }
    });
});
</script>
@endsection




