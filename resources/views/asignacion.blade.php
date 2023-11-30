@extends('Home')

@section('content')
<head>
    <title>ASIGNACION</title>
    <link href="{{ asset('css/votosPorMesa.css') }}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
    <h1>Asignación de Mesas a Votantes</h1>

    <form id="asignacionForm" action="{{ route('guardarAsignacion') }}" method="post">
        @csrf

        <table>
            <thead>
                <tr>
                    <th>Numero de Mesa</th>
                    <th>Recinto</th>
                    <th>Aula</th>
                    <th>Facultad</th>
                    <th>Carrera</th>
                    <th>Seleccionar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mesas as $mesa)
                    <tr>
                        <td>{{ $mesa->numeroMesa }}</td>
                        <td>{{ $mesa->recinto }}</td>
                        <td>{{ $mesa->aula }}</td>
                        <td>{{ $mesa->facultad }}</td>
                        <td>{{ $mesa->carrera }}</td>
                        <td><input type="checkbox" name="mesas[]" value="{{ $mesa->numeroMesa }}"></td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <button type="button" onclick="asignarMesas()" style="margin-bottom: 80px;">Asignar Mesas</button>
    </form>

    <script>
        function asignarMesas() {
    console.log('Botón presionado');

    // Obtener los checkboxes seleccionados
    const checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');
    const mesasSeleccionadas = Array.from(checkboxes).map(checkbox => checkbox.value);

    // Enviar las mesas seleccionadas al servidor mediante una petición AJAX
    if (mesasSeleccionadas.length > 0) {
        console.log('Mesas seleccionadas:', mesasSeleccionadas);

        const formData = new FormData(document.getElementById('asignacionForm'));

        fetch("{{ route('guardarAsignacion') }}", {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': formData.get('_token') // Obtener el token CSRF directamente del formulario
            }
        })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            // Puedes realizar acciones adicionales si es necesario
        })
        .catch(error => {
            console.error('Error:', error);
        });
    } else {
        alert('Selecciona al menos una mesa.');
    }
}

    </script>
@endsection