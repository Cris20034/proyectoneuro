const express = require('express');

const respuesta = require('../../red/respuestas.js');

const router = express.Router();

router.get('/', function (req, res) {
    respuesta.succeed(req, res, 'Todo okey', 200)
});

module.exports = router;