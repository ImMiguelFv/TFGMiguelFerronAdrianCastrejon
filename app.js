
/* iMPORTAMOS */
const express = require('express');
/* oBJETO para llamar a los metodos */
const app = express();
/* CONEXION */
/* VISTAS */
app.set('view engine', 'ejs');
app.use(express.json());
app.use(express.urlencoded({ extended: false }));
/* Rutas estaticas */
app.get('/',function(req, res) {
    res.render('index');
});
/* Servidor */ 
app.listen(5000, () => {
    console.log('Servidor corriendo en http://localhost:5000');
});
