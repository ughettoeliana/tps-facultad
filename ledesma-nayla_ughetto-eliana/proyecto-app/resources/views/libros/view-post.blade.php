<?php
/** @var \App\Models\Posts\ $posts */
?>
@section('title' , 'Detalles del post')
@extends('layouts.main')
@section('main')
<article class="card w-100 my-3 ">
    <h1 class="m-3">{{$posts->titulo}}</h1>
    <div class="m-3">
        <div class="m-3 w-75">
            @if ($posts->imagen !== null && file_exists(public_path('imgs/' . $posts->imagen)) )
            <img src="{{url('imgs/' . $posts->imagen)}}" class="img-fluid" alt="{{$posts->imagen_descripcion}}"/> 
            @endif
        </div>
        <div>
            <p>{{$posts->descripcion}}</p>
            <p>{{$posts->contenido}}</p>
        </div>
    </div>
    <div class="m-3">
        <p>Autor: {{$posts->autores->nombre}}</p>
        <p>Categoria: {{$posts->categorias->nombre}}</p>
        <p>Fecha de creación: {{$posts->created_at}}</p>
    </div>
</article>
@endsection