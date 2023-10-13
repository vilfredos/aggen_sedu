@extends('Home')

@section('content')
        <!-- Aquí puedes agregar el contenido principal de tu página -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/inicio.css') }}">
        <section>
        <h1>Bienvenido al Sistema Electoral Universitario</h1>
    </section>

    <section>
        <h2>Noticias</h2>

        <article>
            <h3>Conferencia</h3>
            <p>Descripción de la conferencia...</p>
        </article>

        <article>
            <h3>Reunión</h3>
            <p>Descripción de la reunión...</p>
        </article>
    </section>
@endsection