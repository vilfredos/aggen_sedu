$(document).ready(function() {
    $('#toggleSidebar').click(function() {
        $('#sidebar').toggleClass('active');
    });
});




function toggleNav() {
    var nav = document.querySelector('nav');
    var content = document.querySelector('#content');
    if (nav.style.display === 'none') {
        nav.style.display = 'block';
        content.style.marginLeft = '200px'; // Ajusta este valor al ancho original de tu barra de navegación
    } else {
        nav.style.display = 'none';
        content.style.marginLeft = '0';
    }

}



