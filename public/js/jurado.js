document.getElementById("myForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Evita que el formulario se envíe
  
    // Obtener los valores de los campos del formulario
    var nombre = document.getElementById("nombre").value;
    var turno = document.getElementById("turno").value;
    var cargo = document.getElementById("cargo").value;
    var mesa = document.getElementById("mesa").value;
    var rol = document.getElementById("rol").value;
    var ubicacion = document.getElementById("ubicacion").value;
  
    // Realizar cualquier acción adicional con los valores del formulario
    console.log("Nombre: " + nombre);
    console.log("Turno: " + turno);
    console.log("Cargo: " + cargo);
    console.log("Mesa: " + mesa);
    console.log("Rol: " + rol);
    console.log("Ubicación: " + ubicacion);
  
    // Aquí puedes enviar los datos del formulario a un servidor si es necesario
  });