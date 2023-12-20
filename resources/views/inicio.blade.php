@extends('Home')

@section('content')
<head>
    <link href="{{ asset('css/inicio.css') }}" rel="stylesheet">
    <style>
        .content-box {
            background-color: #ffffff;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 5px;
        }
    </style>
</head>
<body>

    <div class=contInicioPrincipal>

        <div class="contenerInicio">
            
            <section>

                <div class="ContenidomisionVision">
                    <strong class="misionvision">Misión del Sistema Electoral Universitario de AgEn</strong><br>
                    <p>Facilitar elecciones universitarias justas, transparentes y participativas, empoderando a la comunidad estudiantil para elegir líderes representativos y contribuir al desarrollo de una cultura democrática en las instituciones académicas.</p>
                </div>

                <div class="ContenidomisionVision">
                    <strong class="misionvision">Visión del Sistema Electoral Universitario de AgEn</strong><br>
                    <p>Ser el referente líder en sistemas electorales universitarios, proporcionando soluciones tecnológicas innovadoras que fortalezcan la democracia estudiantil, promuevan la inclusión y contribuyan al crecimiento integral de las comunidades académicas.</p>
                    
                    <div class="contentbox">
                        <strong class="misionvision">Valores del Sistema Electoral Universitario de Agen</strong><br>

                        <ol class="textoInferior" start="1" type="1">
                            <li><strong>Transparencia:</strong> Garantizamos procesos electorales abiertos y transparentes que inspiran confianza en los resultados y fortalecen la integridad del sistema.</li>
                            <li><strong>Participaci&oacute;n Activa:</strong> Fomentamos la participaci&oacute;n activa de cada estudiante, asegurando que sus voces sean escuchadas y respetadas en el proceso democr&aacute;tico.</li>
                            <li><strong>Innovaci&oacute;n Tecnol&oacute;gica:</strong> Adoptamos y desarrollamos tecnolog&iacute;as avanzadas para proporcionar una plataforma electoral segura, eficiente e intuitiva que se adapte a las necesidades cambiantes de las instituciones acad&eacute;micas.</li>
                            <li><strong>Equidad e Inclusi&oacute;n:</strong> Promovemos la igualdad de oportunidades y la inclusi&oacute;n de todas las voces, sin importar su origen, g&eacute;nero, orientaci&oacute;n sexual o cualquier otra caracter&iacute;stica que los haga &uacute;nicos.</li>
                            <li><strong>&Eacute;tica y Responsabilidad:</strong> Actuamos con integridad y responsabilidad, garantizando la equidad y el respeto en todas las etapas del proceso electoral.</li>
                            <li><strong>Colaboraci&oacute;n:</strong> Trabajamos en estrecha colaboraci&oacute;n con las instituciones acad&eacute;micas y la comunidad estudiantil para adaptarnos a sus necesidades y garantizar el &eacute;xito de cada elecci&oacute;n.</li>
                            <li><strong>Empoderamiento Estudiantil:</strong> Empoderamos a los estudiantes para que tomen decisiones informadas, participen activamente en la vida universitaria y contribuyan al desarrollo de su comunidad.</li>
                        </ol>
                    </div>
                </div>
            </section>
        </div>
    </div>
</body>
@endsection