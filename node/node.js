const mysql = require('mysql');

const connection = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'tienda'
});

connection.connect((error) => {
    if (error) {
        console.error('Error de conexión a la base de datos: ' + error.message);
    } else {
        console.log('Conexión exitosa a la base de datos MySQL');
    }
});

const loadProducts = async (type, page = 0) => {
    const response = await fetch(`https://www.yanbal.com/co/corporate/c/${type}/results/?q=&page=${page}`);
    const data = await response.json();
    let products = data.results;
    products.forEach(e => {
        connection.query(`INSERT INTO productos(code, nombre, descripcion, precio, imagen) VALUES ('${e.code}','${e.name}','${e.description}','${e.price.value}','${e.images[2].url}')`, (error, results, fields) => {
            if (error) {
                console.error('Error al ejecutar la consulta: ' + error.message);
            } else {
                console.log('Resultados de la consulta:', results);
            }
        });
    });
    
};

loadProducts('maquillaje');



