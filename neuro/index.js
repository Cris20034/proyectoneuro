
//Importar la libreia de MYSQL
var mysql = require('mysql');
//Configurar la conexion a la base de datos, 
//en caso de tener una contraseña diferente, 
//se debe agregar el campo password
var connection = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: 'root',
    database: 'db_n'
});

//Verificar la conexion a la base de datos
connection.connect(function (error) {
    if (error) throw error;
    console.log('Conexion exitosa a la base de datos');
});
connection.end();



//importar la libreria de express, http app
//const http = require('http');
//const express = require('express');
//const app = express();
//Recursos
//app.use(express.static(__dirname + '/'));
//Enrutamiento
//app.get('/', (req, res) => {
//res.sendFile(__dirname + '../neuro/index.');
//});
//Escuchar en el puerto 3000
//app.listen(3000);
//console.log('Servidor en el puerto 3000');//










