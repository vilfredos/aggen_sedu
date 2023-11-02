@extends('Home')

@section('content')
<head>
<link href="{{ asset('css/papeleta.css') }}" rel="stylesheet">
<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
</head>
<body>

<h2>ELECCIONES A RECTOR Y VICERRECTOR GESTION 2024-2028</h2>

<table>
  <tr>
    <th>Frente Revolucionario</th>
    <th>Unidos X San Simon</th> 
    <th>Primero San Simon</th>
  </tr>
  <tr>
    <td>RECTOR<br>Juan Pérez López<br>VICERRECTOR<br>Oscar Morales Vázquez</td>
    <td>RECTOR<br>María Chávez Castro<br>VICERRECTOR<br>Rocío Hernández Peredo</td>
    <td>RECTOR<br>Manuel Cosío Ari<br>VICERRECTOR<br>Lucas Hernández Mamai</td>
  </tr>
  <tr>
    <td><div class="vote-box"></div></td>
    <td><div class="vote-box"></div></td>
    <td><div class="vote-box"></div></td>
  </tr>
</table>
<div class="contenedor">
<button class="save-button" onclick="terimar_proceso()">terminar registro de eleccion</button>
</div>
<script src="{{ asset('js/papeleta.js') }}"></script>
</body>
@endsection