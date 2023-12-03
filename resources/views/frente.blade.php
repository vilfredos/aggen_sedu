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
    <p>{{ $id }}</p>
    <form action="{{ route('frente.store') }}" method="post">
        @csrf
        <label for="sis_representante">SIS Representante:</label>
        <input type="number" min="1" step="1" id="sis_representante" name="sis_representante"><br>

        <label for="nombre_frente">Nombre del Frente:</label>
        <input type="text" id="nombre_frente" name="nombre_frente"><br>

        <label for="sigla_frente">Sigla del Frente:</label>
        <input type="text" id="sigla_frente" name="sigla_frente"><br>

        <label for="color_primario">Color Primario:</label>
        <select id="color_primario" name="color_primario" required>
            <option value="rojo">Rojo</option>
            <option value="amarillo">Amarillo</option>
            <option value="azul">Azul</option>
        </select><br>

        <input type="hidden" id="id_eleccion" name="id_eleccion" value="{{ $id }}">

        <label for="color_secundario">Color Secundario:</label><br>
        <select id="color_secundario" name="color_secundario" required>
            <option value="rojo">Rojo</option>
            <option value="amarillo">Amarillo</option>
            <option value="azul">Azul</option>
        </select><br>

        @foreach ($cargos as $cargo)
        <label for="{{ $cargo->cargo_postular }}">{{ $cargo->cargo_postular }}:</label>
        <input type="number" min="1" step="1" id="{{ $cargo->cargo_postular }}" name="{{ $cargo->cargo_postular }}"><br>
        @endforeach

        <input type="submit" value="Submit">
    </form>
    <p id="error-message" style="color: red;"></p>

    </div>
    <script src="{{ asset('js/frente.js') }}"></script>
</body>
@endsection