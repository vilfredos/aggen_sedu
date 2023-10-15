@extends('Home')

@section('content')
<head>
  <title>Formulario</title>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/jurado.css') }}">

</head>
<body>
  <div class="form-container">
    <h2>Registrar jurado Manualmente</h2>
    <form id="myForm" method="POST" action="{{ route('jurado.store') }}">
  @csrf
  <label for="nombre">Nombre:</label><br>
  <input type="text" id="nombre" name="nombre"><br>
  <label for="turno">Turno:</label><br>
  <input type="text" id="turno" name="turno"><br>
  <label for="cargo">Cargo:</label><br>
  <input type="text" id="cargo" name="cargo"><br>
  <label for="numeroMesa">Número de Mesa:</label><br>
  <input type="text" id="numeroMesa" name="numeroMesa"><br>
  <label for="observacion">Observación:</label><br>
  <input type="text" id="observacion" name="observacion"><br>
  <button type="submit">Guardar</button>
</form>
  </div>

  <script src="{{ asset('js/jurado.js') }}"></script>
</body>
@endsection