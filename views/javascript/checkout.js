document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('contactForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Evita que el formulario se envíe de inmediato
        alert('Pedido recibido.');
        window.location.href = 'index.php'; // Redirige a la página index.php
    });
});
