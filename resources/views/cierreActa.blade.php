@extends('Home')

@section('content')
<head>
      <title>Gestion de roles</title>
    <link href="{{ asset('css/cierreActa.css') }}" rel="stylesheet">
  </head>

<body>
  <div class="form-containerC">

  <form class="formularioCierre">
  

    <form class="form-control" action="{{ route('cierreActa.store') }}" method="POST">
      @csrf

      <div class="superiorC">
        <h1 class="titulo">Cierre de Acta</h1>
      </div>
        <div class="form-group">
              <div class=" d-inline-block w-30">
              <label class="form-label" for="fecha">Fecha:</label>
              <input class="form-control d-inline-block" type="date" name="fecha" required>
          </div>

          <div class=" d-inline-block w-30">
            <label class="form-label" for="hora">Hora:</label>
            <input class="form-control"  type="time" name="hora" required>
          </div>

          <div class=" d-inline-block w-30">
            <label class="form-label" for="nombre_mesa">Nombre de la Mesa:</label>
            <input class="form-control" type="text" name="nombre_mesa" required>
          </div>

    </div>
      

      
          <label class="form-label" for="observaciones">Observaciones:</label>
          <textarea  class="form-control mb-4" name="observaciones"></textarea>

          <button type="submit" class="botonVerde">Guardar Acta de Cierre</button>
    </form>
</form>
  </div>
</body>



@endsection
