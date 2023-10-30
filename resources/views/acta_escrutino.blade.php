@extends('Home')

@section('content')
<head>
<link href="{{ asset('css/acta_escrutinio.css') }}" rel="stylesheet">
<title>Acta de Escrutinio</title>
</head>
<body>
<h1>Acta de Escrutinio</h1>
<form action="/acta_escrutino" method="post">
@csrf
    <label for="num_mesa">Número de Mesa:</label><br>
    <input type="number" id="num_mesa" name="num_mesa" min="1" max="300" step="1"><br>
    <label for="votos_FR">Votos FR:</label><br>
    <input type="number" id="votos_FR" name="votos_FR" min="0" max="300" step="1" oninput="calculateTotal()"><br>
    <label for="votos_UXSS">Votos UXSS:</label><br>
    <input type="number" id="votos_UXSS" name="votos_UXSS" min="0" max="300" step="1" oninput="calculateTotal()"><br>
    <label for="votos_PSS">Votos PSS:</label><br>
    <input type="number" id="votos_PSS" name="votos_PSS" min="0" max="300" step="1" oninput="calculateTotal()"><br>
    <label for="votos_blancos">Votos Blancos:</label><br>
    <input type="number" id="votos_blancos" name="votos_blancos" min="0" max="300" step="1" oninput="calculateTotal()"><br>    
    <label for="votos_nulos">Votos Nulos:</label><br>
    <input type="number" id="votos_nulos" name="votos_nulos" min="0" max="300" step="1" oninput="calculateTotal()"><br>
    <label for="votos_totales">Votos Totales:</label><br>
    <input type="number" id="votos_totales" name="votos_totales" min="0" max="3000" step="1" readonly><br>
    <input type="submit" value="Submit">
</form>
</body>
<script>
function calculateTotal() {
    var votos_FR = parseInt(document.getElementById('votos_FR').value) || 0;
    var votos_UXSS = parseInt(document.getElementById('votos_UXSS').value) || 0;
    var votos_PSS = parseInt(document.getElementById('votos_PSS').value) || 0;
    var votos_blancos = parseInt(document.getElementById('votos_blancos').value) || 0;
    var votos_nulos = parseInt(document.getElementById('votos_nulos').value) || 0;

    var total = votos_FR + votos_UXSS + votos_PSS + votos_blancos + votos_nulos;

    document.getElementById('votos_totales').value = total;
}
</script>

@endsection