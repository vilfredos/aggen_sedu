@extends('Home')


@section('content')
<div class="container">
    @if ($data->isEmpty())
        <h1>No hay jurados para esta elección</h1>
    @else
        <h1>Jurados de la elección {{ $data[0]->id_eleccion }}</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>SIS</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Facultad</th>
                    <th>Carrera</th>
                    <th>CI</th>
                    <th>Cargo</th>
                    <th>ID Mesa</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $jurado)
                <tr>
                    <td>{{ $jurado->sis }}</td>
                    <td>{{ $jurado->name }}</td>
                    <td>{{ $jurado->email }}</td>
                    <td>{{ $jurado->facultad }}</td>
                    <td>{{ $jurado->carrera }}</td>
                    <td>{{ $jurado->ci }}</td>
                    <td>{{ $jurado->cargo }}</td>
                    <td>{{ $jurado->id_mesa }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection