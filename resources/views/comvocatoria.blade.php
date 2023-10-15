@extends('Home')

@section('content')
<head>

    <title>Formulario de Convocatoria</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/comvocatoria.css') }}">
</head>
<body>
    <div class="container">
        <div class="form-group">
            <label for="titulo">Título:</label>
            <input type="text" id="titulo" name="titulo">
        </div>
        <div class="form-group">
            <label for="documento">Subir documento:</label>
            <input type="file" id="documento" name="documento" accept=".pdf">
        </div>
        <div class="form-group">
            <label for="fechaInicio">Fecha de inicio de recepción de documentos:</label>
            <input type="date" id="fechaInicio" name="fechaInicio">
        </div>
        <div class="form-group">
            <label for="fechaFin">Fecha final de recepción de documentos:</label>
            <input type="date" id="fechaFin" name="fechaFin">
        </div>
        <button class="submit-btn">Publicar convocatoria</button>
        <button type="button" onclick="llevame_a_poblacion()" class="btn">siguiete</button>

    </div>
    <script src="{{ asset('js/comvocatoria.js') }}"></script>
    
</body>
@endsection