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
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link  href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head >
<body>
   
    
<div class="header d-flex">
    <div id="buttonContainer" class="custom-menu" style="display:flex;margin-left: 290px; align-items:center;justify-content:center;">
        <button type="button" id="sidebarCollapse" class="btn btn-primary">
  <i class="fa fa-bars"></i>
  <span class="sr-only">Toggle Menu</span>
</button>
</div>
<ul class="navbar-nav navbar-right" style="color: white;margin-left:70%;">

    <ul class="navbar-nav ms-auto">
        @guest
            @if (Route::has('login'))
                <li class="nav-item">
                  
                    <a  class="btn btn-danger "   href="{{ route('login') }}">Login</a>
                </li>
            @endif

           
        @else
            <li class="nav-item dropdown d-flex pt-1">
                <img class="logo-umss" src="{{ asset('img/user.png') }}" alt="">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="padding: 20px">
                    {{ Auth::user()->name }}
                </a>

                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    
                    <a class="dropdown-item" href="{{ route('NewPassword') }}">
                        {{ __('Perfil') }}
                    </a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Salir') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        @endguest
    </ul>
</div>


    <div  id="sidebar" class="sidebar">
                 <div class="app-title">
                        <img class="logo-umss" src="{{ asset('img/logo-umss.png') }}" alt="">
                    <div class="nombres">
                        <h1>SEDU</h1>
                        <p>Sistema Electoral Universitario</p>
                    </div>
                </div>
        <nav class="menu-container">
            <ul class="container">
                 <li class="item">
                    <a  href="{{ url('/inicio') }}">
                        <i class="fa-solid fa-house" style="color: #ffffff;"></i><span class="nombres" >Inicio</span>
                    </a>
                    
                 </li>
            
           
             
                 <li class="item">
                    
                     <a href="{{ url('/eleccion') }}">
                        <i class="fa-solid fa-user-check" style="color: #ffffff;"></i><span class="nombres">Eleccion</span>
                    </a>
                </li>
            
        
                <li class="item">
                    
                    <a href="{{ url('/usuarios') }}">
                        <i class="fa-solid fa-user" style="color: #ffffff;"></i><span class="nombres">Usuarios</span>
                    </a>
                </li>
        
                <li class="item">
                   
                    <a href="{{ url('/roles') }}">
                        <i class="fa-solid fa-user-shield" style="color: #ffffff;"></i><span class="nombres">Roles</span>
                    </a>
                        
                    
                </li>
                <li class="item">
                    
                    <a href="{{ url('/inicioActa') }}">
                        <i class="fa-solid fa-user" style="color: #ffffff;"></i><span class="nombres">Actas</span>
                    </a>
                </li>
                <li class="item">
                    
                    <a href="{{ url('/ver_lista_jurados') }}">
                        <i class="fa-solid fa-user" style="color: #ffffff;"></i><span class="nombres">Lista Jurados</span>
                    </a>
                </li>
                    
                <li class="item">
                    
                    <a href="{{ url('/votosPorMesa') }}">
                        <i class="fa-solid fa-square-poll-horizontal" style="color: #ffffff;"></i><span class="nombres">Ver Votos</span>
                    </a>
                </li>
           
                <li class="item">
                    
                    <a href="{{ url('/resultados') }}">
                        <i class="fa-solid fa-square-poll-horizontal" style="color: #ffffff;"></i><span class="nombres">Resultados Anteriores </span>
                    </a>
                </li>
            </ul>


            <ul class="container"> 
                <li class="item">
                    
                    <a href="{{ url('/comite') }}">
                        <i class="fa-solid fa-users" style="color: #ffffff;"></i><span class="nombres">Miembros del comite</span>
                    </a>
            
        </ul>
    </li>
</ul>
                </li>
            </ul>

            <ul class="container">
                <!-- Menú Actas con un identificador "actas-menu" -->
            </ul>
                </li>

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
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
document.addEventListener("DOMContentLoaded", function() {
    const actasMenu = document.getElementById("actas-menu");
    const subMenu = actasMenu.querySelector(".sub-menu");

    // Ocultar el submenú inicialmente
    subMenu.style.display = "none";

    // Agregar un evento de clic al elemento "Actas" para mostrar/ocultar el submenú
    actasMenu.addEventListener("click", function() {
        if (subMenu.style.display === "none") {
            subMenu.style.display = "block";
        } else {
            subMenu.style.display = "none";
        }
    });
});
</script>
<script src="js/jquery.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>


</body>

</html>