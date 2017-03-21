
//XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
$(document).ready(function() {
    init();
    //----------------------------------------------
    $('#btn_acep_postule').on('click', function() {
        postularJugador($(this).attr('rel'));
    });
    //----------------------------------------------
    $('#pru').click(function() {
        fancybox().close();
    });
});

//XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
function init() {
    popupMsgAceptar($('#text_msg_postula').val());
    var mn = new MensariaNotificaciones();
}

var MensariaNotificaciones = (function() {
    function MensariaNotificaciones() {
        this.events();
    }
    MensariaNotificaciones.prototype.events = function() {
        //abrir popup enviar mensaje
        $(document).on('click', '.btn_enviar_msg_team', function() {
            component.popupHtml("Enviar mensaje Equipo", "popup_msg_team_body", "popup_msg_tem_footer");
        });

        $(document).on('click', '#_btn_enviar_msg_team', function() {
            //obtengo los datos del form del mensaje    
            var asunto = $('input[name="asunto"]').val();
            var msg = $('#msg_usuario_team').val();
            var team_to = $('input[name="cod_team_msg"]').val();

            //valido si que el mensaje no este vacio
            if (validate.isEmpty(msg)) {
                component.alertComponent("El mensaje no puede estar vacio", "msg_for_team", "danger");
            } else {
                console.log("entra");
                //window.location.reload();
                $.ajax({
                    type: 'POST',
                    url: base_url + '/equipos/sendmessageteam',
                    data: {'asunto': asunto,
                        'msg': msg,
                        'team_to': team_to
                    },
                    success: function(data) {
                        console.log(data);
                        component.alertComponent("Mensaje Enviado", "msg_for_team", "alert-success");
                        setTimeout(function() {
                            component.popupHtmlHide();
                            window.location.reload();
                        }, 1000);
                    }
                });
            }
        });

//eliminar mensajes por grupo
        $(document).on('click', '.glyphicon-remove-sign', function() {
            var cod_elimi_message = $(this).attr('data-user');
            $.ajax({
                type: 'POST',
                url: base_url + '/equipos/deletemsgteam',
                data: {'cod_elimi_message': cod_elimi_message},
                success: function(data) {
                    console.log(data);
                    if (data.hasOwnProperty("status") && data.hasOwnProperty("message")) {
                        if (data.status) {
                            $('#msg_grupo tr[trmsg="' + cod_elimi_message + '"]').remove();
                        }
                    }
                }
            });

        });
    };
    return MensariaNotificaciones;
})();

function postularJugador(rel) {
    $.ajax({
        dataType: "json",
        async: true,
        type: 'POST',
        url: base_url + '/equipos/postularJugador/',
        data: {'team': rel},
        success: function(succesData) {
            if (succesData.retorno) {
                $.fancybox.close();
                component.messageSimple("Equipos", 'Has sido postulado a este equipo. Solo espera a que te acepten.');
                component.reload();
            } else {
                component.messageSimple("Equipos", 'No se pudo postular por favor inténtelo de nuevo.', "danger");
            }
        },
        timeout: 10000,
        error: function() {
            component.messageSimple("Equipos", 'No se pudo postular por favor inténtelo de nuevo.', "danger");
        }
    });
}

function popupMsgAceptar(text_msg) {
    $('#msg_popup').html(text_msg);
}

var EstadisticasEquipo = function() {
    var base = this;
    this.contends_partidos = "#equipo_body_";
    this.contend_estadisticas = ".contend-estadistica-partido";

    this.init = function() {
        this.events();
    };

    this.events = function() {
        $("#pes_general").on("click", function() {
            $("#pes_torneos").removeClass("active");
            $(this).addClass("active");
            $("#contend-torneos").hide();
            $("#contend-general").show("slow");
        });
        //***************
        $("#pes_torneos").on("click", function() {
            $("#pes_general").removeClass("active");
            $(this).addClass("active");
            $("#contend-general").hide();
            $("#contend-torneos").show("slow");
        });
        //***************
        $("#btn_mas_estadisticas").on("click", function() {
            base.masestadisticas();
        });
        //***************
        $(".rango-torneo").on("click", function() {
            console.log("rango torneo");
            var thiselement = $(this);
            $(this).unbind("click");
            base.getPartidosTorneo(thiselement.attr("torneo"), thiselement.attr("equipo"), thiselement.attr("index"));
        });
        //****************
        $(document).on('click', '.btn-statistic-index', function() {
            component.popupHtml("Estadisticas", "popup_estadisticas_partido", "", true);
            var partido = $(this).attr("partido");
            var equipo = $(this).attr("equipo");
            setTimeout(function() {
                base.getEstadisticasPorPartidosEquipo(partido, equipo);
            }, 1000);
        });
        //****************
        $(document).on('click', '.btn-statistic-by-torneo-team', function() {
            var torneo = $(this).attr("torneo");
            var equipo = $(this).attr("equipo");
            if (validate.isNumeric(torneo) && validate.isNumeric(equipo)) {
                component.popupHtml("Estadisticas", "popup_estadisticas_partido", "", true);
                setTimeout(function() {
                    base.getEstadisticasPorTorneoEquipo(torneo, equipo);
                }, 1000);
            }
        });

    };

    this.masestadisticas = function() {
        component.popupHtml("Mas estadisticas", "popup_mas_estadisticas", "", true);
    };

    this.getPartidosTorneo = function(torneo, equipo, index) {
        if (validate.isNumeric(torneo) && validate.isNumeric(equipo) && validate.isNumeric(index)) {
            $.ajax({
                type: 'POST',
                url: base_url + '/perfil/estadisticaspartidos/',
                data: {
                    'torneo': torneo,
                    'equipo': equipo,
                    'onlyteam': true
                },
                success: function(data) {
                    if (data.hasOwnProperty('html')) {
                        $(base.contends_partidos + index).empty().html(data.html);
                    }
                }
            });
        }
    };

    this.getEstadisticasPorPartidosEquipo = function(partido, equipo) {
        if (validate.isNumeric(partido) && validate.isNumeric(equipo)) {
            $.ajax({
                type: 'POST',
                url: base_url + '/perfil/estadisticasporpartidoequipo/',
                data: {
                    'partido': partido,
                    'equipo': equipo
                },
                success: function(data) {
                    if (data.hasOwnProperty('html')) {
                        $(base.contend_estadisticas).empty().html(data.html);
                    }
                }
            });
        }
    };

    this.getEstadisticasPorTorneoEquipo = function(torneo, equipo) {
        if (validate.isNumeric(torneo) && validate.isNumeric(equipo)) {
            $.ajax({
                type: 'POST',
                url: base_url + '/perfil/estadisticasportorneoequipo/',
                data: {'torneo': torneo, 'equipo': equipo},
                success: function(data) {
                    if (data.hasOwnProperty('html')) {
                        $(base.contend_estadisticas).empty().html(data.html);
                    }
                }
            });
            return true;
        }
        return false;
    };
};