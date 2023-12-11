@extends('Home')

@section('content')
<head>
    <link href="{{ asset('css/votosPorMesa.css') }}" rel="stylesheet">
    <style>
        #nuevaTabla {
            width: 1150px; /* Ancho total de la tabla */
        }

        #nuevaTabla td {
            width: 150px; /* Ancho fijo para cada celda */
            word-wrap: break-word;
        }
    </style>
    <!-- Include Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class=contMesaPrincipal>
        <div class="contenerVPM">
            <div class="superiorVm">
                <h1 class="tituloVm">Tabla de Votos</h1>
            </div>
            <table class="miTablaMesa">
                <thead>
                    <tr>
                        <th>Nº Mesa</th>
                        <th>Votos Nulos</th>
                        <th>Votos Blancos</th>
                        @foreach ($frentes as $frente)
                            <th>{{ $frente->sigla_frente }}</th>
                        @endforeach

                        <!-- Columnas de votos por frente -->
                        
                        <th>Gráfico Circular</th>
                        <th>Gráfico de Barras</th>
                        <th>Totales</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $totalNulos = 0;
                        $totalBlancos = 0;
                        $totalFrentes = array_fill(0, count($frentes), 0); // Inicializar array de sumas para cada frente
                    @endphp

                    @foreach ($mesas as $mesa)
                        <tr id="fila-{{ $mesa->numeroMesa }}">
                            <td>{{ $mesa->numeroMesa }}</td>
                            <td>{{ $totalesNulos[$mesa->numeroMesa] }}</td>
                            <td>{{ $totalesBlancos[$mesa->numeroMesa] }}</td>

                            @foreach ($votosFrentes[$mesa->numeroMesa] as $key => $voto)
                                <td>{{ $voto }}</td>
                                @php
                                    // Sumar los votos de cada frente
                                    $totalFrentes[$key] += $voto;
                                @endphp
                            @endforeach

                            @php
                                // Sumar los votos nulos, blancos y de frentes
                                $totalNulos += $totalesNulos[$mesa->numeroMesa];
                                $totalBlancos += $totalesBlancos[$mesa->numeroMesa];
                            @endphp
                            <td><button class="mostrar-grafico-btn" data-tipo-grafico="circular" data-mesa="{{ $mesa->numeroMesa }}">Mostrar</button></td>
                            <td><button class="mostrar-grafico-btn" data-tipo-grafico="barra" data-mesa="{{ $mesa->numeroMesa }}">Mostrar</button></td>
                            <td>{{ $totalesNulos[$mesa->numeroMesa] + $totalesBlancos[$mesa->numeroMesa] + array_sum($votosFrentes[$mesa->numeroMesa]) }}</td>
                        </tr>
                    @endforeach

                    <!-- Última fila con las sumas -->
                    <tr id="fila-totales">
                        <td>Totales</td>
                        <td>{{ $totalNulos }}</td>
                        <td>{{ $totalBlancos }}</td>

                        @foreach ($totalFrentes as $totalFrente)
                            <td>{{ $totalFrente }}</td>
                        @endforeach
                        <td><button class="mostrar-grafico-btn" data-tipo-grafico="circular" data-mesa="Totales">Mostrar</button></td>
                        <td><button class="mostrar-grafico-btn" data-tipo-grafico="barra" data-mesa="Totales">Mostrar</button></td>
                        <td>{{ $totalNulos + $totalBlancos + array_sum($totalFrentes) }}</td>
                    </tr>
                </tbody>
            </table>
            <form method="post" action="{{ route('actualizarResultados') }}">
                @csrf
                <button type="submit">Actualizar Resultados</button>
            </form>
            <canvas id="grafico" width="400" height="400"></canvas>
            <script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.mostrar-grafico-btn').forEach(function (btn) {
            btn.addEventListener('click', function () {
                var tipoGrafico = btn.dataset.tipoGrafico;
                var mesa = btn.dataset.mesa;

                // Verifica si la mesa es "Totales" y asigna la fila correspondiente
                var fila = mesa === "Totales" ? document.getElementById('fila-totales') : document.getElementById('fila-' + mesa);

                // Verifica si la fila se encontró antes de continuar
                if (fila) {
                    var datosFila = {
                        frentes: [],
                        nulos: parseInt(fila.cells[1].textContent),
                        blancos: parseInt(fila.cells[2].textContent)
                    };

                    for (var i = 3; i < fila.cells.length - 3; i++) {
                        datosFila.frentes.push({
                            sigla: fila.cells[i].textContent,
                            votos: parseInt(fila.cells[i].textContent)
                        });
                    }

                    // Colores diferentes para cada frente y votos nulos/blancos
                    var coloresFrentes = ['#FF9933', '#FFFF33', '#33FF99', '#00008B', '#FF00FF', '#800000', '#40E0D0', '#EE82EE', '#FF1493'];
                    var coloresNulosBlancos = ['#FF5733', '#33FF57'];

                    // Abre una nueva ventana
                    var nuevaVentana = window.open('', '_blank', 'width=600,height=400');

                    // Agrega contenido HTML a la nueva ventana
                    nuevaVentana.document.write('<html><head><title>Gráfico</title>');
                    nuevaVentana.document.write('</head><body><h2>Gráfico para la mesa ' + mesa + '</h2>');

                    // Crea un canvas en la nueva ventana
                    nuevaVentana.document.write('<canvas id="grafico" width="400" height="400"></canvas>');
                    nuevaVentana.document.write('</body></html>');

                    // Obtiene el contexto del lienzo en la nueva ventana
                    var ctx = nuevaVentana.document.getElementById('grafico').getContext('2d');

                    // Obtener las siglas de los frentes desde el encabezado de la tabla
                    var siglasFrentes = @json($frentes->pluck('sigla_frente')->toArray());
                    // Datos para el gráfico
                    var data = {
                        labels: ['Votos Nulos', 'Votos Blancos'].concat(siglasFrentes),
                        datasets: [{
                            label: 'Mesa Nº ' + mesa,
                            data: [datosFila.nulos, datosFila.blancos].concat(datosFila.frentes.map(function (frente) {
                                return frente.votos;
                            })),
                            backgroundColor: tipoGrafico === 'circular' ? coloresNulosBlancos.concat(coloresFrentes) : coloresFrentes,
                            borderColor: tipoGrafico === 'circular' ? coloresNulosBlancos.concat(coloresFrentes) : coloresFrentes,
                            borderWidth: 1
                        }]
                    };
                    // Configuración del gráfico
                    var options = {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    };

                    // Crea el gráfico en la nueva ventana
                    var chart;
                    if (tipoGrafico === 'circular') {
                        chart = new Chart(ctx, {
                            type: 'doughnut',
                            data: data,
                            options: options
                        });
                    } else if (tipoGrafico === 'barra') {
                        chart = new Chart(ctx, {
                            type: 'bar',
                            data: data,
                            options: options
                        });
                    }
                }
            });
        });
    });
</script>

        </div>
    </div>
</body>

@endsection
