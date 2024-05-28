document.getElementById('contactForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Evita que el formulario se envíe de inmediato
    alert('Alerta recibida, nos pondremos en contacto contigo en el menor tiempo posible.');
    this.submit(); // Envía el formulario después de mostrar la alerta
});
