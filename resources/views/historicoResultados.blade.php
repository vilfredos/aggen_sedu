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
        <div>

            <div class="containedorH">
                <form id="formulario">

                    <div class="superiorH">
                        <h1 class="tituloH">Resultados Historicos</h1>
                    </div>

                    <table class="TablaHistorico">
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
                            <td>Alejandro García</td>
                            <td>Movimiento Universitario Independiente (MUI)</td>
                            <td>Natalia Gómez
                                ,Daniel Castro
                                ,Sofia Morales
                                ,Alberto Vargas
                                ,Marta Jiménez
                                ,Diego Medina
                                ,Alejandra Silva
                                ,Ricardo Ortega
                                ,Valeria Mendoza
                                ,Federico Torres
                            </td>
                            <td>Nombre1, Nombre2, Nombre3</td>
                            <td>Ganador</td>
                            <td><a href="#">Ver detalles</a></td>
                        </tr>
                        <tr>
                        <td>2021</td>
                        <td>Valentina Torres</td>
                        <td>Frente Universitario Democrático (FUD)</td>
                        <td>Isabel Castro
                            ,Hugo Ramírez
                            ,Adriana López
                            ,Sergio Soto
                            ,Ana Rosa Martínez
                            ,Esteban García
                            ,Clara Morales
                            ,Gabriel Herrera
                            ,Paula Gutiérrez
                            ,José Mendoza
                        </td>
                        <td>Nombre1, Nombre2, Nombre3</td>
                        <td>Ganador</td>
                        <td><a href="#">Ver detalles</a></td>
                        <tr>
                            <td>2022</td>
                            <td>Juan Martínez</td>
                            <td>Alianza Estudiantil Progresista (AEP)</td>
                            <td>María Rodríguez,
                                Luis Herrera
                                ,Camila González
                                ,Ricardo López
                                ,Laura Fernández
                                ,Carlos Sánchez
                                ,Gabriela Ramírez
                                ,Andrés Díaz
                                ,Carolina Ruiz
                                ,Javier Pérez
                            </td>
                            <td>Nombre1, Nombre2, Nombre3</td>
                            <td>Ganador</td>
                            <td><a href="#">Ver detalles</a></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>

    </body>
@endsection