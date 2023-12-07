@extends('Home')

@section('content')
    <div class="container">
    <h2 style="text-align:center;">Votantes</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>SIS</th>
                    <th>Numero Mesa</th>
                    <th>Nombre</th>
                    <th>Facultad</th>
                    <th>Carrera</th>
                    <th>CI</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $votante)
                    <tr>
                        <td>{{ $votante->sis }}</td>
                        <td>{{ $votante->id_mesa }}</td>
                        <td>{{ $votante->name }}</td>
                        <td>{{ $votante->facultad }}</td>
                        <td>{{ $votante->carrera }}</td>
                        <td>{{ $votante->ci }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection