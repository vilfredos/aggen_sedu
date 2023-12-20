@extends('Home')

@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Miembro del Comité</title>
    <link  href="{{ asset('css/modificacionComites.css') }}"  rel="stylesheet">

</head>
<body>
    <div class="container">

        <div class="superior">
        <img src="{{ asset('img/umss1.png') }}" alt="logo" class="imagen-estilo">

        <h1 class="titulo">Modificar Miembro del Comité</h1>
        </div>

        <div class="form-group">
                <label for="vocalDocenteTitular1">Vocal Docente Titular 1:</label>
                <input type="text" id="vocalDocenteTitular1" name="vocalDocenteTitular1" value="{{ $comite->VocalDocenteTitular1 }}">
            
        </div>
        
        <div class="contenido">
            <p>Miembro del comité que se modificará:</p>
            <select id="miembroComite" name="miembroComite">
                <option value="vocalFud">Vocal FUD</option>
                <option value="vocalFul">Vocal FUL</option>
                <option value="vocalDocente1">Vocal Docente 1</option>
                <option value="vocalEstudiante1">Vocal Estudiante 1</option>
                <option value="vocalDocente2">Vocal Docente 2</option>
                <option value="vocalEstudiante2">Vocal Estudiante 2</option>
                <option value="Ninguno">Ninguno</option>
            </select>

            <div id="nuevoMiembroDiv" style="display: none;">
                <label for="nuevoMiembro">Indique el nuevo miembro del Comite:</label>
                <input type="text" id="nuevoMiembro" name="nuevoMiembro">
            </div>

            <p>Indique la razón de la modificación de los miembros del comité:</p>
            <textarea id="razonModificacion" name="razonModificacion" rows="4" cols="50"></textarea>
            
            <label for="pdfDocumento">Subir documento PDF:</label>
            <input type="file" id="pdfDocumento" name="pdfDocumento" accept=".pdf">

            <button type="submit" id="submitBtn">Guardar Cambios</button>
        </div>
    </div>
    <script src="{{ asset('js/comiteModificacion.js') }}"></script>
</body>
@endsection