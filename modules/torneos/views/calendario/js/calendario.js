$(document).ready(function(){
        // aqui borro los botones de tabla posiciones de calendario
        $('.btn_result_parcial_calendar').remove();
        //valida si hay fases, si no pues muestra el mensajito
        var htmlFases = $('#contend-calendario .acor').html();
        if(htmlFases != null){
            var faseLength = $('#contend-calendario .acor').length;
            if(faseLength === 0){
                component.messageSimple("Mensaje", 'No hay resultados según el filtro.', 'info');
            }
        }
        $(document).on('click', '.btn_result_proxima_fecha', function() {
            getProximaFecha($(this).attr("torneo"), $(this).attr("round"), $(this).attr("fase"));
        });

        //  lógica para flecha en accordion de grupos
        $('.grupo-menu').click(function() {
            var clase = $(this).attr('class');
             if (clase == "accordion-toggle grupo-menu tmp-grupo-menu" || clase == "accordion-toggle grupo-menu tmp-grupo-menu collapsed") {
                var id = $(this).attr('href');
                $('[href="' + id + '"]>.glyphicon').removeClass('glyphicon-chevron-down');
                $('[href="' + id + '"]>.glyphicon').addClass('glyphicon-chevron-up');
                // $('[href="'+id+'"]').removeClass('');
                $($('[href="' + id + '"]')).addClass('tmp');
            } else {
                if (clase == 'accordion-toggle grupo-menu tmp-grupo-menu collapsed' || clase == "accordion-toggle grupo-menu tmp-grupo-menu tmp") {
                    var id = $(this).attr('href');
                    $('[href="' + id + '"]>.glyphicon').removeClass('glyphicon-chevron-up');
                    $('[href="' + id + '"]>.glyphicon').addClass('glyphicon-chevron-down');
                } else {
                    var id = $(this).attr('href');
                    $('[href="' + id + '"]>.glyphicon').removeClass('glyphicon-chevron-down');
                    $('[href="' + id + '"]>.glyphicon').addClass('glyphicon-chevron-up');
                }
            }
        });
        /** 
            * Aparece y desaparece botones que tiene una posición "FIXED" con los botones que están
            * por defecto debajo de todos los partidos 
            * @param {Number} ninguno
            * @return {Number} nada
        */
        var botonesCalendarScroll = function(){
            var altoseccion_matches = $('.informacion .div-contenedor-partidos').outerHeight();
            $('.informacion .btns-static-flotante').fadeIn(2000);
            $(window).scroll(function(event) {
                    console.log(altoseccion_matches);
                    // scrollTop la posición del elemento
                    height = $(event.target).scrollTop();
                    // animación al llegar a la vista los botones estaticos debajo de todos los partidos
                    // y al salir de la vista
                    if(height >= altoseccion_matches-500){
                        $('.informacion .btns-static-flotante').fadeOut('slow');
                        $('.informacion .btns-aparezcan').fadeIn('slow');
                    }else{
                        $('.informacion .btns-aparezcan').fadeOut('slow');
                        $('.informacion .btns-static-flotante').fadeIn('slow');
                    }
                });
        };
        botonesCalendarScroll();
        
function getProximaFecha(torneo, ronda, fase) {
    console.log(torneo, ronda, fase);
    if (validate.isNumeric(torneo) && validate.isNumeric(ronda)) {
        $.ajax({
            type: 'POST',
            url: base_url + '/torneos/calendario/proximaFecha',
            data: {
                "torneo": torneo,
                "round": ronda,
                "group": fase
            },
            success: function(data) {
                if (data.hasOwnProperty('status') && data.hasOwnProperty('html')) {
                    if (data.status) {
                        $("#modal-proxima-fecha .modal-body").html(data.html);
                        $("#modal-proxima-fecha .modal-title").html('Proximas fechas del grupo ' + ronda);
                        $('#modal-proxima-fecha').modal('show');
                    } else {
                        component.popupHtmlHide();
                        component.messageSimple("Clasificacion", data.message, "danger");
                    }
                }
            }
        });
    }
}
});
$(function() {
    $('.form_datetime').datetimepicker({
        language: 'es',
        weekStart: 1,
        todayBtn: 1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        forceParse: 0,
        showMeridian: 1
    });



    $('.calendario_detalle').popover({"html": true});

    var double = 0;

    $("input[name=type_system]").on('change', function() {
        var value = parseInt($(this).val());
        if (_.isEqual(value, 1)) {
            double = 0;
            $("#number_rounds").text(parseInt($("#number_rounds").attr('number-teams')));
        } else {
            double = 1;
            $("#number_rounds").text(parseInt($("#number_rounds").attr('number-teams') * 2));
        }
    });

    $("#generate").on('click', function(event) {
        event.preventDefault();
        var value = parseInt($("input[name=type_system]:checked").val());
        var code = parseInt($(this).attr('data-code'));
        if (_.isNumber(value) && _.isNumber(code)) {
            $.ajax({
                type: 'POST',
                url: base_url + '/torneos/calendario/generate/',
                data: {
                    'code': code,
                    'double': double
                },
                beforeSend: function() {
                    component.popupLoader("Configuración", "Espere un momento mientras se generan las jornadas del calendario...");
                },
                success: function(data) {
                    if (data.hasOwnProperty('html')) {
                        $("#calendar").empty().html(data.html);
                        $('#accordion').carousel();
                        component.popupHtmlHide();
                    }
                }
            });
        }
    });


    $("body").on('change', '.round select', function(event) {
        if (!_.isEqual(parseInt($(this).val()), 0)) {
            var round_actual = parseInt($(this).parents('table.round').attr('data-round'));
            var value_before = parseInt($(this).attr('data-team'));
            var name_before = $(this).attr('data-name');
            var name_after = $(this).find('option:selected').text();
            var value_after = parseInt($(this).val());
            var rival = $(this).parent().siblings().eq(0).find('select');
            var value_rival = parseInt(rival.val());
            if (!_.isEqual(value_rival, value_after)) {
                rival = $("table.round[data-round=" + round_actual + "] select[data-team=" + value_after + "]");
            }
            value_rival = parseInt(rival.val());
            $(this).attr('data-team', value_after).attr('data-name', name_after);
            rival.attr('data-name', name_before).attr('data-team', value_before).find('option:selected').val(value_before).text(name_before);
            $("table[data-round!=" + round_actual + "]").each(function(index, element) {
                var table = $(element);
                var before = table.find("select[data-team=" + value_before + "]").effect("highlight", {'color': '#66AFE9'}, 2000);
                var after = table.find("select[data-team=" + value_after + "]").effect("highlight", {'color': '#66AFE9'}, 2000);
                after.attr('data-team', value_before).attr('data-name', name_before).find('option:selected').val(value_before).text(name_before);
                before.attr('data-team', value_after).attr('data-name', name_after).find('option:selected').val(value_after).text(name_after);
            });
        }
    });

    var aux_select_anterior = -1;
    $("body").on('click', '.eliminatoria select', function() {
        aux_select_anterior = $(this).find('option:selected').attr("subindex");
    });

    $("body").on('change', '.eliminatoria select', function() {
        if (!_.isEqual(parseInt($(this).val()), 0)) {
            verificar($(this).val(), $(this).attr("index"));
            $(this).effect("highlight", {'color': '#66AFE9'}, 2000);
        }
    });

    var verificar = function(cod_change, index_select) {
        $(".eliminatoria select[index!=" + index_select + "]").each(function() {
            if ($(this).val() == cod_change) {
                $(this).find('option:selected').removeAttr("selected");
                $(this).find("option[subindex=" + aux_select_anterior + "]").attr("selected", "selected");
                $(this).effect("highlight", {'color': '#66AFE9'}, 2000);
                return true;
            }
        });
        return false;
    };

    $("#order_eliminatoria").on('click', function() {
        var order = new AleatorioOrdenado($(".eliminatoria").attr("min"), $(".eliminatoria").attr("max"));
        var arr_order = order.init();
        $(".eliminatoria select").each(function(index) {
            $(this).find('option:selected').removeAttr("selected");
            $(this).find("option[subindex=" + arr_order[index] + "]").attr("selected", "selected");
            $(this).effect("highlight", {'color': '#66AFE9'}, 2000);
        });
        order = null;
    });


    $("body").on('click', 'a.swap', function(event) {
        event.preventDefault();
        var a = $(this).parent().siblings().eq(0);
        var b = $(this).parent().siblings().eq(1);
        if (_.size(b.find('select')) > 0) {
            var contentA = a.html();
            var contentB = b.html();
            a.html(contentB);
            b.html(contentA);
        }
    });

    $("#save_calendar").on('click', function() {
        var matches = [];
        $("table.round tr").each(function(index, tr) {
            var tds = $(tr).find('td');
            if (_.size(tds.eq(2).find('select')) > 0) {
                var team1 = parseInt(tds.eq(0).find('select').val());
                var team2 = parseInt(tds.eq(2).find('select').val());
                var error = false;
                if (_.isEqual(team1, 0)) {
                    tds.eq(0).find('select').css('border', '1px solid red');
                    error = true;
                } else {
                    tds.eq(0).find('select').css('border', '1px solid #cccccc');
                }
                if (_.isEqual(team2, 0)) {
                    tds.eq(2).find('select').css('border', '1px solid red');
                    error = true;
                } else {
                    tds.eq(2).find('select').css('border', '1px solid #cccccc');
                }


                var round = parseInt($(tr).parents('table.round').attr('data-round'));

                if (_.isNumber(team1) && _.isNumber(team2) && _.isNumber(round) && !error) {
                    var obj = {
                        'round': round,
                        'team1': team1,
                        'team2': team2,
                        'group': '1'
                    };
                    matches.push(obj);
                }
            }

        });
        var number = parseInt($("#number_rounds").text());
        var total = Math.floor(number / 2) * number;
        var code = parseInt($(this).attr('data-code'));

        if ((matches.length > 0) && _.isNumber(code)) {
            $.ajax({
                type: 'POST',
                url: base_url + '/torneos/calendario/savecalendar/',
                data: {
                    'matches': matches,
                    'code': code
                },
                beforeSend: function() {
                    $("#success_save").addClass('hide');
                    $("#error_save").addClass('hide');
                    component.popupLoader("Configuración", "Espere un momento mientras se guarda el calendario...");
                },
                success: function(data) {
                    component.popupHtmlHide();
                    if (data.hasOwnProperty('status') && data.hasOwnProperty('message')) {
                        if (data.status) {
                            component.messageSimple("Configuración", data.message);
                            $("#success_save span").html(data.message).parent().removeClass('hide');
                            $("#save_calendar").attr("disabled", "disabled");
                        } else {
                            component.messageSimple("Configuración", "Hubo un error al guardar las jornadas. Por favor inténtelo de nuevo.", "danger");
                            $("#error_save span").text(data.message).parent().removeClass('hide');
                        }
                    }
                }
            });
        } else {
            $("#error_save span").text("El calendario debe estar completado").parent().removeClass('hide');
        }
    });





    $(".button_save_round").on('click', function() {
        var matches = [];
        var rel = $("#rel").val();
        $("table#info_round tr.info-calendar").each(function(index, tr) {
            //if (($(tr).attr('codlocal') != "") && ($(tr).attr('codvisitante') != "")) {
            var code = $(tr).attr('data-match');
            //var teamlocal = $(tr).find('input[name=result_team1]');
            //var teamvisitante = $(tr).find('input[name=result_team2]');
            //if ((teamlocal.attr("code") != "") && (teamvisitante.attr("code") != "")) {
            var date = $(tr).find('input[name=date_time_hid]').val();
            var complex = parseInt($(tr).find('select[name=complex]').val());
            var descriptionplace = $(tr).find('textarea[name=descriptionplace]').val();
            var arbitros = $(tr).find('textarea[name=arbitros]').val();
            var jornada = $(tr).find('input[name=jornada]').val();
            
            // if (validate.isNumeric(code) && !_.isEmpty(date) && (date != " ") && _.isNumber(complex) && !_.isNaN(code)) {
                if (validate.isNumeric(code) && _.isNumber(complex) && !_.isNaN(code)) {
                // if (_.isDate(new Date(date)) && !_.isNull(date)) {
                        var obj = {
                            'code': code,
                            'descriptionplace': descriptionplace,
                            'arbitros': arbitros,
                            'date': date,
                            'complex': complex,
                            'numjornada': jornada
                        };
                        matches.push(obj);
                // }
            }
            //}
            //}
        });
       // console.log(matches);
//        return;
        if (_.size(matches) > 0) {
            $.ajax({
                type: 'POST',
                url: base_url + '/torneos/calendario/updateround/',
                data: {
                    'matches': matches,
                    'rel': rel
                },
                beforeSend: function() {
                    component.popupLoader("Calendario", "Actualizando...");
                },
                success: function(data) {
                    component.popupHtmlHide();
                    if (data.hasOwnProperty('status') && data.hasOwnProperty('message')) {
                        if (data.status) {
                            component.messageSimple("Guarda resultados", data.message);
                            $(document).on('click','.modal-default',function(){
                                location.reload();
                            });
                        } else {
                            component.messageSimple("Guarda resultados", data.message, "danger");
                        }
                        return;
                    }
                    component.messageSimple("Guarda resultados", "Surgió un error inesperado, por favor inténtelo de nuevo.", "danger");
                }
            });
        } else {
            component.messageSimple("Guarda resultados", "Este calendario no se puede guardar porque no hay equipos disponibles hasta el momento.", "danger");
        }
    });

    var groups = null, teams = null, opt_g = null;
    $("#generate_groups").on('click', function(event) {
        event.preventDefault();
        var opt = $("input[name=opt_group]:checked").val();
        var code = parseInt($(this).attr('data-code'));
        if (_.isNumber(code)) {
            $.ajax({
                type: 'POST',
                url: base_url + '/torneos/calendario/generategroups/',
                data: {
                    'opt': opt,
                    'code': code
                },
                success: function(data) {
                    if (data.hasOwnProperty('html') && data.hasOwnProperty('groups') && data.hasOwnProperty('teams')) {
                        groups = parseInt(data.groups);
                        teams = parseInt(data.teams);
                        opt_g = $("input[name=opt_group]:checked").val();
                        $("#content_generation_groups").html(data.html);
                        for (var i = 1; i <= groups; i++) {
                            $("#sortable_" + i).sortable({
                                connectWith: ".connectedSortable"
                            }).disableSelection();
                        }
                    }
                }
            });
        }

    });


    $("body").on('click', '#save_groups', function() {
        if (_.isNumber(groups) && _.isNumber(teams)) {
            var flag = true;
            var groups_t = [];
            $(".connectedSortable").each(function(index, table) {
                var size = $(table).find('tr').size();
                if (!_.isEqual(size, teams)) {
                    flag = false;
                } else {
                    var number = parseInt($(table).attr('data-number'));
                    if (_.isNumber(number)) {
                        var group = [];
                        $(table).find('tr').each(function(i, tr) {
                            var code_team = parseInt($(tr).attr('data-team'));
                            if (_.isNumber(code_team)) {
                                group.push(code_team);
                            } else {
                                flag = false;
                            }
                        });
                        var obj = {
                            'number': number,
                            'teams': group
                        };
                        groups_t.push(obj);
                    } else {
                        flag = false;
                    }
                }
            });

            var code = parseInt($(this).attr('data-code'));

            if (flag && _.isNumber(code)) {
                $.ajax({
                    type: 'POST',
                    url: base_url + '/torneos/calendario/savegroups/',
                    data: {
                        'code': code,
                        'groups': groups_t,
                        'opt': opt_g
                    },
                    success: function(data) {
                        if (data.hasOwnProperty('message') && data.hasOwnProperty('status')) {
                            if (data.status) {
                                component.messageSimple("Guardar grupos", data.message, "info");
                            } else {
                                component.messageSimple("Guardar grupos", data.message, "danger");
                            }
                        }
                    }
                });
            } else {
                component.messageSimple("Guardar grupos", "Todos los grupos deben tener " + teams + " equipos.", "danger");
            }
        }
    });

    $("#generate_calendar_group").on('click', function() {
        var cod_tournament = parseInt($(this).attr('data-tournament'));
        var group = parseInt($(this).attr('data-number'));
        if (_.isNumber(cod_tournament) && _.isNumber(group)) {

            $.ajax({
                type: 'POST',
                url: base_url + '/torneos/calendario/generate/',
                data: {
                    'type': 'group',
                    'code': cod_tournament,
                    'group': group
                },
                success: function(data) {
                    console.log(data);
                    if (data.hasOwnProperty('html')) {
                        $("#calendar_generator_group").html(data.html);
                    }
                }
            });
        }
    });

    $("#save_calendar_group").on('click', function() {
        var group = parseInt($(this).attr('data-group'));
        if (_.isNumber(group)) {
            var data = {
                'group': group
            };
            saveCalendar(parseInt($(this).attr('data-code')), parseInt($(this).attr('data-rounds')) + 1, data);
        }
    });

    var saveCalendar = function(code, number, data2) {
        var matches = [];
        $("table.round tr").each(function(index, tr) {
            var tds = $(tr).find('td');
            if (_.size(tds.eq(2).find('select')) > 0) {
                var team1 = parseInt(tds.eq(0).find('select').val());
                var team2 = parseInt(tds.eq(2).find('select').val());
                var error = false;
                if (_.isEqual(team1, 0)) {
                    tds.eq(0).find('select').css('border', '1px solid red');
                    error = true;
                } else {
                    tds.eq(0).find('select').css('border', '1px solid #cccccc');
                }
                if (_.isEqual(team2, 0)) {
                    tds.eq(2).find('select').css('border', '1px solid red');
                    error = true;
                } else {
                    tds.eq(2).find('select').css('border', '1px solid #cccccc');
                }


                var round = parseInt($(tr).parents('table.round').attr('data-round'));

                if (_.isNumber(team1) && _.isNumber(team2) && _.isNumber(round) && !error) {
                    var obj = {
                        'round': round,
                        'team1': team1,
                        'team2': team2
                    };
                    matches.push(obj);
                }
            }
        });


        var total = Math.floor(number / 2) * (number - 1);
        if (_.isEqual(total, _.size(matches)) && _.isNumber(code)) {

            var data1 = {
                'matches': matches,
                'code': code
            };
            var data = _.extend(data1, data2);

            $.ajax({
                type: 'POST',
                url: base_url + '/torneos/calendario/savecalendar/',
                data: data,
                beforeSend: function() {
                    $("#success_save").addClass('hide');
                    $("#error_save").addClass('hide');
                },
                success: function(data) {
                    if (data.hasOwnProperty('status') && data.hasOwnProperty('message')) {
                        if (data.status) {
                            $("#success_save span").html(data.message).parent().removeClass('hide');
                            $("#save_calendar,save_calendar_group").attr("disabled", "disabled");
                        } else {
                            $("#error_save span").text(data.message).parent().removeClass('hide');
                        }
                    }
                }
            });
        } else {
            $("#error_save span").text("El calendario debe estar completado").parent().removeClass('hide');
        }
    };



    $("#save_calendar_eliminatoria").on('click', function() {
        var torneo = $(this).attr("data-code");
        var arr_order = new Array();
        $(".eliminatoria select").each(function() {
            arr_order.push($(this).find('option:selected').val());
        });
        if (comprobarOrden(arr_order)) {
            var code = parseInt($(".eliminatoria").attr("code"));
            var matches = [];
            var select_local = null;
            var select_visitante = null;
            $(".eliminatoria .partidos").each(function() {
                select_local = null;
                select_visitante = null;
                //console.log("numero: " + $(this).attr("num") + " ronda: " + $(this).attr("round"));
                select_local = $(this).find(".select-local");
                select_visitante = $(this).find(".select-visitante");
                if ((select_local.length > 0) && (select_visitante.length > 0)) {
                    var obj = {
                        'round': $(this).attr("round"),
                        'team1': select_local.val(),
                        'team2': select_visitante.val(),
                        'group': '0'
                    };
                    matches.push(obj);
                } else {
                    var obj = {
                        'round': $(this).attr("round"),
                        'team1': "NULL",
                        'team2': "NULL",
                        'group': '0'
                    };
                    matches.push(obj);
                }
            });
//            console.log(matches);
//            console.log("code: " + code);
            if ((matches.length > 0) && _.isNumber(code)) {
                $.ajax({
                    type: 'POST',
                    url: base_url + '/torneos/calendario/save_eliminatoria/',
                    data: {
                        'matches': matches,
                        'code': code
                    },
                    beforeSend: function() {
                        component.popupLoader("Eliminación directa", "Espera un momento mientras se envía la Eliminación directa.");
                    },
                    success: function(data) {
                        component.popupHtmlHide();
                        if (data.hasOwnProperty('status') && data.hasOwnProperty('message')) {
                            if (data.status) {
                                component.messageSimple("Eliminación directa", data.message);
                                component.redireccionar(base_url + "/torneos/calendario/index/?torn=" + torneo);
                            } else {
                                component.messageSimple("Eliminación directa", data.message, "danger");
                            }
                        } else {
                            component.messageSimple("Eliminación directa", "Por favor intentelo de nuevo...", "danger");
                        }
                    }
                });
            } else {
                component.messageSimple("Eliminación directa", "No se han completado todos los datos para la configuración de la Eliminación directa.", "danger");
            }
        } else {
            component.messageSimple("Eliminación directa", "No se puede repetir equipos dentro de la Eliminación directa.", "danger");
        }
    });

    $("#re_config_elimin").on('click', function() {
        var torneo = $(this).attr("data-code");
        console.log(base_url + "/torneos/calendario/configurar/" + torneo + "/1");
        var func = function() {
            component.redireccionar(base_url + "/torneos/calendario/configurar/" + torneo + "/1", 500);
        };
        component.messageAcept("Eliminación directa", "¿Está seguro de reconfigurar la eliminación directa? Tenga en cuenta que después de guardar los cambio no podrá recurar la información actual.", func, "danger");
    });


    var comprobarOrden = function(arr) {
        for (var a = 0; a < arr.length; a++) {
            for (var b = 0; b < arr.length; b++) {
                if (b != a) {
                    if (arr[b] == arr[a]) {
                        return false;
                    }
                }
            }
        }
        return true;
    };

    $(".gen_siguiente_ronda").on('click', function() {
        if (validate.isNumeric($(this).attr("torneo")) && validate.isNumeric($(this).attr("round"))) {
            if (validate.isNumeric($(this).attr("round")) && validate.isNumeric($(this).attr("torneo"))) {
                $.ajax({
                    type: 'POST',
                    url: base_url + '/torneos/calendario/siguinte_ronda_eliminatoria/',
                    data: {
                        'torneo': $(this).attr("torneo"),
                        'round': $(this).attr("round"),
                        'group': $(this).attr("fase")
                    },
                    beforeSend: function() {
                        component.popupLoader("Calendario", "Espera un momento mientras se genera la siguiente ronda...");
                    },
                    success: function(data) {
                        console.log(data);
                        if (data.hasOwnProperty('status') && data.hasOwnProperty('message')) {
                            if (data.status) {
                                window.location.reload();
                            } else {
                                component.popupHtmlHide();
                                component.messageSimple("Calendario", data.message, "danger");
                            }
                        }
                    }
                });
            }
        }
    });


    $(".numeric").keyup(function(e) {
        if (/\D/g.test(this.value)) {
            this.value = this.value.replace(/\D/g, '');
        }
    });
});



var AleatorioOrdenado = function(mini, maxi) {
    this.min = parseInt(mini);
    this.max = parseInt(maxi);
    this.cartilla = new Array(this.max + 1);

    this.init = function() {
        for (var i = 0; i < this.cartilla.length; i++) {
            this.cartilla[i] = this.numeroAleatorio();
            if (this.comprobarRepetido(this.cartilla[i], i)) {
                i--;
            }
        }
        //this.imprimirArray(this.cartilla);
        return this.cartilla;
    };

    this.numeroAleatorio = function() {
        return Math.floor(Math.random() * (this.max - (this.min - 1))) + this.min;
    };

    this.comprobarRepetido = function(nuevoNumero, paso) {
        for (var j = 0; j < this.cartilla.length; j++) {
            if (j != paso) {
                if (this.cartilla[j] == nuevoNumero) {
                    return true;
                    break;
                }
            }
        }
        return false;
    };

    this.imprimirArray = function(arr) {
        for (var i = 0; i < arr.length; i++) {
            console.log(" " + arr[i]);
        }
    };
};



var TodosContraTodos = function() {
    var base = this;
    this.init = function() {
        this.events();
    };

    this.events = function() {
        $(".btn_result_parcial_calendar").on("click", function() {
            base.getDataResult($(this).attr("torneo"), $(this).attr("round"), $(this).attr("fase"), 'calendar');
        });
        $(".btn_result_parcial_resultados").on("click", function() {
            base.getDataResult($(this).attr("torneo"), $(this).attr("round"), $(this).attr("fase"), 'resultados');
        });
    };

    this.getDataResult = function(torneo, ronda, fase, tipo_popup) {
        if (validate.isNumeric(torneo) && validate.isNumeric(ronda)) {
            $.ajax({
                type: 'POST',
                url: base_url + '/torneos/clasificacion/resultados_public_round/' + torneo + '/' + ronda,
                data: {
                    "grupo": fase
                },
                success: function(data) {
                    if (data.hasOwnProperty('status') && data.hasOwnProperty('html')) {
                        if (data.status) {
                            $("#modal-results-parcial .modal-body").html(data.html);
                            $("#modal-results-parcial .modal-title").html('Grupo '+ronda);
                            $('#modal-results-parcial').modal('show');
                        } else {
                            component.popupHtmlHide();
                            component.messageSimple("Calendario", data.message, "danger");
                        }
                    }
                }
            });
        }
    };
};

var GruposEliminatoriaPublic = function() {
    var base = this;

    this.init = function() {
        this.events();
    };

    this.events = function() {
        $("#btn_result_fase_grupos").on('click', function() {
            component.popupHtml("Resultados Fase de Grupos", "popup_result_total_body", "popup_result_total_footer", true);
            base.getResultFaseGrupos($(this).attr("torneo"), $(this).attr("grupo"));
        });
        $("#btn_update_elim").on('click', function() {
            console.log($(this).attr("torneo") + " - " + $(this).attr("grupo"));
            base.getSiguienteFase($(this).attr("torneo"), $(this).attr("grupo"));
        });
    };

    this.getResultFaseGrupos = function(torneo, grupo) {
        if (validate.isNumeric(torneo), validate.isNumeric(grupo)) {
            $.ajax({
                type: 'POST',
                url: base_url + '/torneos/clasificacion/resultados_public/' + torneo,
                data: {
                    'grupo': grupo,
                    'onlygroup': 1
                },
                success: function(data) {
                    console.log(data);
                    if (data.hasOwnProperty('status') && data.hasOwnProperty('html')) {
                        if (data.status) {
                            $(".contend_result_total_body").html(data.html);
                        } else {
                            component.popupHtmlHide();
                            component.messageSimple("Calendario", data.message, "danger");
                        }
                    }
                }
            });
        }
    };

    this.getSiguienteFase = function(torneo, grupo) {
        if (validate.isNumeric(torneo), validate.isNumeric(grupo)) {
            $.ajax({
                type: 'POST',
                url: base_url + '/torneos/calendario/siguinte_fase/',
                data: {
                    'torneo': torneo,
                    'grupo': grupo
                },
                success: function(data) {
                    console.log(data);
                    if (data.hasOwnProperty('status') && data.hasOwnProperty('message')) {
                        if (data.status) {
                            component.messageSimple("Calendario", data.message);
                            component.reload();
                        } else {
                            component.messageSimple("Calendario", data.message, "danger");
                        }
                    }
                }
            });
        }
    };

};


var DetallaPartido = function() {
    var _this = this;
    _this.id_popup_detalle = "modal-detalla-partido";
    _this.id_titulo = "titulo-detalle-partido";
    var obj = function() {
        this.titulo = "";
        this.partido = {
            cod: "",
            num: "",
            irpartido: "",
            date: "",
            hour: "",
            grupo: "",
            jornada: "",
            titulo: "",
            local: {
                cod: "",
                name: "",
                score: "",
                ir: "",
                img: ""
            },
            visitant: {
                cod: "",
                name: "",
                score: "",
                ir: "",
                img: ""
            },
            lugar: {
                codcomplex: "",
                ircomplex: "",
                namecomplex: "",
                descriptionplace: ""
            }
        };
    };

    function main() {
        _this.events();
    }

    _this.events = function() {
        $(document).on('click', '.all-match', function() {
            var cod_match = $(this).attr("cod-partido");
            if(validate.isEmpty(cod_match)){
                cod_match = $(this).attr("codmatch");
            }
            _this.getMatchDetalle(cod_match,$(this).attr('data-calendar'));
        });
    };

    this.getMatchDetalle = function(cod_match, programeichon) {
        // console.log(cod_match);
        if (validate.isNumeric(cod_match)) {
            $.ajax({
                type: 'POST',
                url: base_url + '/torneos/calendario/detallePartido',
                data: {
                    "codmatch": cod_match,
                    "programado": programeichon
                },
                success: function(data) {
                    if (data.hasOwnProperty('status') && data.hasOwnProperty('html')) {
                        var no = '';
                        if(data.noprogramado){
                            no = 'no programado';
                        }
                        if (data.status) {
                            $("#modal-detalle-partido-calendar .modal-body").html(data.html);
                            // _this.getPlayersLocalVisitant(aux_obj.partido.local.cod, aux_obj.partido.visitant.cod);
                            $("#modal-detalle-partido-calendar .modal-title").html('Partido '+no);
                            $('#modal-detalle-partido-calendar').modal('show');
                        } else {
                            component.popupHtmlHide();
                            component.messageSimple("Clasificacion", data.message, "danger");
                        }
                    }
                }
            });
}
};
    _this.getPlayersLocalVisitant = function(codlocal, codvisitant) {
        if (validate.isNumeric(codlocal), validate.isNumeric(codvisitant)) {
            $.ajax({
                type: 'POST',
                url: base_url + '/torneos/filters/getplayersmatch/',
                data: {
                    'teamlocal': codlocal,
                    'teamvisitant': codvisitant
                },
                success: function(data) {
                    console.log(data);
                    if (data.hasOwnProperty('status') && data.hasOwnProperty('message') && data.hasOwnProperty('players')) {
                        if (data.status) {
                            if (!validate.isEmpty(data.players)) {
                                var htmlauxlocal = '<p class="text-center" style="color: #FF0000;">No hay jugadores en este equipo.<p>';
                                if (data.players.local.length > 0) {
                                    htmlauxlocal = "";
                                    for (var a = 0; a < data.players.local.length; a++) {
                                        htmlauxlocal += '<li class="list-group-item"><a href="' + base_url + '/perfil/' + data.players.local[a].coduser + '-" target="_blank"><span class="glyphicon glyphicon-user"></span>&nbsp;' + data.players.local[a].name + ' ' + data.players.local[a].lastname + ' (' + ((data.players.local[a].status == 'CAPTAIN') ? 'Capitán' : 'Jugador') + ')</a></li>';
                                    }
                                    htmlauxlocal = '<ul class="list-group">' + htmlauxlocal + '</ul>';
                                }
                                var htmlauxvisitant = '<p class="text-center" style="color: #FF0000;">No hay jugadores en este equipo.<p>';
                                if (data.players.visitant.length > 0) {
                                    htmlauxvisitant = "";
                                    for (var a = 0; a < data.players.visitant.length; a++) {
                                        htmlauxvisitant += '<li class="list-group-item"><a href="' + base_url + '/perfil/' + data.players.visitant[a].coduser + '-" target="_blank"><span class="glyphicon glyphicon-user"></span>&nbsp;' + data.players.visitant[a].name + ' ' + data.players.visitant[a].lastname + ' (' + ((data.players.visitant[a].status == 'CAPTAIN') ? 'Capitán' : 'Jugador') + ')</a></li>';
                                    }
                                    htmlauxvisitant = '<ul class="list-group">' + htmlauxvisitant + '</ul>';
                                }

                                $("#" + _this.id_popup_detalle + " #contend-detalle #playerslocal").html(htmlauxlocal);
                                $("#" + _this.id_popup_detalle + " #contend-detalle #playersvisitant").html(htmlauxvisitant);
                                return;
                            }
                        }
                    }
                    component.alertComponent("No se cargaron los jugadores locales correctamente.", "playerslocal", "danger");
                    component.alertComponent("No se cargaron los jugadores visitantes correctamente.", "playersvisitant", "danger");
                }
            });
        }
    };

    main();
};

//************

var FiltersTorneo = function() {
    var _this = this;
    _this.class_filter = ".form-filter";
    function main() {
        _this.loadAutoCompleteFilter();
        _this.loadFechasFilter();
        _this.events();
    }

    _this.events = function() {
        $(_this.class_filter + " #typefilter").change(function() {
            _this.desbloqueaAutocomplete();
        });
        $(_this.class_filter + " #autocomplete-filter").keyup(function() {
            $(_this.class_filter + " #hid-strfilter").val($(this).val());
        });
    };

    _this.loadAutoCompleteFilter = function() {
        var lbl = null;
        $("#autocomplete-filter").autocomplete({
            source: function(request, response) {
                var typefilter = $(_this.class_filter + " #typefilter").val();
                var torn = $(_this.class_filter + " #torn").val();
                if (validate.isNumeric(typefilter)) {
                    $.ajax({
                        url: base_url + "/torneos/filters/autocomplete/",
                        dataType: "json",
                        data: {
                            term: request.term,
                            typefilter: typefilter,
                            torn: torn
                        },
                        success: function(data) {
                            response(data);
                        }
                    });
                }
            },
            delay: 400,
            minLength: 2,
            select: function(event, ui) {
                lbl = ui.item.label;
                $(this).val(lbl);
                $(_this.class_filter + " #hid-strfilter").val(lbl);
                _this.bloqueAutocomplete();
            },
            close: function(event, ui) {
                $(this).val(lbl);
                $(_this.class_filter + " #hid-strfilter").val(lbl);
            }
        });
        //--
        $(_this.class_filter + " #remove-autocomplete-filter").click(function() {
            _this.desbloqueaAutocomplete();
        });
    };

    _this.bloqueAutocomplete = function() {
        $("#autocomplete-filter").attr('disabled', 'disabled');
    };

    _this.desbloqueaAutocomplete = function() {
        $("#autocomplete-filter").val("");
        $(_this.class_filter + " #hid-strfilter").val("");
        $("#autocomplete-filter").removeAttr('disabled');
    };

    _this.loadFechasFilter = function() {
        $('.fechas_filter').datetimepicker({
            language: 'es',
            weekStart: 1,
            todayBtn: 1,
            autoclose: 1,
            todayHighlight: 1,
            startView: 2,
            minView: 2,
            forceParse: 0
        });
    };

    main();
};
