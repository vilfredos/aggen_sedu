@extends('Home')

@section('content')

<h1>Lista de Votantes</h1>

<table class="table">
    <thead>
        <tr>
            <th>Codigo SIS</th>
            <th>Nombre</th>
            <th>Facultad</th>
            <th>Carrera</th>
            
        </tr>
    </thead>
    <tbody>
        @foreach ($votantes as $votante)
            <tr>
                <td>{{ $votante->sis }}</td>
                <td>{{ $votante->name }}</td>
                <td>{{ $votante->facultad }}</td>
                <td>{{ $votante->carrera }}</td>
                
            </tr>
        @endforeach
    </tbody>
</table>

@endsection