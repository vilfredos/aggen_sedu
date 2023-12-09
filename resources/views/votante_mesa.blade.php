@extends('Home')

@section('content')
    <div class="container">
    <h2 style="text-align:center;">Votantes</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>SIS</th>
                    <th>Nombre</th>
                    <th>Facultad</th>
                    <th>Carrera</th>
                    <th>CI</th>
                    <th>Numero Mesa</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $votante)
                    <tr>
                        <td>{{ $votante->sis }}</td>
                        <td>{{ $votante->name }}</td>
                        <td>{{ $votante->facultad }}</td>
                        <td>{{ $votante->carrera }}</td>
                        <td>{{ $votante->ci }}</td>
                        <td>{{ $votante->id_mesa }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection