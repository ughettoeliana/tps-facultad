<?php 
/** @var \Illuminate\Support\ViewErrorBag $errors */
/** @var \App\Models\Libro\ $libros */
/** @var \App\Models\generos[]|\Illuminate\Database\Eloquent\Collection $generos */
?>
@section('title' , 'Editar libro - EPUB Depository')
@extends('layouts.main')
@section('main')
<h1>Editar libro {{$libros->titulo}}</h1>
<form action="{{route('libros-process-edit' , ['id' => $libros->libro_id])}}" method="POST" class="form-control my-3" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="titulo" class="p-2">Titulo</label>
        <input type="text" class="form-control p-3" id="titulo" 
         @error('titulo') aria-describedby="titulo-help" @enderror 
        placeholder="Ingrese el titulo del libro" 
        name="titulo"
        value="{{old('titulo' , $libros->titulo)}}"
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
        value="{{old('autor' , $libros->autor)}}"
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
        value="{{old('editorial', $libros->editorial)}}">
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
        value="{{old('lanzamiento', $libros->lanzamiento)}}">
        @error('lanzamiento')
        <small id="lanzamiento-Help" class="form-text text-danger p-2">{{$message}}</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="genero_id" class="p-2">Género</label>
        <select class="form-control p-3" 
        id="genero_id" 
        name="genero_id"
        @error('genero') aria-describedby="genero-help" @enderror> 
        @foreach ( $generos as $genero)
        <option value="{{$genero->genero_id}}"
        @selected(old('genero_id' , $libros->genero_id) === $genero->genero_id)
        >{{$genero->nombre}}</option>
        @endforeach
        </select>
        @error('genero')
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
        value="{{old('precio' , $libros->precio)}}">
        @error('precio')
        <small id="precio-Help" class="form-text text-danger p-2">{{$message}}</small>  
        @enderror
    </div>
    <div class="form-group">
        <label for="portada" class="p-2">Seleccione una portada para el libro</label>
        <input type="file" class="form-control p-3" id="portada" name="portada">
        <div class="m-2">
        <p>Portada actual:</p>
         @if ($libros->portada !== null && file_exists(public_path('imgs/' . $libros->portada)) )
        <img src="{{url('imgs/' . $libros->portada)}}" class="img-thumbnail" alt="{{$libros->portada_descripcion}}" style="width:100px"/> 
        @else
        <img src="{{URL::asset('imgs/libro-no-disponible.png')}}" alt="La portada del libro no se encuentra disponible." class="img-thumbnail" style="width:100px" />
        @endif
        </div>
    </div>
    <div class="form-group">
        <label for="portada_descripcion" class="p-2">Descripción de la portada</label>
        <input type="text" class="form-control p-3" id="portada_descripcion"
        @error('portada_descripcion')
        aria-describedby="portada_descripcion-help"
        @enderror 
        placeholder="Ingrese la descripción de la portada" name="portada_descripcion"
        value="{{old('portada_descripcion' , $libros->portada_descripcion)}}"
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
        @enderror>{{old('sinopsis' , $libros->sinopsis)}}</textarea>
        @error('sinopsis')
        <small id="sinopsis-Help" class="form-text text-danger p-2">{{$message}}</small> 
        @enderror
    </div>
    <button type="submit" class="btn btn-primary my-3">Actualizar libro</button>
</form>
@endsection
