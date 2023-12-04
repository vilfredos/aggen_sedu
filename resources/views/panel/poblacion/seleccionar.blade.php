@extends('Home')

@section('content')

<div class="container mt-4">
    <h1>Seleccionar Tipo</h1>

    <form action="{{ route('votantes.buscar') }}" method="post" id="form-seleccion">
        @csrf

        <div class="form-group form-check d-block">

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

        <button type="submit" class="btn btn-primary">Buscar Votantes</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="{{ asset('js/seleccionar.js') }}"></script>
</body>



@endsection