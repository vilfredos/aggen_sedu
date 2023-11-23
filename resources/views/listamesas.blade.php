@extends('Home')

@section('content')

<head>
    <title>Listado de Mesas</title>
</head>
<body>

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
            </tr>
        </thead>
        
            @foreach ($mesas as $mesa)
                <tr>
                    <td>{{ $mesa->numeroMesa}}</td>
                    <td>{{ $mesa->recinto }}</td>
                    <td>{{ $mesa->aula}}</td>
                    <td>{{ $mesa->facultad}}</td>
                    <td>{{ $mesa->carrera}}</td>
                    <td>{{ $mesa->tipo }}</td>
                    <td>{{ $mesa->ubicacion}}</td>
                    
                </tr>
            @endforeach
        
    </table>

</body>
@endsection
