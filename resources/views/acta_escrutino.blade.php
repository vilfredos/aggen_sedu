@extends('Home')

@section('content')
<head>
    <link href="{{ asset('css/acta_escrutinio.css') }}" rel="stylesheet">
    <title>Acta de Escrutinio</title>
</head>

<body>
    <div class="container">
        <div class="contenerdorPrincipalActa">

            <div class="form-containerActa">
            <form action="{{ route('acta_escrutino', ['num_mesa' => $numeroMesa]) }}" method="post" enctype="multipart/form-data">
    @csrf
                            
                            
                            <div class="superiorActa">
                                <h1 class="tituloActa">Acta de Escrutinio</h1>
                            </div>
                    
                            <br>
                            <p>Mesa Nº {{ $numeroMesa }}</p> <!-- Mostrar el número de mesa -->

                            <!-- Obtener los frentes asociados a la elección -->
                            @foreach($frentes as $frente)
                                <div>
                                    <label for="frente_{{ $frente->id_frente }}">{{ $frente->sigla_frente }}</label>
                                    <input type="number" id="frente_{{ $frente->id_frente }}" name="votos_frentes[{{ $frente->id_frente }}]" min="0" step="1" oninput="calculateTotal()">
                                </div>
                            @endforeach


                            <!-- Campo para mostrar el total de votos -->
                            

                            <!-- Resto de tus campos -->
                            <label for="votos_blancos">Votos Blancos:</label><br>
                            <input type="number" id="votos_blancos" name="votos_blancos" min="0" max="300" step="1" oninput="calculateTotal()"><br>
                
                            <br>
                            <label for="votos_nulos">Votos Nulos:</label><br>
                            <input type="number" id="votos_nulos" name="votos_nulos" min="0" max="300" step="1" oninput="calculateTotal()"><br>
                            
                            <br>
                            <label for="total_votos">Total de Votos:</label><br>
                            <input type="text" id="total_votos" name="total_votos" readonly>
                            <br>
                            <br>
                            <label for="documento_pdf">Adjuntar Acta en PDF:</label>
            <input type="file" id="documento_pdf" name="documento_pdf" accept=".pdf">
                            <!-- Botón de enviar -->
                            <button type="submit">Guardar</button>
                </form>
            </div>
        </div>
    </div>

        <!-- Script para calcular el total -->
        <script>
            function calculateTotal() {
        // Obtener los valores de los campos de votos blancos y nulos
        var votosBlancos = parseInt(document.getElementById('votos_blancos').value) || 0;
        var votosNulos = parseInt(document.getElementById('votos_nulos').value) || 0;

        // Obtener los valores de los campos de votos de los frentes
        var votosFrentes = 0;
        @foreach($frentes as $frente)
            votosFrentes += parseInt(document.getElementById('frente_{{ $frente->id_frente }}').value) || 0;
        @endforeach

        // Calcular el total y mostrarlo en el campo correspondiente
        var totalVotos = votosBlancos + votosNulos + votosFrentes;
        document.getElementById('total_votos').value = totalVotos;
    }
    </script>
</body>
@endsection
