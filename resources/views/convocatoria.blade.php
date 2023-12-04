@extends('Home')

@section('content')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <link href="{{ asset('css/convocatoria.css') }}" rel="stylesheet">


    <title>Generar Convocatoria</title>


</head>

<body>
    <div class="form-containerConvocatoria">
        <form action="{{ route('convocatoria.store') }}" id="form-seleccion" method="post" enctype="multipart/form-data">
            @csrf
<div class="formularioConvocatoria">
            <div class="superior">
                <h1 class="titulo">Convocatoria</h1>
            </div>

                <div id="seccion1">
                    <label for="titulo">Titulo:</label>
                    <input type="text" id="titulo" name="titulo" required><br>

                    <label for="descripcion">Descripción:</label>
                    <input type="text" id="descripcion" name="descripcion" required><br>

                    <label for="fecha_ini">Fecha de inicio:</label>
                    <input type="date" id="fecha_ini" name="fecha_ini" required><br>

                    <label for="ficha_fin">Fecha de finalización:</label>
                    <input type="date" id="ficha_fin" name="ficha_fin" required><br>

                    <label for="pdf">Archivo PDF:</label>
                    <input type="file" id="pdf" name="pdf" accept=".pdf" required><br>

                    <button type="button" onclick="siguienteSeccion('seccion1', 'seccion2')">Siguiente</button>
                    <br>
                    <br>


                </div>

                <div id="seccion2" style="display: none;">

                    <div id="cargos">
                        <label  class="tituloSeccion2" for="fecha_ini">Asignar Cargo</label><br>
                        <label for="cargo0">Nombre del cargo:</label><br>
                        <input type="text" id="cargo0" name="cargos[]" required><br>
                    </div>

                    <button type="button" onclick="agregarCargo()">Agregar otro cargo</button><br>

                    <button type="button" onclick="anteriorSeccion('seccion2', 'seccion1')">Anterior</button>
                    <button type="button" onclick="siguienteSeccion('seccion2', 'seccion3')">Siguiente</button><br>

                </div>

                <div id="seccion3" style="display: none;">
                    <div class="form-group form-check d-block">
                    
                    <label for="facultad">Seleccionar Cargo</label>
                    <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="tipos[]" value="docente" id="docente">
                    <label class="form-check-label" for="docente">Docente</label>
                    </div>
                    <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="tipos[]" value="estudiante" id="estudiante">
                    <label class="form-check-label" for="estudiante">Estudiante</label>
                    </div>
                    </div>

                    <div class="form-group">
                    <label for="facultad">Facultad</label>
                    <select class="form-control" name="facultad" id="facultad">
                        <option value="">Seleccione una facultad</option>
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
                        <option value="Enfermeria">Facultad de Enfermeria</option>
                        <option value="Facultad de Veterinaria">Facultad de Veterinaria</option>
                        <!-- Agrega más opciones según tus necesidades -->
                    </select>
                    </div>

                    <div class="form-group">
                    <label for="carrera">Carrera</label>
                    <select class="form-control" name="carrera" id="carrera">
                        <option value="">Seleccione una carrera</option>
                    </select>
                    </div>
                        <button type="button" onclick="anteriorSeccion('seccion3', 'seccion2')">Anterior</button>

                        <button type="submit">Registrar Eleccion</button><br>

                </div>

</form>
</div>

    </div>
</body>
<script>
    let contadorCargos = 1;

    function agregarCargo() {
        const divCargos = document.getElementById('cargos');
        const nuevoCargo = document.createElement('div');

        nuevoCargo.innerHTML = `
            <label for="cargo${contadorCargos}">Nombre del cargo:</label>
            <input type="text" id="cargo${contadorCargos}" name="cargos[]" required>
        `;

        divCargos.appendChild(nuevoCargo);
        contadorCargos++;
    }

    function siguienteSeccion(seccionActual, seccionSiguiente) {
        document.getElementById(seccionActual).style.display = 'none';
        document.getElementById(seccionSiguiente).style.display = 'block';
    }
    function anteriorSeccion(seccionActual, seccionAnterior) {
        document.getElementById(seccionActual).style.display = 'none';
        document.getElementById(seccionAnterior).style.display = 'block';
    }
</script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="{{ asset('js/seleccionar.js') }}"></script>
@endsection