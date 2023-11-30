// mesa.js

// Definir la función para validar el formulario
function validarFormulario() {
    var campos = ["numeroMesa", "recintoVotacion", "aulaVotacion", "fotoLugar"];

    // Iterar sobre los campos y verificar si están completos
    for (var i = 0; i < campos.length; i++) {
        var valorCampo = document.getElementById(campos[i]).value;
        if (valorCampo.trim() === "") {
            mostrarError("Error: Todos los campos deben estar completos.");
            return false;
        }
    }

    // Comprobar si se ha seleccionado un archivo
    var fileInput = document.getElementById("fotoLugar");
    if (fileInput.files.length === 0) {
        mostrarError("Error: Debes subir una foto del lugar.");
        return false;
    }

    // Resto de validaciones (si es necesario)

    // Limpiar mensaje de error
    limpiarError();

    return true;
}

// Definir la función para mostrar mensajes de error
function mostrarError(mensaje) {
    var errorMessage = document.getElementById("error-message");
    errorMessage.textContent = mensaje;
}

// Definir la función para limpiar el mensaje de error
function limpiarError() {
    var errorMessage = document.getElementById("error-message");
    errorMessage.textContent = "";
}

// Asignar el evento onSubmit al formulario
document.getElementById("mesaForm").onsubmit = function(event) {
    limpiarError();
    event.preventDefault();
    if (validarFormulario()) {
        // Aquí puedes enviar el formulario al servidor si todos los campos son válidos
        // Por ejemplo, usando AJAX o un método de envío de formularios del navegador
        alert("Formulario de mesa enviado correctamente.");
    }
};

// Definir la función para manejar el cambio en la selección de facultad
$(document).ready(function () {
    $("#facultad").change(function () {
        var selectedFacultad = $(this).val();
        $("#carrera option").hide();
        $("#carrera option[data-facultad='" + selectedFacultad + "']").show();
        if (selectedFacultad === "todos") {
            $("#carrera option").show();
        }
    });
});

// Definir las funciones adicionales
function terminarProceso() {
    alert("Saliendo de Registrar Mesa");
    llevarmeAJurado();
}

function llevarmeAJurado() {
    window.location.href = '/jurado';
}
