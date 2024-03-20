const express = require('express');
const app = express();
const path = require('path');

// Configuración para servir archivos estáticos
app.use(express.static(path.join(__dirname, 'views')));

app.get('/', (req, res) => {
    res.sendFile(path.join(__dirname, '/views/index.html'));
});
app.get('/', (req, res) => {
    res.sendFile(path.join(__dirname, '/views/pages/iniciosesion.html'));
});


app.listen(5000, () => {
    console.log(`Server is running on http://localhost:5000`);
});
