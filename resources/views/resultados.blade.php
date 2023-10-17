@extends('Home')

@section('content')
<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
<link href="{{ asset('css/resultados.css') }}" rel="stylesheet">
    <div style="width: 100%; height: 100%; overflow: hidden;">
        <img src="{{ asset('img/mantenimiento.jpg') }}" alt="Descripción de la imagen" class="imagen-estilo" style="width: 100%; height: 100%; object-fit: contain;">
    </div>

@endsection