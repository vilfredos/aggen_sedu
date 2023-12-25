@extends('Home')

@section('content')
<head>
    <title>Gestion de roles</title>
    <link href="{{ asset('css/cierreActa.css') }}" rel="stylesheet">
    <!--link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">-->
</head>

<body>
    <div class="form-containerI">

    <form class="formularioInicio">
                <form class="row g-3 p-4" action="{{ url('/acta_escrutino') }}" method="get">

                <div class="superiorC">
                    <h1 class="titulo">Inicio de Acta</h1>
                </div>
                    <div class="col-md-6">
                        <label for="fecha" class="form-label">Fecha</label>
                        <input type="datetime-local" class="form-control" id="fecha" name="fecha">
                    </div>
                    <div class="col-md-6">
                        <label for="facultad" class="form-label">Facultad</label>
                        <input type="text" class="form-control" id="facultad" name="facultad">
                    </div>
                    <div class="col-md-6">
                        <label for="mesa" class="form-label">N° Mesa</label>
                        <input type="number" class="form-control" id="mesa" name="mesa" min="1">
                    </div>
                    <div class="col-12">
                        <button type="submit" class="botonVerde">Acta Escrutinio</button>
                    </div>
                </form>
    </div>
</div>
<!-- Script -->
<script src="{{ asset('js/ActaInicio.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
@endsection
