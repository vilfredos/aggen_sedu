@extends('Home')

@section('content')
<head>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 15px;
            text-align: center;
        }
        .vote-box {
            width: 50px;
            height: 50px;
            border: 2px solid black;
            display: inline-block;
        }
        .save-button {
            display: block;
            margin: 20px auto;
            background-color: blue;
            color: white;
            text-align: center;
            line-height: 50px;
            font-size: 20px;
            cursor: pointer;
        }
    </style>
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

<button class="save-button" onclick="terimar_proceso()">terminar registro de eleccion</button>
<script src="{{ asset('js/papeleta.js') }}"></script>
</body>
@endsection