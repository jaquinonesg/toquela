var HorarioAdmin = (function() {
    var _this = null;
    function HorarioAdmin() {
        _this = this;
        _this.events();
    }
    HorarioAdmin.prototype.events = function() {
        _this.paginaCanchas();

        $(".btn-multiplo").on('click', function() {
            if (!$(this).hasClass('active')) {
                $(".btn-multiplo").removeClass('active');
                $(this).addClass('active');
            }
        });

        $("#add_schedule").on('click', function() {
            _this.addHorario(parseInt($(this).attr('data-complex')), parseInt($(this).attr('data-sub')));
        });

        $("body").on('click', '.delete_schedule', function() {
            _this.deleteHorario(parseInt($(this).attr('data-code')));
        });

        $("#disponibility").on('change', function() {
            var sub = parseInt($("#add_schedule").attr('data-sub'));
            _this.setHorario(sub);
        });

        $("#precio").priceFormat({
            prefix: '$ ',
            centsSeparator: '.',
            thousandsSeparator: ',',
            centsLimit: 0
        });
    };

    HorarioAdmin.prototype.paginaCanchas = function() {
        $(".sub_complex[data-code=" + $("#add_schedule").attr('data-sub') + "]").addClass('selectedCancha');
        $(".sub_complex").on('click', function() {
            var code = parseInt($(this).attr('data-code'));
            if (!$(this).hasClass('selectedCancha')) {
                $(".sub_complex").removeClass('selectedCancha');
                $(this).addClass('selectedCancha');
                if (validate.isNumeric(code)) {
                    _this.setHorario(code);
                }
            }
        });
    };

    HorarioAdmin.prototype.setHorario = function(code) {
        var day = $("#disponibility").val();
        if (validate.isNumeric(code) && !validate.isEmpty(day)) {
            $.ajax({
                type: 'POST',
                url: base_url + '/admin/canchas/subcomplex/',
                data: {'code': code, 'day': day},
                beforeSend: function() {
                    $.fancybox.showActivity();
                },
                success: function(data) {
                    $.fancybox.hideActivity();
                    if (data.hasOwnProperty('html') && data.hasOwnProperty('status')) {
                        if (data.status) {
                            $("#add_schedule").attr('data-sub', code);
                            $("#Listado-Calendario").html(data.html);
                            return;
                        }
                    }
                    component.messageSimple("Cargar horarios", "Surgió un error inesperado al cargar los horarios, por favor inténtelo de nuevo.", "danger");
                },
                error: function(e) {
                    $.fancybox.hideActivity();
                    component.messageSimple("Cargar horarios", "Surgió un error inesperado al cargar los horarios, por favor inténtelo de nuevo.", "danger");
                }
            });
        }
    };

    HorarioAdmin.prototype.addHorario = function(complex, sub) {
        var aux_data = {
            'day': $("#disponibility").val(),
            'start': $("#start").val(),
            'end': $("#end").val(),
            'price': parseFloat($.trim($("#precio").val().replace(/[^\d\.\-\ ]/g, ''))),
            'sub': sub,
            'mult': parseInt($(".btn-multiplo.active").attr("mult")),
            'complex': complex
        };
        if (!validate.isEmpty(aux_data.day) && !validate.isEmpty(aux_data.start) && !validate.isEmpty(aux_data.end) && !validate.isEmpty(aux_data.price) && validate.isInteger(aux_data.mult) && validate.isInteger(complex) && validate.isInteger(sub)) {
            if (_.isNumber(sub) && _.isNumber(complex)) {
                $.ajax({
                    type: 'POST',
                    url: base_url + '/admin/canchas/addschedule/',
                    data: aux_data,
                    success: function(data) {
                        if (data.hasOwnProperty('status') && data.hasOwnProperty('message')) {
                            if (data.status) {
                                component.messageSimple("Agregar horario", data.message);
                                _this.setHorario(sub);
                                return;
                            }
                            component.messageSimple("Agregar horario", data.message, "danger");
                            return;
                        }
                        component.messageSimple("Agregar horario", "Surgió un error inesperado por favor inténtelo de nuevo.", "danger");
                    },
                    error: function(e) {
                        component.messageSimple("Agregar horario", "Surgió un error inesperado por favor inténtelo de nuevo.", "danger");
                    }
                });
            }
        }
    };

    HorarioAdmin.prototype.deleteHorario = function(code) {
        if (validate.isNumeric(code)) {
            var delete_horario = function() {
                $.ajax({
                    type: 'POST',
                    url: base_url + '/admin/canchas/deleteschedule/',
                    data: {'code': code},
                    success: function(data) {
                        if (data.hasOwnProperty('message') && data.hasOwnProperty('status')) {
                            if (data.status) {
                                var tmp = parseInt($("#add_schedule").attr('data-sub'));
                                if (validate.isNumeric(tmp)) {
                                    _this.setHorario(tmp);
                                }
                            }
                        }
                    }
                });
            };
            component.messageAcept("Eliminar horario", "¿Esta seguro(a) de eliminar el horario?", delete_horario, "danger");
        }
    };

    return HorarioAdmin;
})();