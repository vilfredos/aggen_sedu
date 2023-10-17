@extends('Home')

@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro de Mesas</title>
    <link rel="stylesheet" type="text/css" href="{{ mix('css/mesa.css') }}">
</head>
<body>
    <div class="container">
        <div class="superior">
            <img src="img/umss1.png" alt="Logo">
            <h1 class="titulo">Registro de Mesas</h1>
        </div>
        <form id="mesaForm" enctype="multipart/form-data">
            <div class="form-group">
                <label for="numeroMesa">Número de Mesa (solo números):</label>
                <input type="text" id="numeroMesa" name="numeroMesa" pattern="[0-9]+" required>
            </div>
            <div class="form-group">
                <label for="recintoVotacion">Recinto de Votación (solo letras):</label>
                <input type="text" id="recintoVotacion" name="recintoVotacion" pattern="[A-Za-z ]+" required>
            </div>
            <div class="form-group">
                <label for="aulaVotacion">Aula de Votación:</label>
                <input type="text" id="aulaVotacion" name="aulaVotacion" required>
            </div>
            <div class="form-group">
                <label for="fotoLugar">Subir Foto del Lugar:</label>
                <input type="file" id="fotoLugar" name="fotoLugar" accept="image/*" required>
            </div>
            <button type="submit">Registrar Mesa</button>
            <p id="error-message" style="color: red;"></p>
        </form>
        <button class="save-button" onclick="terimar_proceso()">siguiente</button>
    </div>
    <!-- Agrega tus scripts JavaScript -->
    <script src="{{ asset('js/mesa.js') }}"></script>
</body>
@endsection