
@extends('adminlte::page')
@section('title', 'Ver ' . $equipo->marca)
@section('content')
@include('layouts.partials.menuEquipo')



<div class="table-responsive">
    <table class="table table-responsive table-sm table-dark table-striped table-bordered table-hover">
          @foreach($docuTodos as $docu)
                                  
            <tbody>
                <tr>
                    {{-- <td>{{ $docu->nombreDocu}}</td> --}}
               
                <td> <iframe
                src="..{{ $docu->rutaDocu}}"
                width=90% height=600></iframe></td>
               {{-- <td><img src="..{{ $docu->rutaDocu}}" width="200" height="200"></td> --}}
                
                </tr>
            </tbody>
        @endforeach
            
    </table>
</div>

@endsection
