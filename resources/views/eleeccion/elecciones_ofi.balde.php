<form method="POST" action="/ruta-a-tu-controlador">
    @csrf
    <label for="titulo">Título:</label><br>
    <input type="text" id="titulo" name="titulo"><br>
    <label for="descripcion">Descripción:</label><br>
    <textarea id="descripcion" name="descripcion"></textarea><br>
    <label for="fecha_inicio">Fecha de inicio:</label><br>
    <input type="date" id="fecha_inicio" name="fecha_inicio"><br>
    <label for="fecha_fin">Fecha de fin:</label><br>
    <input type="date" id="fecha_fin" name="fecha_fin"><br>
    <label for="rol">Rol:</label><br>
    <input type="radio" id="docentes" name="rol" value="docentes">
    <label for="docentes">Docentes</label><br>
    <input type="radio" id="estudiantes" name="rol" value="estudiantes">
    <label for="estudiantes">Estudiantes</label><br>
    <input type="radio" id="ambos" name="rol" value="ambos">
    <label for="ambos">Ambos</label><br>
    <label for="facultades_carreras">Facultades y Carreras:</label><br>
    <select id="facultades_carreras" name="facultades_carreras">
        <!-- Aquí puedes agregar las opciones de facultades y carreras -->
    </select><br>
    
    <label for="cargo">Cargo a postular:</label><br>
    <input type="text" id="cargo" name="cargo"><br>
    <input type="submit" value="Enviar">
</form>