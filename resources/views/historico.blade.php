@extends('Home')

@section('content')
<head>
    <link href="{{ asset('css/historicoResultados.css') }}" rel="stylesheet">   

    <title>Historico de Elecciones</title>
</head>
<body>

<div class="containerPrincipalH">
    <div class=contH>
        <div class="superiorH">
            <h1 class="tituloH">Historico de Elecciones</h1>
        </div>
    @if($elecciones->count())
    <table>
    <thead>
        <tr>
            <th>ID</th>
            <th>TITULO</th>
            <th>Frente Ganador</th>                   
            <th>Informe</th>
            <!-- Añade aquí más columnas según los campos de tu tabla -->
        </tr>
    </thead>
    <tbody>
        @foreach($elecciones as $eleccion)
            <tr>
                <td>{{ $eleccion->id }}</td>
                <td>{{ $eleccion->titulo }}</td>
                <td>{{ $resultados->where('id_eleccion', $eleccion->id)->first()->sigla }}</td> 
                <td><button class="btn_informe_final">
                    <i class="fa-solid fa-users"></i>
                </button></td>
                <!-- Añade aquí más celdas según los campos de tu tabla -->
            </tr>
        @endforeach
    </tbody>
</table>
    @else
        <p>No se encontraron elecciones.</p>
    @endif
</div>
</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $(".btn_informe_final").click(function() {
            var id = $(this).closest('tr').find('td:eq(0)').text();
            window.location.href = '/informacion/' + id;
        });
    });
</script>
@endsection