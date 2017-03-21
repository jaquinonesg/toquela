var temp = null;

$(function() {

    temp = $("#reserva_form").html();
    console.log("inicio", temp);


    $(".grayB").live('click', function() {

        var code = parseInt($(this).attr('code'));

        if (_.isNumber(code)) {
            $.ajax({
                type: 'POST',
                url: base_url + '/administrador-canchas/index/viewreserve/',
                data: {
                    'code': code
                },
                success: function(data) {
                    if (data.hasOwnProperty('status')) {
                        if (data.status && data.hasOwnProperty('html')) {
                            $("#reserva_form").html(data.html);
                            $(".popup").eq(0).trigger('click', [$("body"), "yes"]);
                            //$("#reserva_form").html(temp);
                        }
                    }
                }
            });
        }
    });




    $("#Paginador-Canchas li a").first().addClass('selectedCancha');

    $("#Paginador-Canchas li a").click(function() {

        $("#Paginador-Canchas li a").removeClass('selectedCancha');
        $(this).addClass('selectedCancha');
        CALENDARIO_SUBCOMPLEX = $(this).attr("code");
        trarFechas();
    });
    CALENDARIO_SUBCOMPLEX = $(".selectedCancha").attr('code');

    // $("footer").hide();
    $("#Menu-Int-Canchas a").click(function(ev) {
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



    $("#favorito").click(function(ev) {
        alert("ok");
    });

    $("a.previa").fancybox({
        'titleShow': false,
        'transitionIn': 'elastic',
        'transitionOut': 'elastic',
        'easingIn': 'easeOutBack',
        'easingOut': 'easeInBack'
    });

    $("#search").live('click', function() {
        console.log("fddas");
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

    $("input[name='p_abona']").keyup(function() {

        val_ = $.trim($(this).val().replace(/[^\d\.\-\ ]/g, ''));
        var deuda = parseInt(CALENDARIO_PRICE) - parseInt(val_);
        if (parseInt(val_) >= parseInt(CALENDARIO_PRICE)) {

            $("input[name='p_falta']").val('0');
        } else {
            $("input[name='p_falta']").val(deuda);
        }
        $("input[name='p_falta']").priceFormat({
            prefix: '$ ',
            centsSeparator: '.',
            thousandsSeparator: ',',
            centsLimit: 0,
            allowNegative: true
        });
    });
    $("input[name='p_abona']").priceFormat({
        prefix: '$ ',
        centsSeparator: '.',
        thousandsSeparator: ',',
        centsLimit: 0
    });

    //FORM RESERVAR

    $("#reserva_form").bind("submit", function() {

        elemento = this;

        var flag = true;
        $("#reserva_form .req").each(function(i, e) {
            if (!$(e).val()) {
                flag = false;
                $(e).css("border", "1px solid red");
            } else {
                $(e).css("border", "1px solid #000");
            }
        });
        if (flag) {

            $("#login_error").hide();
            $("#reserva_form .req").each(function(i, e) {
                if ($(e).attr('name') === "p_abona") {
                    $(e).val($.trim($(this).val().replace(/[^\d\.\-\ ]/g, '')));
                }
            });
            reserva = $("#reserva_form").serialize();
            $("#reserva_form .req").val('');
            console.log(reserva);
        } else {
            $("#login_error").show();
        }
//ajax

        var code = parseInt($("#send_data").attr('data-code'));

        if (flag && _.isNumber(code)) {
            $.ajax({
                type: "POST",
                cache: false,
                url: base_url + "/administrador-canchas/index/hacerReserva/",
                beforeSend: function(data) {
                    $.fancybox.showActivity();
                },
                data: {
                    mes: parseInt(CALENDARIO_MES) + 1,
                    ano: CALENDARIO_ANO,
                    dia: CALENDARIO_DIA,
                    code: CALENDARIO_CODE,
                    cancha: CALENDARIO_SUBCOMPLEX,
                    user: code,
                    abone: $("#abona").val()
                            //form: reserva
                },
                success: function(data) {

                    $.fancybox.hideActivity();
                    $.fancybox.close();
                    if (data.hasOwnProperty('message')) {
                        alert(data.message);
                    }
                }
            });
        }
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

//console.log("Traer mes: " + CALENDARIO_MES + ", AÃ±o: " + CALENDARIO_ANO);

        $.ajax({
            type: "POST",
            cache: false,
            url: base_url + "/administrador-canchas/index/reservaMes/",
            beforeSend: function(data) {
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
                $(".fc-week").animate({'opacity': 1}, 1000);
                console.log(data);
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

        console.log(CALENDARIO_SUBCOMPLEX);

        $.ajax({
            type: "POST",
            cache: false,
            url: base_url + "/administrador-canchas/index/reservaDia/",
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

                $(".fc-week").animate({'opacity': 1}, 1000);
                var obj = $.parseJSON($.trim(data));
                console.log(obj);
                var _html = "<tr><td>";
                if ($(obj).length > 0) {
                    $.each(obj, function(i, e) {
                        if (e.status === null) {
                            _html += '<ul class="Listado-Dispo" >';
                        } else {
                            _html += '<ul class="Listado-Dispo grayB" code="' + e.reserve + '">';
                        }
                        _html += '<li>' + e.week + ' </li>';
                        _html += '<li>' + e.start.replace("-", ":") + ' : ' + e.end.replace("-", ":") + '</li>';
                        _html += '<li> $ ' + e.price + ' </li>';
                        if (e.status === null) {
                            _html += '<li> <a class="popup" data-code="' + e.code + '" data-price="' + e.price.replace(",", "") + '" title="Login" href="#reserva_form" >Reservar</a></li>';
                        } else {
                            _html += '<li>Ocupado</li>';
                        }
                        _html += '</ul>';
                    });
                } else {
                    _html += '<b>';
                    _html += '<em>No se obtuvieron Resultados!</em>';
                    _html += '</b>';
                }
                _html += "</td></tr>";
                $("#Listado-Calendario #_manana").html(_html);
                _magic();
                $.fancybox.hideActivity();
                $(".detallesDia").fadeIn(500);
                $(".fc-header-left span").show();
                ACCION = true;
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


    function GetUrlValue(VarSearch) {
        var SearchString = window.location.search.substring(1);
        var VariableArray = SearchString.split('&');
        for (var i = 0; i < VariableArray.length; i++) {
            var KeyValuePair = VariableArray[i].split('=');
            if (KeyValuePair[0] == VarSearch) {
                return KeyValuePair[1];
            }
        }
    }


// POPUP Reserva

    function _magic() {
        $(".Listado-Dispo").on("click", ".popup", function(event, target, message) {


            if (!_.isUndefined(message) && _.isEqual(message, 'yes')) {
                console.log("intermedio", temp);
            } else {
                console.log("normal", temp);
                $("#reserva_form").html(temp);
            }


            CALENDARIO_CODE = $(this).attr("data-code");
            CALENDARIO_PRICE = $(this).attr("data-price");
            $(".valor_reserva").val(CALENDARIO_PRICE);
            $(".valor_reserva").priceFormat({
                prefix: '$ ',
                centsSeparator: '.',
                thousandsSeparator: ',',
                centsLimit: 0
            });
        });
        $(".popup").fancybox({
            'scrolling': 'no',
            'titleShow': false,
            'transitionIn': 'elastic',
            'transitionOut': 'elastic',
            'easingIn': 'easeOutBack',
            'easingOut': 'easeInBack',
            'onClosed': function() {
                $("#login_error").hide();
            }
        });
    }

});


$(document).ready(function() {



});

var CALENDARIO_DIA, CALENDARIO_MES, CALENDARIO_ANO, CALENDARIO_CODE, CALENDARIO_PRICE, CALENDARIO_SUBCOMPLEX, ACCION = true;
// Renderizar Calnedario con eventos



