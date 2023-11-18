document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('form-seleccion');
    const facultadSelect = form.querySelector('#facultad');
    const carreraSelect = form.querySelector('#carrera');

    facultadSelect.addEventListener('change', function () {
        // Lógica para cargar dinámicamente las carreras según la facultad seleccionada
        const facultadSeleccionada = facultadSelect.value;

        // Aquí podrías hacer una solicitud AJAX para obtener las carreras de la facultad
        // y actualizar las opciones del select de carreras en consecuencia.

        // En este ejemplo, simplemente limpiamos las opciones del select de carreras.
        while (carreraSelect.options.length > 1) {
            carreraSelect.remove(1);
        }

        // Agrega nuevas opciones según la facultad seleccionada
        if (facultadSeleccionada === 'economia') {
            agregarCarreras(['contaduria', 'administracion','comercio']);
        } else if (facultadSeleccionada === 'tecnologia') {
            agregarCarreras(['sistemas', 'informatica']);
        }
    });

    // Función para agregar opciones al select de carreras
    function agregarCarreras(carreras) {
        for (const carrera of carreras) {
            const option = document.createElement('option');
            option.value = carrera;
            option.text = carrera;
            carreraSelect.add(option);
        }
    }
});