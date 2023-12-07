@extends('Home')

@section('content')

<head>
    <title>Listado de Mesas</title>
    <link href="{{ asset('css/votosPorMesa.css') }}" rel="stylesheet">
</head>

<body>

    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

    <div class=contMesaPrincipal>

        <div class="contenerVPM">

                    <div class="superiorVm">
                        <h1 class="tituloVm">Comité de la elección {{ $id_eleccion }}</h1>
                    </div>
                <!--h2 style="text-align:center;">Comité de la elección {{ $id_eleccion }}</-h2-->
                
                <table class="miTablaMesa">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Facultad</th>
                            <th>Ci</th>
                            <th>Codigo Sis</th>
                            <th>Gremio</th>
                            <th>Estado</th>
                            <th>Reemplazar Miembro Del Comite</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($comite as $index => $miembro)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $miembro->name }}</td>
                            <td>{{ $miembro->facultad }}</td>
                            <td>{{ $miembro->ci }}</td>
                            <td>{{ $miembro->sis }}</td>
                            <td>{{ $miembro->gremio }}</td>
                            <td>{{ $miembro->cargo }}</td>
                            <td><button class="btn_remplazar_comite" data-id_eleccion="{{ $id_eleccion }}">remplazar comite</button></td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".btn_remplazar_comite").click(function() {
                var sis = $(this).closest('tr').find('td:eq(4)').text();
                window.location.href = '/remplazar_comite/' + sis;
            });
        });
    </script>
</body>
@endsection