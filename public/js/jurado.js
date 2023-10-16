document.getElementById('myForm').addEventListener('submit', function(event) {
  event.preventDefault();

  var nombre = document.getElementById('nombre').value;
  var mesa = document.getElementById('mesa').value;

  var errorMessages = '';

  if (!/^[a-zA-Z\s]{10,30}$/.test(nombre)) {
    errorMessages += 'El nombre debe contener solo texto y tener entre 10 y 30 caracteres.\n';
  }

  if (!/^\d+$/.test(mesa)) {
    errorMessages += 'El número de mesa debe ser un número.\n';
  }

  if (errorMessages) {
    alert('Por favor corrija los siguientes errores:\n\n' + errorMessages);
  } else {
    alert('Jurado registrado exitosamente');
  }
});

function terimar_proceso() {
  alert("Saliendo de Registrar Jurado Manualmente");
  llevame_a_papeleta();
}
function llevame_a_papeleta() {
  window.location.href = '/papeleta';
}
function limpiarCampos() {
  if (confirm("¿Estás seguro de que deseas cancelar?")) {
      var campos = ["nombre", "mesa", "rol", "cargo" ,"turno"];
      for (var i = 0; i < campos.length; i++) {
          document.getElementById(campos[i]).value = "";
      }
  }
}