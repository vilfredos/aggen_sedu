@extends('Home')

@section('content')

<head>
    <title>Listado de Mesas</title>
    <link href="{{ asset('css/votosPorMesa.css') }}" rel="stylesheet">
</head>

<div class="container">
    <h1>Comité de la elección {{ $id_eleccion }}</h1>
    <table class="table table-striped">
        <thead>
            <tr>
            <th>#</th>
                <th>Nombre</th>
                <th>Facultad</th>
                <th>CI</th>
                <th>Gremio</th>
                <th>Cargo</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($comite as $index => $miembro)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $miembro->name }}</td>
                <td>{{ $miembro->facultad }}</td>
                <td>{{ $miembro->ci }}</td>
                <td>{{ $miembro->gremio }}</td>
                <td>{{ $miembro->cargo }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".btn-info").click(function() {
                var sis = $(this).closest('tr').find('td:eq(0)').text();
                window.location.href = '/papeleta/' + sis;
            });
        });
    </script>
</body>
@endsection