@extends('Home')

@section('content')

<head>
    <link href="{{ asset('css/agregarInfo.css') }}" rel="stylesheet">

    <title>Agregar Información de Mesa</title>
</head>

<body>
    <div class=contAiPrincipal>

        <div class="contenedorAi">

            <div class="superiorAi">
                <h1 class="tituloAi">Agregar Información de Mesa</h1>
            </div>
            <form id="formAgregarInfo" action="{{ route('guardarInformacion', ['numeroMesa' => isset($mesa) ? $mesa->numeroMesa : '']) }}" method="post">
                @csrf
                @method('patch') {{-- Utiliza el método PATCH para actualizar la información --}}

                <br>
                <br>

                <div class="form-group">
                    <label for="recinto">Recinto:</label>
                    <br>
                    <br>
                    <input type="text" name="recinto" class="form-control" placeholder="Ingrese el recinto" value="{{ isset($mesa) ? $mesa->recinto : '' }}">
                </div>
                <br>
                <br>

                <div class="form-group">
                    <label for="aula">Aula:</label>
                    <br>
                    <br>
                    <input type="text" name="aula" class="form-control" placeholder="Ingrese el aula" value="{{ isset($mesa) ? $mesa->aula : '' }}">
                </div>
                
                <br>
                <br>

                <button type="submit" id="btnGuardar" class="btnguardar">Guardar</button>
            </form>
        </div>
    </div>
<script>
    @if(isset($mesa))
        document.getElementById('btnGuardar').addEventListener('click', function () {
            var confirmacion = confirm("¿El recinto y aula de la mesa #{{ $mesa->numeroMesa }} será modificada. ¿Estás seguro?");
            if (confirmacion) {
                document.getElementById('formAgregarInfo').submit();
            }
        });
    @endif
</script>
</body>

@endsection
