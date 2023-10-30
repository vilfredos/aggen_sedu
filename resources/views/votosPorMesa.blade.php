@extends('Home')

@section('content')
<head>

</head>
<div>
<table>
        <tr>
            <th>Numeo Mesa</th>
            <th>Votos FR</th>
            <th>Votos UXSS</th>
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