<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="<?= url('css/app.css');?>">
    <title>@yield('title')</title>
</head>
<body>
    <header>
    <nav class="navbar navbar-expand-md">
        <button class="navbar-toggler  mx-2" type="button" data-bs-toggle ="collapse" data-bs-target="#btn"> <i class='bx bx-menu'></i> </button>
        <div class="navbar-collapse collapse mt-3 my-3" id="btn">
            <ul class="navbar-nav ms-auto d-flex justify-content-start"> 
                <li class="nav-item"><a href="<?= url('/');?>" class="nav-link  mx-3 my-2">Home</a></li>
                <li class="nav-item"><a href="{{url ('/libros')}}" class="nav-link  mx-3 my-2">Libros</a></li>
                <li class="nav-item"><a href="{{url('blog')}}" class="nav-link mx-3 my-2">Blog</a></li>
                @auth
                <li class="me-5 my-2">
                    <div class="dropdown mx-3 ">
                    <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class='bx bxs-user mx-1' style='color:#000000'></i> Mi Cuenta
                    </button>
                    <ul class="dropdown-menu text-center" aria-labelledby="dropdownMenuButton1">
                    <li class="my-2 mx-2">Hola! <span class="text-success"></span></li>
                    <li class="nav-item"><a href="#" class="nav-link mx-2 my-2 text-dark">Perfil</a></li>
                    <li>
                    <form action="{{route('auth.logout')}}" method="post">
                        @csrf
                    <button class="dropdown-item my-2" type="submit">
                    <i class='bx bx-log-out mx-1'></i> Cerrar Sesión</button>
                    </form>
                    </li>
                    </ul>
                    </div>
                </li>
                @else
                <li class="nav-item"><a href="{{route('auth.form-login')}}" class="nav-link mx-3 my-2">Iniciar sesión</a></li>
                <li class="nav-item"><a href="#" class="nav-link mx-3 my-2">Registrarse</a></li>
                @endauth
            </ul>
        </div>
    </nav>
    @yield('banner')
</header>
@if (Session::has('message.success'))
<div class="alert alert-success text-center">{{Session::get('message.success')}}</div>
@endif
<main class="container">
@yield('main')
</main>
@yield('section')
<footer>
    <p>Ledesma Nayla Agustina | Ughetto Eliana Carolina </p>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>