@extends('Home')

@section('content')
<head>

<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <!-- Aquí puedes agregar el contenido principal de tu página -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="{{ asset('css/panel.css') }}" rel="stylesheet">
</head>
<body>
    <div class="containerDash">

        <form class="formularioDash">
            <div class="superiorDash">
                <h1 class="titulo">Bienvenido al Panel Administrador</h1>
            </div>

            <div class="row">

           
            <div class="col-xl-auto">
                <a href="{{ url('panel/backup') }}">
                <div class="card"> <!-- Agregada la clase mx-auto para centrar la tarjeta -->
                    <div class="card-body text-center">
                        <div class="avatar avatar-md mx-auto mb-3"> <!-- No es necesario mx-auto aquí -->
                            <span class="avatar-initial rounded-circle bg-label-success"><i class="fa-solid fa-circle-down"></i></span>
                        </div>
                       
                            <span class="d-block mb-1 text-nowrap">Backups</span>
                        
                    </div>
                </div>
            </a>
            </div>
            <div class="col-xl-auto">
                <a href="{{ route('bitacora-index') }}">
                <div class="card"> <!-- Agregada la clase mx-auto para centrar la tarjeta -->
                    <div class="card-body text-center">
                        <div class="avatar avatar-md mx-auto mb-3"> <!-- No es necesario mx-auto aquí -->
                            <span class="avatar-initial rounded-circle bg-label-success"><i class="fa-solid fa-clipboard"></i></span>
                        </div>
                       
                            <span class="d-block mb-1 text-nowrap">Bitacora</span>
                        
                    </div>
                </div>
            </a>
            </div>
            <div class="col-xl-auto">
                <a href="{{route('poblacion.index')}}">
                <div class="card"> <!-- Agregada la clase mx-auto para centrar la tarjeta -->
                    <div class="card-body text-center">
                        <div class="avatar avatar-md mx-auto mb-3"> <!-- No es necesario mx-auto aquí -->
                            <span class="avatar-initial rounded-circle bg-label-success"><i class="fa-solid fa-database"></i></span>
                        </div>
                       
                            <span class="d-block mb-1 text-nowrap">Base de datos</span>
                        
                    </div>
                </div>
            </a>
            </div>
            <div class="col-xl-auto">
                <a href="{{ url('/usuarios') }}">
                <div class="card"> <!-- Agregada la clase mx-auto para centrar la tarjeta -->
                    <div class="card-body text-center">
                        <div class="avatar avatar-md mx-auto mb-3"> <!-- No es necesario mx-auto aquí -->
                            <span class="avatar-initial rounded-circle bg-label-success"><i class="fa-solid fa-users"></i></span>
                        </div>
                       
                            <span class="d-block mb-1 text-nowrap">Usuarios
                    </div>
                </div>
            </a>
            </div>
            <div class="col-xl-auto">
                <a href="{{ url('/roles') }}">
                <div class="card"> <!-- Agregada la clase mx-auto para centrar la tarjeta -->
                    <div class="card-body text-center">
                        <div class="avatar avatar-md mx-auto mb-3"> <!-- No es necesario mx-auto aquí -->
                            <span class="avatar-initial rounded-circle bg-label-success"><i class="fa-solid fa-user-shield"></i></span>
                        </div>
                       
                            <span class="d-block mb-1 text-nowrap">Roles</span>
                        
                    </div>
                </div>
            </a>
            </div>
            
            </div>

            
        </form>
    </div>
</body>
@endsection