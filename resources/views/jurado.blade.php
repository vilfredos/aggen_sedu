@extends('Home')

@section('content')
<head>
<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
  <title>Formulario</title>
  <link href="{{ asset('css/jurado.css') }}" rel="stylesheet">

</head>
<body>
    <div class="container_jurado">
    <div class="container_jurado_a">
  <img src="{{ asset('img/umss1.png') }}" alt="logo" class="imagen-estilo">
  <h1 class="titulo ">Registrar jurado Manualmente</h2>
</div>
    <form id="myForm">
      <div class="form-group">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
      </div>
      <div class="form-group">
        <label for="turno">Turno:</label>
        <select id="turno" name="turno" required>
        <option value="">Selecciona un turno</option>
          <option value="mañana">Mañana</option>
          <option value="tarde">Tarde</option>
        </select>
      </div>
      <div class="form-group">
        <label for="cargo">Cargo:</label>
        <select id="cargo" name="cargo" required>
        <option value="">Selecciona un cargo</option>
          <option value="presidente">Presidente</option>
          <option value="titular">Titular</option>
          <option value="suplente">Suplente</option>
        </select>
      </div>
      <div class="form-group">
        <label for="mesa"> Numero de Mesa:</label>
        <input type="number" id="mesa" name="mesa" required>
      </div>
      <div class="form-group">
        <label for="rol">Rol:</label>
        <select id="rol" name="rol" required>
          <option value="">Selecciona un rol</option>
          <option value="docente">Docente</option>
          <option value="estudiante">Estudiante</option>
        </select>
      </div>
      <button type="submit">Registrar Jurado</button>
    </form>
    <div class="button-container">
  <button class="save-button" onclick="limpiarCampos()">Cancelar</button>
  <button class="save-button" onclick="terimar_proceso()">Siguiente</button>
</div>
  </div>

  <script src="{{ asset('js/jurado.js') }}"></script>

</body>
@endsection