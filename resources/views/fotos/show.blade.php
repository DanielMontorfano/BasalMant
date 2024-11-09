@extends('adminlte::page') 
@section('title', 'Fotos')
@section('content_header')

@include('layouts.partials.menuEquipo')
@stop
@section('content')

<div class="container">
    <div class="row">
        @foreach($fotosTodos as $foto)
            <div class="col-md-3 mb-4">
                <a href="#" class="thumbnail" data-toggle="modal" data-target="#modalFoto{{$foto->id}}">
                    <img src="{{ asset($foto->rutaFoto) }}" class="img-fluid" alt="{{ $foto->nombreFoto }}">
                </a>
                <div class="text-center">
                    <p>{{ $foto->nombreFoto }}</p>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="modalFoto{{$foto->id}}" tabindex="-1" role="dialog" aria-labelledby="modalFotoLabel{{$foto->id}}" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="modalFotoLabel{{$foto->id}}">{{ $foto->nombreFoto }}</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body text-center" style="background: linear-gradient(to bottom right, #151618, #434649);">
                          <img src="{{ asset($foto->rutaFoto) }}" class="img-fluid" alt="{{ $foto->nombreFoto }}">
                      </div>
                  </div>
              </div>
            </div>
        @endforeach
    </div>
</div>

@include('layouts.partials.footer')

@endsection

@section('css')
    <style>
        .thumbnail {
            display: block;
            transition: transform 0.2s;
        }
        .thumbnail:hover {
            transform: scale(1.05);
        }
        .thumbnail img {
            width: 100%;
            height: auto;
        }
    </style>
@stop
