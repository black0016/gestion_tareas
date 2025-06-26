// función para peticiones ajax
function ajax(url, metodo, datos, tipo, funcion) {

    let ajax = $.ajax({
        url: url,
        method: metodo,
        data: datos,
        dataType: tipo,
        beforeSend: function() {
            $('.preload').removeClass('hidden');
        }
    }).done(function(respuesta) {

        funcion(respuesta)

    }).fail(function(msg) {

        $.confirm({
            title: "Error",
            type: 'red',
            onContentReady: function () {
            },
            columnClass: 'medium',
            content: `Algo falló en la Petición`,
            buttons: {
                confirm: {
                    text: 'Aceptar',
                    btnClass: 'btn-green',
                    action: function () {
                    }
                },
                cancel: {
                    text: 'Ver error',
                    btnClass: 'btn-red',
                    action: function () {
                        $.alert(`Error : ${msg.responseText}`);
                    }
                }
            }
        });

    }).always(function(respuesta) {
        $('.preload').addClass('hidden');
    });

    return ajax;
    
}
// función para peticiones ajax de subida de archivos
function ajaxArchivos(url, metodo, datos, tipo, funcion) {

    let ajax = $.ajax({
        url: url,
        type: metodo,
        data: datos,
        dataType: tipo,
        processData: false,
        contentType: false,
        beforeSend: function() {
            $('.preload').removeClass('hidden');
        }
    }).done(function(respuesta) {

        funcion(respuesta)

    }).fail(function(msg) {

        $.confirm({
            title: "Error",
            type: 'red',
            onContentReady: function () {
            },
            columnClass: 'medium',
            content: `Algo falló en la Petición`,
            buttons: {
                confirm: {
                    text: 'Aceptar',
                    btnClass: 'btn-green',
                    action: function () {
                    }
                },
                cancel: {
                    text: 'Ver error',
                    btnClass: 'btn-red',
                    action: function () {
                        $.alert(`Error : ${msg.responseText}`);
                    }
                }
            }
        });

    }).always(function(respuesta) {
        $('.preload').addClass('hidden');
    });

    return ajax;
    
}

// función para peticiones ajax
function ajaxSinReload(url, metodo, datos, tipo, funcion) {

    let ajax = $.ajax({
        url: url,
        method: metodo,
        data: datos,
        dataType: tipo,
        beforeSend: function() {
            // $('.preload').removeClass('hidden');
        }
    }).done(function(respuesta) {

        funcion(respuesta)

    }).fail(function(msg) {

        $.confirm({
            title: "Error",
            type: 'red',
            onContentReady: function () {
            },
            columnClass: 'medium',
            content: `Algo falló en la Petición`,
            buttons: {
                confirm: {
                    text: 'Aceptar',
                    btnClass: 'btn-green',
                    action: function () {
                    }
                },
                cancel: {
                    text: 'Ver error',
                    btnClass: 'btn-red',
                    action: function () {
                        $.alert(`Error : ${msg.responseText}`);
                    }
                }
            }
        });
    }).always(function(respuesta) {
        // $('.preload').addClass('hidden');
    });

    return ajax;
    
}

$('.sidebar-menu').tree();