// login.js
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('loginForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Evitar que el formulario se envíe normalmente

        // Obtener los valores de los campos de usuario y contraseña
        var username = document.getElementById('username').value;
        var password = document.getElementById('password').value;

        // Construir el objeto de datos a enviar al servidor
        var data = {
            username: username,
            password: password
        };

        // Enviar los datos al servidor a través de una solicitud POST
        fetch('/login', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        })
        .then(response => response.json())
        .then(data => {
            // Manejar la respuesta del servidor
            if (data.success) {
                // Si el inicio de sesión fue exitoso, redirigir a la página de inicio
                window.location.href = '/home';
            } else {
                // Si el inicio de sesión falló, mostrar un mensaje de error al usuario
                alert('Credenciales incorrectas. Por favor, inténtalo de nuevo.');
            }
        })
        .catch(error => {
            console.error('Error al enviar la solicitud:', error);
        });
    });
});
