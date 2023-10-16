@extends('Home')

@section('content')
    <!-- Aquí va el contenido específico de esta plantilla -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/elecciones.css') }}">

    <div class="content">
        <div class="btn-container">
            <button type="button" onclick="myFunction_c()" class="btn btn-crear">Crear una nueva Eleccion</button>
        </div>
        <div class="btn-container">
            <button type="button"  class="btn btn-modificar">Modificar una Eleccion</button>
        </div>
    </div>
    <script src="{{ asset('js/eleccion.js') }}"></script>
@endsection