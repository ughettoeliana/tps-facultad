<?php 
/* @var \Illuminate\Support\ViewErrorBag $errors */
?>
@section('title' , 'Login - EPUB Depository')
@extends('layouts.main')
@section('main')
<h1>Iniciar sesion</h1>
<form action="{{route('auth.process-login')}}" method="POST" class="form-control my-3" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="email" class="p-2">Email</label>
        <input type="email" class="form-control p-3" id="email" 
         @error('email') aria-describedby="email-help" @enderror 
        placeholder="Ingrese su email." 
        name="email"
        value="{{old('email')}}"
        >
        @error('email')
        <small id="email-Help" class="form-text text-danger p-2">{{$message}}</small>
         @enderror
    </div>
    <div class="form-group">
        <label for="password" class="p-2">Contraseña</label>
        <input type="password" class="form-control p-3" id="password" 
        @error('password')
        aria-describedby="password-help" 
        @enderror
        placeholder="Ingrese su contraseña." name="password"
        value="{{old('password')}}"
        >
        @error('password')
        <small id="password-Help" class="form-text text-danger p-2">{{$message}}</small>
        @enderror
    
    </div>
    
    <button type="submit" class="btn btn-primary my-3">Iniciar sesión</button>


</form>
@endsection
