const express = require('express');
const path = require('path');

const app = express();

/* Configuración */
app.set('view engine', 'ejs');

/* Middlewares */
app.use(express.json());
app.use(express.urlencoded({ extended: false }));
app.use(express.static(path.join(__dirname, 'views', 'styles')));

/* Rutas */
app.get('/', function(req, res) {
    res.render('index');
});

/* Servidor */
const PORT = process.env.PORT || 5000;
app.listen(PORT, () => {
    console.log(`Servidor corriendo en http://localhost:${PORT}`);
});
