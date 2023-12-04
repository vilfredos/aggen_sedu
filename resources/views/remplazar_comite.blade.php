@extends('Home')

@section('content')
<head>
</head>
<body>

<h2>Formulario para remplazar Miembro del Comite</h2>
<p>Se va a reemplazar al miembro del comité con SiS: {{ $sis }}</p>
<form class="remplar_comite" action="/remplazar_comite" method="post" enctype="multipart/form-data">
@csrf

  <label for="menu">Razon de excusa:</label><br>
  <select name="menu" id="menu">
    <option value="opcion1" selected>enfermedad</option>
    <option value="opcion2">estado de gravidez</option>
    <option value="opcion3">fuera mayor o caso fortuito</option>
    <option value="opcion4">dirigente o candidato de organizacion politica</option>
    <option value="opcion5">presenta servicios publicos o privados vitales</option>
</select><br>
  <label for="descripcion">Descripcion:</label><br>
  <input type="text" id="descripcion" name="descripcion" ><br>
  <label for="file">Subir archivo PDF:</label><br>
  <input type="file" id="file" name="file" accept="application/pdf"><br>

  <label for="new_sis">Nuevo miembro del comite:</label><br>
  <input type="number" id="new_sis" name="new_sis" min="1" step="1"><br>

  <input type="hidden" id="sis" name="sis" value="{{ $sis }}">

  <input type="submit" value="Enviar">
</form>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</body>

@endsection