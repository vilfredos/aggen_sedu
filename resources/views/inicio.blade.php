@extends('Home')

@section('content')
<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <!-- Aquí puedes agregar el contenido principal de tu página -->
    <link href="{{ asset('css/inicio.css') }}" rel="stylesheet">
    <section>
        <h1>Bienvenido al Sistema Electoral Universitario</h1>
    </section>

    <section>
        <h2>Noticias</h2>

        <article>
            <h3>Reportan robo de 27 tarjetas de video, procesadores y memorias RAM en un laboratorio de la UMSS</h3>
            <p>El hecho fue notificado a la Policía y habría ocurrido en uno de los ambientes de la Facultad de Ciencias y Tecnología de la Universidad Mayor de San Simón.</p>
            <a href="https://www.opinion.com.bo/articulo/policial/robo-universidad-mayor-san-simon/20231010150648923620.html#:~:text=La%20Polic%C3%ADa%20report%C3%B3%20este%20martes,un%20laboratorio%20en%20dicha%20Facultad.">Noticia completa: presione AKI</a>
        </article>

        <article>
            <h3>Cochabamba: Bombardeo de nubes busca provocar lluvias en valle alto y evaluarán impacto</h3>
            <p>Con el apoyo de la comunidad científica y con el objetivo de mitigar la sequía, Cochabamba se prepara para aplicar por primera vez tecnología que permita la estimulación de nubes para generar lluvia. </p>
            <a href="https://www.lostiempos.com/actualidad/cochabamba/20231008/bombardeo-nubes-busca-provocar-lluvias-valle-alto-evaluaran-impacto">Noticia completa: presione AKI</a>

        </article>
    </section>
@endsection