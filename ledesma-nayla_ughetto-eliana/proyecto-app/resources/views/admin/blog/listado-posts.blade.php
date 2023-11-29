<?php
/** @var $posts */
?>
@section('title' , 'Administración del blog - EPUB Depository')
@extends('layouts.admin')
@section('main')
<h1>Listado de Posts</h1>
<div class="my-3">
  <a href="{{route('post-formNew')}}" class="btn btn-primary">Publicar un nuevo Post</a>
</div>
<div class="table-responsive">
    <table class="table my-3">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Titulo</th>
            <th scope="col">Autor</th>
            <th scope="col">Categoria</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Contenido</th>
            <th scope="col">Fecha de creación</th>
            <th scope="col">Imagen</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($posts as $post)
          <tr>
            <th scope="row">{{$post->post_id}}</th>
            <td>{{$post->titulo}}</td>
            <td>{{$post->autores->nombre}}</td>
            <td>{{$post->categorias->nombre}}</td>
            <td>{{$post->descripcion}}</td>
            <td>{{Str::limit($post->contenido, 40)}}</td>
            <td>{{$post->created_at}}</td>
            <td>
              <div style="width:100px">
                @if ($post->imagen !== null && file_exists(public_path('imgs/' . $post->imagen)) )
                <img src="{{url('imgs/' . $post->imagen)}}" class="img-thumbnail" alt="{{$post->imagen_descripcion}}"> 
                @else
                <img src="{{URL::asset('imgs/libro-no-disponible.png')}}" alt="La portada del libro no se encuentra disponible." class="img-thumbnail"/>
                @endif
            </div>
            </td>
            <td>
              <div class="d-flex">
                <a href="{{route('post-form-edit', ['id' => $post->post_id])}}" class="btn btn-dark mx-1">Editar</a>
                <a href="{{route('post-confirm-delete' , ['id' => $post->post_id])}}" class="btn btn-danger mx-1">Eliminar</a>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
</div>
@endsection