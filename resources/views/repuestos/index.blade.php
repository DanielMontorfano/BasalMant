{{-- @extends('layouts.plantilla') --}}
@extends('adminlte::page')
@section('title', 'Repuestos')
@section('css')
{{--  EL MEJOR EJEMPLO DE LA PAGINA DE jquery-ui (https://jqueryui.com/autocomplete/) !!! --}}
<link rel="stylesheet" href="{{asset('jquery-ui/jquery-ui.min.css')}}"> 
<script src="{{asset('jquery/dist/jquery.js')}}"></script>
<script src="{{asset('jquery-ui/jquery-ui.min.js')}}"></script>
@endsection
@section('content_header')
<h6 STYLE="text-align:center; font-size: 30px;
background: -webkit-linear-gradient(rgb(1, 103, 71), rgb(239, 236, 217));
-webkit-background-clip: text;
-webkit-text-fill-color: transparent;">Buscar repuestos</h6>
@stop
@section('content')
<div class="card border-primary" style="background: linear-gradient(to left,#495c5c,#030007); ">
<div class="card-body "  style="max-width: 95;">
<div class="text-white card-body "  style="max-width: 95;">
<p ><a title="Permite dar de alta un repuesto" class="text-white " href={{route('repuestos.create')}}> Crear repuesto</a></p> 

<div class="container">
 {{-- ver rep list unico --}}
 <table class="table table-sm" STYLE="background: linear-gradient(to right,#495c5c,#030007);" >
<form action="{{route('repuestos.catchId')}}" method="GET" class="form-horizontal" STYLE="background: linear-gradient(to right,#495c5c,#030007);">
  @csrf
  <div class="form-group"> 
            <tr>
                  <label class="control-label" for="search"></label> 
                  <td style="text-align: right;">
                      <input type="text" class='form-control' value="" name="search" id="search" autocomplete="off" placeholder="Buscar repuesto (Ej.: rodamiento, manguito, rele, 7984 2305 )" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);">
                          
                    </td>
                  <label class="control-label" for="editar"></label> 
                  <td style="text-align: right;">
                      <button class="btn btn-primary" type="submit" name="editar" id="editar" STYLE="background: linear-gradient(to right,#495c5c,#030007);">Editar</button>
                  </td>
            </tr>
  </div>  
</form>
</table>
</div>
<br>

</div>
</div>
</div>
<br>
<br><br><br>
<br><br><br><br>
<div class="container"> 
   @include('layouts.partials.footer')
</div>

<script>
   

  $( "#search" ).autocomplete({
    source: function(request, response){
      
            $.ajax({
            url:"{{route('search.repuestos')}}",
             dataType: 'json',
            data:{
                   term: request.term
                  },
                  success: function(data) {
                  response(data)  
          }

      });
    }
  });
</script>  


@endsection







