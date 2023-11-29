@section('title' , 'EPUB Depository')
@extends('layouts.main')
@section('banner')
<div id="carousel-banner" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="{{URL::asset('imgs/banner.png')}}" alt="Banner EPUB Depository. Descubre tu próximo libro, una nueva forma de leer descubre la variedad de libros que tenemos en EPUB Depository. Portadas de los libros 'Así habló Zaratustra - Friedrich Nietzchie.' , 'El proceso - Franz Kafka.', 'El extranjero - Albert Camus.'">
    </div>
  </div>
</div>
@endsection
@section('main')
<h1 class="my-3">EPUB Depository</h1>
<p class="my-3">Los libros electrónicos en formato ePub son un tipo de archivo utilizado para leer libros en dispositivos electrónicos como lectores de libros electrónicos, tabletas, smartphones y computadoras.</p>
<p class="my-3">El formato ePub es un estándar abierto diseñado para optimizar la lectura en dispositivos con pantallas pequeñas, permitiendo que el contenido del libro se adapte al tamaño de la pantalla y que los usuarios puedan personalizar la fuente, el tamaño y el color del texto.</p>
@endsection
@section('section')
<section class="mt-3 intro-2">
  <h2 class="text-center text-white py-3 mx-2">¿Por qué elegir libros formato epub?</h2>
  <div class="my-3 row mx-3">
      <ul class="col-xs-6 col-md-6">
          <li class="my-3 text-white mx-3">Compatibilidad: los libros electrónicos en formato EPUB pueden ser leídos en una gran variedad de dispositivos, como tabletas, teléfonos inteligentes, ordenadores, lectores de libros electrónicos y más.
          </li>
          <li class="my-3 text-white mx-3">
              Portabilidad: los libros electrónicos se pueden llevar en un solo dispositivo, lo que permite que puedas llevar contigo una biblioteca entera sin tener que cargar con múltiples libros físicos.
          </li>
          <li class="my-3 text-white mx-3">
              Ahorro de espacio y costo: dado que los libros electrónicos no ocupan espacio físico, te permiten ahorrar espacio en tu hogar o en tu lugar de trabajo. Además los libros electrónicos son más económicos que los libros físicos, lo que significa que puedes comprar más libros sin gastar tanto dinero.
          </li>
      </ul>
      <ul class="col-xs-6 col-md-6">
          <li class="my-3 text-white mx-3">
              Funciones adicionales: los libros electrónicos en formato EPUB suelen ofrecer funciones adicionales, como la posibilidad de subrayar, tomar notas, traducir palabras, ajustar el tamaño de la letra, entre otras.
          </li>
          <li class="my-3 text-white mx-3">
              Accesibilidad: los libros electrónicos en formato EPUB pueden ser una gran opción para personas con discapacidades visuales o de movilidad, ya que pueden utilizar dispositivos adaptados para leerlos.
          </li>
          <li class="my-3 text-white mx-3">
              Sostenibilidad: los libros electrónicos no requieren de papel ni de tinta, lo que significa que son una opción más amigable con el medio ambiente.
          </li>
      </ul>
  </div>
</section>
@endsection