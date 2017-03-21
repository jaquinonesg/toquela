//**********************************************
$(document).ready(function() {
    var partido = new Partido();
    partido.init();
    setFormatStatistic();
    estadoPago();
});

function setFormatStatistic() {
    $('.formato_statistic').popover({
        "html": true,
        "trigger": "hover"
    });
    $('.formato_statistic').on('click', function() {
        $(this).popover('show');
    });
}

function estadoPago() {
    $('.btn_pagar').popover({
        "html": true,
        "trigger": "hover"
    });
    $('.btn_pagar').on('click', function() {
        $(this).popover('show');
    });
}

var Partido = function() {
    var _this = this;
    this.is_local = 0;
    this.match = 0;
    this.scorelocal = 0;
    this.scorevisitant = 0;
    this.size_max_text = 200;
    this.max_minutos = 140;
    this.aliasresu_local = "#_resu_local_";
    this.aliasresu_visitant = "#_resu_visi_";
    this.aliascontend_resu_local = "#_resu_local_contend_";
    this.aliascontend_resu_visitant = "#_resu_visitant_contend_";
    this.aux_update = null;
    this.num_statistic_local = 0;
    this.num_statistic_visitant = 0;


    var obj_format = {
        "match_obj": {
            "codmatch": "",
            "scorelocal": "",
            "scorevisitant": "",
            "estate": "3"
        },
        "statistics_obj": {
            "codstatistics": "NULL",
            "minute": "",
            "date": "NULL",
            "islocal": "",
            "description": "",
            "codtypestatistic": "",
            "coduser": "",
            "codmatch": ""
        }
    };

    var aux_obj_match = {
        "codmatch": "",
        "scorelocal": "",
        "scorevisitant": "",
        "estate": "3"
    };

    var obj_aux_update = {
        'index': "",
        'codstatistics': ""
    };

    this.init = function() {
        this.events();
    };

    this.events = function() {
        this.match = parseInt($("#_match").val());
        this.scorelocal = parseInt($("#_scorelocal").val());
        this.scorevisitant = parseInt($("#_scorevisitant").val());
        
        // para cuando elimino la estadistica por w cuando el marcador queda por W
        $('.score_cero').each(function(i){
            $(this).val(i);
            var id_delete = "";
            var islocal = false;
            if ($(this).attr("islocal") == 1) {
                id_delete = _this.aliascontend_resu_local + $(this).attr("index");
                islocal = true;
            } else {
                id_delete = _this.aliascontend_resu_visitant + $(this).attr("index");
                islocal = false;
            }
            _this.deleteSatistics($(this).attr("statistic"), $(this).attr("index"), id_delete, islocal, $(this).attr("typestatistic"), true);
        });
        // ------------------------------------------

        if ($("#_num_statistic_local").length) {
            this.num_statistic_local = parseInt($("#_num_statistic_local").val());
        }
        if ($("#_num_statistic_visitant").length) {
            this.num_statistic_visitant = parseInt($("#_num_statistic_visitant").val());
        }

        //----------------------------------
        $("#btn_info_config").on('click', function() {
            component.popupHtml("Información y Configuración", "popup_config_info_body", "popup_config_info_footer", true);
            $('#contend_fecha_realizacion').datetimepicker({
                language: 'es',
                weekStart: 1,
                todayBtn: 1,
                autoclose: 1,
                todayHighlight: 1,
                startView: 2,
                minView: 2,
                forceParse: 0
            });
        });
        //----------------------------------
        $("#btn_guardar_partido").on('click', function() {
            _this.savePartido();
        });

        //----------------------------------
        $("#btn_add_local").on('click', function() {
            component.popupHtml("Equipo Local", "popup_local_body", "popup_local_footer", true);
            $('.selectpicker').selectpicker();
            _this.validaW();
        });

        //----------------------------------
        $("#btn_add_visitante").on('click', function() {
            component.popupHtml("Equipo Visitante", "popup_visitant_body", "popup_visitant_footer", true);
            $('.selectpicker').selectpicker();
            _this.validaW();
        });

        //----------------------------------
        //
        
        $(".restaurar_marcador").on('click', function() {
            var que_soy = $(this).attr('soy');
            var codmatch = $(this).attr('code-match');
            if (!validate.isEmpty(codmatch) && !validate.isEmpty(que_soy)) {
                _this.restauraMarcador(codmatch, que_soy);
            }
        });

        $("#btn_add_local_contra, #btn_add_visitant_contra").on('click', function() {
            var que_soy = $(this).attr('soy');
            var codmatch = $(this).attr('code-match');
            var score = $(this).attr('score');
            $("#modal-gol-contra #agregar, #modal-gol-contra #restaurar-contra").attr('tipo-team', que_soy);
            $("#modal-gol-contra #agregar, #modal-gol-contra #restaurar-contra").attr('code-match', codmatch);
            $("#modal-gol-contra #score").html(score);
            $('#modal-gol-contra').modal('show');
        });

        $("#btn_add_local_favor, #btn_add_visitant_favor").on('click', function() {
            var que_soy = $(this).attr('soy');
            var codmatch = $(this).attr('code-match');
            var score = $(this).attr('score');
            $("#modal-gol-favor #agregar, #modal-gol-favor #restaurar-favor").attr('tipo-team', que_soy);
            $("#modal-gol-favor #agregar, #modal-gol-favor #restaurar-favor").attr('code-match', codmatch);
            $("#modal-gol-favor #score").html(score);
            $('#modal-gol-favor').modal('show');
        });

        $("#modal-gol-contra #agregar").on('click', function() {
            var codmatch = $(this).attr('code-match');
            var que_soy = $(this).attr('tipo-team');
            var cantidad = $('#modal-gol-contra #cantidad').val();
            if (!validate.isEmpty(codmatch) && !validate.isEmpty(que_soy)) {
                _this.golesEnContra(codmatch, que_soy, cantidad);
            }
        });

        $("#modal-gol-contra #restaurar-contra").on('click', function() {
            var codmatch = $(this).attr('code-match');
            var que_soy = $(this).attr('tipo-team');
            if (!validate.isEmpty(codmatch) && !validate.isEmpty(que_soy)) {
                _this.restaurarGolesEnContra(codmatch, que_soy);
            }
        });

        $("#modal-gol-favor #agregar").on('click', function() {
            var codmatch = $(this).attr('code-match');
            var que_soy = $(this).attr('tipo-team');
            var cantidad = $('#modal-gol-favor #cantidad').val();
            if (!validate.isEmpty(codmatch) && !validate.isEmpty(que_soy)) {
                _this.golesAfavor(codmatch, que_soy, cantidad);
            }
        });

        $("#modal-gol-favor #restaurar-favor").on('click', function() {
            var codmatch = $(this).attr('code-match');
            var que_soy = $(this).attr('tipo-team');
            if (!validate.isEmpty(codmatch) && !validate.isEmpty(que_soy)) {
                _this.restaurarGolesAfavor(codmatch, que_soy);
            }
        });

        $(".partido .btn-para-left").on('mouseenter', function() {
            $(this).find('.contador-partido').fadeIn(500);
            $(this).find('.contador-partido').animate({left: '-40px'}, 1000);
        });
        $(".partido .btn-para-left").on('mouseleave', function() {
            $(this).find('.contador-partido').fadeOut(500);
            $(this).find('.contador-partido').animate({left: '0px'}, 1000);
        });

        $(".partido .btn-para-right").on('mouseenter', function() {
            $(this).find('.contador-partido').fadeIn(500);
            $(this).find('.contador-partido').animate({right: '-40px'}, 1000);
        });
        $(".partido .btn-para-right").on('mouseleave', function() {
            $(this).find('.contador-partido').fadeOut(500);
            $(this).find('.contador-partido').animate({right: '10px'}, 1000);
        });

        this.golesEnContra = function(codmatch, que_soy, cantidad) {
            var obj = {
                "codmatch": codmatch,
                "cantidad": cantidad,
                "que_soy": que_soy
            };
            $.ajax({
                type: 'POST',
                url: base_url + '/torneos/partido/golesContra',
                data: obj,
                success: function(data) {
                    if (data.hasOwnProperty('status')) {
                        if (data.status) {
                            component.messageSimple("Partido", data.message, "success");
                            $(document).on('click', '.modal-success', function() {
                                location.reload();
                            });
                        } else {
                            component.popupHtmlHide();
                            component.messageSimple("Partido", data.message, "danger");
                        }
                    }
                }
            });
        };

        this.restaurarGolesEnContra = function(codmatch, que_soy) {
            var obj = {
                "codmatch": codmatch,
                "que_soy": que_soy
            };
            $.ajax({
                type: 'POST',
                url: base_url + '/torneos/partido/restauraContra',
                data: obj,
                success: function(data) {
                    if (data.hasOwnProperty('status')) {
                        if (data.status) {
                            component.messageSimple("Partido", data.message, "success");
                            $(document).on('click', '.modal-success', function() {
                                location.reload();
                            });
                        } else {
                            component.popupHtmlHide();
                            component.messageSimple("Partido", data.message, "danger");
                        }
                    }
                }
            });
        };

        this.golesAfavor = function(codmatch, que_soy, cantidad) {
            var obj = {
                "codmatch": codmatch,
                "cantidad": cantidad,
                "que_soy": que_soy
            };
            $.ajax({
                type: 'POST',
                url: base_url + '/torneos/partido/golesFavor',
                data: obj,
                success: function(data) {
                    if (data.hasOwnProperty('status')) {
                        if (data.status) {
                            component.messageSimple("Partido", data.message, "success");
                            $(document).on('click', '.modal-success', function() {
                                location.reload();
                            });
                        } else {
                            component.popupHtmlHide();
                            component.messageSimple("Partido", data.message, "danger");
                        }
                    }
                }
            });
        };

        this.restaurarGolesAfavor = function(codmatch, que_soy) {
            var obj = {
                "codmatch": codmatch,
                "que_soy": que_soy
            };
            $.ajax({
                type: 'POST',
                url: base_url + '/torneos/partido/restauraFavor',
                data: obj,
                success: function(data) {
                    if (data.hasOwnProperty('status')) {
                        if (data.status) {
                            component.messageSimple("Partido", data.message, "success");
                            $(document).on('click', '.modal-success', function() {
                                location.reload();
                            });
                        } else {
                            component.popupHtmlHide();
                            component.messageSimple("Partido", data.message, "danger");
                        }
                    }
                }
            });
        };

        this.restauraMarcador = function(codmatch, que_soy) {
            var obj = {
                "codmatch": codmatch,
                "que_soy": que_soy
            };
            $.ajax({
                type: 'POST',
                url: base_url + '/torneos/partido/restauramarcador',
                data: obj,
                success: function(data) {
                    if (data.hasOwnProperty('status')) {
                        if (data.status) {
                            component.messageSimple("Partido", data.message, "success");
                            $(document).on('click', '.modal-success', function() {
                                location.reload();
                            });
                        } else {
                            component.popupHtmlHide();
                            component.messageSimple("Partido", data.message, "danger");
                        }
                    }
                }
            });
        };

        //----------------------------------
        $(document).on('click', '#btn_save_local', function() {
            var nuevo_obj = _this.readDataLocal();
            _this.is_local = true;
            if (_this.validateAddStatistics(nuevo_obj)) {
                _this.num_statistic_local++;
                _this.addStatistics(nuevo_obj, _this.num_statistic_local);
            }
        });

        //----------------------------------
        $(document).on('click', '#btn_save_visitant', function() {
            var nuevo_obj = _this.readDataVisitant();
            _this.is_local = false;
            if (_this.validateAddStatistics(nuevo_obj)) {
                _this.num_statistic_visitant++;
                _this.addStatistics(nuevo_obj, _this.num_statistic_visitant);
            }
        });

        //----------------------------------
        $(document).on('click', '.btn_update_resumen', function() {
            if ($(this).attr("islocal") == "1") {
                var new_obj_aux_update = obj_aux_update;
                new_obj_aux_update.codstatistics = $(this).attr("statistic");
                new_obj_aux_update.index = $(this).attr("index");
                _this.aux_update = new_obj_aux_update;
                var obj_local = $(_this.aliasresu_local + $(this).attr("index"));
                component.popupHtml("Equipo Local", "popup_local_body", "update_resumen_local_footer", true);
                $(".add_local .add_minuto").val(obj_local.attr("minute"));
                $(".add_local .add_type_statistic").val(obj_local.attr("typestatistic"));
                $(".add_local .add_player").val(obj_local.attr("player"));
                $(".add_local .add_description").val(obj_local.attr("description"));
                $('.selectpicker').selectpicker();
            } else if ($(this).attr("islocal") == "0") {
                var new_obj_aux_update = obj_aux_update;
                new_obj_aux_update.codstatistics = $(this).attr("statistic");
                new_obj_aux_update.index = $(this).attr("index");
                _this.aux_update = new_obj_aux_update;
                var obj_visitant = $(_this.aliasresu_visitant + $(this).attr("index"));
                component.popupHtml("Equipo Visitante", "popup_visitant_body", "update_resumen_visitant_footer", true);
                $(".add_visitant .add_minuto").val(obj_visitant.attr("minute"));
                $(".add_visitant .add_type_statistic").val(obj_visitant.attr("typestatistic"));
                $(".add_visitant .add_player").val(obj_visitant.attr("player"));
                $(".add_visitant .add_description").val(obj_visitant.attr("description"));
                $('.selectpicker').selectpicker();
            }
        });
        //----------------------------------
        $(document).on('click', '.btn_delete_resumen', function() {
            var id_delete = "";
            var islocal = false;
            if ($(this).attr("islocal") == 1) {
                id_delete = _this.aliascontend_resu_local + $(this).attr("index");
                islocal = true;
            } else {
                id_delete = _this.aliascontend_resu_visitant + $(this).attr("index");
                islocal = false;
            }
            _this.deleteSatistics($(this).attr("statistic"), $(this).attr("index"), id_delete, islocal, $(this).attr("typestatistic"));
        });

        //----------------------------------
        $(document).on('click', '#btn_update_resumen_local', function() {
            var nuevo_obj = _this.readDataLocal();
            _this.is_local = true;
            if (_this.validateAddStatistics(nuevo_obj)) {
                _this.updateStatistics(nuevo_obj);
            }
        });
        //----------------------------------
        $(document).on('click', '#btn_update_resumen_visitant', function() {
            var nuevo_obj = _this.readDataVisitant();
            _this.is_local = false;
            if (_this.validateAddStatistics(nuevo_obj)) {
                _this.updateStatistics(nuevo_obj);
            }
        });

        //---------------------------------
        $(document).on('click', 'a', function(e) {
            var enlace = $(this).attr('href');
            if (enlace != "#" && !validate.isEmpty(enlace)) {
                e.preventDefault();
                if (_this.validaEliminatoria()) {
                    component.redireccionar(enlace, 500);
                } else {
                    component.messageSimple("Eliminación directa", "<strong>¡Tenga en cuenta!</strong> Este es un partido que pertenece a un torneo por Eliminación directa, por lo tanto, no pueden existir empates, tiene que haber un ganador unánime por cada partido. Si es necesario, es precisa la definición por penales.", "danger");
                }
            }
        });

        //----------------------------------
        $(document).on('click', '.btn_pagar', function() {
            var codstatistic = $(this).attr('statistic');
            var tipoEstado = $(this).attr('typeEstado');
            if (!validate.isEmpty(codstatistic)) {
                component.messageAcept("Mensaje", "¿Estás seguro de cambiar el estado?", function() {
                    $.ajax({
                        type: 'POST',
                        url: base_url + '/torneos/partido/actualizaEstado',
                        data: {
                            'codstatistic': codstatistic,
                            'tipoEstado': tipoEstado
                        },
                        beforeSend: function() {
                            component.popupLoader("Espere un momento", "Cambiando el estado...");
                        },
                        success: function(data) {
                            component.popupHtmlHide();
                            if (data.status) {
                                component.messageSimple('Mensaje', data.message);
                                $(document).on('click', '.modal-default', function() {
                                    location.reload();
                                });
                            } else {
                                component.messageSimple('Mensaje', data.message);
                            }
                        }
                    });
                });
            }
        });

    };

    this.readDataLocal = function() {
        _this.is_local = true;
        var temp_score_local = _this.scorelocal;
        var temp_score_visitant = _this.scorevisitant;
        if ($(".add_type_statistic").val() == 1) {
            temp_score_local = (_this.scorelocal + 1);
        } else if ($(".add_type_statistic").val() == 2) {
            temp_score_visitant = (_this.scorevisitant + 1);
        } else if ($(".add_type_statistic").val() == 3) {
            temp_score_local = (_this.scorelocal + 1);
        } else if ($(".add_type_statistic").val() == 15) {
            temp_score_local = (_this.scorelocal + 1);
        } else if ($(".add_type_statistic").val() == 19) {
            temp_score_local = -1;
        }
        var nuevo_obj = obj_format;
        nuevo_obj.match_obj.codmatch = _this.match;
        nuevo_obj.match_obj.scorelocal = temp_score_local;
        nuevo_obj.match_obj.scorevisitant = temp_score_visitant;
        if (!validate.isEmpty(this.aux_update)) {
            if (validate.isNumeric(this.aux_update.codstatistics)) {
                nuevo_obj.statistics_obj.codstatistics = this.aux_update.codstatistics;
            } else {
                return null;
            }
        }
        nuevo_obj.statistics_obj.minute = $(".add_minuto").val();
        nuevo_obj.statistics_obj.islocal = "1";
        nuevo_obj.statistics_obj.description = $(".add_description").val();
        nuevo_obj.statistics_obj.codtypestatistic = $(".add_type_statistic").val();
        nuevo_obj.statistics_obj.coduser = $(".add_player").val();
        nuevo_obj.statistics_obj.codmatch = _this.match;
        return nuevo_obj;
    };

    this.readDataVisitant = function() {
        _this.is_local = false;
        var temp_score_local = _this.scorelocal;
        var temp_score_visitant = _this.scorevisitant;
        if ($(".add_type_statistic").val() == 1) {
            temp_score_visitant = (_this.scorevisitant + 1);
        } else if ($(".add_type_statistic").val() == 2) {
            temp_score_local = (_this.scorelocal + 1);
        } else if ($(".add_type_statistic").val() == 3) {
            temp_score_visitant = (_this.scorevisitant + 1);
        } else if ($(".add_type_statistic").val() == 15) {
            temp_score_visitant = (_this.scorevisitant + 1);
        } else if ($(".add_type_statistic").val() == 19) {
            temp_score_visitant = -1;
        }
        var nuevo_obj = obj_format;
        nuevo_obj.match_obj.codmatch = _this.match;
        nuevo_obj.match_obj.scorelocal = temp_score_local;
        nuevo_obj.match_obj.scorevisitant = temp_score_visitant;
        if (!validate.isEmpty(this.aux_update)) {
            if (validate.isNumeric(this.aux_update.codstatistics)) {
                nuevo_obj.statistics_obj.codstatistics = this.aux_update.codstatistics;
            } else {
                return null;
            }
        }
        nuevo_obj.statistics_obj.minute = $(".add_minuto").val();
        nuevo_obj.statistics_obj.islocal = "0";
        nuevo_obj.statistics_obj.description = $(".add_description").val();
        nuevo_obj.statistics_obj.codtypestatistic = $(".add_type_statistic").val();
        nuevo_obj.statistics_obj.coduser = $(".add_player").val();
        nuevo_obj.statistics_obj.codmatch = _this.match;
        return nuevo_obj;
    };

    this.savePartido = function() {
        var nuevo_save = aux_obj_match;
        nuevo_save.codmatch = _this.match;
        nuevo_save.scorelocal = _this.scorelocal;
        nuevo_save.scorevisitant = _this.scorevisitant;
        $.ajax({
            type: 'POST',
            url: base_url + '/torneos/partido/save_partido/',
            data: {
                "partido": nuevo_save
            },
            beforeSend: function() {
                component.popupLoader("Guardando...", "Espera un momento mientras se envían los datos.");
            },
            success: function(data) {
                if (data.hasOwnProperty('message') && data.hasOwnProperty('status')) {
                    if (data.status) {
                        component.popupHtmlHide();
                        component.messageSimple("Aviso...", data.message);
                    } else {
                        component.popupHtmlHide();
                        component.messageSimple("Aviso...", data.message, "danger");
                    }
                }
            },
            timeout: 50000,
            error: function() {
                component.popupHtmlHide();
                component.messageSimple("Aviso...", "Surgió un error en la conexión por favor inténtalo de nuevo o más tarde.", "danger");
            }
        });
    };

    this.addStatistics = function(obj, index) {
        if (validate.isNumeric(index)) {
            $.ajax({
                type: 'POST',
                url: base_url + '/torneos/partido/add_statistics/',
                data: {
                    'init': index,
                    'add': obj
                },
                beforeSend: function() {
                    $('#_msg_add').fadeIn('slow');
                    component.alertComponent("Espera un momento mientras se envían los datos.", "_msg_add", "loader");
                },
                success: function(data) {
                    if (data.hasOwnProperty('message') && data.hasOwnProperty('status')) {
                        if (data.status) {
                            _this.sumaMarcador();
                            _this.addResumen(data.resumen);
                            _this.cambiaMarcador();
                            setFormatStatistic();
                            component.alertComponent("Se ha creado la estadística.", "_msg_add", "success");
                            $('#_msg_add').fadeOut('slow');
                            $(document).on('click', '#btn_cancel_info_config, #_popup_html_big .close', function() {
                                location.reload();
                            });
                        } else {
                            component.popupHtmlHide();
                            component.messageSimple("Aviso...", data.message, "danger");
                        }
                    }
                },
                timeout: 50000,
                error: function() {
                    component.popupHtmlHide();
                    component.messageSimple("Aviso...", "Surgió un error en la conexión por favor inténtalo de nuevo o más tarde.", "danger");
                }
            });
        } else {
            component.alertComponent("Hay un error con la carga de los datos. Por favor recargue la página para solucionarlo.", "_msg_add", "danger");
        }
    };

    this.updateStatistics = function(obj) {
        if (this.aux_update.hasOwnProperty('index') && validate.isNumeric(this.aux_update.index)) {
            var index = this.aux_update.index;
            $.ajax({
                type: 'POST',
                url: base_url + '/torneos/partido/update_statistics/',
                data: {
                    'solo_format': true,
                    'init': index,
                    'add': obj
                },
                beforeSend: function() {
                    component.alertComponent("Espera un momento mientras se envían los datos.", "_msg_add", "loader");
                },
                success: function(data) {
                    if (data.hasOwnProperty('message') && data.hasOwnProperty('status')) {
                        if (data.status) {
                            _this.sumaMarcador();
                            _this.addResumenInContend(index, data.resumen);
                            _this.cambiaMarcador();
                            component.popupHtmlHide();
                            setFormatStatistic();
                        } else {
                            component.popupHtmlHide();
                            component.messageSimple("Aviso...", data.message, "danger");
                        }
                    }
                    _this.aux_update = null;
                },
                timeout: 50000,
                error: function() {
                    component.popupHtmlHide();
                    component.messageSimple("Aviso...", "Surgió un error en la conexión por favor inténtalo de nuevo o más tarde.", "danger");
                    _this.aux_update = null;
                }
            });
        } else {
            component.alertComponent("Hay un error con la carga de los datos. Por favor recargue la página para solucionarlo.", "_msg_add", "danger");
        }
    };

    this.deleteSatistics = function(statistic, index, id_delete, islocal, typestatistic, sin_mensaje) {
        if (validate.isNumeric(statistic) && validate.isNumeric(index) && !validate.isEmpty(id_delete)) {
            var fun_aux = function(sin_mensaje) {
                $.ajax({
                    type: 'POST',
                    url: base_url + '/torneos/partido/delete_statistics/',
                    data: {
                        'islocal': islocal,
                        'match': _this.match,
                        'statistic': statistic
                    },
                    success: function(data) {
                        if (data.hasOwnProperty('message') && data.hasOwnProperty('status')) {
                            if(!validate.isEmpty(sin_mensaje) && sin_mensaje == true){
                                // para cuando elimino la estadistica por w
                                if (data.status) {
                                    console.log(data);
                                    $('.esconder_statistic').hide();
                                } else {
                                    console.log(data);
                                }
                            }else{
                                if (data.status) {
                                    component.popupHtmlHide();
                                    component.messageSimple("Aviso...", data.message);
                                    $(id_delete).remove();
                                    _this.restaMarcador(typestatistic, islocal);
                                    _this.cambiaMarcador();
                                    $(document).on('click', '.modal-default', function() {
                                        location.reload();
                                    });
                                } else {
                                    component.popupHtmlHide();
                                    component.messageSimple("Aviso...", data.message, "danger");
                                }
                            }
                        }
                    },
                    timeout: 50000,
                    error: function() {
                        component.popupHtmlHide();
                        component.messageSimple("Aviso...", "Surgió un error en la conexión por favor inténtalo de nuevo o más tarde.", "danger");
                    }
                });
            };
            if(!validate.isEmpty(sin_mensaje) && sin_mensaje == true){
                // para cuando elimino la estadistica por w
                fun_aux(true);
            }else{
                component.messageAcept("Eliminar acción", "¿Está seguro de eliminar esta acción?", fun_aux, "danger");
            }
        }else{
            component.alertComponent("Hay un error con la carga de los datos. Por favor recargue la página para solucionarlo.", "_msg_add", "danger");
        }
    };

    this.getdata = function(current_match) {
        console.log("getdata");
        if (_.isNumber(current_match) && _.isNumber(current_match)) {
            $.ajax({
                type: 'POST',
                url: base_url + '/torneos/partido/datapartido/',
                data: {
                    'match': current_match
                },
                success: function(data) {
                    console.log(data);
                    if (data.hasOwnProperty('match')) {
                        alert("los datos estan bien...");
                    }
                }
            });
        }
    };

    this.sumaMarcador = function() {
        if ($(".add_type_statistic").val() == 1) {
            if (this.is_local) {
                this.scorelocal++;
            } else {
                this.scorevisitant++;
            }
            return true;
        }
        if ($(".add_type_statistic").val() == 2) {
            if (this.is_local) {
                this.scorevisitant++;
            } else {
                this.scorelocal++;
            }
            return true;
        }
        if ($(".add_type_statistic").val() == 3) {
            if (this.is_local) {
                this.scorelocal++;
            } else {
                this.scorevisitant++;
            }
            return true;
        }
        if ($(".add_type_statistic").val() == 15) {
            if (this.is_local) {
                this.scorelocal++;
            } else {
                this.scorevisitant++;
            }
            return true;
        }
        if ($(".add_type_statistic").val() == 19) {
            if (this.is_local) {
                this.scorelocal = -1;
            } else {
                this.scorevisitant = -1;
            }
            return true;
        }
        return false;
    };

    this.restaMarcador = function(typestatistic, islocal) {
        if (typestatistic == 1) {
            if (islocal) {
                this.scorelocal--;
            } else {
                this.scorevisitant--;
            }
            return true;
        }
        if (typestatistic == 2) {
            if (islocal) {
                this.scorevisitant--;
            } else {
                this.scorelocal--;
            }
            return true;
        }
        if (typestatistic == 3) {
            if (islocal) {
                this.scorelocal--;
            } else {
                this.scorevisitant--;
            }
            return true;
        }
        if (typestatistic == 15) {
            if (islocal) {
                this.scorelocal--;
            } else {
                this.scorevisitant--;
            }
            return true;
        }
        if (typestatistic == 19) {
            if (islocal) {
                this.scorelocal = parseInt($("#_scorelocal").val());
            } else {
                this.scorevisitant = parseInt($("#_scorevisitant").val());
            }
            return true;
        }
        return false;
    };

    this.cambiaMarcador = function() {
        if (this.scorelocal >= 0) {
            $("#marcador_local").html(this.scorelocal);
        }
        if (this.scorevisitant >= 0) {
            $("#marcador_visitante").html(this.scorevisitant);
        }
        if (this.scorelocal < 0) {
            $("#marcador_local").html("W");
        }
        if (this.scorevisitant < 0) {
            $("#marcador_visitante").html("W");
        }
        if (this.scorelocal == 0) {
            $("#marcador_local").html("0");
        }
        if (this.scorevisitant == 0) {
            $("#marcador_visitante").html("0");
        }
    };

    this.addResumen = function(new_html) {
        if (this.is_local) {
            $("#resumen_local").append(new_html);
        } else {
            $("#resumen_visitante").append(new_html);
        }
    };

    this.addResumenInContend = function(index, new_html) {
        if (this.is_local) {
            $(this.aliascontend_resu_local + index).html(new_html);
        } else {
            $(this.aliascontend_resu_visitant + index).html(new_html);
        }
    };

    this.validateAddStatistics = function(obj) {
        if (!validate.isNumeric(obj.match_obj.codmatch)) {
            component.alertComponent("Hay un error con la carga de los datos. Por favor recargue la página para solucionarlo.", "_msg_add", "danger");
            return false;
        }
        /*if (!validate.isNumeric(obj.match_obj.scorelocal) || !validate.isNumeric(obj.match_obj.scorevisitant)) {
         component.alertComponent("El marcador de los equipos debe ser numérico.", "_msg_add", "danger");
         return false;
     }*/
        if (validate.isEmpty(obj.statistics_obj.minute)) {
            component.alertComponent("Por favor ingrese el minuto de la acción.", "_msg_add", "danger");
            return false;
        }
        if (!validate.isNumeric(obj.statistics_obj.minute)) {
            component.alertComponent("Los minutos deben ser valores numéricos.", "_msg_add", "danger");
            return false;
        }
        if (parseInt(obj.statistics_obj.minute) > this.max_minutos) {
            component.alertComponent("El minuto de la acción no puede superar los " + this.max_minutos + " minutos.", "_msg_add", "danger");
            return false;
        }
        if (validate.isEmpty(obj.statistics_obj.islocal)) {
            component.alertComponent("Se debe ingresar el equipo local o visitante. Por favor cierre y vuelva a intentarlo.", "_msg_add", "danger");
            return false;
        }
        if (obj.statistics_obj.description.length > this.size_max_text) {
            component.alertComponent("La descripción no puede tener más de " + this.size_max_text + " caracteres. Por ingrese un más corta.", "_msg_add", "danger");
            return false;
        }
        if (!validate.isNumeric(obj.statistics_obj.codtypestatistic)) {
            component.alertComponent("Por favor seleccione el tipo de acción.", "_msg_add", "danger");
            return false;
        }
        if (!validate.isNumeric(obj.statistics_obj.coduser)) {
            component.alertComponent("Por favor seleccione el jugador al que le pertenece la acción.", "_msg_add", "danger");
            return false;
        }
        if (!validate.isNumeric(obj.statistics_obj.codmatch)) {
            component.alertComponent("Hay un error con la carga de los datos. Por favor recargue la página para solucionarlo.", "_msg_add", "danger");
            return false;
        }
        return true;
    };


    this.validaEliminatoria = function() {
        if (this.scorelocal == this.scorevisitant) {
            return false;
        }
        return true;
    };

    this.validaW = function() {
        // data-original-title="Pierde por W"
        var wlocal = $('#input-local').val();
        var wvisitant = $('#input-visitante').val();
        if (!validate.isEmpty(wvisitant) && wvisitant == 'W') {
            $('.add_visitant [rel="18"]').attr('style', 'display: none;');
        }
        if (!validate.isEmpty(wlocal) && wlocal == 'W') {
            $('.add_local [rel="18"]').attr('style', 'display: none;');
        }
    };

};