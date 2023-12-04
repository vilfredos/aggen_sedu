@extends('Home')

@section('content')
<head>
    <link href="{{ asset('css/votosPorMesa.css') }}" rel="stylesheet">
    <style>
        #nuevaTabla {
            width: 1150px; /* Ancho total de la tabla */
        }

        #nuevaTabla td {
            width: 150px; /* Ancho fijo para cada celda */
            word-wrap: break-word;
        }
        
        
    </style>
    <!-- Include Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<div>
    <h1>Registro votos</h1>
    <table id="myTable">
        <tr>
            <th>Número Mesa</th>
            <th>Votos FR</th>
            <th>Votos UXSS</th>
            <th>Votos PSS</th>
            <th>Votos blancos</th>
            <th>Votos nulos</th>
            <th>Votos totales</th>
            <th>Barras</th>
            <th>Circular</th>
        </tr>

        @foreach ($datos as $dato)
            <tr>
                <td>{{ $dato->num_mesa }}</td>
                <td>{{ $dato->votos_FR }}</td>
                <td>{{ $dato->votos_UXSS }}</td>
                <td>{{ $dato->votos_PSS }}</td>
                <td>{{ $dato->votos_blancos }}</td>
                <td>{{ $dato->votos_nulos }}</td>
                <td>{{ $dato->votos_totales }}</td>
                <td><button class="bar-chart-btn" data-row="{{ json_encode($dato) }}">Barras</button></td>
                <td><button class="pie-chart-btn" data-row="{{ json_encode($dato) }}">Circular</button></td>
            </tr>

        @endforeach
    </table>
    <button id="agregarColumna">Transponer Tabla</button>
    <div id="nuevaTabla"></div>
        <div class="grafico-title" id="bar-chart-title"></div>
        <canvas class="grafico" id="bar-chart"></canvas>
        <div class="grafico-title" id="pie-chart-title"></div>
        <canvas class="grafico" id="pie-chart"></canvas>
    </div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#agregarColumna').on('click', function () {
            var transposeData = [];
            var headers = [];

            // Obtener los encabezados de la tabla original
            $('#myTable th').each(function () {
                headers.push($(this).text());
            });

            // Encontrar la longitud máxima de fila
            var maxRows = 0;
            $('#myTable tr').each(function (rowIndex) {
                var rowLength = $(this).find('td').length;
                maxRows = Math.max(maxRows, rowLength);
            });

            // Llenar un array con los datos transpuestos
            $('#myTable tr').each(function (rowIndex) {
                transposeData[rowIndex] = [];
                $(this).find('td').each(function (columnIndex) {
                    transposeData[rowIndex][columnIndex] = $(this).text();
                });

                // Rellenar celdas vacías si la longitud de la fila es menor que maxRows
                if (transposeData[rowIndex].length < maxRows) {
                    for (var i = transposeData[rowIndex].length; i < maxRows; i++) {
                        transposeData[rowIndex][i] = ''; // O cualquier valor predeterminado
                    }
                }
            });

            // Calcular la suma de cada columna en la tabla original
            var sumas = Array(transposeData[0].length).fill(0);
            for (var i = 1; i < transposeData.length; i++) {
                for (var j = 0; j < transposeData[i].length; j++) {
                    sumas[j] += parseFloat(transposeData[i][j]) || 0;
                }
            }

            // Crear la tabla transpuesta con los encabezados de la tabla original en la primera columna
            var nuevaTabla = '<table>';
            for (var i = 0; i < maxRows; i++) {
                nuevaTabla += '<tr>';
                // Agregar los encabezados en la primera columna
                if (i < headers.length) {
                    nuevaTabla += '<td>' + headers[i] + '</td>';
                } else {
                    nuevaTabla += '<td>&nbsp;</td>'; // Celdas vacías para la primera columna en otras filas
                }

                for (var j = 1; j < transposeData.length; j++) {
                    if (i === 0) {
                        nuevaTabla += '<td>Mesa ' + transposeData[j][i] + '</td>'; // Copiar el número de mesa en la primera fila
                        nuevaTabla += '<td>PORCENTAJE ' + '</td>';
                    } else {
                        nuevaTabla += '<td>' + transposeData[j][i] + '</td>';
                        var porcentaje = (parseFloat(transposeData[j][i]) / parseFloat(transposeData[j][6])) * 100;
                        nuevaTabla += '<td>' + porcentaje.toFixed(2) + '%</td>';
                    }
                }
                if (i === 0) {
                    nuevaTabla += '<td>TOTAL' + '</td>'; // Agregar "new" como nueva columna
                } else {
                    nuevaTabla += '<td>' + sumas[i] + '</td>';
                }
                if (i === 0) {
                    nuevaTabla += '<td>porcentaje total' + '</td>'; // Agregar "new" como nueva columna
                } else {
                    var porc = (parseFloat(sumas[i] / sumas[6])) * 100;
                    nuevaTabla += '<td>' + porc.toFixed(2) + '%</td>';
                }
                nuevaTabla += '</tr>';
            }
            nuevaTabla += '</table>';

            $('#nuevaTabla').html(nuevaTabla);
        });
    });

    $(document).ready(function () {
    // Manejar clics de botones
    $('#myTable').on('click', '.bar-chart-btn', function () {
        var datosFila = $(this).data('row');
        var numeroMesa = datosFila.num_mesa; // Obtener el número de mesa
        var datosGrafico = {
            labels: ['Votos FR', 'Votos UXSS', 'Votos PSS', 'Votos blancos', 'Votos nulos'],
            datasets: [{
                label: 'Votos por Mesa',
                data: [datosFila.votos_FR, datosFila.votos_UXSS, datosFila.votos_PSS, datosFila.votos_blancos, datosFila.votos_nulos],
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        };
        mostrarGrafico('bar-chart', datosGrafico, 'bar', numeroMesa); // Pasa el número de mesa como parámetro
    });

    $('#myTable').on('click', '.pie-chart-btn', function () {
        var datosFila = $(this).data('row');
        var numeroMesa = datosFila.num_mesa; // Obtener el número de mesa
        var datosGrafico = {
            labels: ['Votos FR', 'Votos UXSS', 'Votos PSS', 'Votos blancos', 'Votos nulos'],
            datasets: [{
                data: [datosFila.votos_FR, datosFila.votos_UXSS, datosFila.votos_PSS, datosFila.votos_blancos, datosFila.votos_nulos],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)'
                ],
                borderWidth: 1
            }]
        };
        mostrarGrafico('pie-chart', datosGrafico, 'pie', numeroMesa); // Pasa el número de mesa como parámetro
    });
});

function mostrarGrafico(contenedor, datosGrafico, tipoGrafico, numeroMesa) {
    var contenedorElement = document.getElementById(contenedor);

    if (!contenedorElement) {
        console.error('No se pudo encontrar el elemento del gráfico.');
        return;
    }

    var ctx = contenedorElement.getContext('2d');

    var graficoExistente = Chart.getChart(ctx);
    if (graficoExistente) {
        graficoExistente.destroy();
    }

    // Agregar el título dinámico
    datosGrafico.options = {
        responsive: true,
        maintainAspectRatio: false, // Establecer o ajustar según sea necesario
        title: {
            display: true,
            text: 'Mesa Nro ' + numeroMesa,
        },
    };

    // Actualizar el título en la página
    $('#' + contenedor + '-title').text('Mesa Nro ' + numeroMesa);

    var grafico = new Chart(ctx, {
        type: tipoGrafico,
        data: datosGrafico,
        options: datosGrafico.options,
    });
}

</script>
@endsection
        