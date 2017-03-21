$(document).ready(function() {
    console.log(location.host);
    var name = null;
    $(".autocomplete_team").autocomplete({
        source: base_url + "/autocomplete/team/",
        minLength: 2,
        select: function(event, ui) {
            $(this).val(ui.item.label);
            name = ui.item.label;
            $(this).attr('data-code', ui.item.value);
            info_team(ui.item.value);
        },
        close: function(event, ui) {
            $(this).val(name);
        }
    });

    $(".btn_asignar_equipos_torneo").on('click', function() {
        var codigo_torneo = $('#codigo_torneo').val();// equipos ya agregados
        console.log(codigo_torneo);
        $.ajax({
            type: 'POST',
            data: {'codigo_torneo': codigo_torneo},
            url: base_url + '/torneos/participantes/getallteams',
            success: function(data) {
                if (data.hasOwnProperty("html") && data.hasOwnProperty("status") && data.hasOwnProperty("message")) {
                    if (data.status) {
                        $("#modal-asignar-equipos .modal-body").html(data.html);
                        $("#modal-asignar-equipos").modal('show');
                    } else {
                        $("#modal-asignar-equipos .modal-body").html(data.message);
                    }
                } else {
                    $("#modal-asignar-equipos .modal-body").html("No se cargaron los datos correctamente.");
                }
            }

        });

    });

    /******************************************
     * 
     * Si el torneo tiene todos los equipos asignados 
     Oculto el boton
     */
     var validateCamposCompletos = function() {
        var iscompleto = false;
        $("input.autocomplete_team:not([data-code])").each(function() {
            iscompleto = true;
            return;
        });
        return iscompleto;
    };

    if (!validateCamposCompletos()) {
        $(".btn_asignar_equipos_torneo").hide();
    }
    /*******************************************
     *End Validar campos completos
     */


    /********************************************
     * Agregar equipos desde el popup en checklist
     */

     $(document).on('click', '#_btn_agregar_equipos_toreno', function() {
        var tournament = parseInt($(this).attr('data-code'));
        var teams = [];
        var arrnumbers = [];

        // var teams = Array();
        // $('input.check-team').each(function(a, b) {
        //     var type = $(b).attr('type');
        //     var data_code = $(b).attr('data-code');
        //     if (b.checked === true) {
        //         teams.push(data_code);
        //     }
        // });
$("input.autocomplete_team:not([data-code])").each(function(index, element) {
    arrnumbers.push(parseInt($(element).attr('data-number')));
});

$("input.autocomplete_team[data-code]").each(function(index, element) {
    var code = parseInt($(element).attr('data-code'));
    var number = parseInt($(element).attr('data-number'));
    if (_.isNumber(code) && _.isNumber(number) && !_.isNaN(code)) {
        var team = {
            'number': number,
            'code': code
        };
        if (!_.contains(teams, team)) {
            var aux = _.find(teams, function(t) {
                return t.code === code;
            });
            if (_.isUndefined(aux)) {
                teams.push(team);
            } else {
                $("input.autocomplete_team[data-code=" + code + "]").not(':first').val("").removeAttr('data-code');
            }
        }
    }
});

if (arrnumbers.length > 0) {
    var contnumbers = 0;
    $('#equipos_escogidos .eliminar-escogido').each(function(index, element) {
        var code = parseInt($(element).attr('data-code'));
        var number = arrnumbers[contnumbers];
        if (_.isNumber(code) && _.isNumber(number) && !_.isNaN(code)) {
            var team = {
                'number': number,
                'code': code
            };
            if (!_.contains(teams, team)) {
                var aux = _.find(teams, function(t) {
                    return t.code === code;
                });
                if (_.isUndefined(aux)) {
                    teams.push(team);
                } else {
                    $("input.autocomplete_team[data-code=" + code + "]").not(':first').val("").removeAttr('data-code');
                }
            }
        }
        contnumbers++;
    });
} else {
    component.messageSimple("Error", "El torneo ya esta completo. No hay campos disponibles", "danger");
}

if (_.size(teams) > 0) {
    var espacios_disponibles = $('.autocomplete_team').length;
    $.ajax({
        type: 'POST',
        url: base_url + '/torneos/participantes/saveteams/',
        data: {
            'teams': teams,
            'code': tournament,
            'espacios_disponibles': espacios_disponibles
        },
        beforeSend: function() {
            component.popupLoader("Participantes", "Espere un momento mientras se guardan los participantes...");
        },
        success: function(data) {
            if(data.redireccionese){
                component.popupHtmlHide();
                var protocol = location.protocol;
                var host = location.host;
                var url = protocol+'//'+host+base_url+'/torneos/calendario/configurar/'+tournament;
                component.messageSimple('Mensaje',data.message,'default');
                $(document).on('click','.modal-default', function(){
                    location.replace(url);
                });
            }else{
                setTimeout(function() {
                    component.popupHtmlHide();
                    after(data);
                }, 1000);
            }

        }
    });
}

});

    /************************************************
     * End Agregar equipos desde el popup en checklist
     */

     $("#save_teams").on('click', function() {
        var tournament = parseInt($(this).attr('data-code'));
        var teams = [];
        $("input.autocomplete_team[data-code]").each(function(index, element) {
            var code = parseInt($(element).attr('data-code'));
            var number = parseInt($(element).attr('data-number'));
            if (_.isNumber(code) && _.isNumber(number) && !_.isNaN(code)) {
                var team = {
                    'number': number,
                    'code': code
                };
                if (!_.contains(teams, team)) {
                    var aux = _.find(teams, function(t) {
                        return t.code === code;
                    });
                    if (_.isUndefined(aux)) {
                        teams.push(team);
                    } else {
                        $("input.autocomplete_team[data-code=" + code + "]").not(':first').val("").removeAttr('data-code');

                    }
                }
            }
        });
        if (_.size(teams) > 0) {
            $.ajax({
                type: 'POST',
                url: base_url + '/torneos/participantes/saveteams/',
                data: {
                    'teams': teams,
                    'code': tournament
                },
                beforeSend: function() {
                    component.popupLoader("Participantes", "Espere un momento mientras se guardan los participantes...");
                },
                success: function(data) {
                    component.popupHtmlHide();
                    setTimeout(function() {
                        after(data);
                    }, 1000);

                }
            });
        }
    });

$(".remove_team").on('click', function() {
    var team = parseInt($(this).attr('data-code'));
    var tournament = parseInt($(this).attr('data-tournament'));

    if (_.isNumber(team) && _.isNumber(tournament)) {
        $.ajax({
            type: 'POST',
            url: base_url + '/torneos/participantes/removeteam/',
            data: {
                'code': team,
                'tournament': tournament
            },
            success: function(data) {
                after(data);
            }
        });
    }

});

var after = function(data) {
    if (data.hasOwnProperty('status') && data.hasOwnProperty('message')) {
        if (data.status) {
            var func_reload = function() {
                window.location.reload();
            };
            component.messageAcept("Participantes...", data.message, func_reload);
        } else {
            component.messageSimple("Participantes...", data.message, "danger");
        }

    }
};

var info_team = function(cod) {
    $.ajax({
        dataType: "json",
        url: base_url + '/torneos/index/info_team/',
        type: "POST",
        data: {
            'code': cod
        },
        success: function(dataSuccess) {
            if (dataSuccess.hasOwnProperty("retorno") && dataSuccess.hasOwnProperty("html")) {
                if (dataSuccess.retorno) {
                    $("#container-info-team").html(dataSuccess.html);
                    initPrevia();
                } else {
                    $("#container-info-team").html("");
                }
            } else {
                component.messageSimple("Error", "No se cargaron los datos correctamente, por favor inténtelo de nuevo.", "danger");
            }
        }
    });
};

    // funciones roma

    // saber el numero limite de equipos que se pueden agregar
    $(document).on('click', 'input.check-team', function() {
        // limite de eqquipos a ckequear
        var arrnumbers = [];
        $("input.autocomplete_team:not([data-code])").each(function(index, element) {
            arrnumbers.push(parseInt($(element).attr('data-number')));
        });
        var limit = arrnumbers.length;

        var teams_ckecked = Array();
        $('input.check-team').each(function(a, b) {
            var type = $(b).attr('type');
            var name_team = $(b).attr('value');
            var data_code = $(b).attr('data-code');
            if (b.checked === true) {
                teams_ckecked.push(data_code);
            } else {
                $('#escogido-' + data_code).html('');
                b.checked = false;
            }
        });
        var checkeados = teams_ckecked.length;
        var equipos_escogidos_aux = $('.team-escogido').length;
        var limite = limit;
        if(limit == equipos_escogidos_aux){
            limite = equipos_escogidos_aux-limit;
        }
        if (checkeados > limite) {
            var equ = 'equipo';
            if (limit > 1) {
                equ = 'equipos';
            }
            component.messageSimple("Mensaje", 'Solo queda por agregar al torneo ' + limit + ' ' + equ, 'warning');
            var type = $(this).attr('type');
            var data_code = $(this).attr('data-code');
            if (type == 'checkbox') {
                this.checked = false;
            }
        }
        // para agregar los ckequeados a un div
        if (this.checked === true) {
            $('#equipos_escogidos .content').append('<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 team-escogido" id="escogido-' + $(this).attr('data-code') + '"><div><img src="'+$(this).attr('data-url')+'" width="50" height="50"/><a class="eliminar-escogido" data-code="' + $(this).attr('data-code') + '" data-target="' + $(this).attr('id') + '"><span class="glyphicon glyphicon-remove"></span></a>&nbsp;&nbsp;&nbsp;<span>' + $(this).attr('value') + '</span></div></div>');
        } else {
            $('#escogido-' + $(this).attr('data-code')).remove();
        }

    // para que salga o no el ver equipos escogidos
    if (checkeados > 0) {
        $('#equipos_escogidos').removeAttr('style');
    } else {
        $('#equipos_escogidos').attr('style', 'display: none;');
        revizaElegidos();
    }

});
$(document).on('click', '#equipos_escogidos .eliminar-escogido', function() {
    var data_code = $(this).attr('data-code');
    var id_input = $(this).attr('data-target');
    $('#escogido-' + data_code).remove();
    $('#' + id_input).prop("checked", false);
    revizaElegidos();
});

$(document).on('click', '#_seleccionar_todos', function() {
    // limite de eqquipos a ckequear
    var arrnumbers = [];
    $("input.autocomplete_team:not([data-code])").each(function(index, element) {
        arrnumbers.push(parseInt($(element).attr('data-number')));
    });
    var limit = arrnumbers.length;
    var equ = 'equipo';
    if (limit > 1) {
        equ = 'equipos';
    }
    var equipos_escogidos_aux = $('.team-escogido').length;
    var limite = limit;
    if(limit == equipos_escogidos_aux){
        limite = equipos_escogidos_aux-limit;
    }
    $('input.check-team').each(function(a, b) {
        for (var i = 0; i < limite; i++) {
            if(a == i){
                var type = $(b).attr('type');
                var data_code = $(b).attr('data-code');
                if (b.checked === false) {
                    b.checked = true;
                    $('#equipos_escogidos .content').append('<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 team-escogido" id="escogido-' + $(this).attr('data-code') + '"><div><img src="'+$(this).attr('data-url')+'" width="50" height="50"/><a class="eliminar-escogido" data-code="' + $(this).attr('data-code') + '" data-target="' + $(this).attr('id') + '"><span class="glyphicon glyphicon-remove"></span></a>&nbsp;&nbsp;&nbsp;<span>' + $(this).attr('value') + '</span></div></div>');
                }
            }
        }
    });
    revizaElegidos();
});

$(document).on('click', '#_desseleccionar_todos', function() {
    $('input.check-team').each(function(a, b) {
        var type = $(b).attr('type');
        var data_code = $(b).attr('data-code');
        if (b.checked === true) {
            b.checked = false;
            $('#escogido-' + $(this).attr('data-code')).remove();
        }
    });
    revizaElegidos();
});
var revizaElegidos = function() {
    var num_elegidos = $('#equipos_escogidos .eliminar-escogido').length;
    if (num_elegidos > 0) {
        $('#equipos_escogidos').removeAttr('style');
    } else {
        $('#equipos_escogidos').attr('style', 'display: none;');
    }
};

});

var BuscadorEquiposCheck = (function() {
    var _self = null;
    var timer_buscador = null;
    function BuscadorEquiposCheck(clase_alias_paginador, id_contend_load_data, id_form_buscador, url_load_data) {
        _self = this;
        this.process = false;
        this.id_contend_load_data = "";
        this.url_load_data = "";
        this.objpaginator = null;
        this.id_form_buscador = id_form_buscador;
        if (!validate.isEmpty(clase_alias_paginador)) {
            this.clase_alias_paginador = clase_alias_paginador;
            this.readConfigPaginator();
            if (this.objpaginator.length) {
                this.isajax = false;
                if (this.objpaginator.attr("isajax") == "true") {
                    this.isajax = true;
                }
                if (this.isajax) {
                    if (validate.isEmpty(id_contend_load_data) && validate.isEmpty(url_load_data)) {
                        alert("Debe ingresar el id sin numeral (#) del contenedor donde se van a cargar los datos del Ajax y la URL o link de donde provienen los datos.");
                        return;
                    }
                    this.id_contend_load_data = id_contend_load_data;
                    this.url_load_data = url_load_data;
                }
                this.html_initial = $("#" + this.id_contend_load_data).html();
                if ($("#" + this.id_form_buscador).length && !validate.isEmpty(this.html_initial)) {
                    if (validate.isNumeric(this.total_elementos) && validate.isNumeric(this.num_elementos_por_pagina) && validate.isNumeric(this.pagina_seleccionada) && validate.isNumeric(this.num_paginas) && validate.isNumeric(this.inicio_limit) && validate.isNumeric(this.fin_limit)) {
                        this.process = true;
                        this.loadPaginator();
                        return;
                    }
                } else {
                    alert("No se encontró el formulario del buscador o el contenedor de todo el paginador.");
                }
            }
        }
        alert("No se encontro la clase alias del paginador...");
    }

    BuscadorEquiposCheck.prototype.readConfigPaginator = function() {
        this.objpaginator = $("." + this.clase_alias_paginador);
        this.total_elementos = parseInt(this.objpaginator.attr("total_elementos"));
        this.num_elementos_por_pagina = parseInt(this.objpaginator.attr("num_elementos_por_pagina"));
        this.pagina_seleccionada = parseInt(this.objpaginator.attr("pagina_seleccionada"));
        this.num_paginas = parseInt(this.objpaginator.attr("num_paginas"));
        this.inicio_limit = parseInt(this.objpaginator.attr("inicio_limit"));
        this.fin_limit = parseInt(this.objpaginator.attr("fin_limit"));
    };

    BuscadorEquiposCheck.prototype.loadPaginator = function() {
        if (this.process && this.isajax) {
            this.events();
        }
    };

    BuscadorEquiposCheck.prototype.events = function() {
        $("." + _self.clase_alias_paginador + " .numeric").keyup(function(e) {
            if (/\D/g.test(this.value)) {
                this.value = this.value.replace(/\D/g, '');
            }
        });
        $(document).on('click', "." + this.clase_alias_paginador + " ._pag", function() {
            var pag = parseInt($(this).attr("pag"));
            if (pag != _self.pagina_seleccionada) {
                _self.getEquipos($("#" + _self.id_form_buscador + " #sel_equipo_genero").val(), $("#" + _self.id_form_buscador + " #sel_tipo_futbol").val(), $("#" + _self.id_form_buscador + " #txt_bus_equipo").val(), pag);
            }
        });
        $(document).on('click', "." + this.clase_alias_paginador + " #_btn_back", function() {
            var pag_aux = (_self.pagina_seleccionada - 1);
            if (pag_aux > 0) {
                _self.getEquipos($("#" + _self.id_form_buscador + " #sel_equipo_genero").val(), $("#" + _self.id_form_buscador + " #sel_tipo_futbol").val(), $("#" + _self.id_form_buscador + " #txt_bus_equipo").val(), pag_aux);
            }
        });
        $(document).on('click', "." + this.clase_alias_paginador + " #_btn_next", function() {
            var pag_aux = (_self.pagina_seleccionada + 1);
            if ((pag_aux > 0) && (pag_aux <= _self.num_paginas)) {
                _self.getEquipos($("#" + _self.id_form_buscador + " #sel_equipo_genero").val(), $("#" + _self.id_form_buscador + " #sel_tipo_futbol").val(), $("#" + _self.id_form_buscador + " #txt_bus_equipo").val(), pag_aux);
            }
        });
        $(document).on('click', "." + this.clase_alias_paginador + " #_btn_ir_pag", function() {
            if (validate.isNumeric($("." + _self.clase_alias_paginador + " #_txt_ir_pag").val())) {
                var pag_aux = parseInt($("." + _self.clase_alias_paginador + " #_txt_ir_pag").val());
                if ((pag_aux > 0) && (pag_aux != _self.pagina_seleccionada) && (pag_aux <= _self.num_paginas)) {
                    _self.getEquipos($("#" + _self.id_form_buscador + " #sel_equipo_genero").val(), $("#" + _self.id_form_buscador + " #sel_tipo_futbol").val(), $("#" + _self.id_form_buscador + " #txt_bus_equipo").val(), pag_aux);
                }
            }
        });
        //------------buscador equipos
        $("#" + this.id_form_buscador + " #sel_equipo_genero").on("change", function() {
            _self.getEquipos($(this).val(), $("#" + _self.id_form_buscador + " #sel_tipo_futbol").val(), $("#" + _self.id_form_buscador + " #txt_bus_equipo").val(), 1);
        });
        $("#" + this.id_form_buscador + " #sel_tipo_futbol").on("change", function() {
            _self.getEquipos($("#" + _self.id_form_buscador + " #sel_equipo_genero").val(), $(this).val(), $("#" + _self.id_form_buscador + " #txt_bus_equipo").val(), 1);
        });
        $(document).keypress(function(e) {
            if (e.which == 13) {
                return false;
            }
        });
        $("#" + _self.id_form_buscador + " #txt_bus_equipo").on('keyup', function(e) {
            e.preventDefault();
            if (e.which == 13) {
                _self.focusTimeBuscador(true);
            } else {
                _self.focusTimeBuscador();
            }
        });
    };

    BuscadorEquiposCheck.prototype.checkeaElementos = function() {
        // está funcion se creo para que cuando se buscara un equipo con alguno
        // de los tres criterios, se queden chequeados los que se chequearon inicialmente
        $('#equipos_escogidos .eliminar-escogido').each(function(i, e) {
            var data_code = $(e).attr('data-code');
            $('[data-code="' + data_code+'"]').prop("checked", true);
        });
    };
    BuscadorEquiposCheck.prototype.deshabilitaAgregadosAlTorneo = function() {
        $("input.autocomplete_team[data-code]").each(function(index, element) {
            if(!validate.isEmpty($(element).val())){
                var code = parseInt($(element).attr('data-code'));
                $('input.check-team [data-code="'+code+'"]').attr('disabled','disabled');
            }
        });
    };


    BuscadorEquiposCheck.prototype.getEquipos = function(genero, tipo, strequipo, pag) {
        var codigo_torneo = $('#codigo_torneo').val();// equipos ya agregados
        if (validate.isEmpty(genero) && validate.isEmpty(tipo) && validate.isEmpty(strequipo)) {
            this.loadPaginaInicial(pag);
            _self.checkeaElementos();
            _self.deshabilitaAgregadosAlTorneo();
        } else {
            if (validate.isNumeric(pag)) {
                $.ajax({
                    type: 'POST',
                    url: base_url + "/torneos/participantes/search_equipos_check_agregar_a_torneo",
                    data: {'genero': genero, 'tipo': tipo, 'strequipo': strequipo, 'pag': pag,'codigo_torneo':codigo_torneo},
                    beforeSend: function() {
                        $("#" + _self.id_contend_load_data).html(_self.getHtmlLoader());
                    },
                    success: function(data) {
                        if (data.hasOwnProperty("status") && data.hasOwnProperty("message") && data.hasOwnProperty("html")) {
                            if (data.status) {
                                $("#" + _self.id_contend_load_data).html(data.html);
                                _self.checkeaElementos();
                                _self.deshabilitaAgregadosAlTorneo();
                                return;
                            }
                        }
                        $("#" + _self.id_contend_load_data).html("<br><br><br><p>No se cargaron lo datos correctamente.</p>");
                    }
                });
}
}
};


BuscadorEquiposCheck.prototype.focusTimeBuscador = function(deprimera) {
    clearTimeout(timer_buscador);
    if (deprimera) {
        _self.getEquipos($("#" + _self.id_form_buscador + " #sel_equipo_genero").val(), $("#" + _self.id_form_buscador + " #sel_tipo_futbol").val(), $("#" + _self.id_form_buscador + " #txt_bus_equipo").val(), 1);
    } else {
        timer_buscador = setTimeout(function() {
            _self.getEquipos($("#" + _self.id_form_buscador + " #sel_equipo_genero").val(), $("#" + _self.id_form_buscador + " #sel_tipo_futbol").val(), $("#" + _self.id_form_buscador + " #txt_bus_equipo").val(), 1);
        }, 1000);
    }
};

BuscadorEquiposCheck.prototype.loadPaginaInicial = function(pag) {
    var codigo_torneo = $('#codigo_torneo').val();// equipos ya agregados
    if (validate.isNumeric(pag)) {
        $.ajax({
            type: 'POST',
            url: base_url + "/torneos/participantes/"+_self.url_load_data,
            data: {'pag': pag, 'codigo_torneo': codigo_torneo},
            beforeSend: function() {
                $("#" + _self.id_contend_load_data).html(_self.getHtmlLoader());
            },
            success: function(data) {
                if (data.hasOwnProperty("status") && data.hasOwnProperty("message") && data.hasOwnProperty("html")) {
                    if (data.status) {
                        $("#" + _self.id_contend_load_data).html(data.html);
                        _self.readConfigPaginator();
                        _self.checkeaElementos();
                        return;
                    }
                }
                $("#" + _self.id_contend_load_data).html("<p>No se cargaron lo datos correctamente.</p>");
            }
        });
    }
};

BuscadorEquiposCheck.prototype.getHtmlLoader = function() {
    return '<br><br><br><div class="text-center"><p>Cargando...</p><br><img class="img-thumbnail loader-medium" src="' + base_url + '/public/img/loader.gif"/></div><br><br><br>';
};
return BuscadorEquiposCheck;
})();

// -------------------------------
// -------------------------------
// -------------------------------
// SIN PAGINADOR
// var BuscadorEquiposCheck = (function() {
//     var _self = null;
//     var timer_buscador = null;

//     function BuscadorEquiposCheck(id_contend_load_data, id_form_buscador) {
//         _self = this;
//         if (!validate.isEmpty(id_contend_load_data) && !validate.isEmpty(id_form_buscador)) {
//             _self.id_form_buscador = id_form_buscador;
//             _self.id_contend_load_data = id_contend_load_data;
//             _self.html_aux = "";
//             _self.events();
//         } else {
//             alert("No se pasaron los parametros correctamente,");
//         }
//     }

//     BuscadorEquiposCheck.prototype.events = function() {
//         //------------buscador equipos
//         _self.html_aux = $("#" + _self.id_contend_load_data).html();

//         $("#" + this.id_form_buscador + " #sel_equipo_genero").on("change", function() {
//             _self.getEquipos($(this).val(), $("#" + _self.id_form_buscador + " #sel_tipo_futbol").val(), $("#" + _self.id_form_buscador + " #txt_bus_equipo").val());
//         });
//         $("#" + this.id_form_buscador + " #sel_tipo_futbol").on("change", function() {
//             _self.getEquipos($("#" + _self.id_form_buscador + " #sel_equipo_genero").val(), $(this).val(), $("#" + _self.id_form_buscador + " #txt_bus_equipo").val());
//         });
//         $("#" + _self.id_form_buscador + " #txt_bus_equipo").on('keyup', function() {
//             _self.focusTimeBuscador();
//         });
//     };

//     BuscadorEquiposCheck.prototype.checkeaElementos = function() {
//         // está funcion se creo para que cuando se buscara un equipo con alguno
//         // de los tres criterios, se queden chequeados los que se chequearon inicialmente
//         $('#equipos_escogidos .eliminar-escogido').each(function(i, e) {
//             var data_code = $(e).attr('data-code');
//             $('[data-code="' + data_code+'"]').prop("checked", true);
//         });
//     };

//     BuscadorEquiposCheck.prototype.focusTimeBuscador = function() {
//         clearTimeout(timer_buscador);
//         timer_buscador = setTimeout(function() {
//             _self.getEquipos($("#" + _self.id_form_buscador + " #sel_equipo_genero").val(), $("#" + _self.id_form_buscador + " #sel_tipo_futbol").val(), $("#" + _self.id_form_buscador + " #txt_bus_equipo").val());
//         }, 1000);
//     };

//     BuscadorEquiposCheck.prototype.getEquipos = function(genero, tipo, strequipo) {
//         if (validate.isEmpty(genero) && validate.isEmpty(tipo) && validate.isEmpty(strequipo)) {
//             $("#" + _self.id_contend_load_data).html(_self.html_aux);
//             _self.checkeaElementos();
//         } else {
//             $.ajax({
//                 type: 'POST',
//                 url: base_url + "/torneos/participantes/search_equipos_check_agregar_a_torneo",
//                 data: {
//                     'genero': genero,
//                     'tipo': tipo,
//                     'strequipo': strequipo
//                 },
//                 beforeSend: function() {
//                     $("#" + _self.id_contend_load_data).html(_self.getHtmlLoader());
//                 },
//                 success: function(data) {
//                     if (data.hasOwnProperty("status") && data.hasOwnProperty("message") && data.hasOwnProperty("html")) {
//                         if (data.status) {
//                             $("#" + _self.id_contend_load_data).html(data.html);
//                             _self.checkeaElementos();
//                             return;
//                         }
//                     }
//                     $("#" + _self.id_contend_load_data).html("<br><br><br><p>No se cargaron lo datos correctamente.</p>");
//                 }
//             });
//         }
//     };

//     BuscadorEquiposCheck.prototype.getHtmlLoader = function() {
//         return '<br><br><br><div class="text-center"><p>Cargando...</p><br><img class="img-thumbnail loader-medium" src="' + base_url + '/public/img/loader.gif"/></div><br><br><br>';
//     };
//     return BuscadorEquiposCheck;
// })();

// // ---------------------
