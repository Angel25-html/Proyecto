document.addEventListener('DOMContentLoaded', () => {
if (localStorage.getItem('rol') !== 'usuario') {
alert('Acceso no autorizado');
window.location.href='index.html';
}

let cont = document.getElementById('catalogo');
let libros = JSON.parse(localStorage.getItem('libros') || '[]');
let filtro = libros.filter(l => l.categoria === 'cuentos');

cont.innerHTML = '';

filtro.forEach(libro => {
cont.innerHTML += `<div class='book-card'>
<h2>${libro.titulo}</h2>
<p><strong>Autor:</strong> ${libro.autor}</p>
<button onclick='leer("${libro.descripcion.replace(/"/g, "&quot;")}")'>Leer gratis</button>
<button onclick='prestar("${libro.titulo}")'>Solicitar préstamo</button>
</div>`;
});

window.leer = function(descripcion) {
alert("Descripción:\n\n" + descripcion);
}

window.prestar = function(titulo) {
alert("Has solicitado el préstamo de: " + titulo);
}

window.logout = () => {
localStorage.clear();
window.location.href = 'index.html';
}
});