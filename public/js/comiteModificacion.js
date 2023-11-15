document.addEventListener("DOMContentLoaded", function() {
    var miembroComiteSelect = document.getElementById("miembroComite");
    var nuevoMiembroDiv = document.getElementById("nuevoMiembroDiv");
    //var nuevoMiembroInput = document.getElementById("nuevoMiembro"); 


    
    var razonModificacion = document.getElementById("razonModificacion");
    var pdfDocumento = document.getElementById("pdfDocumento");
    var submitBtn = document.getElementById("submitBtn");


    nuevoMiembroDiv.style.display = "none";
    razonModificacion.style.display = "none";
    pdfDocumento.style.display = "none";
    submitBtn.style.display = "none";



    miembroComiteSelect.addEventListener("change", function() {
        var selectedOption = miembroComiteSelect.value;
        
        nuevoMiembroDiv.style.display = "none";
        razonModificacion.style.display = "none";
        pdfDocumento.style.display = "none";
        submitBtn.style.display = "none";
        
        
        if (selectedOption === "Ninguno") {
            // Redirigir al usuario a la página deseada cuando se selecciona "Ninguno"
            llevame_a_comite();
        } else if (selectedOption === "vocalFud" || selectedOption === "vocalFul" || selectedOption === "vocalDocente1" || 
        selectedOption === "vocalEstudiante1" || selectedOption === "vocalDocente2" || selectedOption === "vocalEstudiante2" ) {
                
            nuevoMiembroDiv.style.display = "block";

            razonModificacion.style.display = "block";
            pdfDocumento.style.display = "block";
            submitBtn.style.display = "block";


        } else {
            nuevoMiembroDiv.style.display = "none";

            razonModificacion.style.display = "block";
            pdfDocumento.style.display = "block";
            submitBtn.style.display = "block";


        }
    });

    var submitBtn = document.getElementById("submitBtn");
    submitBtn.addEventListener("click", function(event) {
        event.preventDefault();
        var nuevoMiembroValue = nuevoMiembroInput.value.trim();
        var letras = /^[A-Za-z]+$/;

        if (nuevoMiembroValue.length >= 5 && nuevoMiembroValue.length <= 30 && nuevoMiembroValue.match(letras)) {
           
            
            console.log("Formulario válido, se puede enviar.");
        } else {
            // Mostrar un mensaje de error o realizar alguna acción si el formulario no es válido.
            console.log("Error: El campo nuevoMiembro debe contener solo letras y tener entre 5 y 30 caracteres.");
        }
    });

function llevame_a_comite() {
    window.location.href = '/comite';
    }

});
