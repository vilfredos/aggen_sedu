<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Universidad Mayor de San Simón</title>
    <!-- Aquí puedes agregar tus hojas de estilo CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/home.css') }}">
</head>
<body>
<div class="header">
    <img src="{{ asset('img/Escudo-UMSS.jpg') }}" alt="Descripción de la imagen" class="imagen-umss">
    <h11>SEDU</h11>
</div>
    <div class="sidebar">
    <button onclick="toggleNav()">Toggle Navigation</button>
    <nav>
        <ul>
            <li><a href="{{ url('/inicio') }}">Inicio</a></li>
            </ul> <ul> 
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
    <img src="{{ asset('img/logo.jpg') }}" alt="Descripción de la imagen" class="imagen-logo">
    

    </div>
    
    <script src="{{ asset('js/home.js') }}"></script>
    <!-- Aquí puedes agregar tus scripts JS -->
</body>
</html>