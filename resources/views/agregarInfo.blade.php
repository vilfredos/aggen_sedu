@extends('Home')

@section('content')

<head>
    <title>Agregar Información de Mesa</title>
</head>

<body>
<form id="formAgregarInfo" action="{{ route('guardarInformacion', ['numeroMesa' => isset($mesa) ? $mesa->numeroMesa : '']) }}" method="post">
    @csrf
    @method('patch') {{-- Utiliza el método PATCH para actualizar la información --}}

    <div class="form-group">
        <label for="recinto">Recinto</label>
        <input type="text" name="recinto" class="form-control" placeholder="Ingrese el recinto" value="{{ isset($mesa) ? $mesa->recinto : '' }}">
    </div>

    <div class="form-group">
        <label for="aula">Aula</label>
        <input type="text" name="aula" class="form-control" placeholder="Ingrese el aula" value="{{ isset($mesa) ? $mesa->aula : '' }}">
    </div>

    <button type="submit" id="btnGuardar" class="btn btn-primary">Guardar</button>
</form>
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
