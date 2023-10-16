function validarFormulario() {
    var re = /^[A-Za-záéíóúÁÉÍÓÚñÑ\s]+$/;
    var campos = ["representante", "candRector", "candVicerector", "sigla"];
    for (var i = 0; i < campos.length; i++) {
        var valorCampo = document.getElementById(campos[i]).value;
        if (!valorCampo.match(re) || valorCampo.trim() === "") {
            alert("Error: Todos los campos deben contener solo letras y no pueden estar vacíos.");
            return false;
        }
        var campos = ["representante", "candRector", "candVicerector", "sigla"];
        for (var i = 0; i < campos.length; i++) {
            document.getElementById(campos[i]).value = "";
        }
    }
    return true;
}

function limpiarCampos() {
    if (confirm("¿Estás seguro de que deseas cancelar?")) {
        var campos = ["representante", "candRector", "candVicerector", "sigla"];
        for (var i = 0; i < campos.length; i++) {
            document.getElementById(campos[i]).value = "";
        }
    }
}

document.getElementById("miFormulario").onsubmit = function(event) {
    var errorMessage = document.getElementById("error-message");
    errorMessage.textContent = "";

    event.preventDefault();
    if (validarFormulario()) {
        // Aquí puedes enviar el formulario al servidor si todos los campos son válidos
        // Por ejemplo, usando AJAX o un método de envío de formularios del navegador
        alert("Frente guardado");
        
    }
};
   function terimar_proceso() {
    alert("Saliendo de Registrar frente");
    llevame_a_mesa();
  }
  function llevame_a_mesa() {
    window.location.href = '/mesa';
  }