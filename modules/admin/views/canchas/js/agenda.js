var temp = null;
var CALENDARIO_DIA, CALENDARIO_MES, CALENDARIO_ANO, CALENDARIO_CODE, CALENDARIO_PRICE, CALENDARIO_SUBCOMPLEX, ACCION = true;
$(function() {
    temp = $("#reserva_form").html();
    //-------
    $("#Paginador-Canchas li a").first().addClass('selectedCancha');

    $("#Paginador-Canchas li a").click(function() {
        console.log("Paginador-Canchas li a");
        $("#Paginador-Canchas li a").removeClass('selectedCancha');
        $(this).addClass('selectedCancha');
        CALENDARIO_SUBCOMPLEX = $(this).attr("code");
        trarFechas();
    });
    CALENDARIO_SUBCOMPLEX = $(".selectedCancha").attr('code');

    $("#Menu-Int-Canchas a").click(function(ev) {
        console.log("Menu-Int-Canchas a");
        ev.preventDefault();
        $("#Menu-Int-Canchas a").attr('class', '');
        $(this).attr('class', 'selected');
        $('div.informacion,div.disponibilidad').hide();
        $('div .' + $(this).attr('display')).show();
        //Calendar
        $('.fc-button-today').trigger('click');

        render();
        $(".fc-button-today").click(function(ev) {
            render();
        });
    });
    //-------
    $(".view_reserve").live('click', function() {
        var code = parseInt($(this).attr('code'));
        if (validate.isInteger(code)) {
            $.ajax({
                type: 'POST',
                url: base_url + '/admin/canchas/viewreserve/',
                data: {'code': code},
                success: function(data) {
                    if (data.hasOwnProperty('status')) {
                        if (data.status && data.hasOwnProperty('html')) {
                            $("#reserva_form").html(data.html);
                            $(".popup").eq(0).trigger('click', [$("body"), "yes"]);
                        }
                    }
                }
            });
        }
    });

    $("#favorito").click(function(ev) {
        alert("ok");
    });

    $("#search").live('click', function() {
        console.log("search");
        var username = $("#username").val();
        if (!_.isEmpty(username)) {
            $.ajax({
                type: 'POST',
                url: base_url + "/administrador-canchas/index/searchuser/",
                data: {
                    'username': username
                },
                beforeSend: function() {
                    $("#login_error").text('Por favor, complete todos los campos!').hide();
                },
                success: function(data) {
                    if (data.hasOwnProperty('status')) {

                        console.log(data);

                        if (data.status) {

                            $("#login_error").hide();

                            var dto = data.user;

                            $("#phone").val(dto.phone);
                            $("#address").val(dto.address);
                            $("#name").val(dto.name);

                            $("#send_data").attr('data-code', dto.coduser);


                        } else {
                            $("#login_error").text(data.message).show();
                        }
                    }
                }
            });
        }
    });

    var date = new Date();
    var d = date.getDate();
    var m = date.getMonth();
    var y = date.getFullYear();

    $('#calendar').fullCalendar({
        dayNamesShort: ["Domingo", 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domimgo'],
        monthNames: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
        monthNamesShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
        dayNames: ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"],
        allDayText: "Todo",
        buttonText: {
            today: 'Hoy',
            day: 'DÃ­a',
            week: 'Semana',
            month: 'Mes'
        },
        aspectRatio: 1.8,
        timeFormat: {
            '': 'h(:mm) tt',
            agenda: 'h:mm{ - h:mm}'
        },
        header: {
            left: 'prev,next today',
            center: 'title',
            right: ''
        },
        titleFormat: {
            month: 'MMMM yyyy', // September 2009
            week: "MMM d[ yyyy]{ '&#8212;'[ MMM] d yyyy}", // Sep 7 - 13 2009
            day: 'dddd, MMM d, yyyy'
        },
        editable: false,
        dayClick: function(date, allDay, jsEvent, view) {


            if (ACCION) {
                addClick(this);
            }
        },
        weekMode: 'liquid'
    });

    $('.fc-button-today').trigger('click');
    render();

    $("#calendar").on("click", ".fc-button-today", function() {
        var date = $('#calendar').fullCalendar('getDate');
        CALENDARIO_MES = date.getMonth();
        CALENDARIO_ANO = date.getFullYear();
        colorwhite();
    });


    _magic();



    //FORM RESERVAR

    $(document).on("click", "#send_data", function() {
        if (validate.isEmpty($("#reserva_form #name").val())) {
            component.alertComponent("Por favor ingresar el nombre de la persona encargada de la reserva.", "msg_reserva", "danger");
            return false;
        }
        if (validate.isEmpty($("#reserva_form #phone").val())) {
            component.alertComponent("Por favor ingrese el teléfono del encargado de la reserva.", "msg_reserva", "danger");
            return false;
        }
        if (validate.isEmpty($("#reserva_form #address").val())) {
            component.alertComponent("Por favor ingrese la dirección del encargado de la reserva.", "msg_reserva", "danger");
            return false;
        }
        var str = $("#reserva_form #abona").val();
        var abonoStr = str.replace('$ ', '');
        var abono = parseFloat(abonoStr.replace(',', ''));
        console.log(abono);
        if (abono == 0) {
            component.alertComponent("Por favor ingrese el abono inicial.", "msg_reserva", "danger");
            return false;
        }
        if (abono < 5000) {
            component.alertComponent("Por favor ingrese un abono mayor o igual a $5.000.", "msg_reserva", "danger");
            return false;
        }
        var url = base_url + "/admin/canchas/hacer_reserva/";
        /*para cuando hay un codigo de juego*/
        if ($('#cod_game_reserve').val() !== "") {
            var cod_game = $('#cod_game_reserve').val();
            url = base_url + "/admin/canchas/hacer_reserva/" + cod_game;
        }
        var info_data = {
            mes: parseInt(CALENDARIO_MES) + 1,
            ano: CALENDARIO_ANO,
            dia: CALENDARIO_DIA,
            code: CALENDARIO_CODE,
            cancha: CALENDARIO_SUBCOMPLEX,
            user: $(this).attr('data-code'),
            abone: parseFloat($.trim($("#abona").val().replace(/[^\d\.\-\ ]/g, '')))
        };
        $.ajax({
            type: "POST",
            url: url,
            data: info_data,
            beforeSend: function(data) {
                $.fancybox.showActivity();
                component.alertComponent("Enviado reserva...", "msg_reserva", "loader");
            },
            success: function(data) {
                console.log(data);
                $.fancybox.hideActivity();
                if (data.hasOwnProperty('message') && data.hasOwnProperty('status')) {
                    if (data.status === true) {
                        if (cod_game != "") {
                            window.parent._ocultarIframe(cod_game, data.message);
                        } else {
                            component.alertComponent(data.message, "msg_reserva");
                        }
                        $.fancybox.close();
                        traerDia();
                        return true;
                    } else {
                        component.alertComponent(data.message, "msg_reserva", "danger");
                        return false;
                    }

                }
                component.alertComponent("Surgió un error al enviar la información, por favor inténtelo de nuevo.", "msg_reserva", "danger");
                return false;
            },
            error: function(e) {
                $.fancybox.hideActivity();
                component.alertComponent("Surgió un error al enviar la información, por favor inténtelo de nuevo.", "msg_reserva", "danger");
            }
        });
        return false;
    });

    // CALENDARIO

    $('.fc-button-prev,.fc-button-next').click(function() {

        $("#Listado-Calendario #_manana,#Listado-Calendario #_tarde").html("");
        var date = $('#calendar').fullCalendar('getDate');
        CALENDARIO_MES = date.getMonth();
        CALENDARIO_ANO = date.getFullYear();
        trarFechas();
        colorwhite();

    });

    function render() {
        var date = $('#calendar').fullCalendar('getDate');
        CALENDARIO_MES = date.getMonth();
        CALENDARIO_ANO = date.getFullYear();
        var eventos = $.parseJSON($.trim($("#eventosMes").html()));
        addEventos(eventos);
        // colorwhite();
    }

    // traer Mes y aÃ±o especifico

    function trarFechas() {
        console.log("Traer mes: " + CALENDARIO_MES + ", AÃ±o: " + CALENDARIO_ANO);
        $.ajax({
            type: "POST",
            cache: false,
            url: base_url + "/admin/canchas/reservaMes/", beforeSend: function(data) {
                $(".fc-week").animate({'opacity': 0.1}, 1000);
                $.fancybox.showActivity();
                ACCION = false;
                $(".fc-header-left span").hide();
            },
            data: {
                mes: CALENDARIO_MES,
                ano: CALENDARIO_ANO,
                cancha: CALENDARIO_SUBCOMPLEX
            },
            success: function(data) {
                console.log(data);
                $(".fc-week").animate({'opacity': 1}, 1000);
                $.fancybox.hideActivity();
                var date = $('#calendar').fullCalendar('getDate');
                CALENDARIO_MES = date.getMonth();
                CALENDARIO_ANO = date.getFullYear();
                eventos = {};
                if (data) {
                    var eventos = $.parseJSON($.trim(data));
                }
                addEventos(eventos);
                $(".fc-header-left span").show();
                ACCION = true;
            }
        });
    }

    // traer dia especifico

    function traerDia() {
        $.ajax({
            type: "POST",
            cache: false,
            url: base_url + "/admin/canchas/reserva_dia/",
            beforeSend: function(data) {
                $(".fc-week").animate({'opacity': 0.1}, 1000);
                $.fancybox.showActivity();
                ACCION = false;
                $(".fc-header-left span").hide();
            },
            data: {
                mes: CALENDARIO_MES,
                ano: CALENDARIO_ANO,
                dia: CALENDARIO_DIA,
                cancha: CALENDARIO_SUBCOMPLEX
            },
            success: function(data) {
                $.fancybox.hideActivity();
                if ($.isArray(data)) {
                    $(".fc-week").animate({'opacity': 1}, 1000);
                    var _html = "<br>";
                    if ($(data).length > 0) {
                        $.each(data, function(i, e) {
                            if (e.status === null) {
                                _html += '<div class="Listado-Dispo" style="background:#179B6A; color: #FFFFFF;padding-top: 5px; padding-bottom: 5px;border-bottom: 2px solid #FFFFFF;">';
                            } else {
                                _html += '<div class="view_reserve" style="background:#179B6A; color: #FFFFFF;padding-top: 5px; padding-bottom: 5px;border-bottom: 2px solid #FFFFFF;" code="' + e.reserve + '">';
                            }
                            _html += '<span class="glyphicon glyphicon-star">&nbsp;</span>' + e.week + '&nbsp;&nbsp;&nbsp;' + e.start.replace("-", ":") + ' <span class="glyphicon glyphicon-arrow-right"></span> ' + e.end.replace("-", ":") + '&nbsp;&nbsp; $ ' + e.price;
                            if (e.status === null) {
                                _html += '&nbsp;&nbsp;&nbsp;<a class="popup" data-code="' + e.code + '" data-price="' + e.price.replace(",", "") + '" title="Reservar" href="#reserva_form"><button type="button" class="btn btn-primary">Reservar</button></a>';
                            } else {
                                _html += '&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-default">Ocupado</button>';
                            }
                            _html += "</div>"
                        });
                    } else {
                        _html += '<p><strong>No hay horarios disponibles para reservar en este día!</strong></p>';
                    }
                    $("#Listado-Calendario #_manana").html(_html);
                    _magic();
                    $.fancybox.hideActivity();
                    $(".detallesDia").fadeIn(500);
                    $(".fc-header-left span").show();
                    ACCION = true;
                    return;
                }
                component.messageSimple("Cargar horarios", "Surgió un error inesperado al cargar los horarios, por favor inténtelo de nuevo.", "danger");
            },
            error: function(e) {
                $.fancybox.hideActivity();
                component.messageSimple("Cargar horarios", "Surgió un error inesperado al cargar los horarios, por favor inténtelo de nuevo.", "danger");
            }
        });
    }

    // Agregar Evento Click a dÃ­as y traer por ajax el dÃ­a

    function addClick(element) {
        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();
        $('.fc-day').css({
            'border': '7px solid #f8f8f8',
            'box-shadow': 'none'
        });
        CALENDARIO_DIA = parseInt($(element, " .fc-day-number").text());
        if (!$(element).hasClass('fc-other-month')) {
            var valido = true;
            if (CALENDARIO_ANO === parseInt(y)) {
                if ((CALENDARIO_MES > parseInt(m)) || (CALENDARIO_MES === parseInt(m) && CALENDARIO_DIA >= parseInt(d))) {
                } else {
                    valido = false;
                }
            } else if (CALENDARIO_ANO > parseInt(y)) {
            } else {
                valido = false;
            }
            if (valido) {
                //$('.fc-today')
                $(element).addClass('fc_ocupado');
                $(element).css({
                    'border': '2px dotted gray',
                    'box-shadow': 'black 0 0 10px'
                });
                traerDia();
                $(".fc-border-separate .fc-week .fc-day").each(function(i, e) {
                    if (!$(e).hasClass('fc-other-month')) {
                    }
                });
            }
        }
    }

    // Agregar Eventos 

    function addEventos(eventos) {
        $(".fc-border-separate .fc-week .fc-day").each(function(i, e) {
            if (!$(e).hasClass('fc-other-month')) {
                $(e).attr('style', '');
                var day = parseInt($(e, ".fc-day-number").text());
                try {
                    switch (eventos[day].status) {
                        case 'green':
                            $(e).css('background-color', '#73CBA1'); //verde
                            $(e).attr('title', 'Todo el DÃ­a Disponible');
                            break;
                        case 'orange':
                            $(e).css('background-color', '#FFCE00'); //naranja
                            $(e).attr('title', k.hours_free + ' Horas Disponibles');
                            break;
                        case 'gray':
                            $(e).css('background-color', '#BFBFBF'); //gris
                            $(e).attr('title', 'No hay Horas Disponibles');
                            break;
                    }
                } catch (e) {
                }
            }
        }
        );
        colorwhite();
        $("#Listado-Calendario #_manana").html("");
    }

    function colorwhite() {
        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();
        if (parseInt(CALENDARIO_ANO) <= parseInt(y) && parseInt(CALENDARIO_MES) <= parseInt(m)) {
            var hoy = $('.fc-today').find('.fc-day-number').text();
            $(".fc-border-separate .fc-week .fc-day").each(function(i, e) {
                if (!$(e).hasClass('fc-other-month')) {

                    if (parseInt(CALENDARIO_MES) === parseInt(m)) {
                        if (parseInt($(e).find('.fc-day-number').text()) < parseInt(hoy)) {
                            $(e).css({"background": "white", "cursor": "default"});
                        }
                    } else {
                        $(e).css({"background": "white", "cursor": "default"});
                    }
                }
            });
        }
    }



    // POPUP Reserva
    function _magic() {
        $(".Listado-Dispo").on("click", ".popup", function(event, target, message) {
            if (validate.isEmpty(message)) {
                $("#reserva_form").html(temp);
                CALENDARIO_CODE = $(this).attr("data-code");
                CALENDARIO_PRICE = $(this).attr("data-price");
                $("#reserva_form #value").val(CALENDARIO_PRICE);
                $("#reserva_form #falta").val(CALENDARIO_PRICE);
                $(".valor_reserva").priceFormat({
                    prefix: '$ ',
                    centsSeparator: '.',
                    thousandsSeparator: ',',
                    centsLimit: 0
                });
                calculaFaltante();
            }
        });

        $(".popup").fancybox({
            'scrolling': 'no',
            'titleShow': false,
            'transitionIn': 'elastic',
            'transitionOut': 'elastic',
            'easingIn': 'easeOutBack',
            'easingOut': 'easeInBack',
            'width': 600,
            'onClosed': function() {
                $("#login_error").hide();
            }
        });
    }


    function calculaFaltante() {
        $("#reserva_form #abona").keyup(function() {
            var value = parseFloat($.trim($("#reserva_form #value").val().replace(/[^\d\.\-\ ]/g, '')));
            var abona = parseFloat($.trim($(this).val().replace(/[^\d\.\-\ ]/g, '')));
            if ((abona <= value) && (abona >= 0)) {
                $("#reserva_form #falta").val(value - abona);
            } else {
                $("#reserva_form #falta").val(0);
            }
            $("#reserva_form #falta").priceFormat({
                prefix: '$ ',
                centsSeparator: '.',
                thousandsSeparator: ',',
                centsLimit: 0
            });
        });
    }

});

function _ocultarIframe(cod_game, message) {
    //es necesario qque esta funcion esté vacia para que el js funcione correctamente 
    //ya que si no la pongo, me dice que no está definida y está la uso es en un iframe
    //cuando reservo con codigo de juego
    //window.parent._ocultarIframe(cod_game, data.message); se encuentra en, 
    //public/js/crear_partidos.js
    //esto no hace nada por que no va aencontrar ninguno de los elementos
}

// Renderizar Calnedario con eventos


