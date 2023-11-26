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
        if (facultadSeleccionada === 'Facultad de Economia') {
            agregarCarreras(['licenciatura en Economía', 'administración de empresas','contaduría publica','ingeniería comercial']);
        } else if (facultadSeleccionada === 'Facultad de Tecnologia') {
            agregarCarreras(['biotecnología', 'energías','biología','química','ingeniería electrica','ingeniería industrial','ingeniería mecanica','ingeniería informatica','ingeniería civil','matematicas','fisica','ingenieria electronica','ingeniería de sistemas','ingeniería en alimentos','ingeniería electromecánica','petroquímica']);
        }
        else if (facultadSeleccionada === 'Facultad de Humanidades') {
            agregarCarreras(['ciencias de la educación', 'lingüística','psicología','educación intercultural y bilingüe','comunicación social','trabajo social','licenciatura en musica']);
        }
        else if (facultadSeleccionada === 'Facultad de Arquitectura') {
            agregarCarreras(['arquitectura', 'diseño de interiores','turismo','Diseño gráfico y comunicación visual','planificación del territorio y medio ambiente']);
        }
        else if (facultadSeleccionada === 'Facultad de Ciencias Agrícolas') {
            agregarCarreras(['ingeniería agronómica', 'ingeniería forestal','ingeniería agroindustrial','ingeniería en agrónomo zootecnista','ingeniero agrónomo ficotecnista','ingeniería agrícola']);
        }
        else if (facultadSeleccionada === 'Facultad de Medicina') {
            agregarCarreras(['medicina', 'fisioterapia y kinesiología','nutrición y dietética']);
        }
        else if (facultadSeleccionada === 'Facultad de Odontología') {
            agregarCarreras(['odontología']);
        }
        else if (facultadSeleccionada === 'Facultad de Ciencias Bioquímicas y Farmacéuticas') {
            agregarCarreras(['bioquímica y farmacéutica']);
            
        }
        else if (facultadSeleccionada === 'Facultad Politécnica del Valle Alto') {
            agregarCarreras(['construcción civil','industria de alimentos','mecánica industrial','química industrial','mecánica automotriz','maquinaria agroindustrial','técnico medio en enfermería']);
            
        }
        else if (facultadSeleccionada === 'Facultad de Ciencias Sociales') {
            agregarCarreras(['sociología licenciatura','antropología']);
            
        }
        else if (facultadSeleccionada === 'Facultad de Desarrollo Rural y Territorial') {
            agregarCarreras(['agronomía','desarrollo rural sostenible']);
            
        }
        else if (facultadSeleccionada === 'Facultad Ciencias Juridicas y Politicas') {
            agregarCarreras(['ciencias jurídicas y políticas','ciencias políticas','criminología y ciencias forenses','relaciones internacionales']);
            
        }
        else if (facultadSeleccionada === 'Enfermeria') {
            agregarCarreras(['enfermeria']);
            
        }
        else if (facultadSeleccionada === 'Facultad de Veterinaria') {
            agregarCarreras(['veterinaria y zootecnnia']);
            
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