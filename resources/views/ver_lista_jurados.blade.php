@extends('Home')

@section('content')
<head>
<link href="{{ asset('css/votosPorMesa.css') }}" rel="stylesheet">

</head>
<div>
<h1>lista de Jurados</h1>
<table>
        <tr>
            <th>Nombre_Completo</th>
            <th>turno</th>
            <th>Cargo</th>
            <th>Numeo Mesa</th>
            <th>gremio</th>
        </tr>
        @foreach ($datos as $datos)
            <tr>
                <td>{{ $datos->nombre }}</td>
                <td>{{ $datos->turno }}</td>
                <td>{{ $datos->cargo }}</td>
                <td>{{ $datos->numeroMesa }}</td>
                <td>{{ $datos->gremio }}</td>
            </tr>
        @endforeach
    </table>
    </div>
    @endsection