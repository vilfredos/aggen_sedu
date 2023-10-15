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
</head>
<body>
<div class="header">
    <div>
        <p>parte1</p>
    </div>
</div>
    <div class="sidebar">
    <nav>
        <ul>
            <li><a href="{{ url('/inicio') }}">Inicio</a></li>
            </ul>
           <!-- <ul><li><a href="{{ url('/roles') }}">Roles</a></li></ul>-->
             <ul> 
            <li><a href="{{ url('/eleccion') }}">Elección</a></li>
            </ul><ul> 
            <li><a href="{{ url('/usuarios') }}">Usuarios</a></li>
            </ul><ul> 
            <li><a href="{{ url('/resultados') }}">Resultados Posteriores</a></li>
        </ul>

    </nav>
    </div>
    <div class="content">
    @yield('content')
    </div>
    
    <div class="footer">
    <p>© 2023 Sistema Electoral Democratico Universitario, UMSS</p>
    <img src="{{ asset('img/logo.jpg') }}" alt="Descripción de la imagen" >

    </div>

    <!-- Aquí puedes agregar tus scripts JS -->
    <script src="{{ asset('js/home.js') }}"></script>
</body>
</html>