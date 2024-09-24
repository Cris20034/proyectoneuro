const mysql = require('mysql');
const config = require('../config.js');

const dbconf = {
    host: config.mysql.host,
    user: config.mysql.user,
    password: config.mysql.password,
    database: config.mysql.database,
};

let conexion;

conexion = mysql.createConnection(dbconf);
conexion.connect((err) => {
    if (err) {
        console.log(['db err'], err);
        setTimeout(conmysql, 200);  // Correcta llamada a la función conmysql
    } else {
        console.log('DB conectada');
    }

    conexion.on('error', (err) => {
        console.log(['db err'], err);
        if (err.code === 'PROTOCOL_CONNECTION_LOST') {
            conmysql();  // Correcta llamada a la función conmysql
        } else {
            throw err;
        }
    });
});


conmysql();


function todos(tabla) {
    return prueba;
}

function uno(tabla, id) {

}
function agregar(tabla, data) {

}

function elminar(tabla, id) {

}

module.exports = {
    todos,
    uno,
    agregar,
    elminar
}