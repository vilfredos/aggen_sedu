@extends('Home')

@section('content')
<head>
    <title>Historico de Elecciones</title>
</head>
<body>
    <h1>Historico de Elecciones</h1>
    @if($elecciones->count())
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>TITULO</th>
                    <th>Informe</th>
                    <!-- Añade aquí más columnas según los campos de tu tabla -->
                </tr>
            </thead>
            <tbody>
                @foreach($elecciones as $eleccion)
                    <tr>
                        <td>{{ $eleccion->id }}</td>
                        <td>{{ $eleccion->titulo }}</td>
                        <button class="btn_informe_final">
                            <i class="fa-solid fa-users"></i>
                        </button>
                        <!-- Añade aquí más celdas según los campos de tu tabla -->
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No se encontraron elecciones.</p>
    @endif
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