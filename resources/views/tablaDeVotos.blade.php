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
                            <tr>
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

                                <td>{{ $totalesNulos[$mesa->numeroMesa] + $totalesBlancos[$mesa->numeroMesa] + array_sum($votosFrentes[$mesa->numeroMesa]) }}</td>
                            </tr>
                        @endforeach

                        <!-- Última fila con las sumas -->
                        <tr>
                            <td>Totales</td>
                            <td>{{ $totalNulos }}</td>
                            <td>{{ $totalBlancos }}</td>

                            @foreach ($totalFrentes as $totalFrente)
                                <td>{{ $totalFrente }}</td>
                            @endforeach

                            <td>{{ $totalNulos + $totalBlancos + array_sum($totalFrentes) }}</td>
                        </tr>
                    </tbody>
                </table>
        </div>
    </div>

</body>

@endsection
