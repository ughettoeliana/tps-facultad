<?php
/** @var \App\Models\Libro\ $libros */
?>
@section('title' , 'Detalle del libro')
@extends('layouts.main')
@section('main')
<h1 class="my-3">Detalle {{$libros->titulo}}</h1>
<article class="card w-100 my-3 ">
  <div class="row m-2">
    <div class="col-xs-6 col-md-6 text-center" >
      @if ($libros->portada !== null && file_exists(public_path('imgs/' . $libros->portada)) )
      <img src="{{url('imgs/' . $libros->portada)}}" class="img-fluid m-1" alt="{{$libros->portada_descripcion}}" style="width: 18rem;"> 
      @else
      <img src="{{URL::asset('imgs/libro-no-disponible.png')}}" alt="La portada del libro no se encuentra disponible." class="card-img-top mt-2" style="width: 18rem;"/>
      @endif
    </div>
      <div class="card-body col-xs-6 col-md-6">
        <h2 class="card-title">{{$libros->titulo}}</h2>
        <p>{{$libros->autor}}</p>
        <p class="text-success">$ {{$libros->precio}}</p>
        <div>
          <p>Editorial: <span>{{$libros->editorial}}</span></p>
          <p>Género: <span>{{$libros->generos->nombre}}</span></p>
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
        <div class="accordion my-3" id="accordion-reseña">
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#reseña-collapseOne" aria-expanded="true" aria-controls="reseña-collapseOne">
                Reseñas
              </button>
            </h2>
            <div id="reseña-collapseOne" class="accordion-collapse collapse">
              <div class="accordion-body">
              <p>Coming soon</p>
              </div>
            </div>
          </div>
         </div>
        <a href="#" class="btn btn-success">Comprar</a>
      </div>
  </div>
</article>
@endsection

