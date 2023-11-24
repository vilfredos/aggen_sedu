
function terimar_proceso() {
    alert("Usted a Registrado exitosamente la Eleccion");
    llevame_a_eleccion();
  }
  function mezclar() {
    var columnas = document.getElementsByTagName('th');
    var textos = Array.from(columnas).map(col => col.innerText);
    textos.sort(() => Math.random() - 0.5);
    for (var i = 0; i < columnas.length; i++) {
      columnas[i].innerText = textos[i];
    }
  }