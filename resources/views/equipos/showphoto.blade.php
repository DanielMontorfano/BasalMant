@extends('layouts.plantilla')
@section('title', 'Ver ' . $equipo->marca)
@section('content')

{{-- ESTO ES UN COMENTARIO <h1>Aqui podras ver el equipo: <?php echo $variable;?></h1> --}}
{{-- <h1>Aqui podras ver el equipo: {{ $variable}}</h1> --}}
<h1>Aqui podras ver el equipo: {{ $equipo->codEquipo}}</h1>

<a href="{{route('equipos.index')}}"> Volver a equipos</a>
<br>
<a href={{route('equipos.edit', $equipo->id)}}> Editar este equipo</a>
<br>
<br>

<div class="card text-center">
  <div class="card-header">
    <ul class="nav nav-tabs card-header-tabs">
      <li class="nav-item">
        <a class="nav-link " aria-current="true" href="{{route('equipos.show', $equipo->id)}}">Ficha</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="{{route('equipos.showphoto', $equipo->id)}}">Fotos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('equipos.index')}}">Fotos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('equipos.index')}}">Fotos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('equipos.index')}}">Fotos</a>
      </li>
    </ul>
  </div>
  <div class="card-body">
    <h5 class="card-title">Datos técnicos</h5>
    <p class="card-text"></p>
    <div class="card border-primary bg-secondary ">
    <div class="card-body "  style="max-width: 85;">
      <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="../../storage/imagenesEquipos/0cuox6Zt6C2NOrtsrWeoPi828Cml1mCxAvIP9vW2.png" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="../../storage/imagenesEquipos/4clag0JooUAReTdpG0ZX0duEUn4PW8uSJxEro3ek.png" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="..." class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Anterior</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Siguiente</span>
  </button>
</div>
      
    </table>
    </div>
    </div>
    
  </div>
</div>

<h1>QUE PASA MEN</h1>
<table>
<thead>
  <tr>
    <th scope="col" class="text-center">ID</th>
    <th scope="col" class="text-center">RUTA</th>
    <th scope="col" class="text-center">IMAGEN</th>
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







<p><strong>Marca:</strong>{{$equipo->marca}}</p>
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
         
@endforeach


 <h3>Estoy en equipos.show.blade </h3>


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




