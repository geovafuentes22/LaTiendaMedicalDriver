$(document).ready(function () {
    showGreeting();
    grafico1();
    grafico_barra();
    graficoEstado();
    grafico3();
})

const apiProductos = '../../core/api/dashboard/productos.php?action=';
const apiGarantia = '../../core/api/dashboard/garantias.php?action='

// Función para mostrar un saludo dependiendo de la hora del cliente
function showGreeting() {
    let today = new Date();
    let hour = today.getHours();
    if (hour < 12) {
        greeting = '¿Qué tranza mi lanza? Buenos días';
    } else if (hour < 19) {
        greeting = 'Todo bien ó qué? Buenas tardes';
    } else if (hour <= 23) {
        greeting = '¿Qué ondas loco? Buenas noches';
    }
    $('#greeting').text(greeting);
}


function grafico1() {
    $.ajax({
            url: apiProductos + 'cantidadP',
            type: 'post',
            data: null,
            datatype: 'json'
        })
        .done(function (response) {
            // Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
            if (isJSONString(response)) {
                const result = JSON.parse(response);
                // Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
                if (!result.status) {
                    sweetAlert(4, result.exception, null);
                }
                let id = [];
                let cantidad = [];
                result.dataset.forEach(function (rows) {
                    id.push(rows.IdProducto);
                    cantidad.push(rows.nombre);
                });
                graficoBarra('grafico1', cantidad, id, 'Cantidad de producto', 'Grafico');
            } else {
                console.log(response);
            }
        })
}

function grafico_barra() {
    $.ajax({
            url: apiProductos + 'precioP',
            type: 'post',
            data: null,
            datatype: 'json'
        })
        .done(function (response) {
            // Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
            if (isJSONString(response)) {
                const result = JSON.parse(response);
                // Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
                if (!result.status) {
                    sweetAlert(4, result.exception, null);
                }
                let producto1 = [];
                let precio1 = [];
                result.dataset.forEach(function (rows) {
                    producto1.push(rows.IdProducto);
                    precio1.push(rows.meses);
                });
                grafiquito('grafico2', precio1, producto1, 'Cantidad de producto', 'Grafico');
            } else {
                console.log(response);
            }
        })
        .fail(function (jqXHR) {
            // Se muestran en consola los posibles errores de la solicitud AJAX
            console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
        });
}


function grafico3() {
    $.ajax({
            url: apiGarantia + 'garantiaP',
            type: 'post',
            data: null,
            datatype: 'json'
        })
        .done(function (response) {
            // Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
            if (isJSONString(response)) {
                const result = JSON.parse(response);
                // Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
                if (!result.status) {
                    sweetAlert(4, result.exception, null);
                }
                let id = [];
                let meses = [];
                result.dataset.forEach(function (rows) {
                    id.push(rows.id_garantia);
                    meses.push(rows.meses);
                });
                graficoGarantia('grafico3', meses, id, 'Cantidad de producto', 'Grafico');
            } else {
                console.log(response);
            }
        })

}


function graficoEstado() {
    $.ajax({
            url: apiProductos + 'EstadoP',
            type: 'post',
            data: null,
            datatype: 'json'
        })
        .done(function (response) {
            // Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
            if (isJSONString(response)) {
                const result = JSON.parse(response);
                // Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
                if (!result.status) {
                    sweetAlert(4, result.exception, null);
                }
                let idEstado = [];
                let estado = [];
                result.dataset.forEach(function (rows) {
                    idEstado.push(rows.IdProducto);
                    estado.push(rows.estado);
                });
                graficoEsta('grafico4', estado, idEstado, 'Cantidad de usuarios', 'Grafico');
            } else {
                console.log(response);
            }
        });
}