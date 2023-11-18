@extends('Home')

@section('content')



<h1>Lista de Votantes</h1>

<table>
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Facultad</th>
            <th>Carrera</th>
            <th>Tipo</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($votantes as $votante)
            <tr>
                <td>{{ $votante->name }}</td>
                <td>{{ $votante->facultad }}</td>
                <td>{{ $votante->carrera }}</td>
                <td>{{ $votante->tipo }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection