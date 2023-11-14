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

        <form id="formulario"  action="{{ url('/comite/store') }}" method="post" enctype="multipart/form-data">
        @csrf


            <div class="form-group">
                <label for="rector">Registrar Rector:</label>
                <input type="text" id="rector" name="rector" pattern="[A-Za-z ]+" required > <!--value="Ing. Julio Medina Gamboa" readonly -->
            </div>
            
            <div class="form-group">
                <label for="fud">Vocal designado por la Fud:</label>
                <input type="text" id="fud" name="fud"   pattern="[A-Za-z ]+" required>
            </div>
            
            <div class="form-group">
                <label for="ful">Vocal designado por la Ful:</label>
                <input type="text" id="ful" name="ful"   pattern="[A-Za-z ]+" required>
            </div>
            
            <div class="form-group">
                <label for="vocalDocente1">Vocal docente:</label>
                <input type="text" id="vocalDocente1" name="vocalDocente1" pattern="[A-Za-z ]+" required>
                <label for="vocalEstudiante1">Vocal estudiante:</label>
                <input type="text" id="vocalEstudiante1" name="vocalEstudiante1" pattern="[A-Za-z ]+" required>
            </div>
            
            <div class="form-group">
                <label for="vocalDocente2">Vocal docente:</label>
                <input type="text" id="vocalDocente2" name="vocalDocente2" pattern="[A-Za-z ]+" required>
                <label for="vocalEstudiante2">Vocal estudiante:</label>
                <input type="text" id="vocalEstudiante2" name="vocalEstudiante2" pattern="[A-Za-z ]+" required>
            </div>
            
            <button type="button" id="asignarAleatoriamenteButton">Asignar Aleatoriamente</button>
            
            <button type="submit" class="submit-btn">Publicar Miembros Comite</button>
        
            <button type="button" class="save-button" onclick="Acabar_proceso()">Continuar con el Registro</button>

            <!--<button type="submit" id="submitButton">Registrar Miembros del Comité</button -->
            <p id="error-message" style="color: red;"></p>

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