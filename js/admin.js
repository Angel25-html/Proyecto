document.addEventListener('DOMContentLoaded', () => {
if (localStorage.getItem('rol') !== 'admin') {
alert('Acceso denegado');
window.location.href = 'index.html';
}

let lista = document.getElementById('listaLibros');
let form = document.getElementById('addBookForm');

function cargar() {
let libros = JSON.parse(localStorage.getItem('libros') || '[]');
lista.innerHTML = '';
libros.forEach((libro, i) => {
lista.innerHTML += `<div class='book-card'>
<h3>${libro.titulo}</h3>
<p>${libro.autor}</p>
<p>${libro.categoria}</p>
<button onclick='eliminar(${i})'>Eliminar</button>
</div>`;
});
}

form.addEventListener('submit', e => {
e.preventDefault();
let libros = JSON.parse(localStorage.getItem('libros') || '[]');
libros.push({
titulo: titulo.value,
autor: autor.value,
descripcion: descripcion.value,
categoria: categoria.value
});
localStorage.setItem('libros', JSON.stringify(libros));
cargar();
form.reset();
});

window.eliminar = function(i) {
let libros = JSON.parse(localStorage.getItem('libros') || '[]');
libros.splice(i, 1);
localStorage.setItem('libros', JSON.stringify(libros));
cargar();
}

window.logout = () => {
localStorage.clear();
window.location.href='index.html';
}

cargar();
});