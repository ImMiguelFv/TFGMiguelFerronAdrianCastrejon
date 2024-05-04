const express = require('express');
const app = express();
const path = require('path');
const mysql = require('mysql');
const bodyParser = require('body-parser');

// Configuración para servir archivos estáticos
app.use(express.static(path.join(__dirname, 'views')));
app.use(bodyParser.urlencoded({ extended: true }));

// Configuración de la conexión a la base de datos MySQL
const connection = mysql.createConnection({
    host: 'localhost',
    user: 'TFC',
    password: '1234',
    database: 'tfc'
});

// Conectar a la base de datos MySQL
connection.connect((err) => {
    if (err) {
        console.error('Error al conectar a la base de datos: ' + err.stack);
        return;
    }
    console.log('Conexión establecida con la base de datos MySQL');
});

// Ruta para manejar la solicitud GET de la página de inicio de sesión
app.get('/login', (req, res) => {
    res.sendFile(path.join(__dirname, '/views/login.html'));
});

// Ruta para manejar la solicitud POST del formulario de inicio de sesión
// Ruta para manejar la solicitud POST del formulario de inicio de sesión
app.post('/login', (req, res) => {
    const username = req.body.username;
    const password = req.body.password;

    // Verificar las credenciales en la base de datos
    connection.query('SELECT * FROM tfc.usuario WHERE username = ? AND password = ?', [username, password], (err, results) => {
        if (err) {
            console.error('Error al verificar las credenciales: ' + err.stack);
            return res.status(500).send('Error interno del servidor');
        }

        if (results.length > 0) {
            // Usuario autenticado, redireccionar a la página de inicio
            res.redirect('/index.html');
        } else {
            // Credenciales inválidas, mostrar un mensaje de error
            res.status(401).send('Usuario o contraseña incorrectos');
        }
    });
});


// Puerto en el que el servidor escuchará las solicitudes
const PORT = process.env.PORT || 5005;

// Iniciar el servidor
app.listen(PORT, () => {
    console.log(`Server is running on http://localhost:${PORT}`);
});
