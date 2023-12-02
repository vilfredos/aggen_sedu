@extends('Home')

@section('content')
    <div class="container">
        <h1>Votantes</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID Elección</th>
                    <th>SIS</th>
                    <th>ID Mesa</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $votante)
                    <tr>
                        <td>{{ $votante->id_eleccion }}</td>
                        <td>{{ $votante->sis }}</td>
                        <td>{{ $votante->id_mesa }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endsection