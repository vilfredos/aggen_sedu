<!DOCTYPE html>
<html>
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
                    <th>Nombre</th>
                    <!-- Añade aquí más columnas según los campos de tu tabla -->
                </tr>
            </thead>
            <tbody>
                @foreach($elecciones as $eleccion)
                    <tr>
                        <td>{{ $eleccion->id }}</td>
                        <td>{{ $eleccion->nombre }}</td>
                        <!-- Añade aquí más celdas según los campos de tu tabla -->
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No se encontraron elecciones.</p>
    @endif
</body>
</html>