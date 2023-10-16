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
            <h3>Reportan robo de 27 tarjetas de video, procesadores y memorias RAM en un laboratorio de la UMSS</h3>
            <p>El hecho fue notificado a la Policía y habría ocurrido en uno de los ambientes de la Facultad de Ciencias y Tecnología de la Universidad Mayor de San Simón.</p>
        </article>

        <article>
            <h3>Cochabamba: Bombardeo de nubes busca provocar lluvias en valle alto y evaluarán impacto</h3>
            <p>Con el apoyo de la comunidad científica y con el objetivo de mitigar la sequía, Cochabamba se prepara para aplicar por primera vez tecnología que permita la estimulación de nubes para generar lluvia. </p>
        </article>

        <article>
            <h3>Presentan libro memoria de las III Jornadas de cine boliviano “Fuera de campo”</h3>
            <p>El libro memoria de las III Jornadas de cine boliviano “Fuera de campo” será presentado hoy en la Universidad Mayor de San Simón (UMSS). El evento se realizará en la sala audiovisual del edificio nuevo de la Facultad de Humanidades, Plazuela Sucre.</p>
        </article>
    </section>
@endsection