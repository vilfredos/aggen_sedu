@extends('Home')

@section('content')
    <!-- Aquí va el contenido específico de esta plantilla -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/elecciones.css') }}">
    <div class="content" style="background-color: #FFC0CB; padding: 20px; border-radius: 10px;">
        <button type="button" onclick="myFunction_c()" class="btn">Generar Convocatoria</button>
        
    </div>
    <script src="{{ asset('js/eleccion.js') }}"></script>
@endsection