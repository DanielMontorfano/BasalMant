{{-- @extends('layouts.plantilla') --}}
@extends('adminlte::page') 
@section('title', 'Fotos')
@section('content')

@include('layouts.partials.menuEquipo')




    <table class="table  table-sm table-dark ">
          @foreach($fotosTodos as $foto)
                                  
            <tbody>
                <tr>
                    {{-- <td>{{ $foto->nombreFoto}}</td> --}}
                
                <td style="text-align: center; vertical-align: middle;"><img src="..{{ $foto->rutaFoto}}" width="400" height="400"></td>
                </tr>
            </tbody>
        @endforeach
          
    </table>



  @include('layouts.partials.footer')
</div>
@endsection