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
                <h1 class="titulo">Bienvenido al Dashboard</h1>
            </div>

            <div class="container mt-5">
                <div class="row">
                    <div class="panel">
                        <div class="button-container">
                        <a href="{{ url('panel/backup') }}" class="btn btn-danger button">Backups</a>

                        <a href="{{ route('bitacora-index') }}" class="btn btn-success button">Bitacora</a>
                        <a href="{{ route('poblacion.index') }}" class="btn btn-success button">Alimentar Base</a>

                        </div>                
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
@endsection