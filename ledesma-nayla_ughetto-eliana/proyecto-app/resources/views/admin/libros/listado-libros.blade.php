<?php
/** @var $libros */
?>
@section('title' , 'Administración de libros - EPUB Depository')
@extends('layouts.admin')
@section('main')
<h1>Listado de libros</h1>
<div class="my-3">
  <a href="{{route('libros-formNew')}}" class="btn btn-primary">Publicar libro</a>
</div>
<div class="table-responsive">
  <table class="table my-3">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Titulo</th>
        <th scope="col">Autor</th>
        <th scope="col">Editorial</th>
        <th scope="col">Lanzamiento</th>
        <th scope="col">Género</th>
        <th scope="col">Precio</th>
        <th scope="col">Portada</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($libros as $libro)
      <tr>
        <th scope="row">{{$libro->libro_id}}</th>
        <td>{{$libro->titulo}}</td>
        <td>{{$libro->autor}}</td>
        <td>{{$libro->editorial}}</td>
        <td>{{$libro->lanzamiento}}</td>
        <td>{{$libro->generos->nombre}}</td>
        <td> <span>$</span>{{$libro->precio}}</td>
        <td>
          <div style="width:100px">
            @if ($libro->portada !== null && file_exists(public_path('imgs/' . $libro->portada)) )
            <img src="{{url('imgs/' . $libro->portada)}}" class="img-thumbnail" alt="{{$libro->portada_descripcion}}"> 
            @else
            <img src="{{URL::asset('imgs/libro-no-disponible.png')}}" alt="La portada del libro no se encuentra disponible." class="img-thumbnail"/>
            @endif
        </div>
        </td>
        <td>
          <div class="d-flex">
            <a href="{{route('confirm-delete' , ['id' => $libro->libro_id])}}" class="btn btn-danger mx-1">Eliminar</a>
            <a href="{{route('libros-form-edit', ['id' => $libro->libro_id])}}" class="btn btn-dark mx-1">Editar</a>
          </div>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection