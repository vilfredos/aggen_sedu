var formulario = document.getElementById('formulario'); 
var tituloInput = document.getElementById('titulo');
var advertenciaDiv = document.getElementById('advertencia');
var fechaInicioInput = document.getElementById('fechaInicio');
var fechaFinInput = document.getElementById('fechaFin');
var errorMessage = document.getElementById('error-message');

formulario.addEventListener('submit', function(event) {
    
    var inputValue = tituloInput.value;
    var soloLetras = inputValue.replace(/[^a-zA-Z]/g, '');

    if (inputValue !== soloLetras) {
        advertenciaDiv.textContent = "Solo se permiten letras en este campo.";
        advertenciaDiv.style.color = "red";
        tituloInput.style.borderColor = "red";
        event.preventDefault(); 
    } else {
        advertenciaDiv.textContent = "";
        advertenciaDiv.style.color = "";
        tituloInput.style.borderColor = "";
    }

    
    if (!fechaInicioInput.value || !fechaFinInput.value) {
        errorMessage.textContent = "Debes llenar ambas fechas.";
        errorMessage.style.color = "red";
        event.preventDefault(); 
    } else {
        errorMessage.textContent = "";
        errorMessage.style.color = "";
    }
});
