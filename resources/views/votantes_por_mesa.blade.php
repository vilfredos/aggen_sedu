@extends('Home')

@section('content')

<head>
    <link href="{{ asset('css/votosPorMesa.css') }}" rel="stylesheet">
</head>
<div>
    <h1>lista de Jurados</h1>
    <table class="table">
        <thead>
        
            <tr>
                <th>SIS</th>
                <th>Nombre</th>
                <th>Número de Mesa</th>
                <th>informacion</th>
                <th>comite</th>
                <th>frentes y candidatos</th>
                <th>mesa</th>
                <th>papeleta</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datos as $dato)
            <tr>
                <td>{{ $dato['sis'] }}</td>
                <td>{{ $dato['name'] }}</td>
                <td>{{ $dato['numeroMesa'] }}</td>
                <td><button class="btn btn-primary">Agregar</button></td>
                <td><button class="btn btn-primary">Agregar</button></td>
                <td><button class="btn_frente">Frente</button></td>
                <td><button class="btn btn-danger">Editar</button></td>
                <td><button class="btn-secondary">otros</button></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $(".btn-secondary").click(function() {
            var sis = $(this).closest('tr').find('td:eq(0)').text();
            window.location.href = '/papeleta/' + sis;
        });
    });
    $(document).ready(function() {
        $(".btn_frente").click(function() {
            var sis = $(this).closest('tr').find('td:eq(0)').text();
            window.location.href = '/frente/' + sis;
        });
    });
</script>
@endsection