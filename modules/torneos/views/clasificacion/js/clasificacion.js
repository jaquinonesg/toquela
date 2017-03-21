$(document).ready(function() {
    var tp = new resultadosPrivado();
    tp.init();
    // click automatico para el boton de la ultima fase ue sale de primeras
    // $('#btn-posiciones-primera').click();
});
var resultadosPrivado = function() {
    var base = this;
    this.init = function() {
        this.events();
    };

    this.events = function() {
        init_mas_detalle();
        // aqui borro los botones de proxima fecha de resultados
        $('.btn_result_proxima_fecha').remove();
        // click automatico para el boton de la ultima fase ue sale de primeras
        // $('#btn-posiciones-primera').click();
        var htmlFases = $('#contend-resultados .fase-resultados').html();
        if (htmlFases != null) {
            var faseLength = $('#contend-resultados .fase-resultados').length;
            if (faseLength === 0) {
                component.messageSimple("Mensaje", 'No hay resultados según el filtro.', 'info');
            }
        }
        $(document).on('click', '.btn_result_parcial_calendar', function() {
            base.getDataResult($(this).attr("torneo"), $(this).attr("round"), $(this).attr("fase"), 'calendar');
        });
        $(document).on('click', '.btn_result_proxima_fecha', function() {
            base.getProximaFecha($(this).attr("torneo"), $(this).attr("round"), $(this).attr("fase"), 'calendar');
        });
        $(document).on('click', '.btn_result_parcial_resultados', function() {
            base.getDataResult($(this).attr("torneo"), $(this).attr("round"), $(this).attr("fase"), 'resultados');
        });
        //--------------------
        $(document).on('click', '.btn_result_fase_completa', function() {
            component.popupHtml("Rseultados fase " + $(this).attr("fase"), "popup_result_parcial_body", "popup_result_parcial_footer", true);
            base.getDataResultFaseCompleta($(this).attr("torneo"), $(this).attr("fase"));
        });
        $(document).on('click', '.btn_mas_resultados', function() {
            base.getMoreResults($(this).attr("torneo"), $(this).attr("fase"));
        });
        $(document).on('click', '.btn_total_grupos', function() {
            base.getDataPosicionesTotalesFase($(this).attr("torneo"), $(this).attr("fase"));
        });
        $(document).on('click', '.btn_result_detalle_partido', function() {
            base.getMatchDetalle($(this).attr("cod-partido"),$(this).attr('data-calendar'));
        });
        //------nuevos eventos----
        $('.btn_ver_resultado_fase').click(function() {
            var id = $(this).attr('id');
            var num = id.split('-');
            var numero = num[num.length - 1];
            $('.div-resultados-fase-' + numero).removeAttr('style');
        });
        //  lógica para flecha en accordion de grupos
        $('.grupo-menu').click(function() {
            var clase = $(this).attr('class');
            if (clase == "accordion-toggle grupo-menu tmp-grupo-menu" || clase == "accordion-toggle grupo-menu tmp-grupo-menu collapsed") {
                var id = $(this).attr('href');
                $('[href="' + id + '"]>.glyphicon').removeClass('glyphicon-chevron-down');
                $('[href="' + id + '"]>.glyphicon').addClass('glyphicon-chevron-up');
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
    };

    this.getDataResult = function(torneo, ronda, fase) {
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
                            $("#modal-results-parcial .modal-title").html('Grupo ' + ronda);
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

    this.getProximaFecha = function(torneo, ronda, fase) {
        if (validate.isNumeric(torneo) && validate.isNumeric(ronda)) {
            $.ajax({
                type: 'POST',
                url: base_url + '/torneos/clasificacion/proximaFecha',
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
    };

    this.getMatchDetalle = function(cod_match, programeichon) {
        console.log(programeichon);
        if (validate.isNumeric(cod_match)) {
            $.ajax({
                type: 'POST',
                url: base_url + '/torneos/clasificacion/detallePartido',
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
                            $("#modal-detalle-partido .modal-body").html(data.html);
                            $("#modal-detalle-partido .modal-title").html('Partido '+no);
                            $('#modal-detalle-partido').modal('show');
                        } else {
                            component.popupHtmlHide();
                            component.messageSimple("Clasificacion", data.message, "danger");
                        }
                    }
                }
            });
        }
    };

    this.menuGrupos = function() {
        // cambios roma
        //panel de la izquierda, logica para que salga y se esconda el boton más y menos
        // no se como explicarla =D

    };

    this.getDataResultFaseCompleta = function(torneo, fase) {
        if (validate.isNumeric(torneo)) {
            $.ajax({
                type: 'POST',
                url: base_url + '/torneos/clasificacion/resultados_public_round/' + torneo,
                data: {
                    "grupo": fase
                },
                success: function(data) {
                    if (data.hasOwnProperty('status') && data.hasOwnProperty('html')) {
                        if (data.status) {
                            $(".contend_result_parcial_body").html(data.html);
                        } else {
                            component.popupHtmlHide();
                            component.messageSimple("Calendario", data.message, "danger");
                        }
                    }
                }
            });
        }
    };

    this.getMoreResults = function(torneo, fase) {
        if (validate.isNumeric(torneo)) {
            $.ajax({
                type: 'POST',
                url: base_url + '/torneos/clasificacion/more_results_round/' + torneo,
                data: {
                    "grupo": fase
                },
                success: function(data) {
                    console.log(data);
                    if (data.hasOwnProperty('status') && data.hasOwnProperty('html')) {
                        if (data.status) {
                            $("#modal-more-results .modal-body").html(data.html);
                            $("#modal-more-results .modal-title").html('Mas resultados');
                            $('#modal-more-results').modal('show');
                        } else {
                            component.popupHtmlHide();
                            component.messageSimple("Calendario", data.message, "danger");
                        }
                    }
                }
            });
        }
    };

    this.getDataPosicionesTotalesFase = function(torneo, fase) {
        if (validate.isNumeric(torneo)) {
            $.ajax({
                type: 'POST',
                url: base_url + '/torneos/clasificacion/tablaPosicionesTotal/' + torneo + '/' + fase,
                data: {
                    "grupo": fase
                },
                success: function(data) {
                    if (data.hasOwnProperty('status') && data.hasOwnProperty('html')) {
                        if (data.status) {
                            console.log('llego');
                            $("#modal-total-posiciones .modal-body").html(data.html);
                            $("#modal-total-posiciones .modal-title").html('Totales fase ' + fase);
                            $('#modal-total-posiciones').modal('show');
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