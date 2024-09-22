// Importar la librería de MYSQL
var mysql = require('mysql');
const express = require('express');
const bcrypt = require('bcrypt');
const bodyParser = require('body-parser');

const app = express();

// Middleware para parsear datos URL-encoded
app.use(bodyParser.urlencoded({ extended: true }));

// Servir archivos estáticos en "/assets"
app.use("/assets", express.static(__dirname + '/assets'));

// Configurar la conexión a la base de datos
var connection = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: 'root',
    database: 'db_n'
});

// Verificar la conexión a la base de datos
connection.connect(function (error) {
    if (error) throw error;
    console.log('Conexión exitosa a la base de datos');
});

// Ruta para el inicio de sesión

//app.post('/login', function (req, res) {
  //  var user = req.body.user;
    //var Password = req.body.Password;
    // Busca al usuario en la base de datos
    //connection.query('SELECT Contraseña_idContraseña FROM Administrador WHERE UserAdmin = ?', [user], function (error, results) {
      //  if (error) throw error;

        //if (results.length === 0) {
            // Si el usuario no existe
          //  return res.status(400).send('Usuario no encontrado');
       // }

        //const passwordId = results[0].Contraseña_idContraseña;

        // Busca el hash de la contraseña usando el id encontrado
        //connection.query('SELECT Password FROM Contraseña WHERE idContraseña = ?', [Password], function (error, results) {
          //  if (error) throw error;

            //if (results.length === 0) {
              //  return res.status(400).send('Error en la contraseña');
            //}

            //const hash = results[0].Password;

            // Compara la contraseña ingresada con el hash almacenado
            //bcrypt.compare(password, hash, function (err, result) {
              //  if (err) throw err;

                //if (result) {
                    // Si coinciden, inicio de sesión exitoso
                  //  res.send('Inicio de sesión exitoso');
                //} else {
                    // Si no coinciden
                  //  res.status(400).send('Contraseña incorrecta');
                //}
            //});
        //});
    //});
//});

// Servir el archivo estático de la página principal
//app.get('/', (req, res) => {
  //  res.sendFile(__dirname + 'index.html');
//});



// Escuchar en el puerto 3000
//app.listen(3000, () => {
  //  console.log('Servidor en el puerto 3000');
//});
