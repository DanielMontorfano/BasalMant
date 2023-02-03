{{-- @extends('layouts.plantilla') --}}
@extends('adminlte::page') 
@section('title', 'Fotos')
@section('content')

@include('layouts.partials.menuEquipo')


<div class="container "> {{-- Conatiner Tabla --}}
<div class="table-responsive">
    <table class="table table-responsive table-sm table-dark table-striped table-bordered table-hover">
          @foreach($fotosTodos as $foto)
                                  
            <tbody>
                <tr>
                    {{-- <td>{{ $foto->nombreFoto}}</td> --}}
                
                <td style="text-align: center; vertical-align: middle;"><img src="..{{ $foto->rutaFoto}}" width="400" height="400"></td>
                </tr>
            </tbody>
        @endforeach
          
    </table>
</div>
</div> {{-- Container tabla --}}
<div class="container"> 
  @include('layouts.partials.footer')
</div>
@endsection