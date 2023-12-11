<head>
    <title>Información de Elecciones</title>
</head>

<body>
    <h1>Informe final eleccion {{ $eleccion->titulo }}</h1>
    @if($eleccion)
    <h2>Eleccion</h2>
    <p>esta eleccion inicio un {{ $eleccion->fecha_ini }} y termino un {{ $eleccion->ficha_fin }}
        con la siguiente convocatoria //insetar convocatoria//
        para elegir los siguientes cargos</p>
    @foreach($eleccion_cargo as $cargo)
    <p>ID: {{ $cargo->cargo_postular }}</p>
    <!-- Muestra los demás datos de cada candidato aquí -->
    @endforeach

    //trer poblacion votante


    se postularon los siguientes frentes
    @foreach($frentes as $frente)
    <p>El frente : {{ $frente->nombre_frente }}</p>
    <p>con su representante {{ $frente->sis_representante }}</p>
    //traer informacion del representante
    <p>cona la sigla : {{ $frente->sigla_frente }}</p>
    <p>con su color primario: {{ $frente->color_primario }}</p>
    <p>con su color secundario: {{ $frente->color_secundario }}</p>
    //unir datos//
    con sus candidatos
    <!-- Muestra los demás datos de cada candidato aquí -->
    @endforeach


    <!-- Muestra los demás datos de la elección aquí -->
    con el siguiente comite

    @foreach($eleccion_comite as $ec)
    <p>info comite : {{ $ec->nombre_frente }}</p>
    <p>en la : {{ $ec->facultad }}</p>
    <p>con el siguiente cargo {{ $ec->cargo }}</p>
    //unir datos//
    con sus candidatos
    <!-- Muestra los demás datos de cada candidato aquí -->
    @endforeach


    se registraron las siguientes mesas
    //se debe mostrar en una tabla//
    @foreach($mesas as $mes)
    <p>numero de mesa: {{ $sis->numeroMesa }}</p>
    <p>ubicado en : {{ $sis->recinto }}</p>//hacerlo un enlace //
    <p>en el aula: {{ $sis->aula }}</p>
    <p>en la : {{ $sis->facultad }}</p>
    <p>de la carrera de : {{ $sis->carrera }}</p>
    <p>para los votantes : {{ $sis->gremio }}</p>
    <!-- Muestra los demás datos de cada sis aquí -->
    @endforeach
    teniendo los siguientes jurados

    @foreach($eleccion_jurados as $jus)
    <p>para la mesa : {{ $jus->id_mesa }}</p>
    <p>ubicado en : {{ $jus->sis }}</p>//traer el nombre y otros datos
    <p>usando el cargo de {{ $jus->cargo }}</p>

    con la poblacion asginada a una mesa 

    @foreach($eleccion_comite as $ec)
    <p>info comite : {{ $ec->nombre_frente }}</p>
    <p>en la : {{ $ec->facultad }}</p>
    <p>con el siguiente cargo {{ $ec->cargo }}</p>
    //unir datos//
    con sus candidatos
    <!-- Muestra los demás datos de cada candidato aquí -->
    @endforeach

    
    <h2>Eleccion SIS</h2>
    @foreach($eleccion_sis as $sis)
    <p>ID: {{ $sis->id }}</p>
    <!-- Muestra los demás datos de cada sis aquí -->
    @endforeach

    <h2>Candidatos</h2>
    @foreach($candidatos as $candidato)
    <p>ID: {{ $candidato->id }}</p>
    <!-- Muestra los demás datos de cada candidato aquí -->
    @endforeach

    <!-- Haz lo mismo para las demás tablas... -->
    @else
    <p>Eleccion no encontrada.</p>
    @endif
</body>

</html>