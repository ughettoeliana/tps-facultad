<?php 
/* @var \Illuminate\Support\ViewErrorBag $errors */
/** @var \App\Models\categorias[]|\Illuminate\Database\Eloquent\Collection $categorias */
?>
@section('title' , 'Publicar post - EPUB Depository')
@extends('layouts.admin')
@section('main')
<h1>Publicar post</h1>
<form action="{{route('post-processNew')}}" method="POST" class="form-control my-3" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="titulo" class="p-2">Titulo:</label>
        <input type="text" class="form-control p-3" id="titulo" 
         @error('titulo') aria-describedby="titulo-help" @enderror 
        placeholder="Ingrese el titulo del libro" 
        name="titulo"
        value="{{old('titulo')}}"
        >
        @error('titulo')
        <small id="titulo-help" class="form-text text-danger p-2">{{$message}}</small>
         @enderror
    </div>
    <div class="form-group">
        <label for="descripcion" class="p-2">Descripción:</label>
        <input type="text" class="form-control p-3" id="descripcion" 
        @error('descripcion')
        aria-describedby="descripcion-help" 
        @enderror
        placeholder="Ingrese una breve descripción del post." name="descripcion"
        value="{{old('descripcion')}}"
        >
        @error('descripcion')
        <small id="descripcion-help" class="form-text text-danger p-2">{{$message}}</small>
        @enderror
    
    </div>
    <div class="form-group">
        <label for="categoria_id" class="p-2">Categoria</label>
        <select class="form-control p-3" 
        id="categoria_id" 
        name="categoria_id"
        @error('categoria_id') aria-describedby="categoria-help" @enderror> 
        @foreach ( $categorias as $categoria)
        <option value="{{$categoria->categoria_id}}"
        @selected(old('categoria_id') === $categoria->categoria_id)
        >{{$categoria->nombre}}</option>
        @endforeach
        </select>
        @error('categoria_id')
        <small id="categoria-help" class="form-text text-danger p-2">{{$message}}</small>  
        @enderror
    </div>
  
    <div class="form-group">
        <label for="imagen" class="p-2">Seleccione una portada para el Post:</label>
        <input type="file" class="form-control p-3" id="imagen" name="imagen">
    </div>
    <div class="form-group">
        <label for="imagen_descripcion" class="p-2">Descripción de la portada:</label>
        <input type="text" class="form-control p-3" id="imagen_descripcion"
        @error('imagen_descripcion')
        aria-describedby="imagen_descripcion-help"
        @enderror 
        placeholder="Ingrese la descripción de la portada" name="imagen_descripcion"
        value="{{old('imagen_descripcion')}}"
        >
        @error('imagen_descripcion')
        <small id="imagen_descripcion-help" class="form-text text-danger p-2">{{$message}}</small> 
        @enderror
    </div>
    <div class="form-group">
        <label for="contenido" class="p-2">Contenido:</label>
        <textarea class="form-control p-3" id="contenido" rows="3" name="contenido"
        @error('contenido')
        aria-describedby="contenido-help"
        @enderror>{{old('contenido')}}</textarea>
        @error('contenido')
        <small id="contenido-help" class="form-text text-danger p-2">{{$message}}</small> 
        @enderror
    </div>
    <button type="submit" class="btn btn-primary my-3">Publicar Post</button>
</form>
@endsection
