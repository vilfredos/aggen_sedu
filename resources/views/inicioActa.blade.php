@extends('Home')

@section('content')
<head>
<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title>Gestion de roles</title>
    <link href="{{ asset('css/poblacion.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
<h4>Iniciar Acta</h4>
<form class="row g-3 p-4">
    <div class="col-md-6">
      <label for="fecha" class="form-label">Fecha</label>
      <input type="datetime-local" class="form-control" id="fecha" name="fecha">
    </div>
    <div class="col-md-6">
      <label for="facultad" class="form-label">Facultad</label>
      <input type="text" class="form-control" id="facultad" name="facultad">
    </div>
    <div class="col-md-6">
      <label for="mesa" class="form-label">N° Mesa</label>
      <input type="number" class="form-control" id="mesa" name="mesa" min="1">
    </div>
    <div class="col-12">
      <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
    
</form>
<!-- Script -->
<script src="{{ asset('js/poblacion.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
@endsection
