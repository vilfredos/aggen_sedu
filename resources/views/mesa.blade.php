@extends('Home')

@section('content')
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro de Mesas</title>
    <link href="{{ asset('css/mesa.css') }}" rel="stylesheet">
</head>
<body>
    <div class="containerMesa">
    <div class="containeedor2">

            <div class="superior">
                <h1 class="titulo">Registro de Mesas</h1>
            </div>
            <form method="POST" action="{{ route('registrarMesa') }}">
                @csrf
                <div class="form-group">
                        <label for="numeroMesa">Número de Mesa (solo números):</label>
                        <input type="text" id="numeroMesa" name="numeroMesa" pattern="[0-9]+" required>
                </div>
                <div class="form-group">
                        <label for="recintoVotacion">Recinto de Votación (solo letras):</label>
                        <input type="text" id="recintoVotacion" name="recintoVotacion" pattern="[A-Za-z ]+" required>
                </div>
                <div class="form-group">
                        <label for="aulaVotacion">Aula de Votación:</label>
                        <input type="text" id="aulaVotacion" name="aulaVotacion" required>
                </div>
                <div class="form-group">
                    <label for="facultad">Facultad:</label>
                    <select id="facultad" name="facultad" required>
                        <option value="Facultad de Economia">Facultad de Economia</option>
                        <option value="Facultad de Tecnologia">Facultad de Tecnologia</option>
                        <option value="Facultad de Humanidades">Facultad de Humanidades</option>
                        <option value="Facultad de Arquitectura">Facultad de Arquitectura</option>
                        <option value="Facultad de Ciencias Agrícolas">Facultad de Ciencias Agrícolas</option>
                        <option value="Facultad de Medicina">Facultad de Medicina</option>
                        <option value="Facultad de Odontología">Facultad de Odontología</option>
                        <option value="Facultad de Ciencias Bioquímicas y Farmacéuticas">Facultad de Ciencias Bioquímicas y Farmacéuticas</option>
                        <option value="Facultad Politécnica del Valle Alto">Facultad Politécnica del Valle Alto</option>
                        <option value="Facultad de Ciencias Sociales">Facultad de Ciencias Sociales</option>
                        <option value="Facultad de Desarrollo Rural y Territorial">Facultad de Desarrollo Rural y Territorial</option>
                        <option value="Facultad Ciencias Juridicas y Politicas">Facultad Ciencias Juridicas y Politicas</option>
                        <option value="Enfermeria">Enfermeria</option>
                        <option value="Facultad de Veterinaria">Facultad de Veterinaria</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="carrera">Carrera:</label>
                    <select id="carrera" name="carrera" required>
                        <!-- Facultad de Economia -->
                        <option value="licenciatura en Economía" data-facultad="Facultad de Economia">Licenciatura en Economía</option>
                        <option value="administración de empresas" data-facultad="Facultad de Economia">Administración de Empresas</option>
                        <option value="contaduría publica" data-facultad="Facultad de Economia">Contaduría Pública</option>
                        <option value="ingeniería comercial" data-facultad="Facultad de Economia">Ingeniería Comercial</option>

                        <!-- Facultad de Tecnologia -->
                        <option value="biotecnología" data-facultad="Facultad de Tecnologia">Biotecnología</option>
                        <option value="energías" data-facultad="Facultad de Tecnologia">Energías</option>
                        <option value="biología" data-facultad="Facultad de Tecnologia">Biología</option>
                        <option value="química" data-facultad="Facultad de Tecnologia">Química</option>
                        <option value="ingeniería electrica" data-facultad="Facultad de Tecnologia">Ingeniería Eléctrica</option>
                        <option value="ingeniería industrial" data-facultad="Facultad de Tecnologia">Ingeniería Industrial</option>
                        <option value="ingeniería mecanica" data-facultad="Facultad de Tecnologia">Ingeniería Mecánica</option>
                        <option value="ingeniería informatica" data-facultad="Facultad de Tecnologia">Ingeniería Informática</option>
                        <option value="ingeniería civil" data-facultad="Facultad de Tecnologia">Ingeniería Civil</option>
                        <option value="matematicas" data-facultad="Facultad de Tecnologia">Matemáticas</option>
                        <option value="fisica" data-facultad="Facultad de Tecnologia">Física</option>
                        <option value="ingenieria electronica" data-facultad="Facultad de Tecnologia">Ingeniería Electrónica</option>
                        <option value="ingeniería de sistemas" data-facultad="Facultad de Tecnologia">Ingeniería de Sistemas</option>
                        <option value="ingeniería en alimentos" data-facultad="Facultad de Tecnologia">Ingeniería en Alimentos</option>
                        <option value="ingeniería electromecánica" data-facultad="Facultad de Tecnologia">Ingeniería Electromecánica</option>
                        <option value="petroquímica" data-facultad="Facultad de Tecnologia">Petroquímica</option>

                        <!-- Facultad de Humanidades -->
                        <option value="ciencias de la educación" data-facultad="Facultad de Humanidades">Ciencias de la Educación</option>
                        <option value="lingüística" data-facultad="Facultad de Humanidades">Lingüística</option>
                        <option value="psicología" data-facultad="Facultad de Humanidades">Psicología</option>
                        <option value="educación intercultural y bilingüe" data-facultad="Facultad de Humanidades">Educación Intercultural y Bilingüe</option>
                        <option value="comunicación social" data-facultad="Facultad de Humanidades">Comunicación Social</option>
                        <option value="trabajo social" data-facultad="Facultad de Humanidades">Trabajo Social</option>
                        <option value="licenciatura en musica" data-facultad="Facultad de Humanidades">Licenciatura en Musica</option>

                        <!-- Facultad de Arquitectura -->
                        <option value="arquitectura" data-facultad="Facultad de Arquitectura">Arquitectura</option>
                        <option value="diseño de interiores" data-facultad="Facultad de Arquitectura">Diseño de Interiores</option>
                        <option value="turismo" data-facultad="Facultad de Arquitectura">Turismo</option>
                        <option value="Diseño gráfico y comunicación visual" data-facultad="Facultad de Arquitectura">Diseño Gráfico y Comunicación Visual</option>
                        <option value="planificación del territorio y medio ambiente" data-facultad="Facultad de Arquitectura">Planificación del Territorio y Medio Ambiente</option>

                        <!-- Facultad de Ciencias Agrícolas -->
                        <option value="ingeniería agronómica" data-facultad="Facultad de Ciencias Agrícolas">Ingeniería Agronómica</option>
                        <option value="ingeniería forestal" data-facultad="Facultad de Ciencias Agrícolas">Ingeniería Forestal</option>
                        <option value="ingeniería agroindustrial" data-facultad="Facultad de Ciencias Agrícolas">Ingeniería Agroindustrial</option>
                        <option value="ingeniería en agrónomo zootecnista" data-facultad="Facultad de Ciencias Agrícolas">Ingeniería en Agrónomo Zootecnista</option>
                        <option value="ingeniero agrónomo ficotecnista" data-facultad="Facultad de Ciencias Agrícolas">Ingeniero Agrónomo Ficotecnista</option>
                        <option value="ingeniería agrícola" data-facultad="Facultad de Ciencias Agrícolas">Ingeniería Agrícola</option>

                        <!-- Facultad de Medicina -->
                        <option value="medicina" data-facultad="Facultad de Medicina">Medicina</option>
                        <option value="fisioterapia y kinesiología" data-facultad="Facultad de Medicina">Fisioterapia y Kinesiología</option>
                        <option value="nutrición y dietética" data-facultad="Facultad de Medicina">Nutrición y Dietética</option>

                        <!-- Facultad de Odontología -->
                        <option value="odontología" data-facultad="Facultad de Odontología">Odontología</option>

                        <!-- Facultad de Ciencias Bioquímicas y Farmacéuticas -->
                        <option value="bioquímica y farmacéutica" data-facultad="Facultad de Ciencias Bioquímicas y Farmacéuticas">Bioquímica y Farmacéutica</option>

                        <!-- Facultad Politécnica del Valle Alto -->
                        <option value="construcción civil" data-facultad="Facultad Politécnica del Valle Alto">Construcción Civil</option>
                        <option value="industria de alimentos" data-facultad="Facultad Politécnica del Valle Alto">Industria de Alimentos</option>
                        <option value="mecánica industrial" data-facultad="Facultad Politécnica del Valle Alto">Mecánica Industrial</option>
                        <option value="química industrial" data-facultad="Facultad Politécnica del Valle Alto">Química Industrial</option>
                        <option value="mecánica automotriz" data-facultad="Facultad Politécnica del Valle Alto">Mecánica Automotriz</option>
                        <option value="maquinaria agroindustrial" data-facultad="Facultad Politécnica del Valle Alto">Maquinaria Agroindustrial</option>
                        <option value="técnico medio en enfermería" data-facultad="Facultad Politécnica del Valle Alto">Técnico Medio en Enfermería</option>

                        <!-- Facultad de Ciencias Sociales -->
                        <option value="sociología licenciatura" data-facultad="Facultad de Ciencias Sociales">Sociología Licenciatura</option>
                        <option value="antropología" data-facultad="Facultad de Ciencias Sociales">Antropología</option>

                        <!-- Facultad de Desarrollo Rural y Territorial -->
                        <option value="agronomía" data-facultad="Facultad de Desarrollo Rural y Territorial">Agronomía</option>
                        <option value="desarrollo rural sostenible" data-facultad="Facultad de Desarrollo Rural y Territorial">Desarrollo Rural Sostenible</option>

                        <!-- Facultad Ciencias Juridicas y Politicas -->
                        <option value="ciencias jurídicas y políticas" data-facultad="Facultad Ciencias Juridicas y Politicas">Ciencias Jurídicas y Políticas</option>
                        <option value="ciencias políticas" data-facultad="Facultad Ciencias Juridicas y Politicas">Ciencias Políticas</option>
                        <option value="criminología y ciencias forenses" data-facultad="Facultad Ciencias Juridicas y Politicas">Criminología y Ciencias Forenses</option>
                        <option value="relaciones internacionales" data-facultad="Facultad Ciencias Juridicas y Politicas">Relaciones Internacionales</option>

                        <!-- Enfermeria -->
                        <option value="enfermeria" data-facultad="Enfermeria">Enfermeria</option>

                        <!-- Facultad de Veterinaria -->
                        <option value="veterinaria y zootecnnia" data-facultad="Facultad de Veterinaria">Veterinaria y Zootecnnia</option>

                        <!-- Todos -->
                        <option value="todos" data-facultad="todos">Todos</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="tipoUsuario">Tipo de votante:</label>
                    <select id="tipoUsuario" name="tipoUsuario" required>
                        <option value="estudiantes">Estudiantes</option>
                        <option value="docentes">Docentes</option>
                        <option value="ambos">Ambos</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="fotoLugar">Foto del Lugar</label>
                    <input type="text" id="fotoLugar" name="fotoLugar" required>
                </div>
                <div class="form-group">
                    <label for="capacidadMaxima">Capacidad Máxima (ingrese un valor mayor o igual a 10):</label>
                    <input type="number" id="capacidadMaxima" name="capacidadMaxima" min="10" required>
                </div>

                <div class="form-group">
                    <button type="submit">Registrar Mesa</button>
                    <button class="save-button" onclick="terimar_proceso()">siguiente</button>
                </div>

                <p id="error-message" style="color: red;"></p>

            </form>
            <!--button class="save-button" onclick="terimar_proceso()">siguiente</!--button-->
    </div>
</div>
    <!-- Agrega tus scripts JavaScript -->
    <script src="{{ asset('js/mesa.js') }}"></script>
</body>
@endsection