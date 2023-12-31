@extends('Home')

@section('content')

<head>
    <title>Listado de Mesas</title>
    <link href="{{ asset('css/votosPorMesa.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>

    <div class=contMesaPrincipal>

        <div class="contenerVPM">
            <div class="superiorVm">
                <h1 class="tituloVm">Listado de Mesas</h1>
            </div>
            <table class="miTablaMesa">
                <thead>
                    <tr>
                        <th>Numero de Mesa</th>
                        <th>Recinto</th>
                        <th>Aula</th>
                        <th>Agregar informacion</th>
                        <th>Poblacion votante</th>
                        <th>Jurados</th>
                        <th>Descargar Acta</th>
                        <th>Registrar Acta </th>
                        <!-- Agregado para la columna Habilitada -->
                    </tr>
                </thead>

                @foreach ($mesas as $mesa)
                <tr>
                    <td>{{ $mesa->numeroMesa }}</td>
                    <td>{{ $mesa->recinto }}</td>
                    <td>{{ $mesa->aula }}</td>

                    <td>
                        <a href="{{ route('agregarInfo', ['numeroMesa' => $mesa->numeroMesa]) }}" class="btnagregarInformacion">
                            <i class="fa-solid fa-plus"></i>
                        </a>
                    </td>


                    <td>
                        <button class="btnPoblacionVotante" data-id_eleccion="{{ $id_eleccion }}">
                            <i class="fa-solid fa-people-group"></i>
                        </button>
                    </td>

                    <td>
                        <button class="btn_jurados" data-id_eleccion="{{ $id_eleccion }}">
                            <i class="fa-solid fa-users-between-lines"></i>
                        </button>
                    </td>

                    <td>
                        <button class="btn_descargar_acta">
                            <i class="fa-solid fa-download"></i>
                        </button>
                    </td>

                    <td>
                        <a href="{{ route('acta_escrutino', ['num_mesa' => $mesa->numeroMesa]) }}" class="btn-RegistrarActa">
                            <i class="fa-regular fa-circle-check"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".btn-info").click(function() {
                var sis = $(this).closest('tr').find('td:eq(0)').text();
                window.location.href = '/papeleta/' + sis;
            });
        });
        $(document).ready(function() {
            $(".btnPoblacionVotante").click(function() {
                var num_mesa = $(this).closest('tr').find('td:eq(0)').text();
                var id_eleccion = $(this).data('id_eleccion');
                window.location.href = '/votante_mesa/' + num_mesa + '?eleccionId=' + id_eleccion;
            });
        });


        $(document).ready(function() {
            $(".btn_jurados").click(function() {
                var num_mesa = $(this).closest('tr').find('td:eq(0)').text();
                var id_eleccion = $(this).data('id_eleccion');
                window.location.href = '/lista_jurados/' + num_mesa + '?eleccionId=' + id_eleccion;
            });
        });

        $(document).ready(function() {
            $(".btn_mesas").click(function() {
                var eleccionId = $(this).data('id');
                window.location.href = '/listamesas/' + eleccionId;
            });
        });
        $(document).ready(function() {
            $(".btn_descargar_acta").click(function() {
                var numeroMesa = $(this).closest('tr').find('td:eq(0)').text();
                if (numeroMesa) {
                    window.location.href = '/ActaDeInicio/' + numeroMesa;
                }
            });
        });
    </script>
</body>
@endsection