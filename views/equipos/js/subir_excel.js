$(document).ready(function(){
    $('#axel').change(function() {
        var vectorElementos = {
            'xlsx': true
        };
        var nombre = this.value;
        var vector = nombre.split('.');

        if (vectorElementos[vector[vector.length - 1]] === undefined) {
            $('#avisos p').text('formato no admitido, solo excel (.xlsx)');
        } else {
            $('#avisos p').text('');
            $('#nombreArchivo').text(this.value);
            archivo($(this), 5);
        }

        //resetea el el campo para subir excel
        $(this).val("");
        
    });
});
function archivo(elemento, num_megas_validos) {
    var num_bytes_validate = (num_megas_validos * 1024) * 1024;
    var $mensage = $('#avisos p');
    if (elemento.val() === "") {
        $mensage.text("el archivo no existe");
    }

    if (elemento[0].files[0].size <= num_bytes_validate) {
        var myData = new FormData();

        jQuery.each(elemento[0].files, function(i, file) {
            myData.append('archivo', file);
        });
        var cod_team = $('#codigo_equipo').val();
        var opciones = {
            dataType: "json",
            url: base_url + '/equipos/importarUsuarios?codteam='+cod_team,
            type: "POST",
            cache: false,
            contentType: false,
            processData: false,
            data: myData,
            beforeSend: function() {
                component.popupLoader("Jugadores", "Espera un momento mientras se cargan los usuarios...");
            },
            success: function(data) {
                component.popupHtmlHide();

                const span = '<span class="glyphicon glyphicon-chevron-right"></span>&nbsp;';
                const span_arrow = '<span class="glyphicon glyphicon-arrow-right"></span>&nbsp;';

                for (var indice in data) {
                    switch( data[indice].estado){
                        //color rojo para errores
                        case "Correcto":
                            $('#mensaje-jugadores-excel .registrado .content').append( 
                                '<p>'+ span + data[indice].username +'&nbsp;'+ span_arrow + data[indice].nombre +'</p>');
                            $('#mensaje-jugadores-excel .registrado').removeAttr('style');
                            break;
                        // color gris para advertencias
                        case "Advertencia":
                            $('#mensaje-jugadores-excel .ya-registrado .content').append( 
                                '<p">'+ span + data[indice].username +'&nbsp;'+ span_arrow + data[indice].nombre 
                                +'&nbsp;<spam  class="glyphicon glyphicon-info-sign" \
                                data-toggle="tooltip" data-placement="top" \
                                title="'+ data[indice].respuesta +'"></spam></p>');
                            $('#mensaje-jugadores-excel .ya-registrado').removeAttr('style');
                            break;
                        // color verde para correctos
                        case "Error":
                            $('#mensaje-jugadores-excel .correo-mal .content').append( 
                                '<p">'+ span + data[indice].username +'&nbsp;'+ span_arrow + data[indice].nombre 
                                +'&nbsp;<spam  class="glyphicon glyphicon-info-sign" \
                                data-toggle="tooltip" data-placement="top" \
                                title="'+ data[indice].respuesta +'"></spam></p>');
                            $('#mensaje-jugadores-excel .correo-mal').removeAttr('style');
                            break;
                    }
                }
                $('[data-toggle="tooltip"]').tooltip();
                var mensaje_html = $('#mensaje-jugadores-excel').html();
                component.messageSimple('¡Operación realizada con éxito!',mensaje_html);
                $(document).on('click', '#_btn_aceptar', function() {
                    console.log("hola Que hace !!!!");
                    location.reload();

                });
            },
            error: function(jqXHR, status, error) {
                component.popupHtmlHide();
                console.log(jqXHR + '\n' + status + '\n' + error);
            }
        };

        $.ajax(opciones);
    } else {
        $mensage.text('el tamaño de la imagen no es valido');
        $mensage.css('color', 'red');
        return false;
    }
}