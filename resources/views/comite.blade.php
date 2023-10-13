@extends('Home')

@section('content')
<head>
    <title>Formulario para Registrar Miembros del Comité</title>
</head>
<body>
    <div class="container">

        <div class="superior">
        <img src="img/umss1.png" alt="Logo">
        <h1 class="titulo">Registrar Miembros del Comité</h1>
        </div>
        <div class="form-group">
            <label for="rector">Registrar Rector:</label>
            <input type="text" id="rector" name="rector">
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
        
        <button type="button" onclick="validarFormulario()">Registrar Miembros del Comité</button>
        <p id="error-message" style="color: red;"></p>
    
    </div>
    <script src="{{ asset('js/comite.js') }}"></script>

</body>
@endsection