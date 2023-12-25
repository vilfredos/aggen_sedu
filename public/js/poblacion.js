function terimar_proceso(){
    alert("Saliendo de Registrar Poblacion");
    llevame_a_frente();
  }
  function llevame_a_frente() {
    window.location.href = '/frente';
  }
  function validarFormulario() {
    var fileEstudiantes = document.getElementById('file_estudiantes').value;
    var fileDocentes = document.getElementById('file_docentes').value;

    if (fileEstudiantes === '' || fileDocentes === '') {
        alert('Por favor, seleccione ambos archivos Excel.');
        return false; // Detener el envío del formulario
    }

    // Verificar las extensiones de archivo si es necesario
    var extPermitida = /\.(xls|xlsx)$/i;

    if (!extPermitida.test(fileEstudiantes) || !extPermitida.test(fileDocentes)) {
        alert('Por favor, seleccione archivos Excel válidos.');
        return false; // Detener el envío del formulario
    }

    return true; // Permitir el envío del formulario
}