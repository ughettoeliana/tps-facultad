<?php
/** @var $posts */
?>
@extends('layouts.main')
@section('title' , 'Blog - EPUB Depository')
@section('main')
<h1 class="my-2">Blog</h1>
<div>
    <p>Aquí podrás ver los post o novedades recientes.</p>
    <hr>
    @foreach ($posts as $post)
    <div class="card my-3">
        <div class="card-header">
          <p class="my-2">{{$post->categorias->nombre}}</p>
        </div>
        <div class="card-body">
          
          <div class="m-3">
            <h2 class="card-title">{{$post->titulo}}</h2>
            <p>{{$post->descripcion}}</p>
              @if ($post->imagen !== null && file_exists(public_path('imgs/' . $post->imagen)) )
              <img src="{{url('imgs/' . $post->imagen)}}" class="img-post img-fluid" alt="{{$post->imagen_descripcion}}"/> 
              @endif
          </div>
          <div class="m-3 ">
            <p class="card-text-blog">{{Str::limit($post->contenido, 280)}}</p>
            <a href="{{route('post-detalle', ['id' => $post->post_id])}}" class="btn btn-primary">Ver más</a>
          </div>
           <div class="my-3 d-flex">
            <p class="mx-2">Publicado por: {{$post->autores->nombre}}</p>
            <p class="mx2">El día {{$post->created_at}}</p>
          </div>
        </div>
      </div>
    @endforeach
</div>
@endsection
