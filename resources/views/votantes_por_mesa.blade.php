@extends('Home')

@section('content')

<head>
    <link href="{{ asset('css/votosPorMesa.css') }}" rel="stylesheet">

</head>
<div>
    <h1>lista de Jurados</h1>
    <table class="table">
        <thead>
            <tr>
                <th>SIS</th>
                <th>Nombre</th>
                <th>Número de Mesa</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datos as $dato)
            <tr>
                <td>{{ $dato['sis'] }}</td>
                <td>{{ $dato['name'] }}</td>
                <td>{{ $dato['numeroMesa'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection