<?php 
/* @var \Illuminate\Support\ViewErrorBag $errors */
/** @var \App\Models\generos[]|\Illuminate\Database\Eloquent\Collection $generos */
?>
@section('title' , 'Publicar libro - EPUB Depository')
@extends('layouts.admin')
@section('main')
<h1>Publicar libro</h1>
<form action="{{route('libros-processNew')}}" method="POST" class="form-control my-3" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="titulo" class="p-2">Titulo</label>
        <input type="text" class="form-control p-3" id="titulo" 
         @error('titulo') aria-describedby="titulo-help" @enderror 
        placeholder="Ingrese el titulo del libro" 
        name="titulo"
        value="{{old('titulo')}}"
        >
        @error('titulo')
        <small id="titulo-Help" class="form-text text-danger p-2">{{$message}}</small>
         @enderror
    </div>
    <div class="form-group">
        <label for="autor" class="p-2">Autor</label>
        <input type="text" class="form-control p-3" id="autor" 
        @error('autor')
        aria-describedby="autor-help" 
        @enderror
        placeholder="Ingrese el autor del libro" name="autor"
        value="{{old('autor')}}"
        >
        @error('autor')
        <small id="autor-Help" class="form-text text-danger p-2">{{$message}}</small>
        @enderror
    
    </div>
    <div class="form-group">
        <label for="editorial" class="p-2">Editorial</label>
        <input type="text" class="form-control p-3" id="editorial" 
        @error('editorial')
        aria-describedby="editorial-help" 
        @enderror
        placeholder="Ingrese la editorial del libro" name="editorial"
        value="{{old('editorial')}}">
        @error('editorial')
        <small id="editorial-Help" class="form-text text-danger p-2">{{$message}}</small>
        @enderror
     </div>
    <div class="form-group">
        <label for="lanzamiento" class="p-2">Fecha de publicación</label>
        <input type="date" class="form-control p-3" id="lanzamiento" 
        @error('lanzamiento')
        aria-describedby="lanzamiento-help"
        @enderror 
        placeholder="Ingrese la fecha de publicación" name="lanzamiento"
        value="{{old('lanzamiento')}}">
        @error('lanzamiento')
        <small id="lanzamiento-Help" class="form-text text-danger p-2">{{$message}}</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="genero_id" class="p-2">Género</label>
        <select class="form-control p-3" 
        id="genero_id" 
        name="genero_id"
        @error('genero_id') aria-describedby="genero-Help" @enderror> 
        @foreach ( $generos as $genero)
        <option value="{{$genero->genero_id}}"
        @selected(old('genero_id') === $genero->genero_id)
        >{{$genero->nombre}}</option>
        @endforeach
        </select>
        @error('genero_id')
        <small id="genero-Help" class="form-text text-danger p-2">{{$message}}</small>  
        @enderror
    </div>
    <div class="form-group">
        <label for="precio" class="p-2">Precio</label>
        <input type="number" class="form-control p-3" id="precio"
        @error('precio')
        aria-describedby="precio-help"
        @enderror 
        placeholder="Ingrese el precio del libro" name="precio"
        value="{{old('precio')}}">
        @error('precio')
        <small id="precio-Help" class="form-text text-danger p-2">{{$message}}</small>  
        @enderror
    </div>
    <div class="form-group">
        <label for="portada" class="p-2">Seleccione una portada para el libro</label>
        <input type="file" class="form-control p-3" id="portada" name="portada">
    </div>
    <div class="form-group">
        <label for="portada_descripcion" class="p-2">Descripción de la portada</label>
        <input type="text" class="form-control p-3" id="portada_descripcion"
        @error('portada_descripcion')
        aria-describedby="portada_descripcion-help"
        @enderror 
        placeholder="Ingrese la descripción de la portada" name="portada_descripcion"
        value="{{old('portada_descripcion')}}"
        >
        @error('portada_descripcion')
        <small id="portada_descripcion-Help" class="form-text text-danger p-2">{{$message}}</small> 
        @enderror
    </div>
    <div class="form-group">
        <label for="sinopsis" class="p-2">Sinopsis</label>
        <textarea class="form-control p-3" id="sinopsis" rows="3" name="sinopsis"
        @error('sinopsis')
        aria-describedby="sinopsis-help"
        @enderror>{{old('sinopsis')}}</textarea>
        @error('sinopsis')
        <small id="sinopsis-Help" class="form-text text-danger p-2">{{$message}}</small> 
        @enderror
    </div>
    <button type="submit" class="btn btn-primary my-3">Publicar libro</button>
</form>
@endsection
