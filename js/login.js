document.addEventListener('DOMContentLoaded', () => {
const form = document.getElementById('loginForm');

form.addEventListener('submit', e => {
e.preventDefault();

let user = document.getElementById('username').value.trim();
let pass = document.getElementById('password').value.trim();

if (user === 'Angel' && pass === '0987') {
localStorage.setItem('rol', 'admin');
window.location.href = 'admin.html';
}
else if (user === 'Usuario' && pass === '1234') {
localStorage.setItem('rol', 'usuario');
window.location.href = 'cuentos.html';
}
else {
alert('Usuario o contraseña incorrectos');
}
});
});