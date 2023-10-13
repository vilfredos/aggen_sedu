@extends('Home')

@section('content')
<head>
  <title>Formulario</title>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/jurado.css') }}">
</head>
<body>
  <div class="form-container">
    <h2>Registrar jurado</h2>
    <form id="myForm">
      <div class="form-group">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
      </div>
      <div class="form-group">
        <label for="turno">Turno:</label>
        <select id="turno" name="turno" required>
          <option value="mañana">Mañana</option>
          <option value="tarde">Tarde</option>
        </select>
      </div>
      <div class="form-group">
        <label for="cargo">Cargo:</label>
        <select id="cargo" name="cargo" required>
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
      <div class="form-group">
        <label for="ubicacion">Ubicacin:</label>
        <input type="text" id="ubicacion" name="ubicacion" required>
      </div>
      <button type="submit">Enviar</button>
    </form>
  </div>

  <script src="{{ asset('js/home.js') }}"></script>
</body>
@endsection