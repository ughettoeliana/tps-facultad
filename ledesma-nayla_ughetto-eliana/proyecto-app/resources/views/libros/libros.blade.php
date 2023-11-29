<?php
/** @var $libros */
?>
@section('title', 'Libros - EPUB Depository')
@extends('layouts.main')
@section('main')
    <h1 class="my-3">Productos</h1>
    <section class="row d-flex justify-content-center">
        <div>
            <form action="#" method="GET" class="mx-1 mt-3">
                <div class="input-group mb-3 mx-1">
                    <input type="text" class="form-control p-2" placeholder="Escriba el nombre del libro o Autor."
                        aria-label="Buscar titulo del libro o Autor del libro"
                        aria-describedby="Buscar titulo del libro o Autor del libro" name="search"
                        value="{{ request()->get('search') }}">
                    <div class="input-group-append mx-1">
                        <button class="btn btn-primary mx-1 p-2" type="submit" value="buscar">Buscar</button>
                    </div>
                </div>
            </form>
        </div>
        @if (count($libros) <= 0)
            <p>Lo sentimos no contamos con el libro que estás buscando.</p>
        @else
            @foreach ($libros as $libro)
                <article class="card m-3" style="width: 18rem;">
                    @if ($libro->portada !== null && file_exists(public_path('imgs/' . $libro->portada)))
                        <img src="{{ url('imgs/' . $libro->portada) }}" class="portada card-img-top mt-2"
                            alt="{{ $libro->portada_descripcion }}" />
                    @else
                        <img src="{{ URL::asset('imgs/libro-no-disponible.png') }}"
                            alt="La portada del libro no se encuentra disponible." class="portada card-img-top mt-2" />
                    @endif
                    <div class="card-body">
                        <h2 class="card-title">{{ $libro->titulo }}</h2>
                        <p class="card-text">{{ $libro->autor }}</p>
                        <p class="card-text text-success"><span>$</span>{{ $libro->precio }}</p>
                        <a href="{{ route('libro-detalle', ['id' => $libro->libro_id]) }}" class="btn btn-primary">Ver
                            más</a>
                    </div>
                </article>
            @endforeach
        @endif
    </section>
@endsection
