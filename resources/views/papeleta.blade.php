@extends('Home')

@section('content')
<head>
<link href="{{ asset('css/papeleta.css') }}" rel="stylesheet">
<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
@section('content')
<div class="container">
    <h2>ELECCIONES A RECTOR Y VICERRECTOR GESTION 2024-2028</h2>
    <table>
        @foreach ($data as $frente)
        <tr>
            <th>{{ $frente->nombre_frente }}</th>
        </tr>
        <tr>
            <td>
                @foreach ($frente->candidatos as $candidato)
                {{ $candidato->cargo_postular }}<br>
                {{ $candidato->sis_candidato }}<br>
                @endforeach
            </td>
        </tr>
        <tr>
            <td><div class="vote-box"></div></td>
        </tr>
        @endforeach
    </table>
    <div class="contenedor">
        <button class="save-button" onclick="mezclar()">mezclar</button>
    </div>
</div>
@endsection