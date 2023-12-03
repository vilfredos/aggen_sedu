@extends('Home')

@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--aCA SCRIPT-->
    <title>Resultados Historicos</title>
    <link href="{{ asset('css/historicoResultados.css') }}" rel="stylesheet">   
</head>

    <body>

        <div class="container">
            <form id="formulario">

                <div class="superior">
                    <img src="{{ asset('img/umss1.png') }}" alt="logo" class="imagen-estilo">
                    <h1 class="titulo">Resultados Historicos</h1>
                </div>

                <table>
                    <tr>
                        <th>Año</th>
                        <th>Candidato Ganador</th>
                        <th>Partido Politico</th>
                        <th>Miembros del Comite</th>
                        <th>Jurados</th>
                        <th>Resultado</th>
                        <th>Detalles</th>
                    </tr>
                    <tr>
                        <td>2020</td>
                        <td>Nombre del Candidato</td>
                        <td>Partido XYZ</td>
                        <td>Nombre1, Nombre2, Nombre3</td>
                        <td>Nombre1, Nombre2, Nombre3</td>
                        <td>Ganador</td>
                        <td><a href="#">Ver detalles</a></td>
                    </tr>
                </table>
            </form>
        </div>

    </body>
@endsection