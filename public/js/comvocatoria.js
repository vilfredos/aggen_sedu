var formulario = document.getElementById('formulario'); 
var tituloInput = document.getElementById('titulo');
var advertenciaDiv = document.getElementById('advertencia');
var fechaInicioInput = document.getElementById('fechaInicio');
var fechaFinInput = document.getElementById('fechaFin');

var documentoInput = document.getElementById('documento');

var errorMessage = document.getElementById('error-message');

formulario.addEventListener('submit', function(event) {
    
    var inputValue = tituloInput.value;
    var soloLetras = inputValue.replace(/[^a-zA-Z\s]/g, '');

    if (inputValue !== soloLetras || inputValue.length < 10 || inputValue.length > 30 ) {
        advertenciaDiv.textContent = "El título No puede contener numeros y letras debe contener entre 10 y 30 letras.";
        advertenciaDiv.style.color = "red";
        tituloInput.style.borderColor = "red";
        event.preventDefault(); 
        return;
    } else {
        advertenciaDiv.textContent = "";
        advertenciaDiv.style.color = "";
        tituloInput.style.borderColor = "";
    }

    
    if (!fechaInicioInput.value || !fechaFinInput.value) {
        errorMessage.textContent = "Debes llenar ambas fechas.";
        errorMessage.style.color = "red";
        event.preventDefault(); 
        return;
    } else {
        errorMessage.textContent = "";
        errorMessage.style.color = "";
    }



    var fechaInicio = new Date(fechaInicioInput.value);
    fechaInicio.setUTCHours(0, 0, 0, 0);
    var fechaFin = new Date(fechaFinInput.value);
    fechaFin.setUTCHours(0, 0, 0, 0);
    var fechaActual =new Date();
    fechaActual.setUTCHours(0, 0, 0, 0);

    if (fechaInicio < fechaActual) {
        errorMessage.textContent = "La fecha de inicio no puede ser anterior a la fecha actual.";
        errorMessage.style.color = "red";
        event.preventDefault(); 
        return; 
    }
    
    if (fechaFin < fechaInicio) {
        errorMessage.textContent = "La fecha final no puede ser anterior a la fecha de inicio.";
        errorMessage.style.color = "red";
        event.preventDefault(); 
        return; 
    }






    var fileName = documentoInput.value;
    var allowedExtensions = /(\.pdf)$/i;

    if (!allowedExtensions.exec(fileName)) {
        errorMessage.textContent = "Solo se permiten archivos PDF.";
        errorMessage.style.color = "red";
        event.preventDefault(); 
        return; 
    } else {
        errorMessage.textContent = "";
        errorMessage.style.color = "";
    }



    var todasLasValidacionesSonCorrectas = true;
    if (inputValue !== soloLetras || soloLetras.length < 10 || soloLetras.length > 30 || !fechaInicioInput.value || !fechaFinInput.value || fechaInicio < fechaActual || fechaFin < fechaInicio || !allowedExtensions.exec(fileName)) {
        todasLasValidacionesSonCorrectas = false;
    }

    // Mostrar mensaje de éxito solo si todas las validaciones son correctas
    if (todasLasValidacionesSonCorrectas) {
        alert("Convocatoria realizada con éxito");
    } else {
        event.preventDefault(); // Evitar que el formulario se envíe si las validaciones no son correctas
    }


});
function terimar_proceso() {
    alert("Saliendo de Comvocatoria");
    llevame_a_poblacion_votante();
  }
  function llevame_a_poblacion_votante() {
    window.location.href = '/poblacion';
  }

