$(document).ready(function()
{
    checkUsuarios();
})

// Constante para establecer la ruta y parámetros de comunicación con la API
const api = '../../core/api/commerce/usuarios.php?action=';

// Función para verificar si existen usuarios en el sitio privado
function checkUsuarios()
{
    $.ajax({
        url: api + 'read',
        type: 'post',
        data: null,
        datatype: 'json'
    })
    .done(function(response){
        // Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
        if (isJSONString(response)) {
            const dataset = JSON.parse(response);
            // Se comprueba que no hay usuarios registrados para redireccionar al registro del primer usuario
            if (dataset.status) {
                sweetAlert(3, dataset.message, 'register.php');
            }
        } else {
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        // Se muestran en consola los posibles errores de la solicitud AJAX
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
}

// Función para validar el usuario al momento de iniciar sesión
$('#sesion').submit(function()
{
    event.preventDefault();
    $.ajax({
        url: api + 'login',
        type: 'post',
        data: $('#sesion').serialize(),
        datatype: 'json'
    })
    .done(function(response){
        // Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
        if (isJSONString(response)) {
            const dataset = JSON.parse(response);
            // Se comprueba si la respuesta es satisfactoria, sino se muestra la excepción
            if (dataset.status) {
                sweetAlert(1, dataset.message, 'index.php');
            } else {
                sweetAlert(2, dataset.exception, null);
            }
        } else {
        }
    })
    .fail(function(jqXHR){
        // Se muestran en consola los posibles errores de la solicitud AJAX
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
})
