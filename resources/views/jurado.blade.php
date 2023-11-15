@extends('Home')

@section('content')
<head>
  <title>Formulario</title>
  <link href="{{ asset('css/jurado.css') }}" rel="stylesheet">
</head>
<body>
<h1>Acta de Escrutinio</h1>
<form class="jur" action="/jurado" method="post">
    @csrf
    <label for="sis">SIS:</label><br>
    <input type="text" id="sis" name="sis" class="form-control" required><br>
    <label for="nombre">Nombre:</label><br>
    <input type="text" id="nombre" name="nombre" class="form-control" required><br>
    <label for="facultad">Facultad:</label><br>
    <input type="text" id="facultad" name="facultad" class="form-control" required><br>
    <label for="carrera">Carrera:</label><br>
    <input type="text" id="carrera" name="carrera" class="form-control" required><br>
    <label for="ci">CI:</label><br>
    <input type="text" id="ci" name="ci" class="form-control" required><br>
    <label for="cargo">Cargo:</label><br>
    <input type="text" id="cargo" name="cargo" class="form-control" required><br>
    <label for="numeroMesa">Numero de Mesa:</label><br>
    <input type="number" id="numeroMesa" name="numeroMesa" min="1" max="300" step="1" required><br>
    <label for="gremio">Gremio:</label><br>
    <input type="text" id="gremio" name="gremio" class="form-control" required><br>
    <input type="submit" value="Guardar Jurado">
</form>
</body>
@endsection