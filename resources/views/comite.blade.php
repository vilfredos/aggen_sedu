@extends('Home')

@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario para Registrar Miembros del Comité</title>
    <link rel="stylesheet" type="text/css" href="{{ mix('css/comite.css') }}">
</head>
<body>
    <div class="container">

        <div class="superior">
        <img src="{{ asset('img/umss1.png') }}" alt="logo" class="imagen-estilo">

        <h1 class="titulo">Registrar Miembros del Comité</h1>
        </div>

        <form id="formulario">


        <div class="form-group">
            <label for="rector">Registrar Rector:</label>
            <input type="text" id="rector" name="rector" value="Ing. Julio Medina Gamboa" readonly>
        </div>
        
        <div class="form-group">
            <label for="fud">Vocal designado por la Fud:</label>
            <input type="text" id="fud" name="fud"   pattern="[A-Za-z ]+" required>
        </div>
        
        <div class="form-group">
            <label for="ful">Vocal designado por la Ful:</label>
            <input type="text" id="ful" name="ful"   pattern="[A-Za-z ]+" required>
        </div>
        
        <div class="form-group">
            <label for="vocalDocente1">Vocal docente:</label>
            <input type="text" id="vocalDocente1" name="vocalDocente1" pattern="[A-Za-z ]+" required>
            <label for="vocalEstudiante1">Vocal estudiante:</label>
            <input type="text" id="vocalEstudiante1" name="vocalEstudiante1" pattern="[A-Za-z ]+" required>
        </div>
        
        <div class="form-group">
            <label for="vocalDocente2">Vocal docente:</label>
            <input type="text" id="vocalDocente2" name="vocalDocente2" pattern="[A-Za-z ]+" required>
            <label for="vocalEstudiante2">Vocal estudiante:</label>
            <input type="text" id="vocalEstudiante2" name="vocalEstudiante2" pattern="[A-Za-z ]+" required>
        </div>
        
        <button type="button" id="asignarAleatoriamenteButton">Asignar Aleatoriamente</button>        <button type="submit" id="submitButton">Registrar Miembros del Comité</button>
        <p id="error-message" style="color: red;"></p>
    
    </form>
    </div>
    <script src="{{ asset('js/comite.js') }}"></script>
</body>
@endsection