/*
*   Función para manejar los mensajes de notificación al usuario.
*
*   Expects: type (tipo de mensaje), text (texto a mostrar) y url (dirección para enviar).
*
*   Returns: ninguno.
*/
function sweetAlert(type, text, url)
{
    switch (type) {
        case 1:
            title = "Éxito";
            icon = "success";
            break;
        case 2:
            title = "Error";
            icon = "error";
            break;
        case 3:
            title = "Advertencia";
            icon = "warning";
            break;
        case 4:
            title = "Aviso";
            icon = "info";
    }
    if (url) {
        swal({
            title: title,
            text: text,
            icon: icon,
            button: 'Aceptar',
            closeOnClickOutside: false,
            closeOnEsc: false
        })
        .then(function(value){
            location.href = url
        });
    } else {
        swal({
            title: title,
            text: text,
            icon: icon,
            button: 'Aceptar',
            closeOnClickOutside: false,
            closeOnEsc: false
        });
    }
}

/*
*   Función para cargar las opciones en un select de formulario.
*
*   Expects: api (origen de los datos a mostrar), id (identificador del select en el formulario) y selected (valor seleccionado).
*
*   Returns: ninguno.
*/
function fillSelect(api, id, selected)
{
    $.ajax({
        url: api,
        type: 'post',
        data: null,
        datatype: 'json'
    })
    .done(function(response){
        // Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
        if (isJSONString(response)) {
            const result = JSON.parse(response);
            // Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
            if (result.status) {
                let content = '';
                if (!selected) {
                    content += '<option value="" disabled selected>Seleccione una opción</option>';
                }
                result.dataset.forEach(function(row){
                    value = Object.values(row)[0];
                    text = Object.values(row)[1];
                    if (row.id_categoria != selected) {
                        content += `<option value="${value}">${text}</option>`;
                    } else {
                        content += `<option value="${value}" selected>${text}</option>`;
                    }
                });
                $('#' + id).html(content);
            } else {
                $('#' + id).html('<option value="">No hay opciones</option>');
            }
            $('select').formSelect();
        } else {
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        // Se muestran en consola los posibles errores de la solicitud AJAX
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
}

/*
*   Función para eliminar un registro seleccionado
*
*   Expects: api (ruta del servidor para borrar un registro), id (identificador del registro a eliminar) y file (nombre del arhivo a eliminar).
*
*   Returns: ninguno.
*/
function confirmDelete(api, id, file)
{
    swal({
        title: 'Advertencia',
        text: '¿Desea eliminar el registro?',
        icon: 'warning',
        buttons: ['Cancelar', 'Aceptar'],
        closeOnClickOutside: false,
        closeOnEsc: false
    })
    .then(function(value){
        if (value) {
            let params = new Object();
            (file) ? params = {identifier: id, filename: file} : params = {identifier: id};
            $.ajax({
                url: api + 'delete',
                type: 'post',
                data: params,
                datatype: 'json'
            })
            .done(function(response){
                // Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
                if (isJSONString(response)) {
                    const result = JSON.parse(response);
                    // Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
                    if (result.status) {
                        showTable();
                        sweetAlert(1, result.message, null);
                    } else {
                        sweetAlert(2, result.exception, null);
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
    })
}

function graficoBarra(canvas,x,y,leyend,title){

    var ctx = canvas;
    var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: x,
        datasets: [{
            label: leyend,
            data: y,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        legend:{display:false},
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
})
}

function graficoGarantia(canvas,x,y,leyend,title){

    var ctx = canvas;
    var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: x,
        datasets: [{
            label: leyend,
            data: y,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        legend:{display:false},
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
})
}

function grafiquito(canvas,x,y,leyend,title){

    var ctx = canvas;
    var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: x,
        datasets: [{
            label: leyend,
            data: y,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        legend:{display:false},
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
})
}

function graficoEsta(canvas,x,y,leyend,title){

    var ctx = canvas;
    var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: x,
        datasets: [{
            label: leyend,
            data: y,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        legend:{display:false},
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
}

