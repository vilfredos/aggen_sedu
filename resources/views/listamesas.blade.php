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
                <th>Habilitada</th> <!-- Agregado para la columna Habilitada -->
            </tr>
        </thead>
        
        @foreach ($mesas as $mesa)
            <tr>
                <td>{{ $mesa->numeroMesa }}</td>
                <td>{{ $mesa->recinto }}</td>
                <td>{{ $mesa->aula }}</td>
                <td>{{ $mesa->facultad }}</td>
                <td>{{ $mesa->carrera }}</td>
                <td>{{ $mesa->tipo }}</td>
                <td>{{ $mesa->ubicacion }}</td>
                <td>{{ $mesa->capMaxima }}</td>
                <td>
                <input type="checkbox" name="mesas_seleccionadas[]" value="{{ $mesa->facultad . '-' . $mesa->carrera . '-' . $mesa->tipo }}" {{ $mesa->habilitada ? 'checked' : '' }}>
                </td>
            </tr>
        @endforeach
    </table>

    <!-- Agrega un contenedor para el botón y aplica un margen inferior -->
    <button type="submit" class="btn btn-primary" style="margin-bottom: 80px;">aplicar</button>
    </form>

</body>
@endsection