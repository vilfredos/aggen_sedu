@extends('Home')

@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario para Registrar frente</title>
    <link href="{{ asset('css/frente.css') }}" rel="stylesheet">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    </head>
<body>
    <div class="container">
        <div class="superior">
            <img src="img/umss1.png" alt="Logo">
            <h1 class="titulo">Registrar frente</h1>
        </div>
        <form id="miFormulario" onsubmit="return validarFormulario()">
            <div class="form-group">
                <label for="representante">Representante:</label>
                <input type="text" id="representante" name="representante" pattern="[A-Za-záéíóúÁÉÍÓÚñÑ\s]+" required>
            </div>
            <div class="form-group">
                <label for="sigla">Sigla:</label>
                <input type="text" id="sigla" name="sigla" pattern="[A-Za-záéíóúÁÉÍÓÚñÑ\s]+" required>
            </div>
            <div class="form-group" id="nuevosCampos">
                <label for="candVicerector">Candidatos</label>
                <button type="button" id="agregarCampoBtn">Agregar Nuevo candidato</button>
            </div>
            <div class="form-group">
                <label for="coloresPrimarios">Colores primarios:</label>
                <select id="coloresPrimarios" name="coloresPrimarios" required>
                    <option value="rojo">Rojo</option>
                    <option value="amarillo">Amarillo</option>
                    <option value="azul">Azul</option>
                </select>
            </div>
            <div class="form-group">
                <label for="coloresSecundarios">Colores secundarios:</label>
                <select id="coloresSecundarios" name="coloresSecundarios" required>
                    <option value="blanco">Blanco</option>
                    <option value="negro">Negro</option>
                    <option value="verde">Verde</option>
                </select>
            </div>
            
                <button type="submit" name="action" value="save">Guardar y Registrar Nuevo Frente</button>
                <button type="button" onclick="limpiarCampos()">Cancelar</button>
                <button class="save-button" onclick="terimar_proceso()">siguiente</button>
        </form>
        <p id="error-message" style="color: red;"></p>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script src="{{ asset('js/frente.js') }}"></script>
</body>
@endsection