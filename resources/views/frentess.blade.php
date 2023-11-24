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

    <form action="{{ route('frente.store') }}" method="post">
        @csrf
        <label for="name_representante">Nombre del Representante:</label>
        <input type="text" id="name_representante" name="name_representante" readonly><br>
        <label for="sis_representante">SIS Representante:</label>
        <input type="text" id="sis_representante" name="sis_representante"><br>
        <label for="color_primario">Color Primario:</label>
        <select id="coloresPrimarios" name="coloresPrimarios" required>
            <option value="rojo">Rojo</option>
            <option value="amarillo">Amarillo</option>
            <option value="azul">Azul</option>
        </select><br>
        <label for="color_secundario">Color Secundario:</label>
        <select id="coloresPrimarios" name="coloresPrimarios" required>
            <option value="rojo">Rojo</option>
            <option value="amarillo">Amarillo</option>
            <option value="azul">Azul</option>
        </select><br>
        <label for="sigla_frente">Sigla del Frente:</label>
        <input type="text" id="sigla_frente" name="sigla_frente"><br>
        <label for="cod_eleccion">Código de Elección:</label>
        <select id="cod_eleccion" name="cod_eleccion">
            @foreach($elecciones as $eleccion)
            <option value="{{ $eleccion->id }}">{{ $eleccion->nombre }}</option>
            @endforeach
        </select><br>
        <input type="submit" value="Submit">
    </form>
    <p id="error-message" style="color: red;"></p>
    </div>
    <script src="{{ asset('js/frente.js') }}"></script>
</body>
@endsection