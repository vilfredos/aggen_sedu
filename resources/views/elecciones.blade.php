@extends('Home')

@section('content')
    <!-- Aquí va el contenido específico de esta plantilla -->

    <link rel="stylesheet" type="text/css" href="{{ asset('css/elecciones.css') }}">
    <button type="button" onclick="myFunction_c()">Generar Convocatoria</button>
    <button type="button" onclick="llevame_a_poblacion_votante()">registrar poblacion_votante</button>
    <button type="button" onclick="llevame_a_jurados_Electorales()">jurados_Electorales</button>
    <button type="button" onclick="llevame_a_miembos_comite()">registrar miembos_comite</button>
    <button type="button" onclick="llevame_a_generar_pepeleta()">registrar generar_pepeleta</button>
    <script src="{{ asset('js/eleccion.js') }}"></script>
@endsection