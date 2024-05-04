const express = require('express');
const app = express();
const path = require('path');
const mysql = require('mysql');

// Configuración para servir archivos estáticos desde la carpeta 'views'
app.use(express.static(path.join(__dirname, 'views')));
// Configuración para servir archivos estáticos desde la carpeta 'controler'
app.use(express.static(path.join(__dirname, 'controler')));


// Configuración de la conexión a la base de datos MySQL
const connection = mysql.createConnection({
    host: 'localhost',
    user: 'TFC',
    password: '1234',
    database: 'tfc'
});
connection.connect((err) => {
    if (err) {
        console.error('Error al conectar a la base de datos:', err);
        return;
    }
    console.log('Conexión a la base de datos MySQL establecida correctamente');
});
// Ruta para la página principal
app.get('/', (req, res) => {
    res.sendFile(path.join(__dirname, '/views/index.html'));
});

// Ruta para manejar el inicio de sesión (asumiendo que se redirige desde index.html)
app.post('/login', (req, res) => {
    // Aquí puedes agregar la lógica para manejar el inicio de sesión
    // Por ejemplo, verificar las credenciales del usuario en la base de datos
    // y establecer una sesión si las credenciales son válidas
});

// Escucha del servidor en el puerto 5005
const port = process.env.PORT || 5005;
app.listen(port, () => {
    console.log(`Server is running on http://localhost:${port}`);
});
