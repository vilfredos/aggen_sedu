@extends('Home')

@section('content')

<head>
    <title>Listado de Mesas</title>
    <link href="{{ asset('css/votosPorMesa.css') }}" rel="stylesheet">
</head>
<body>
    <form method="post" action="{{ route('adjuntarVotantes') }}">
        @csrf
    <h1>Listado de Mesas</h1>
    <table>
        <thead>
            <tr>
                <th>numeroMesa</th>
                <th>recinto</th>
                <th>aula</th>
                <th>facultad</th>
                <th>carrera</th>
                <th>tipo</th>
                <th>ubicacion</th>
                <th>cap. maxima</th>
                 <!-- Agregado para la columna Habilitada -->
            </tr>
        </thead>
        
        @foreach ($mesas as $mesa)
            <tr>
                <td>{{ $mesa->numeroMesa }}</td>
                <td>{{ $mesa->recinto }}</td>
                <td>{{ $mesa->aula }}</td>
                <td><button class="btn-info">informacion</button></td>
                <td><button class="btn-jurados">jurados</button></td>
                <td><button class="btn_actas">actaInicio</button></td>
                <td><button class="btn_lista">votantes</button></td>
                <td><button class="btn-acta2">actafinal</button></td>
            </tr>
        @endforeach
    </table>
    
    <!-- Agrega un contenedor para el botón y aplica un margen inferior -->
    <button type="submit" class="btn btn-primary" style="margin-bottom: 80px;">aplicar</button>
    <a href="/mesa" class="btn btn-secondary" style="margin-bottom: 80px;">+</a>
    </form>

</body>
@endsection