function validarFormulario() {
    var campos = ["numeroMesa", "recintoVotacion", "aulaVotacion", "fotoLugar"];
    for (var i = 0; i < campos.length; i++) {
        var valorCampo = document.getElementById(campos[i]).value;
        if (valorCampo.trim() === "") {
            document.getElementById("error-message").textContent = "Error: Todos los campos deben estar completos.";
            return false;
        }
    }

    // Comprobar si se ha seleccionado un archivo
    var fileInput = document.getElementById("fotoLugar");
    if (fileInput.files.length === 0) {
        document.getElementById("error-message").textContent = "Error: Debes subir una foto del lugar.";
        return false;
    }

    // Resto de validaciones (si es necesario)

    // Limpiar mensaje de error
    document.getElementById("error-message").textContent = "";

    return true;
}

document.getElementById("mesaForm").onsubmit = function(event) {
    var errorMessage = document.getElementById("error-message");
    errorMessage.textContent = "";

    event.preventDefault();
    if (validarFormulario()) {
        // Aquí puedes enviar el formulario al servidor si todos los campos son válidos
        // Por ejemplo, usando AJAX o un método de envío de formularios del navegador
        alert("Formulario de mesa enviado correctamente.");
    }
};