const express = require('express');
const config = require('./config');

const clientes = require('./models/clientes/rutas.js'); // Asegúrate de que esta ruta sea correcta

const app = express();

//Configuracion
app.set('port', config.app.port);

//rutas
app.use("/api/clientes", clientes);  // Descomentar esta línea

module.exports = app;
