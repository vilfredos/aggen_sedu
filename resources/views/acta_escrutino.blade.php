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
                            <input type="number" id="frente_{{ $frente->id_frente }}" name="votos_frentes[{{ $frente->id_frente }}]" min="0" step="1" oninput="calculateTotal()">
                        </div>
                    @endforeach

                    <!-- Campo para mostrar el total de votos -->

                    <!-- Resto de tus campos -->
                    <label for="votos_blancos">Votos Blancos:</label><br>
                    <input type="number" id="votos_blancos" name="votos_blancos" min="0" max="300" step="1" oninput="validateInput(this)" pattern="\d+"><br>
                
                    <br>
                    <label for="votos_nulos">Votos Nulos:</label><br>
                    <input type="number" id="votos_nulos" name="votos_nulos" min="0" max="300" step="1" oninput="validateInput(this)" pattern="\d+"><br>
                            
                    <br>
                    <label for="total_votos">Total de Votos:</label><br>
                    <input type="text" id="total_votos" name="total_votos" readonly>
                    <br>
                    <br>
                    <label for="documento_pdf">Adjuntar Acta en PDF:</label>
                    <input type="file" id="documento_pdf" name="documento_pdf" accept=".pdf">
                    <script>
                        function confirmarRegistro() {
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

                            // Si todos los campos son válidos, enviar el formulario
                            if (isValid) {
                                document.getElementById('formActa').submit();
                            }
                        }

                        // Función para validar la entrada en tiempo real
                        function validateInput(input) {
                            var inputValue = input.value.trim();

                            if (inputValue !== "" && !/^\d+$/.test(inputValue)) {
                                alert("Por favor, ingrese solo números enteros mayores o iguales a 0");
                                input.value = ""; // Limpiar el valor incorrecto
                            }
                        }
                    </script>
                    <button type="button" onclick="confirmarRegistro()" style="margin-bottom: 80px;">Guardar</button>
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
