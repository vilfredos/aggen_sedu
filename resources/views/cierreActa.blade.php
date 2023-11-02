@extends('Home')

@section('content')
<head>
<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title>Gestion de roles</title>
    <link href="{{ asset('css/poblacion.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<form class="form-control" action="{{ route('cierreActa.store') }}" method="POST">
  @csrf
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

  <button type="submit" class="btn btn-primary">Guardar Acta de Cierre</button>
</form>




@endsection
