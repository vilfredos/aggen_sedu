<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title>Universidad Mayor de San Simón</title>
    <!-- Aquí puedes agregar tus hojas de estilo CSS -->

<link href="{{ asset('css/body.css') }}" rel="stylesheet">   
<link href="{{ asset('css/header.css') }}" rel="stylesheet">   
<link href="{{ asset('css/sidebar.css') }}" rel="stylesheet">   
<link href="{{ asset('css/content.css') }}" rel="stylesheet">   
<link href="{{ asset('css/footer.css') }}" rel="stylesheet"> 
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link  href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>
<body>
    
<div class="header d-flex">


        <div class="app-title">
            <img class="logo-umss" src="{{ asset('img/logo-umss.png') }}" alt="">
            <div class="nombres">
               <h1>SEDU</h1>
               <p>Sistema Electoral Universitario</p>
            </div>
        </div>
        <div  style="display:flex; align-items:center;justify-content:center; margin-left:72%" >
            @guest
                <a  class="btn btn-danger "   href="{{ route('login') }}">Login</a>
            @else
                
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="btn btn-danger" type="submit">Logout</button>
                    </form>
                
            @endguest
        </div> 
    
</div>
    <div class="sidebar">
    <nav class="menu-container">
        <ul class="container">
            <li class="item">
                <span class="material-symbols-outlined">
                home
                </span>
                <a  href="{{ url('/inicio') }}">Inicio</a>
            </li>
        </ul>
           <!-- <ul><li><a href="{{ url('/roles') }}">Roles</a></li></ul>-->
        <ul class="container"> 
            <li class="item">
                <span class="material-symbols-outlined">
                    how_to_reg
                </span>
                <a href="{{ url('/eleccion') }}">Elección</a></li>
        </ul>
        <ul class="container"> 
            <li class="item">
                <span class="material-symbols-outlined">
                    person
                    </span>
                <a href="{{ url('/usuarios') }}">Usuarios</a>
            </li>
        </ul>
        <ul class="container"> 
            <li class="item">
                <span class="material-symbols-outlined">
                    person
                    </span>
                <a href="{{ url('/roles') }}">Roles</a>
            </li>
        </ul>
        <ul class="container"> 
            <li class="item">
                <span class="material-symbols-outlined">
                    library_books
                    </span>
                <a href="{{ url('/resultados') }}">Resultados Posteriores</a>
            </li>
        </ul>

    </nav>
    </div>
    <div class="content">
    @yield('content')
    </div>
    
    <div class="footer">
    <p class="derechos">DERECHOS RESERVADOS &copy; 2023 - UNIVERSIDAD MAYOR DE SAN SIMON</p>
    

    </div>

    <!-- Aquí puedes agregar tus scripts JS -->
    <script src="{{ asset('js/home.js') }}"></script>
</body>
</html>