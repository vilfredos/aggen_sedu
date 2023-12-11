@extends('Home')

@section('content')
<head>
<link href="{{ asset('css/papeleta.css') }}" rel="stylesheet">
<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<body>

    <div class="container">
            <div class="contenedorPapeleta">

                <div class="superiorP">
                    <h1 class="tituloP">Papeleta electoral</h1>
                </div>
                <table class="miTablaPapeleta">
                    <tr>
                        @foreach ($data as $frente)
                        <td>
                            <div>
                                <h3>{{ $frente->nombre_frente }}</h3>
                                @foreach ($frente->candidatos as $candidato)
                                <p>{{ $candidato->cargo_postular }}<br>
                                {{ $candidato->nombre }}</p>
                                @endforeach
                                <div class="vote-box"></div>
                            </div>
                        </td>
                        @endforeach
                    </tr>
            </table>
        </div>
    </div>
    <script>
    </script>
    
</body>

@endsection