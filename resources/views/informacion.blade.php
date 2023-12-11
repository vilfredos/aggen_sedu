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
        se postularon los siguientes frentes
        @foreach($frentes as $frente)
            <p>El frente : {{ $frente->nombre_frente }}</p>
            <p>con su representante {{ $frente->sis_representante }}</p>
            <p>cona la sigla : {{ $frente->sigla_frente }}</p>
            <p>con su color primario: {{ $frente->color_primario }}</p>
            <p>con su color secundario: {{ $frente->color_secundario }}</p>
            <!-- Muestra los demás datos de cada candidato aquí -->
        @endforeach        
        <!-- Muestra los demás datos de la elección aquí -->
        
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