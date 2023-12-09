
@extends('Home')

@section('content')
<h1>Hola {{ $jurado->name }},</h1>

    <p>Este es un mensaje de notificación para informarte sobre...</p>

    <!-- Puedes acceder a los datos del jurado utilizando la variable $jurado -->
    <p>Nombre: {{ $jurado->name }}</p>
    <p>Email: {{ $jurado->email }}</p>
    <p>Facultad: {{ $jurado->facultad }}</p>
    <p>Carrera: {{ $jurado->carrera }}</p>
    <p>CI: {{ $jurado->ci }}</p>

    <p>Gracias por participar como jurado en nuestro proceso.</p>

    <p>Saludos,</p>
    <p>Tu Aplicación</p>
    @endsection