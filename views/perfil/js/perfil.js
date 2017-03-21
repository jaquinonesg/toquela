$(document).ready(function() {
    var galeryphoto = new GaleryPhoto();
    galeryphoto.init();

    var mnp = new MensariaNotificacionesPerfil();
});

var MensariaNotificacionesPerfil = (function() {
    function MensariaNotificacionesPerfil() {
        this.events();
    }

    MensariaNotificacionesPerfil.prototype.events = function() {
        $('.ir-notificacion').click(function() {
            var protocolo = location.protocol;
            var host = location.host;
            var url = protocolo+'//'+host+$(this).attr('data-link');
            var cod_notification = $(this).attr('data-user');
            $.ajax({
                type: 'POST',
                url: base_url + '/perfil/notificationVisited',
                data: {'codnotification': cod_notification},
                beforeSend: function(){
                    component.popupLoader("Participantes", "");
                },
                success: function(data){
                    component.popupHtmlHide();
                        // va a la notificación
                        console.log(data.message);
                        location.replace(url);
                }
            });
        });
        $("#btn_seguir").click(function() {
            var btn = $(this);
            var user = $(this).attr('data-user');
            var coduser = $(this).attr('cod-user');
            var accion = $(this).attr('data-accion');
            $.ajax({
                type: 'POST',
                url: base_url + '/perfil/follow',
                data: {
                    'user': user,
                    'action': accion
                },
                success: function(data) {
                    try {
                        if (data.error == false || data.error == undefined) {
                            btn.text(data.text);
                            btn.attr({'data-accion': data.accion});
                            btn.removeClass('btn-success');
                            btn.removeClass('btn-primary');
                            switch (data.accion) {
                                case "delete":
                                    btn.addClass('btn-primary');
                                    break;
                                case "save" :
                                    btn.addClass('btn-success');
                            }
                        } else {
                            console.log('errores en ejecucuon ', data);
                        }

                    } catch (e) {
                        console.log(e)
                        alert("error leyendo Json");
                    }
                }
            });
        });
        //abrir popup enviar mensaje
        $(document).on('click', '.btn_enviar_msg_user', function() {
            component.popupHtml("Enviar mensaje", "popup_msg_body", "popup_msg_footer");
            setTimeout(function() {
                var name = null;
                $(".autocomplete_msg").autocomplete({
                    source: base_url + "/perfil/autocompletemensaje/",
                    minLength: 2,
                    select: function(event, ui) {
                        $(this).val(ui.item.label);
                        name = ui.item.label;
                        $(this).attr('data-code', ui.item.value);
                    },
                    close: function(event, ui) {
                        $(this).val(name);
                    }
                });
            }, 1000);
        });
        //abrir popup ver mensaje
        $(document).on('click', '.btn_ver_msg_user', function() {
            component.popupHtml("Mensajes", "popup_ver_msg_body", "popup_ver_msg_footer", true);
            var cod_user_from = $(this).attr('data-user');
            $.ajax({
                type: 'POST',
                url: base_url + '/perfil/msgporusuario/',
                data: {'cod_user_from': cod_user_from},
                success: function(data) {
                    if (data.hasOwnProperty("html") && data.hasOwnProperty("status") && data.hasOwnProperty("message")) {
                        if (data.status) {
                            $(".contend_msg_user").html(data.html);
                        } else {
                            $(".contend_msg_user").html(data.message);
                        }
                    } else {
                        $(".contend_msg_user").html("No se cargaron los datos correctamente.");
                    }
                }
            });
        });
        //eliminar mensajes
        $(document).on('click', '#delete_msg', function() {
            var cod_elimi_message = $(this).attr('data-user');
            $.ajax({
                type: 'POST',
                url: base_url + '/perfil/deletemsguser',
                data: {'cod_elimi_message': cod_elimi_message},
                success: function(data) {
                    if (data.hasOwnProperty("status") && data.hasOwnProperty("message")) {
                        if (data.status) {
                            $('.contend_msg_user div[trmsg="' + cod_elimi_message + '"]').remove();
                        }
                    }
                }
            });
        });
        /*
         * Enviar Mensaje
         */
        $(document).on('click', '#_btn_enviar_msg_user', function() {
//obtengo los datos del form del mensaje    
            var asunto = $('input[name="asunto"').val();
            var msg = $('#msg_usuario_msg').val();
            var user_to = $("#_user_complete").attr('data-code');
            //valido si que el mensaje no este vacio
            if (validate.isEmpty(msg)) {
                component.alertComponent("El mensaje no puede estar vacio", "msg_for_msg", "danger");

            } else if (validate.isEmpty(user_to)) {
                component.alertComponent("El destinatario no puede estar vacio", "msg_for_msg", "danger");
            } else {
                $.ajax({
                    type: 'POST',
                    url: base_url + '/perfil/sendmessage',
                    data: {'asunto': asunto,
                        'msg': msg,
                        'user_to': user_to
                    },
                    success: function(data) {
                        component.alertComponent("Mensaje Enviado", "msg_for_msg", "alert-success");
                        setTimeout(function() {
                            component.popupHtmlHide();
                        }, 1000);
                    }
                });
            }
        });
        //eliminar contador de notificaciones 
        $(document).on('click', '.ver_notifications', function() {
            var cod_update_noti = $(this).attr('data-user');
            $.ajax({
                type: 'POST',
                url: base_url + '/perfil/updateviewednotification',
                data: {'cod_update_noti': cod_update_noti},
                succes: function(data) {
                    console.log(data);
                }
            });
        });
        //eliminar notificaciones  
        $(document).on('click', '#delete_one_notification', function() {
            var cod_elimi_notifi = $(this).attr('data-user');
            $.ajax({
                type: 'POST',
                url: base_url + '/perfil/deletenotificationuser',
                data: {'cod_elimi_notifi': cod_elimi_notifi},
                beforeSend: function() {
                    component.popupLoader("Participantes", "Espere un momento mientras se elimina la notificación");
                },
                success: function(data) {
                    if (data.hasOwnProperty("status") && data.hasOwnProperty("message")) {
                        if (data.status) {
                            component.popupHtmlHide();
                            $('.contend_notifications_user div[trnotiuser="' + cod_elimi_notifi + '"]').remove();
                        }else{
                            component.messageSimple('Mensaje','No se pudo realizar la acción.','default');
                        }
                    }
                }
            });
        });
        //eliminar todas las notificaciones
        $(document).on('click', '#delte_all_notifications', function() {
            var cod_user_delete_all_notifi = $(this).attr('data-user');
            var deleteall = function() {
                $.ajax({
                    type: 'POST',
                    url: base_url + '/perfil/deleteallnotification',
                    data: {'cod_user_delete_all_notifi': cod_user_delete_all_notifi},
                    success: function(data) {
                        if (data.hasOwnProperty("status") && data.hasOwnProperty("message")) {
                            if (data.status) {
                                $('#misnotifi').html("Todas las notificaciones han sido removidas");
                            }
                        }
                    }
                });
            };
            component.messageAcept("MENSAJE", "¿Esta seguro que desea eliminar todas las Notificaciones?", deleteall, "danger");
        });
        /*
         * Elimnar todos los mensajes
         */
        $(document).on('click', '#delte_all_messages', function() {
            var cod_from = $("#_user_from").val();
            var deleteallmessages = function() {
                $.ajax({
                    type: 'POST',
                    url: base_url + '/perfil/deleteallmessages',
                    data: {'cod_from': cod_from},
                    success: function(data) {
                        if (data.hasOwnProperty("status") && data.hasOwnProperty("message")) {
                            if (data.status) {
                                $('#notificaciones_msg tr[cod_from="' + cod_from + '"]').remove();
                            }
                        }
                    }
                });
            };
            component.popupHtmlHide();
            setTimeout(function() {
                component.messageAcept("MENSAJE", "¿Esta seguro que desea eliminar todas las Notificaciones?", deleteallmessages, "danger");
            }, 1000);
        });
    };
    return MensariaNotificacionesPerfil;
})();
/*
 * Paginador Notifications
 * @returns {undefined}
 */
$(function() {
    var paginacion = $('div#paginador');
    //Ocultar Paginador
    paginacion.hide();
    jQuery.ias({
        container: '#misnotifi',
        item: '.item',
        pagination: '#paginador',
        next: '.next ',
        triggerPageThreshold: 5,
    });
});
/*
 * Pagindor Actividades
 * @returns {undefined}
 */
$(function() {
    var paginacion = $('div#paginador_activi');
    //Ocultar Paginador
    paginacion.hide();
    jQuery.ias({
        container: '#misactivi',
        item: '.itemactidades',
        pagination: '#paginador_activi',
        next: '.next ',
        triggerPageThreshold: 6,
    });
});
var Perfil = function() {
    var base = this;
    this.primer_valida_password = true;
    this.init = function() {
        $('#datebirth').datepicker();
        this.events();
    };
    this.events = function() {
        $("#pes_mis_datos").on("click", function() {
            $("#pes_datos_adicionales").removeClass("active");
            $(this).addClass("active");
            $("#contend-datos-adicionales").hide();
            $("#contend-mis-datos").show("slow");
        });
        //-----------------
        $("#pes_datos_adicionales").on("click", function() {
            $("#pes_mis_datos").removeClass("active");
            $(this).addClass("active");
            $("#contend-mis-datos").hide();
            $("#contend-datos-adicionales").show("slow");
        });
        //-----------------
        $("#_btn_update_adtional").on("click", function() {
            if (base.validateAdtionalData()) {
                $("#form_data_aditional").submit();
            }
        });
        //-----------------
        $("#btn_change_password").on("click", function() {
            if (base.validaChangePassword()) {
                $("#form_change_password").submit();
            }
        });
        //-----------------
        $("#clave").on("keyup", function() {
            if ($(this).val().length >= 14) {
                if (base.primer_valida_password) {
                    component.messageSimple("Cambiar contraseña", "Por favor ingrese una contraseña que no supere 15 caracteres.", "danger");
                    base.primer_valida_password = false;
                }
            }
            $("#num_caracter_clave").html($(this).val().length);
        });
        //-----------------
        $("#reclave").on("keyup", function() {
            $("#num_caracter_reclave").html($(this).val().length);
        });
        //---------------
        $("#btn_load_canchita").on("click", function() {
            component.popupHtml("Posición favorita", "popup_canchita_body", "popup_canchita_footer", true);
            setTimeout(base.loadCanchita(100, 300), 1000);
        });
    };
    this.validaChangePassword = function() {
        if (validate.isEmpty($("#clave").val())) {
            component.messageSimple("Cambiar contraseña", "Por favor ingrese una contraseña que no supere 15 caracteres.", "danger");
            return false;
        }
        if (validate.isEmpty($("#reclave").val())) {
            component.messageSimple("Cambiar contraseña", "Por favor repita la contraseña anterior.", "danger");
            return false;
        }
        if (($("#clave").val().length > 15) || ($("#reclave").val().length > 15)) {
            component.messageSimple("Cambiar contraseña", "La contraseña no puede superar 15 caracteres, por favor inténtelo de nuevo.", "danger");
            return false;
        }
        if ($("#clave").val() != $("#reclave").val()) {
            component.messageSimple("Cambiar contraseña", "Las contraseñas ingresadas no coinciden, por favor inténtelo de nuevo.", "danger");
            return false;
        }
        return true;
    };
    this.validateAdtionalData = function() {
        return true;
    };
    this.loadPestanaDatosAdicionales = function() {
        $("#pes_datos_adicionales").trigger("click");
    };
    this.loadCanchita = function(widthcontend, heightcontend) {
        console.log(widthcontend, heightcontend);
    };
};
var GaleryPhoto = function() {
    var base = this;
    this.init = function() {
        this.events();
    };
    this.events = function() {
        $('.delete_foto_user').on('click', function() {
            base.deletephoto($(this).attr("index"));
        });
        $(".sube_photo").on('click', function() {
            base.subephoto();
        });
        $('.delete_video_user').on('click', function() {
            base.deletevideo($(this).attr("index"));
        });
        $(".sube_video").on('click', function() {
            base.subevideo();
        });
    };
    this.subephoto = function() {
        if (validate.isEmpty($("#input_file_photo").val())) {
            component.messageSimple("Mis Fotos", "Por favor seleccione una foto o imagen.", "danger");
        } else {
            $("#form_upload_photo").submit();
            component.popupLoader("Mis Fotos", "Por favor espere un momento mientras se sube la foto...");
        }
    };
    this.subevideo = function() {
        if (validate.isEmpty($("#txt_sube_video").val())) {
            component.messageSimple("Mis Videos", "Por favor ingrese una URL o link de un video de youtube.", "danger");
            return false;
        }
        if (!isURLyoutube($("#txt_sube_video").val())) {
            component.messageSimple("Mis Videos", "La URL o link ingresada no es valida. Por favor inténtelo de nuevo.", "danger");
            return false;
        }
        $("#form_upload_video").submit();
        component.popupLoader("Mis Videos", "Por favor espere un momento mientras se sube el video...");
        return true;
    };
    this.deletephoto = function(index) {
        if (validate.isNumeric(index)) {
            var func = function() {
                $("#form_delete_photo-" + index).submit();
                component.popupLoader("Mis Fotos", "Por favor espere un momento...");
            };
            component.messageAcept("Mis Fotos", "¿Está seguro de eliminar esta foto?", func, "danger");
        }
    };
    this.deletevideo = function(index) {
        if (validate.isNumeric(index)) {
            var func = function() {
                $("#form_delete_video-" + index).submit();
                component.popupLoader("Mis Fotos", "Por favor espere un momento...");
            };
            component.messageAcept("Mis Fotos", "¿Está seguro de eliminar este video?", func, "danger");
        }
    };
};
var PerfilPublico = function() {

    this.init = function() {
        this.events();
    };
    this.events = function() {
        $("#lik_mis_fotos").on('click', function() {
            $("#lik_mis_videos").removeClass("link_selected");
            $(this).addClass("link_selected");
            $(".contend-mis-fotos").show("slow");
            $(".contend-mis-videos").hide();
        });
        $("#lik_mis_videos").on('click', function() {
            $("#lik_mis_fotos").removeClass("link_selected");
            $(this).addClass("link_selected");
            $(".contend-mis-videos").show("slow");
            $(".contend-mis-fotos").hide();
        });
    };
};

var Estadisticas = function() {
    var base = this;
    this.contends_equipos = "#torneo_body_";
    this.contends_partidos = "#equipo_body_";
    this.contend_estadisticas = ".contend-estadistica";
    this.auxtorneo = null;
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
        //****************
        $(".rango-torneo").on("click", function() {
            var thiselement = $(this);
            $(this).unbind("click");
            base.getEquiposTorneo(thiselement, thiselement.attr("torneo"), thiselement.attr("usuario"), thiselement.attr("index"));
        });
        //****************
        $(document).on('click', '.rango-equipo', function() {
            $(this).removeClass("rango-equipo");
            base.getPartidosTorneo($(this).attr("torneo"), $(this).attr("equipo"), $(this).attr("index"));
        });
        //****************
        $(document).on('click', '.btn-statistic-index', function() {
            component.popupHtml("Estadisticas", "popup_estadisticas", "", true);
            var partido = $(this).attr("partido");
            setTimeout(function() {
                base.getEstadisticasPorPartidos(partido);
            }, 1000);
        });
        //****************
        $(document).on('click', '.btn-statistic-by-torneo', function() {
            var torneo = $(this).attr("torneo");
            var usuario = $(this).attr("usuario");
            if (validate.isNumeric(torneo) && validate.isNumeric(usuario)) {
                component.popupHtml("Estadisticas", "popup_estadisticas", "", true);
                setTimeout(function() {
                    base.getEstadisticasPorTorneo(torneo, usuario);
                }, 1000);
            }
        });
    };
    this.masestadisticas = function() {
        component.popupHtml("Mas estadisticas", "popup_mas_estadisticas", "", true);
    };
    this.getEquiposTorneo = function(element, torneo, usuario, index) {
        if (!validate.isEmpty(element) && validate.isNumeric(torneo) && validate.isNumeric(index)) {
            $.ajax({
                type: 'POST',
                url: base_url + '/perfil/estadisticastorneo/',
                data: {
                    'torneo': torneo,
                    'usuario': usuario
                },
                success: function(data) {
                    if (data.hasOwnProperty('html')) {
                        $(base.contends_equipos + index).empty().html(data.html);
                    }
                }
            });
        }
    };
    this.getPartidosTorneo = function(torneo, equipo, index) {
        if (validate.isNumeric(torneo) && validate.isNumeric(equipo) && validate.isNumeric(index)) {
            $.ajax({
                type: 'POST',
                url: base_url + '/perfil/estadisticaspartidos/',
                data: {
                    'torneo': torneo,
                    'equipo': equipo
                },
                success: function(data) {
                    if (data.hasOwnProperty('html')) {
                        console.log(base.contends_partidos + equipo + "_" + index);
                        $(base.contends_partidos + torneo + "_" + equipo + "_" + index).html(data.html);
                    }
                }
            });
        }
    };
    this.getEstadisticasPorPartidos = function(partido) {
        if (validate.isNumeric(partido)) {
            $.ajax({
                type: 'POST',
                url: base_url + '/perfil/estadisticasporpartido/',
                data: {
                    'partido': partido
                },
                success: function(data) {
                    if (data.hasOwnProperty('html')) {
                        $(base.contend_estadisticas).empty().html(data.html);
                    }
                }
            });
        }
    };

    this.getEstadisticasPorTorneo = function(torneo, usuario) {
        if (validate.isNumeric(torneo) && validate.isNumeric(usuario)) {
            $.ajax({
                type: 'POST',
                url: base_url + '/perfil/estadisticasportorneo/',
                data: {'torneo': torneo, 'usuario': usuario},
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
