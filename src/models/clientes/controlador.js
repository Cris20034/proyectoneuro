const db = require('../../db/mysql.js');

const TABLA = 'clientes';

function todos(tabla){
    return db.todos(tabla);
}

module.exports = {
    todos
}