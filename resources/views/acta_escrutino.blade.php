@extends('Home')

@section('content')
<head>
    <link href="{{ asset('css/acta_escrutinio.css') }}" rel="stylesheet">
    <title>Acta de Escrutinio</title>
</head>

<body>
    <div class="container">
        <div class="contenerdorPrincipalActa">
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('existenciaFilaBlancos'))
                <div class="alert alert-warning">
                    {{ session('existenciaFilaBlancos') }}
                </div>
            @endif

            <div class="form-containerActa">
                <form id="formActa" action="{{ route('acta_escrutino', ['num_mesa' => $numeroMesa]) }}" method="post" enctype="multipart/form-data">
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
                            <input type="number" id="frente_{{ $frente->id_frente }}" name="votos_frentes[{{ $frente->id_frente }}]" min="0" step="1" oninput="calculateTotal()" required>
                        </div>
                    @endforeach

                    <!-- Campo para mostrar el total de votos -->

                    <!-- Resto de tus campos -->
                    <label for="votos_blancos">Votos Blancos:</label><br>
                    <input type="number" id="votos_blancos" name="votos_blancos" min="0" max="300" step="1" oninput="calculateTotal()" required><br>
                    <br>
                    <label for="votos_nulos">Votos Nulos:</label><br>
                    <input type="number" id="votos_nulos" name="votos_nulos" min="0" max="300" step="1" oninput="calculateTotal()" required><br>

                    <br>
                    <label for="total_votos">Total de Votos:</label><br>
                    <input type="text" id="total_votos" name="total_votos" readonly>
                    
                    <!-- Mensaje de error para el total de votos -->
                    <div id="error_total_votos" style="color: red; display: none;">
                        El total de votos no puede ser mayor a la cantidad de votantes.
                    </div>

                    <br>
                    <label for="documento_pdf">Adjuntar Acta en PDF:</label>
                    <input type="file" id="documento_pdf" name="documento_pdf" accept=".pdf" required>
                    
                    <script>
                        // Validación del formulario al enviar
                        document.getElementById('formActa').addEventListener('submit', function (event) {
                            // Validar que los campos sean números enteros mayores o iguales a 0
                            var isValid = true;

                            // Validar votos blancos
                            var votosBlancos = parseInt(document.getElementById('votos_blancos').value) || 0;
                            if (isNaN(votosBlancos) || votosBlancos < 0) {
                                alert("Por favor, ingrese un valor válido para Votos Blancos");
                                isValid = false;
                            }

                            // Validar votos nulos
                            var votosNulos = parseInt(document.getElementById('votos_nulos').value) || 0;
                            if (isNaN(votosNulos) || votosNulos < 0) {
                                alert("Por favor, ingrese un valor válido para Votos Nulos");
                                isValid = false;
                            }

                            // Validar que el archivo PDF esté adjunto
                            var documentoPDF = document.getElementById('documento_pdf');
                            if (!documentoPDF.files.length) {
                                alert("Por favor, adjunte un documento PDF");
                                isValid = false;
                            }

                            // Validar que el total de votos no sea mayor a la cantidad de votantes
                            var totalVotos = parseInt(document.getElementById('total_votos').value) || 0;
                            var cantidadVotantes = {{ $cantidadVotantes }}; // Obtener la cantidad de votantes desde la vista
                            
                            if (totalVotos > cantidadVotantes) {
                                document.getElementById('error_total_votos').style.display = 'block';
                                isValid = false;
                            } else {
                                document.getElementById('error_total_votos').style.display = 'none';
                            }

                            // Si hay algún error, prevenir el envío del formulario
                            if (!isValid) {
                                event.preventDefault();
                            }
                        });
                    </script>

                    <button type="submit" style="margin-bottom: 80px;">Guardar</button>
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

            // Ocultar el mensaje de error al recalcular el total
            document.getElementById('error_total_votos').style.display = 'none';
        }
    </script>
</body>
@endsection
