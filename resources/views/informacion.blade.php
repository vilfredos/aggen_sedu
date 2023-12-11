@extends('Home')

@section('content')

<head>
    <title>Información de Elecciones</title>
</head>

<body>
    <h1>Informe final de la eleccion {{ $eleccion->titulo }}</h1>


    <p>Esta elección inicio un {{ $eleccion->fecha_ini }} y termino un {{ $eleccion->ficha_fin }}
        con la siguiente convocatoria {{-- insertar convocatoria --}}
        para elegir los siguientes cargos</p>
    <table>
        <thead>
            <tr>
                <th>Cargo a postular</th>
            </tr>
        </thead>
        <tbody>
            @foreach($eleccion_cargo as $cargo)
            <tr>
                <td>{{ $cargo->cargo_postular }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- traer poblacion votante --}}

    Se postularon los siguientes frentes con sus candidatos
    <table>
        <thead>
            <tr>
                <th>Frente</th>
                <th>Representante</th>
                <th>Sigla</th>
                <th>Color Primario</th>
                <th>Color Secundario</th>
                <th>Cargo del Candidato</th>
                <th>Datos del Candidato</th>
            </tr>
        </thead>
        <tbody>
            @foreach($frentes as $frente)
            @foreach($candidatos as $can)
            @if($can->id_frente == $frente->id_frente)
            <tr>
                <td>{{ $frente->nombre_frente }}</td>
                <td>{{ $frente->sis_representante }}</td>
                <td>{{ $frente->sigla_frente }}</td>
                <td>{{ $frente->color_primario }}</td>
                <td>{{ $frente->color_secundario }}</td>
                <td>{{ $can->cargo_postular }}</td>
                <td>{{ $can->sis_candidato }}</td>
            </tr>
            @endif
            @endforeach
            @endforeach
        </tbody>
    </table>

    Votos totales
    <table>
        <thead>
            <tr>
                <th>Sigla Frente</th>
                <th>Total Votos</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($votosfrente as $item)
            <tr>
                <td>{{ $item->sigla_frente }}</td>
                <td>{{ $item->total_votos }}</td>
            </tr>
            @endforeach
            <tr>
                <td>Votos Blancos</td>
                <td>{{ $suma_votosblanco }}</td>
            </tr>
            <tr>
                <td>Votos Nulos</td>
                <td>{{ $suma_votosnulo }}</td>
            </tr>
        </tbody>
    </table>


    {{-- Muestra comite --}}
    se registro el siguiente comité

    <table>
        <thead>
            <tr>
                <th>Sis</th>
                <th>Facultad</th>
                <th>Cargo</th>
            </tr>
        </thead>
        <tbody>
            @foreach($eleccion_comite as $ec)
            <tr>
                <td>{{ $ec->sis }}</td>
                <td>{{ $ec->facultad }}</td>
                <td>{{ $ec->cargo }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>


    Se registraron las siguientes mesas y jurados
    <table>
        <thead>
            <tr>
                <th>Número de mesa</th>
                <th>Ubicación</th>
                <th>Aula</th>
                <th>Facultad</th>
                <th>Carrera</th>
                <th>Votantes</th>
                <th>Jurado SIS</th>
                <th>Cargo del Jurado</th>
            </tr>
        </thead>
        <tbody>
            @foreach($mesas as $mes)
            @php
            $jurados = $eleccion_jurados->where('id_mesa', $mes->numeroMesa);
            @endphp
            @foreach($jurados as $jus)
            <tr>
                @if ($loop->first)
                <td rowspan="{{ $jurados->count() }}">{{ $mes->numeroMesa }}</td>
                <td rowspan="{{ $jurados->count() }}">
                    <a href="{{ $mes->recinto }}" target="_blank">{{ $mes->recinto }}</a>
                </td>
                <td rowspan="{{ $jurados->count() }}">{{ $mes->aula }}</td>
                <td rowspan="{{ $jurados->count() }}">{{ $mes->facultad }}</td>
                <td rowspan="{{ $jurados->count() }}">{{ $mes->carrera }}</td>
                <td rowspan="{{ $jurados->count() }}">{{ $mes->gremio }}</td>
                @endif
                <td>{{ $jus->sis }}</td>
                <td>{{ $jus->cargo }}</td>
            </tr>
            @endforeach
            @endforeach
        </tbody>
    </table>
    Con los votantes asiganadas a una mesa
    <table>
        <thead>
            <tr>
                <th>Sis del votante</th>
                <th>Numero de Mesa</th>
                <!-- Agrega aquí más encabezados de columna si los necesitas -->
            </tr>
        </thead>
        <tbody>
            @foreach ($eleccion_votante_mesa as $item)
            <tr>
                <td>{{ $item->sis }}</td>
                <td>{{ $item->id_mesa }}</td>
                <!-- Agrega aquí más campos si los necesitas -->
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
@endsection