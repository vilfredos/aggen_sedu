@extends('Home')

@section('content')
<head>
    <meta charset="UTF-8">
    
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


    <title>Formulario para Registrar Miembros del Comité</title>
    <link href="{{ asset('css/comite.css') }}" rel="stylesheet">

</head>
<body>
    <div class="container">

        <div class="superior">
        <img src="{{ asset('img/umss1.png') }}" alt="logo" class="imagen-estilo">

        <h1 class="titulo">Registrar Miembros del Comité</h1>
        </div>

        <form id="formulario"  action="/comite" method="post" enctype="multipart/form-data">
        @csrf


            <div class="form-group">
                <label for="rector">Registrar Rector:</label>
                <input type="text" id="rector" name="rector" pattern="[A-Za-z ]+" required value="Ing. Julio Medina Gamboa" readonly > <!--value="Ing. Julio Medina Gamboa" readonly -->
            </div>

            <div class="form-group">
                <label for="docenteTitular1">Vocal Docente titular 1:</label>
                <input type="text" id="docenteTitular1" name="docenteTitular1" pattern="[A-Za-z ]+" required value="{{ $vocalesTitularesDocentes[0] ?? '' }}" readonly>
            </div>

            <div class="form-group">
                <label for="docenteTitular2">Vocal Docente titular 2:</label>
                <input type="text" id="docenteTitular2" name="docenteTitular2" pattern="[A-Za-z ]+" required value="{{ $vocalesTitularesDocentes[1] ?? '' }}" readonly>
            </div>

            <div class="form-group">
                <label for="docenteTitular3">Vocal Docente titular 3:</label>
                <input type="text" id="docenteTitular3" name="docenteTitular3" pattern="[A-Za-z ]+" required value="{{ $vocalesTitularesDocentes[2] ?? '' }}" readonly>
            </div>

            <div class="form-group">
                <label for="docenteSuplente1">Vocal Docente Suplente 1:</label>
                <input type="text" id="docenteSuplente1" name="docenteSuplente1"   pattern="[A-Za-z ]+" required value="{{ $vocalesSuplentesDocentes[0] ?? '' }}" readonly>
            </div>

            <div class="form-group">
                <label for="docenteSuplente2">Vocal Docente Suplente 2:</label>
                <input type="text" id="docenteSuplente2" name="docenteSuplente2"   pattern="[A-Za-z ]+" required value="{{ $vocalesSuplentesDocentes[1] ?? '' }}" readonly>
            </div>

            <div class="form-group">
                <label for="docenteSuplente3">Vocal Docente Suplente 3:</label>
                <input type="text" id="docenteSuplente3" name="docenteSuplente3"   pattern="[A-Za-z ]+" required value="{{ $vocalesSuplentesDocentes[2] ?? '' }}" readonly>
            </div>

            <div class="form-group">
                <label for="estudianteTitular1">Vocal Estudiante Titular 1:</label>
                <input type="text" id="estudianteTitular1" name="estudianteTitular1"   pattern="[A-Za-z ]+" required value="{{ $vocalesTitularesEstudiantes[0] ?? '' }}" readonly>
            </div>

            <div class="form-group">
                <label for="estudianteTitular2">Vocal Estudiante Titular 2:</label>
                <input type="text" id="estudianteTitular2" name="estudianteTitular2"   pattern="[A-Za-z ]+" required value="{{ $vocalesTitularesEstudiantes[1] ?? '' }}" readonly>
            </div>

            <div class="form-group">
                <label for="estudianteSuplente1">Vocal Estudiante Suplente 1:</label>
                <input type="text" id="estudianteSuplente1" name="estudianteSuplente1"   pattern="[A-Za-z ]+" required value="{{ $vocalesSuplentesEstudiantes[0] ?? '' }}" readonly>
            </div>

            <div class="form-group">
                <label for="estudianteSuplente2">Vocal Estudiante Suplente 2:</label>
                <input type="text" id="estudianteSuplente2" name="estudianteSuplente2"   pattern="[A-Za-z ]+" required value="{{ $vocalesSuplentesEstudiantes[1] ?? '' }}" readonly>
            </div>


             <button type="button" onclick="asignarAleatoriamente()">Asignar Aleatoriamente</button>
            
            <button class="submit-btn">Publicar Miembros Comite</button>
        
            <button type="button" id="modificarButton">Modificar</button>

            <div id="motivoModificacion" style="display: none;">
                <label for="motivo">Motivo por el cual desea modificar a los miembros del comité:</label>
                    <select id="motivo" name="motivo">
                        <option value="1">Por despido</option>
                        <option value="2">Por Salud</option>
                        <option value="3">Por otra causa</option>
                    </select>
    
                    
</form>
    </div>
    <script src="{{ asset('js/comite.js') }}"></script>
</body>
@endsection
