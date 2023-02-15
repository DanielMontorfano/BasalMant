
@extends('adminlte::page')
@section('title', 'Ver ' . $equipo->marca)
@section('content')
@include('layouts.partials.menuEquipo')




    <table class="table table-sm table-dark  table-bordered ">
          @foreach($docuTodos as $docu)
                                  
            <tbody>
                <tr>
                    {{-- <td>{{ $docu->nombreDocu}}</td> --}}
               
                <td> <iframe
                src="..{{ $docu->rutaDocu}}"
                width=100% height=600></iframe></td>
               {{-- <td><img src="..{{ $docu->rutaDocu}}" width="200" height="200"></td> --}}
                
                </tr>
            </tbody>
        @endforeach
            
    </table>


    <div class="container"> 
        @include('layouts.partials.footer')
       </div>
@endsection
