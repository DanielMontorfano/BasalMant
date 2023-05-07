{{-- @extends('layouts.plantilla') --}}
@extends('adminlte::page') 
@section('title', 'Fotos')
@section('content_header')

@include('layouts.partials.menuEquipo')
@stop
@section('content')

<div class="container">
  





    <table class="table  table-sm table-dark ">
          @foreach($fotosTodos as $foto)
                                  
            <tbody>
                <tr>
                   {{--  <td>{{ $foto->rutaFoto}}</td>  --}}
                {{--  <td style="text-align: center; vertical-align: middle;"><img src="..{{ $foto->rutaFoto}}" width="400" height="400"></td> --}}
                <td style="text-align: center; vertical-align: middle;"><img src="..{{ $foto->rutaFoto}}"  width="400" height="400"></td>
                  
            </tr>
            </tbody>
        @endforeach
          
    </table>

  </div>

  @include('layouts.partials.footer')

@endsection