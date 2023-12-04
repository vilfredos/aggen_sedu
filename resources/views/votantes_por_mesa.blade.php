@extends('Home')

@section('content')

<head>
    <link href="{{ asset('css/votosPorMesa.css') }}" rel="stylesheet">
</head>
<div>
    <h1>Lista de Eleccion</h1>
    <table class="table">
        <thead>
        
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Descripcion</th>
                <th>Informacion</th>
                <th>comite</th>
                <th>frentes y candidatos</th>
                <th>Mesas</th>
                <th>Papeleta</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datos as $dato)
            <tr>
                <td>{{ $dato->id }}</td>
                <td>{{ $dato->titulo }}</td>
                <td>{{ $dato->descripcion }}</td>
                <td><button class="btn_informacion">informacion</button></td>
                <td><button class="btn_comite">comite</button></td>
                <td><button class="btn_frente">Frente</button></td>
                <td><button class="btn_mesas" data-id="{{ $dato->id }}">mesas</button></td>
                <td><button class="btn_pepeleta">papeleta</button></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $(".btn_informacion").click(function() {
            var id = $(this).closest('tr').find('td:eq(0)').text();
            window.location.href = '/informacion/' + id;
        });
    });
    $(document).ready(function() {
        $(".btn_comite").click(function() {
            var eleccionId = $(this).closest('tr').find('td:eq(0)').text();
            window.location.href = '/lista_comite/' + eleccionId;
        });
    });
    $(document).ready(function() {
        $(".btn_frente").click(function() {
            var sis = $(this).closest('tr').find('td:eq(0)').text();
            window.location.href = '/frente/' + sis;
        });
    });
    $(document).ready(function() {
        $(".btn_mesas").click(function() {
            var eleccionId = $(this).data('id');
            window.location.href = '/listamesas/' + eleccionId;
        });
    });
</script>
@endsection