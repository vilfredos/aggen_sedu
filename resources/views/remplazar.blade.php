@extends('Home')

@section('content')
<head>
    <title>Remplazar Jurado</title>
</head>
<body>
    <h1>Información del Jurado Reemplazado</h1>
    <p>SIS Antiguo: {{ $jurado->sis }}</p>
    <p>Facultad: {{ $jurado->facultad }}</p>
    <p>Carrera: {{ $jurado->carrera }}</p>
    <p>Tipo: {{ $jurado->tipo }}</p>
    <p>name: {{ $jurado->name }}</p>

    <h1>Información del Nuevo Jurado</h1>
    <p>SIS Nuevo: {{ $votante->sis }}</p>
    <p>Facultad: {{ $votante->facultad }}</p>
    <p>Carrera: {{ $votante->carrera }}</p>
    <p>Tipo: {{ $votante->tipo }}</p>
    <p>name: {{ $votante->name }}</p>
</body>
@endsection