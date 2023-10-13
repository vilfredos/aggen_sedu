function validarFormulario() {
    var re = /^[A-Za-záéíóúÁÉÍÓÚñÑ\s]+$/;
    var campos = ["rector", "fud", "ful", "vocalDocente1", "vocalEstudiante1", "vocalDocente2", "vocalEstudiante2"];
    for (var i = 0; i < campos.length; i++) {
        var valorCampo = document.getElementById(campos[i]).value;
        if (!valorCampo.match(re) || valorCampo.trim() === "") {
            alert("Error: Todos los campos deben contener solo letras y no pueden estar vacíos.");
            return false;
        }
    }
    
    for (var i = 0; i < campos.length; i++) {
        document.getElementById(campos[i]).value = "";
    }
    return true;
}

document.getElementById("miFormulario").onsubmit = function(event) {
    event.preventDefault(); 
    if (validarFormulario()) {
        alert("Formulario enviado correctamente.");
       
    }
};
