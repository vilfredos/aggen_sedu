@extends('Home')


@section('content')

<head>
    <link href="{{ asset('css/listaDejurados.css') }}" rel="stylesheet">
</head>
<body>

    <div class="container">
        <div class=contJuradosPrincipal>

            <div class="contenedorJurados">
                @if ($data->isEmpty())
                    <h1>No hay jurados para esta elección</h1>
                @else

                <div class="superiorJurados">
                        <h1 class="tituloJurados">Jurados Electorales</h1>
                </div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>SIS</th>
                                <th>Nombre</th>
                                <th>Facultad</th>
                                <th>CI</th>
                                <th>Cargo</th>
                                <th>Numero Mesa</th>
                                <th>Remplazar Jurado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $jurado)
                            <tr>
                                <td>{{ $jurado->sis }}</td>
                                <td>{{ $jurado->name }}</td>
                                <td>{{ $jurado->facultad }}</td>
                                <td>{{ $jurado->ci }}</td>
                                <td>{{ $jurado->cargo }}</td>
                                <td>{{ $jurado->id_mesa }}</td>
                                <td><button class="btn_remplazar_jurado" >remplazar jurado</button></td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $(".btn_remplazar_jurado").click(function() {
            var sis = $(this).closest('tr').find('td:eq(3)').text();
            window.location.href = '/remplazar_jurado/' + sis;
        });
    });
</script>
</body>
@endsection