const express = require('express');

const respuesta = require('../../red/respuestas.js');
const controlador = require('./controlador.js');

const router = express.Router();

router.get('/', function (req, res) {
    const todos = controlador.todos();
    respuesta.succeed(req, res, todos, 200)
});

module.exports = router;