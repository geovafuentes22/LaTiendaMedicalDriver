$(document).ready(function()
{
    showGreeting();
})

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
