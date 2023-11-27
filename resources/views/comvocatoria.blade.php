@extends('Home')

@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title>Generar Convocatoria</title>
    <link href="{{ asset('css/comvocatoria.css') }}" rel="stylesheet">
    

</head>
<body>
    <div class="algo">
        <form id="formulario" action="/convocatoria" method="post" enctype="multipart/form-data">
        @csrf
                
                <label for="titulo">Titulo:</label>
                <select name="titulo" required>
                    <option value="Consejeros de Carrera">Consejeros de Carrera</option>
                    <option value="Consejeros Facultativos">Consejeros Facultativos</option>
                    <option value="Consejeros Universitarios">Consejeros Universitarios</option>
                    <option value="Directores de Carrera">Directores de Carrera</option>
                    <option value="Autoridades Facultativas">Autoridades Facultativas(Decano y Director Academico)</option>
                    <option value="Autoridades Universitarias">Autoridades Universitarias (Rector, Vice rectores)</option>
                </select>

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
                <div class="button-container">
                <button class="submit-btn">Publicar convocatoria</button>
                <button class="save-button" onclick="terimar_proceso()">Siguiente</button>
                </div>
                <div id="error-message" class="advertencia"></div>
        
        </form>
    </div>
        <script src="{{ asset('js/comvocatoria.js') }}"></script>
</body>
@endsection