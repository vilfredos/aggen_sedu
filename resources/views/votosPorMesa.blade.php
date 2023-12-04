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
</head>
<div>

<div class="contenerVm">
    <div class="superiorVm">
        <h1 class="tituloVm">Registro votos</h1>
    </div>
    <table id="myTable" class="miTablaMesa">
        <tr>
            <th>Número Mesa</th>
            <th>Votos FR</th>
            <th>Votos UXSS</th>
            <th>Votos PSS</th>
            <th>Votos blancos</th>
            <th>Votos nulos</th>
            <th>Votos totales</th>
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
            </tr>
        @endforeach
    </table>
    <button id="agregarColumna" class="botonVerdeVm">Transponer Tabla</button>
    <div id="nuevaTabla"></div>
</div>
    </div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
    $('#agregarColumna').on('click', function() {
        var transposeData = [];
        var headers = [];

        // Obtener los encabezados de la tabla original
        $('#myTable th').each(function() {
            headers.push($(this).text());
        });

        // Encontrar la longitud máxima de fila
        var maxRows = 0;
        $('#myTable tr').each(function(rowIndex) {
            var rowLength = $(this).find('td').length;
            maxRows = Math.max(maxRows, rowLength);
        });

        // Llenar un array con los datos transpuestos
        $('#myTable tr').each(function(rowIndex) {
            transposeData[rowIndex] = [];
            $(this).find('td').each(function(columnIndex) {
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
    }else{
        nuevaTabla += '<td>' + sumas[i] + '</td>';
    }
    if (i === 0) {
        nuevaTabla += '<td>porcentaje total' + '</td>'; // Agregar "new" como nueva columna
    }else{
        var porc = (parseFloat(sumas[i]/sumas[6])) * 100;
        nuevaTabla += '<td>' + porc.toFixed(2) + '%</td>';
    } 
    nuevaTabla += '</tr>';
}
nuevaTabla += '</table>';

        $('#nuevaTabla').html(nuevaTabla);
    });
});   
</script>
@endsection  