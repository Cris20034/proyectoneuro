<<<<<<< Updated upstream

//Importar la libreia de MYSQL
//importar la libreria de express, http app
var mysql = require('mysql');
const http = require('http');
const express = require('express');
const app = express();


=======
//Importar la libreia de MYSQL
var mysql = require('mysql');
>>>>>>> Stashed changes
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

<<<<<<< Updated upstream



app.use(express.static(__dirname + '/'));
//Enrutamiento
app.get('/', (req, res) => {
res.sendFile(__dirname + '../neuro/index.html');
});
=======
//importar la libreria de express, http app
const http = require('http');
const express = require('express');
const app = express();

//Recursos
app.use(express.static(__dirname + '/'));

//Enrutamiento
app.get('/', (req, res) => {
    res.sendFile(__dirname + '..\neuro\index.js');
    //C:\Users\angel\OneDrive\Documentos\GitHub\Proyecto-prueba\proyectoneuro\neuro\index.js
});

>>>>>>> Stashed changes
//Escuchar en el puerto 3000
app.listen(3000);
console.log('Servidor en el puerto 3000');










<<<<<<< Updated upstream
=======


>>>>>>> Stashed changes
