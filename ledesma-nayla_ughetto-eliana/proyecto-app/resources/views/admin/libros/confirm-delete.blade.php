<?php
/** @var \App\Models\Libro\ $libros */
?>
@section('title' , 'Eliminar libro - EPUB Depository')
@extends('layouts.main')
@section('main')
<h1>Eliminar libro {{$libros->titulo}}</h1>
<div class="card w-100 my-3 ">
    <div class="card-body row">
      <div class="col-xs-6 col-md-6 text-center" >
        @if ($libros->portada !== null && file_exists(public_path('imgs/' . $libros->portada)) )
        <img src="{{url('imgs/' . $libros->portada)}}" class="img-fluid m-1" alt="{{$libros->portada_descripcion}}" style="width: 18rem;"> 
        @else
        <img src="{{URL::asset('imgs/libro-no-disponible.png')}}" alt="La portada del libro no se encuentra disponible." class="card-img-top mt-2" style="width: 18rem;"/>
        @endif
      </div>
      <div class="col-xs-6 col-md-6">
        <h2 class="card-title">{{$libros->titulo}}</h2>
      <p>{{$libros->autor}}</p>
      <p><span>$</span>{{$libros->precio}}</p>
      <div>
        <p>Editorial: <span>{{$libros->editorial}}</span></p>
        <p>Fecha de publicación: <span>{{$libros->lanzamiento}}</span></p>
      </div>
      <div class="accordion my-3" id="accordion-sinopsis">
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#sinopsis-collapseOne" aria-expanded="true" aria-controls="sinopsis-collapseOne">
              Sinopsis
            </button>
          </h2>
          <div id="sinopsis-collapseOne" class="accordion-collapse collapse">
            <div class="accordion-body">
            <p>{{$libros->sinopsis}}</p>
            </div>
          </div>
        </div>
        
      </div>
      <hr>
      <div>
        <p>¿Quieres eliminar este libro de tus productos?</p>
        <p class="text-danger">Esta acción no se podrá deshacer.</p>
        <form action="{{route('process-eliminar' , ['id' => $libros->libro_id])}}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">Eliminar</button>
        </form>
        </div>

      </div>
     </div>
</div>
@endsection
