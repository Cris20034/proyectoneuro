// Importar la librería de MYSQL
var mysql = require('mysql');
const http = require('http');
const express = require('express');
const app = express();

// Configurar la conexión a la base de datos
var connection = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: '12345678910',
    database: 'db_n'
});

// Verificar la conexión a la base de datos
connection.connect(function (error) {
    if (error) throw error;
    console.log('Conexión exitosa a la base de datos');
});

app.use(express.static(__dirname + '/'));
// Enrutamiento
app.get('/', (req, res) => {
    res.sendFile(__dirname + '/neuro/index.html');
});
// Escuchar en el puerto 3000
app.listen(3000, () => {
    console.log('Servidor en el puerto 3000');
});
