@extends('Home')

@section('content')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario para Registrar frente</title>
    <link href="{{ asset('css/frente.css') }}" rel="stylesheet">
</head>

<body>

    <div class="containerPrincipalF">
        <div class="contentFrente">

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <!--h2 style="text-align:center;">Registrar frentes con sus candidatos</!--h2-->

            <div class="superiorF">
                <h1 class="titulof">Registrar frentes con sus candidatos</h1>
            </div>
            <form action="{{ route('frente.store') }}" method="post">
                @csrf
                <label for="sis_representante">SIS Representante:</label>
                <input type="number" min="1" step="1" id="sis_representante" name="sis_representante">
                <br>
                <br>

                <label for="nombre_frente">Nombre del Frente:</label>
                <input type="text" id="nombre_frente" name="nombre_frente">
                <br>
                <br>

                <label for="sigla_frente">Sigla del Frente:</label>
                <input type="text" id="sigla_frente" name="sigla_frente">
                <br>
                <br>

                <label for="color_primario">Color Primario:</label>
                <select id="color_primario" name="color_primario" required>
                    <option value="verde">Verde</option>
                    <option value="naranja">Naranja</option>
                    <option value="morado">Morado</option>
                    <option value="rosa">Rosa</option>
                    <option value="negro">Negro</option>
                    <option value="blanco">Blanco</option>
                    <option value="gris">Gris</option>
                    <option value="marron">Marrón</option>
                    <option value="turquesa">Turquesa</option>
                    <option value="violeta">Violeta</option>
                    <option value="rojo">Rojo</option>
                    <option value="amarillo">Amarillo</option>
                    <option value="azul">Azul</option>
                </select>
                <br>
                <br>

                <input type="hidden" id="id_eleccion" name="id_eleccion" value="{{ $id }}">
                <label for="color_secundario">Color Secundario:</label>
                <select id="color_secundario" name="color_secundario" required>
                    <option value="rojo">Rojo</option>
                    <option value="amarillo">Amarillo</option>
                    <option value="azul">Azul</option>
                    <option value="verde">Verde</option>
                    <option value="naranja">Naranja</option>
                    <option value="morado">Morado</option>
                    <option value="rosa">Rosa</option>
                    <option value="negro">Negro</option>
                    <option value="blanco">Blanco</option>
                    <option value="gris">Gris</option>
                    <option value="marron">Marrón</option>
                    <option value="turquesa">Turquesa</option>
                    <option value="violeta">Violeta</option>
                </select>
                <br>
                <br>

                @foreach ($cargos as $cargo)
                <label for="{{ $cargo->cargo_postular }}">Sis del candidato al {{ $cargo->cargo_postular }}:</label>
                <input type="number" min="1" step="1" id="{{ $cargo->cargo_postular }}" name="{{ $cargo->cargo_postular }}">
                <br>
                <br>
                @endforeach

                <input type="submit" value="Registrar" class="botonRegistrar">
            </form>
            <p id="error-message" style="color: red;"></p>

    
    </div>
</div>
</body>
@endsection