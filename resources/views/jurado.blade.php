@extends('Home')

@section('content')
<head>
  <title>Formulario</title>
  <link href="{{ asset('css/jurado.css') }}" rel="stylesheet">
</head>
<body>
  <div class="form-containerActaJ">

    <form class="formularioActaJ">
      <form class="jur" action="/jurado" method="post">
        @csrf

          <div class="superiorJ">
            <h1 class="tituloJ">Acta de Escrutinio</h1>
          </div>

        
          <label for="sis">SIS:</label>
          <input type="text" id="sis" name="sis" class="form-control" required><br>
          <label for="nombre">Nombre:</label>
          <input type="text" id="nombre" name="nombre" class="form-control" required><br>
          <label for="facultad">Facultad:</label>
          <input type="text" id="facultad" name="facultad" class="form-control" required><br>
          <label for="carrera">Carrera:</label>
          <input type="text" id="carrera" name="carrera" class="form-control" required><br>
          <label for="ci">CI:</label>
          <input type="text" id="ci" name="ci" class="form-control" required><br>
          <label for="cargo">Cargo:</label>
          <input type="text" id="cargo" name="cargo" class="form-control" required><br>
          <label for="numeroMesa">Numero de Mesa:</label>
          <input type="number" id="numeroMesa" name="numeroMesa" min="1" max="300" step="1" required><br>
          <label for="gremio">Gremio:</label>
          <input type="text" id="gremio" name="gremio" class="form-control" required><br>
          <input type="submit" class="botonVerdeJ" value="Guardar Jurado">
        </form>
    </form>
  </div>
</body>
@endsection