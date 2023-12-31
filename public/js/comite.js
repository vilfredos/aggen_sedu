/*document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("formulario").onsubmit = function(event) {
        event.preventDefault();
        validarFormulario();
    };

    document.getElementById("asignarAleatoriamenteButton").addEventListener("click", function() {
        asignarNombresAleatorios();
    });

    function asignarNombresAleatorios() {
        var nombres = ["Maria", "Juan", "Laura", "Carlos", "Ana", "Pedro", "Elena", "Diego"];
        var apellidos = ["Gomez", "Perez", "Lopez", "Fernandez", "Martinez", "Rodriguez", "Sanchez"];

        var campos = ["fud", "ful", "vocalDocente1", "vocalEstudiante1", "vocalDocente2", "vocalEstudiante2"];

        for (var i = 0; i < campos.length; i++) {
            var nombreAleatorio = nombres[Math.floor(Math.random() * nombres.length)];
            var apellidoAleatorio = apellidos[Math.floor(Math.random() * apellidos.length)];
            var nombreCompleto = nombreAleatorio + " " + apellidoAleatorio;
            document.getElementById(campos[i]).value = nombreCompleto;
        }
    }

    function validarFormulario() {
        var re = /^[A-Za-záéíóúÁÉÍÓÚñÑ\s]+$/;
        var campos = ["fud", "ful", "vocalDocente1", "vocalEstudiante1", "vocalDocente2", "vocalEstudiante2"];
        var errorMessage = document.getElementById("error-message");
        var todosCamposValidos = true;

        for (var i = 0; i < campos.length; i++) {
            var valorCampo = document.getElementById(campos[i]).value;
            if (!valorCampo.match(re) || valorCampo.trim() === "") {
                errorMessage.textContent = "Error: Todos los campos deben contener solo letras y no pueden estar vacíos.";
                todosCamposValidos = false;
                break;
            }
        }

        if (todosCamposValidos) {
            for (var i = 0; i < campos.length; i++) {
                document.getElementById(campos[i]).value = "";
            }
            errorMessage.textContent = "";
            //alert("Registro exitoso. Formulario enviado correctamente.");
            llevame_a_generar_pepeleta();
        }
    }

    //parte nueva
 */



    function asignarAleatoriamente() {

        location.reload(true);
    }

    document.getElementById("modificarButton").addEventListener("click", function() {
        mostrarMotivoModificacion();
    });


    document.getElementById("motivo").addEventListener("change", function() {
        var motivoSeleccionado = document.getElementById("motivo").value;
        if (motivoSeleccionado !== "") {
            llevame_a_modificar_comite();
        }
    });

    function mostrarMotivoModificacion() {
        console.log("Mostrando motivo de modificación");
        document.getElementById("motivoModificacion").style.display = "block";
    }


function llevame_a_modificar_comite() {
    window.location.href = '/modificacionComite';

    /*window.location.href = '{{ route('comite.edit', $comite->id) }}';*/

}


//hasta aca

function llevame_a_generar_pepeleta() {
    window.location.href = '/papeleta';
}
