@extends('Home')

@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generar Convocatoria</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/comvocatoria.css') }}">

</head>
<body>
    <div class="algo">
        <form id="formulario">
        <div class="superior">
        <img src="{{ asset('img/umss1.png') }}" alt="logo" class="imagen-estilo">            <div class="titulo">Generar convocatoria</div>
            
        </div>
    </div>
        <div class="form-group">
            <label for="titulo">Título:</label>
            <input type="text" id="titulo" name="titulo">

            <div id="advertencia" class="advertencia"></div>

        </div>
        <div class="form-group">
            <label for="documento">Subir documento (solo archivos PDF)</label>
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
        <div id="error-message" class="advertencia"></div>
    </form>
    <button class="save-button" onclick="terimar_proceso()">Siguiente</button>
    </div>
    <script src="{{ asset('js/comvocatoria.js') }}"></script>
</body>
@endsection