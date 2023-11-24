<!DOCTYPE html>
<html>
<body>

<div id="contenedor" style="display: flex; flex-direction: column;">

<!-- Genera 10 cuadros -->
<script>
for (var i = 1; i <= 10; i++) {
  document.getElementById('contenedor').innerHTML += '<div id="div' + i + '">' + i + '</div>';
}
</script>

</div>

<button onclick="cambiarPosicion()">Cambiar Posición</button>

<script>
function cambiarPosicion() {
    var texto = "Estas son cinco palabras";
  for (var i = 1; i <= 10; i++) {
    var j = Math.floor(Math.random() * 10) + 1;  // Genera un número aleatorio entre 1 y 10
    document.getElementById("div" + i).style.order = j;
  }
}
</script>

</body>
</html>