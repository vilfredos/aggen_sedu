@extends('Home')

@section('content')
<head>
<link href="{{ asset('css/votosPorMesa.css') }}" rel="stylesheet">

</head>
<div>
<h1>Registro votos</h1>
<table>
        <tr>
            <th>Numeo Mesa</th>
            <th>Votos FR</th>
            <th>Votos UXSS</th>
            <th>Votos PSS</th>
            <th>Votos blancos</th>
            <th>Votos nulos</th>
            <th>Votos totales</th>
        </tr>
        @foreach ($datos as $datos)
            <tr>
                <td>{{ $datos->num_mesa }}</td>
                <td>{{ $datos->votos_FR }}</td>
                <td>{{ $datos->votos_UXSS }}</td>
                <td>{{ $datos->votos_PSS }}</td>
                <td>{{ $datos->votos_blancos }}</td>
                <td>{{ $datos->votos_nulos }}</td>
                <td>{{ $datos->votos_totales }}</td>

            </tr>
        @endforeach
    </table>
    </div>
    @endsection