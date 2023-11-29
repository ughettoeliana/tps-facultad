<?php
/** @var \App\Models\Posts\ $posts */
?>
@section('title', 'Eliminar post - EPUB Depository')
@extends('layouts.main')
@section('main')
  <h1>Eliminar post {{ $posts->titulo }}</h1>
  <div class="card w-100 my-3 ">
        <div class="card-body row">
            <div class="col-xs-6 col-md-6 text-center">
                @if ($posts->imagen !== null && file_exists(public_path('imgs/' . $posts->imagen)))
                    <img src="{{ url('imgs/' . $posts->imagen) }}" class="img-fluid m-1" alt="{{ $posts->imagen_descripcion }}"
                        style="width: 18rem;">
                @else
                    <img src="{{ URL::asset('imgs/libro-no-disponible.png') }}"
                        alt="La portada del libro no se encuentra disponible." class="card-img-top mt-2"
                        style="width: 18rem;" />
                @endif
            </div>
            <div class="col-xs-6 col-md-6">
                <h2 class="card-title">{{ $posts->titulo }}</h2>
                <p>{{ $posts->descripcion }}</p>
                <p>{{ $posts->contenido }}</p>
            </div>
            <hr>
            <div>
                <p>¿Quieres eliminar este post del blog?</p>
                <p class="text-danger">Esta acción no se podrá deshacer.</p>
                <form action="{{ route('post-process-eliminar', ['id' => $posts->post_id]) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
         </div>
    </div>
  </div>
@endsection
