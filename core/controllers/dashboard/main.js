$(document).ready(function()
{
    showGreeting();
    grafico1();
})

const apiProductos = '../../core/api/dashboard/productos.php?action=';

// Función para mostrar un saludo dependiendo de la hora del cliente
function showGreeting()
{
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

function grafico1()
{
    $.ajax({
        url: apiProductos + 'cantidadP',
        type: 'post',
        data: null,
        datatype: 'json'
    })
    .done(function(response){
        // Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
        if (isJSONString(response)) {
            const result = JSON.parse(response);
            // Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
            if (!result.status) {
                sweetAlert(4, result.exception, null);
            }
           let producto = [];
           let cantidad = [];
           result.dataset.forEach(function(rows){
               producto.push(rows.nombre);
               cantidad.push(rows.cantidad);
           });

           graficoBarra('grafico1',producto, cantidad,'Cantidad de producto','Grafico');
        } else {
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        // Se muestran en consola los posibles errores de la solicitud AJAX
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
}