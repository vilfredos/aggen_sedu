@extends('Home')

@section('content')
    <!-- Aquí va el contenido específico de esta plantilla -->
    <head>
    <link href="{{ asset('css/elecciones.css') }}" rel="stylesheet">
    </head>

    <body>
        <div class="contenedorElecciones">
                <div class="btn-container">
                <button type="button" onclick="myFunction_c()" class="btn btn-crear">Crear una nueva Eleccion</button>
            </div>
            <div class="btn-container">
                <button type="button"  class="btn btn-modificar">Modificar una Eleccion</button>
            </div>
        </div>

    </body>
    <script src="{{ asset('js/eleccion.js') }}"></script>
@endsection