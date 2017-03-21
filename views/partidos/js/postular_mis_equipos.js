$(document).ready(function() {
//variable apara limite de postulados
//este numero debe ser igual a el limitFin de postulados, 
//en la función deatalleDelPartido(); en equiposController
    var postulados = 5;
//-----------
    $(document).on('click', '[name="add_equi_torneo"]', function() {
        var cod_team = $(this).attr('data-code');
        var name = $(this).attr('value');

        $('[data-code="' + cod_team + '"]').each(function(a, b) {
            var type = $(b).attr('type');

            //validando que solo se agreguen el número de equipos permitido
            var numOfTeamsAdd = $("#teams-selected p a").length + 1;
            var numOfTeamsChecked = $('[type="checkbox"]:checked').length;
            var numOfTeamsPostulate = $('.p-postulated').length;
            var numOfavailablePostulates = postulados - numOfTeamsPostulate;
            if (type === "checkbox") {
                if (b.checked === false) {
                    if ($('#teams-selected p a').length === 1) {
                        $('#teams-selected').attr('style', 'display: none;');
                        $('.btn-teams-selected').attr('style', 'display: none;');
                        $('#_btn_agregar_equipos_toreno').attr('style', 'display: none;');

                        $('.info-match').attr('style', 'display: none;');
                        $('.contend_asignar_euipos').removeAttr('style');
                        $('#_info_match').attr('style', 'display: none');
                        $('#_buscador_equipo').removeAttr('style');
                    }
                    $('.p-team-' + cod_team).remove();
                } else {
                    if (numOfTeamsChecked <= numOfavailablePostulates && numOfTeamsAdd <= numOfavailablePostulates) {
                        $('#teams-selected').attr('style', 'display: none;');
                        $('#teams-selected').append('<p class="p-team-' + cod_team + '"><a id="' + cod_team + '" class="delete-team glyphicon-delete-teams"><span class="glyphicon glyphicon-remove-circle"></span></a>' + name + '</p>');
                        $('.btn-teams-selected').removeAttr('style');
                    }
                    else {
                        b.checked = false;
                        component.messageSimple("Partido", 'Se ha superado el numero máximos de equipos disponibles a postular.', 'warning');
                    }
                }
            }
        });
    });


    $("#btn-postulate-teams").on('click', function() {
        component.popupHtml("Escoger equipos", "popup_asignar_euipos_torneo_body", "popup_asignar_euipos_torneo_footer", "popup_big");
        $.ajax({
            type: 'POST',
            url: base_url + '/torneos/participantes/getMyteams',
            success: function(data) {
                console.log(data.html);
                if (data.hasOwnProperty("html") && data.hasOwnProperty("status") && data.hasOwnProperty("message")) {
                    if (data.status) {
                        $(".contend_asignar_euipos").html(data.html);
                        var existTeams = $(".contend_asignar_euipos .checkbox").html();
                        if (existTeams == "" || existTeams == null) {
                            $(".contend_asignar_euipos").html('<p class="text-center" style="margin-top: 3%;">En este momento no tienes equipos.</p>')
                        }
                        var bec = new BuscadorEquiposCheck("_container-lits-check", "_buscador_equipo");
                        $('#div-select-type-match').remove();
                        $('#title_for_type').html('Nuevos postulados');

                        $(document).on('click', '.btn_create-match-private', function() {
                            $('#_popup_html_big .contend_asignar_euipos').show();
                            $('#div-select-type-match').hide();
                            $('#select-match-tempo').hide();
                            $('#input_type_match').val('1');
                        });
                        $(document).on('click', '.btn_create-match-public', function() {
                            $('#_info_match').removeAttr('style');
                            $('.contend_asignar_euipos').removeAttr('style');
                            $('#_popup_html_big .modal-body').removeAttr('style');
                            $('#_buscador_equipo').hide();
                            $('#_container-lits-check').hide();
                            $('#btn_back').hide();
                            $('#title_for_type').css({'margin-left': '12%'});
                            $('#title_for_type').html('Nuevo partido público');
                            $('#div-select-type-match').hide();
                            $('#select-match-tempo').hide();
                            $('#input_type_match').val('2');
                        });
                        $('.modal-footer').each(function() {
                            $(this).attr('style', 'border-top: 0px');
                        });
                        $('#_btn_agregar_equipos_toreno').attr('style', 'display: none');

                        $('#_popup_html_big .modal-body').before('<div id="teams-selected" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 teams-selected" style="display: none;"><p class="text-right"><span class="glyphicon glyphicon-remove close-teams"></span></p><h4 class="text-center">¿Desea agregar estos equipos?</h4></div>');
                        $('#_popup_html_big .modal-body').before('<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 btn-teams-selected" style="display: none;"><button id="btn-teams-selected" class="btn btn-default">Equipos a postular</button></div>');

                        //elimina el equipo local para que no lo escoja
                        var team_local = $('#cod_team').val();
                        $('[data-code="' + team_local + '"]').attr('disabled', 'disabled');
                        $('.team-check-'+team_local).remove();
                        //deshabiltar postulados existentes 
                        disabledPostulate();
                    } else {
                        $(".contend_asignar_euipos").html(data.message);
                    }
                } else {
                    $(".contend_asignar_euipos").html("No se cargaron los datos correctamente.");
                }
            }

        });

    });
    $(document).on('click', '.close-teams', function() {
        $('#teams-selected').attr('style', 'display: none;');
        $('.btn-teams-selected').removeAttr('style');
    });
    $(document).on('click', '#_btn_crear_partido', function() {
        var pasa = false;
        pasa = validandoPartido($("#date_of_match").val(), "date_of_match");
        pasa = validandoPartido($("#description_of_match").val(), "description_of_match");
        pasa = validandoPartido($("#complex").val(), 'complex');
        $('.span-error').fadeIn(2000, function() {
            $(this).fadeOut('slow');
        });
        if (pasa) {
            var fechayhora = $("#date_of_match").val();
            var descripcion = $("#description_of_match").val();
            var team_local = $('#team_local').val();
            var complejo = $("#complex").val();
            if (!validate.isEmpty(team_local) && !validate.isEmpty(fechayhora) && !validate.isEmpty(descripcion) && !validate.isEmpty(complejo)) {
                crear_partido(team_local, fechayhora, descripcion, complejo);
            }
        }
    });
    $(document).on("keyup", '#_info_match textarea', function() {
        var val_of_input = $(this).val();
        if (!validate.isEmpty(val_of_input)) {
            validandoPartido(val_of_input, $(this).attr('id'));
        }
    });
    $(document).on("focusout", '#_info_match input', function() {
        var val_of_input = $(this).val();
        if (!validate.isEmpty(val_of_input)) {
            validandoPartido(val_of_input, $(this).attr('id'));
        }
    });

    $(document).on('click', '.delete-team', function() {
        var id_team = $(this).attr('id');
        $('.p-team-' + id_team).remove();
        if ($('#teams-selected p a').length === 0) {
            $('#teams-selected').attr('style', 'display: none;');
            $('.info-match').attr('style', 'display: none;');
            $('.contend_asignar_euipos').removeAttr('style');
            $('#_info_match').attr('style', 'display: none');
            $('#_buscador_equipo').removeAttr('style');
            $('#_btn_agregar_equipos_toreno').attr('style', 'display: none;');
        }
        $('[data-code="' + id_team + '"]').each(function(i, e) {
            var type = $(e).attr('type');
            if (type === "checkbox") {
                e.checked = false;
            }
        });
    });

    $(document).on('click', '.btn-teams-selected', function() {
        $(this).attr('style', 'display: none;');
        $('#teams-selected').removeAttr('style');
        var tempTeamsSelected = $('.teams-selected p a').length + 2;

        $('#btn_agreagar_postulados').remove();
        $('.teams-selected p:nth-child(' + tempTeamsSelected + ')').after('<button id="btn_agreagar_postulados" type="button" class="btn btn-primary btn-add-postulate">Agregar</button>');
    });

    $(document).on('click', '#btn_agreagar_postulados', function() {
        var teams = new Array();
        var cod_game = $('#cod_game').val();
        $("#teams-selected p a").each(function(b, e) {
            var id = $(e).attr('id');
            teams.push(id);
        });
        postular_equipos(cod_game, teams);
    });

    $(document).on('click', '#_btn_agregar_equipos_toreno', function() {
        $('#_popup_html_big').animate({
            easing: $('.contend_asignar_euipos').attr('style', 'border: 4px solid; border-radius: 12px; padding: 12px; padding-bottom: 1px;'),
            scrollTop: 0
        }, 800);
        $('#_info_match').removeAttr('style');
        $('#_buscador_equipo').attr('style', 'display: none');

        $('#btn_back').click(function() {
            $('.contend_asignar_euipos').removeAttr('style');
            $('#_info_match').attr('style', 'display: none');
            $('#_buscador_equipo').removeAttr('style');
        });
        $('#teams-selected').attr('style', 'display: none;');
        $('.btn-teams-selected').removeAttr('style');
    });
    
    $(document).on('click', '.delete-postulated', function() {
        var cod_selected = $(this).attr('data-code');
        $('#cod_selected').val(cod_selected);

        $('#postulados').modal('hide');
        $('#rechazar_postulado').modal('show');
    });
    $(document).on('click', '#reject_postulate_team', function() {
        var cod_postulate = $('#cod_selected').val();
        if (cod_postulate !== "") {
            rejectPostulate(cod_postulate);
        }
    });
    //----------------

    function disabledPostulate() {
        //deshablita los postulados existentes
        var numOfPostulatesExisting = $('.delete-postulated').length;
        for (var i = 0; i < numOfPostulatesExisting; i++) {
            var id_team = $('.delete-postulated')[i]['id'];
            $('[data-code="' + id_team + '"]').each(function(i, e) {
                $(e).attr('disabled', 'disabled');
            });
        }
    }
    function postular_equipos(cod_game, teams) {
        $.ajax({
            type: 'POST',
            url: base_url + '/equipos/agregar_postulados',
            data: {'cod_game': cod_game, 'teams': teams},
            beforeSend: function() {
//                console.log('enviando');
            },
            success: function(data) {
                if (data.status === true) {
                    console.log(data);
                    if (data.status === true) {
                        component.messageSimple("Mensaje", data.message, 'success');
                        $(document).on('click', '.btn-success', function() {
                            setTimeout("window.location.reload();", 100);
                        });
                    }
                } else {
                    component.messageSimple("Mensaje", data.message, 'warning');
                    $(document).on('click', '.btn-warning', function() {
                        setTimeout("window.location.reload();", 100);
                    });
                }
            },
            error: function() {
                component.messageSimple("Mensaje", 'Hay un error al enviar', 'danger');
                $(document).on('click', '.btn-danger', function() {
                    setTimeout("window.location.reload();", 100);
                });
            }
        });
    };
    function rejectPostulate(cod_postulate) {
        $.ajax({
            type: 'POST',
            url: base_url + "/equipos/reject_postulate",
            data: {'cod_postulate': cod_postulate},
            success: function(data) {
                if (data.status === true) {
                    component.messageSimple("Partido", 'Se ha eliminado el equipo postulado.', 'success');
                    $(document).on('click', '.btn-success', function() {
                        setTimeout("window.location.reload();", 100);
                    });
                }
                if (data.status === false) {
                    component.messageSimple("Partido", data.message, "danger");
                }
            },
            error: function() {
                console.log('hay unerror');
            }
        });
    };
});


var BuscadorEquiposCheck = (function() {
    var _self = null;
    var timer_buscador = null;
    function BuscadorEquiposCheck(id_contend_load_data, id_form_buscador) {
        _self = this;
        if (!validate.isEmpty(id_contend_load_data) && !validate.isEmpty(id_form_buscador)) {
            _self.id_form_buscador = id_form_buscador;
            _self.id_contend_load_data = id_contend_load_data;
            _self.html_aux = "";
            _self.events();
        } else {
            alert("No se pasaron los parametros correctamente,");
        }
    }
    BuscadorEquiposCheck.prototype.events = function() {
        //------------buscador equipos
        _self.html_aux = $("#" + _self.id_contend_load_data).html();

        $("#" + this.id_form_buscador + " #sel_equipo_genero").on("change", function() {
            _self.getEquipos($(this).val(), $("#" + _self.id_form_buscador + " #sel_tipo_futbol").val(), $("#" + _self.id_form_buscador + " #txt_bus_equipo").val());
        });
        $("#" + this.id_form_buscador + " #sel_tipo_futbol").on("change", function() {
            _self.getEquipos($("#" + _self.id_form_buscador + " #sel_equipo_genero").val(), $(this).val(), $("#" + _self.id_form_buscador + " #txt_bus_equipo").val());
        });
        $("#" + _self.id_form_buscador + " #txt_bus_equipo").on('keyup', function() {
            _self.focusTimeBuscador();
        });
    };

    BuscadorEquiposCheck.prototype.focusTimeBuscador = function() {
        clearTimeout(timer_buscador);
        timer_buscador = setTimeout(function() {
            _self.getEquipos($("#" + _self.id_form_buscador + " #sel_equipo_genero").val(), $("#" + _self.id_form_buscador + " #sel_tipo_futbol").val(), $("#" + _self.id_form_buscador + " #txt_bus_equipo").val());
        }, 1000);
    };
    BuscadorEquiposCheck.prototype.checkeaElementos = function() {
        //para dejar checkeados los equipos que estaban ckeckeados
        $('#teams-selected p a').each(function(i, e) {
            var cod_team = $(this).attr('id');
            $('[data-code="' + cod_team + '"]').each(function(a, b) {
                var type = $(b).attr('type');
                if (type === "checkbox") {
                    b.checked = true;
                }
            });
        });
    };
    BuscadorEquiposCheck.prototype.deleteTeamLocal = function() {
        //elimina el equipo local para que no lo escoja
        var team_local = $('#cod_team').val();
        $('[data-code="' + team_local + '"]').attr('disabled', 'disabled');
        $('.team-check-'+team_local).remove();
    };

    BuscadorEquiposCheck.prototype.disabledPostulate = function() {
        //deshablita los postulados existentes
        var numOfPostulatesExisting = $('.delete-postulated').length;
        for (var i = 0; i < numOfPostulatesExisting; i++) {
            var id_team = $('.delete-postulated')[i]['id'];
            $('[data-code="' + id_team + '"]').each(function(i, e) {
                $(e).attr('disabled', 'disabled');
            });
        }
    };
    BuscadorEquiposCheck.prototype.getEquipos = function(genero, tipo, strequipo) {
        if (validate.isEmpty(genero) && validate.isEmpty(tipo) && validate.isEmpty(strequipo)) {
            $("#" + _self.id_contend_load_data).html(_self.html_aux);
            _self.checkeaElementos();
            _self.deleteTeamLocal();
            _self.disabledPostulate();
        } else {
            $.ajax({
                type: 'POST',
                url: base_url + "/torneos/participantes/search_mis_equipos_check",
                data: {'genero': genero, 'tipo': tipo, 'strequipo': strequipo},
                beforeSend: function() {
                    $("#" + _self.id_contend_load_data).html(_self.getHtmlLoader());
                },
                success: function(data) {
                    if (data.hasOwnProperty("status") && data.hasOwnProperty("message") && data.hasOwnProperty("html")) {
                        if (data.status) {
                            $("#" + _self.id_contend_load_data).html(data.html);
                            _self.checkeaElementos();
                            _self.deleteTeamLocal();
                            _self.disabledPostulate();
                        }
                        return;
                    }
                    $("#" + _self.id_contend_load_data).html("<br><br><br><p>No se cargaron lo datos correctamente.</p>");
                }
            });
        }
    };

    BuscadorEquiposCheck.prototype.getHtmlLoader = function() {
        return '<br><br><br><div class="text-center"><p>Cargando...</p><br><img class="img-thumbnail loader-medium" src="' + base_url + '/public/img/loader.gif"/></div><br><br><br>';
    };
    return BuscadorEquiposCheck;
})();
