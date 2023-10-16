<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Universidad Mayor de San Simón</title>
    <!-- Aquí puedes agregar tus hojas de estilo CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/body.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/sidebar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/content.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/footer.css') }}">
    <link  href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>
<body>
<div class="header">
    <div class="app-title">
        <img class="logo-umss" src="{{ asset('img/logo-umss.png') }}" alt="">
       <div class="nombres">
            <h1>SEDU</h1>
    
        <p>Sistema Electoral Universitario</p>
    </div>
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
                <a href="{{ url('/user') }}">Usuarios</a>
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