var unit_instance = true;
function init_calendario_public() {
    if (unit_instance) {
        var cp = new CalendarioPublico();
        cp.init();
        unit_instance = false;
    }
}

var CalendarioPublico = function() {
    var base = this;

    this.init = function() {
        this.events();
    };

    this.events = function() {
        $(document).on('click', '.btn_detalle_calendario', function() {
            component.popupHtml("Información", "popup_detalle_calendario_body", "popup_detalle_calendario_footer", false);
            base.getDataDetallePartido($(this).attr("partido"));
        });
    };

    this.getDataDetallePartido = function(partido) {
        $.ajax({
            type: 'POST',
            url: base_url + '/torneos/calendario/get_detalle_calendario_public/',
            data: {
                'partido': partido
            },
            success: function(data) {
                if (data.hasOwnProperty('status') && data.hasOwnProperty('html')) {
                    if (data.status) {
                        $(".contend_detalle_calendario").html(data.html);
                    } else {
                        component.popupHtmlHide();
                        component.messageSimple("Calendario", data.message, "danger");
                    }
                }
            }
        });
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
    _this.getMatchDetalle = function(cod_match, programeichon) {
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
                                $("#modal-detalle-partido .modal-body").html(data.html);
                            // _this.getPlayersLocalVisitant(aux_obj.partido.local.cod, aux_obj.partido.visitant.cod);
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

    _this.loadContendDetalle = function(aux_obj) {
        var mifecha = '<span style="color: #FF0000;">' + aux_obj.titulo + '</span>';
        var titulo = '<span style="color: #FF0000;">' + aux_obj.titulo + '</span>';
        if (!validate.isEmpty(aux_obj.partido.date) && !validate.isEmpty(aux_obj.partido.hour)) {
            titulo = aux_obj.titulo;
            mifecha = aux_obj.partido.date + ' <span class="glyphicon glyphicon-transfer text-azul" style="font-size: 12px;"></span>&nbsp;<strong>HORA: </strong>&nbsp; ' + aux_obj.partido.hour + '</p>';
        }
        $("#" + _this.id_titulo).html(titulo);

        var micomplejo = "Sin cancha.";
        console.log("ir complex: ", aux_obj.partido.lugar.ircomplex);
        if (validate.isNumeric(aux_obj.partido.lugar.codcomplex) && !validate.isEmpty(aux_obj.partido.lugar.ircomplex)) {
            micomplejo = '<a href="' + aux_obj.partido.lugar.ircomplex + '" target="_blank">\n\
                    <span class="glyphicon glyphicon-hand-up"></span> &nbsp;' + aux_obj.partido.lugar.namecomplex + '\n\
                </a>';
        }

        var imglocal = base_url + "/public/img/fotoequipo.jpg";
        if (!validate.isEmpty(aux_obj.partido.local.img)) {
            imglocal = base_url + "/public" + aux_obj.partido.local.img;
        }

        var imgvisitant = base_url + "/public/img/fotoequipo.jpg";
        if (!validate.isEmpty(aux_obj.partido.visitant.img)) {
            imgvisitant = base_url + "/public" + aux_obj.partido.visitant.img;
        }
        $("#" + _this.id_popup_detalle + " #contend-detalle").html(
                '<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="border-bottom: 1px solid #e5e5e5;margin-bottom: 5px;padding-bottom: 5px;">\n\
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="padding: 0;margin: 0;">\n\
                            <p><strong class="text-azul">PARTIDO <span class="text-azul"># ' + aux_obj.partido.jornada + '</span>: </strong>&nbsp; ' + aux_obj.partido.titulo + '</p>\n\
                            <p><strong class="text-azul">RESULTADO PARCIAL: </strong>&nbsp; ' + aux_obj.partido.local.score + ' - ' + aux_obj.partido.visitant.score + '</p>\n\
                            <p><strong class="text-azul">GRUPO: </strong>&nbsp; ' + aux_obj.partido.grupo + '</p>\n\
                            <p><strong class="text-azul">JORNADA: </strong>&nbsp; ' + aux_obj.partido.jornada + '</p>\n\
                            <p><strong class="text-azul">FECHA: </strong>&nbsp; ' + mifecha + '\n\
                        </div>\n\
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="padding: 0;margin: 0;">\n\
                            <h3 class="text-center text-azul">LUGAR</h3>\n\
                            <p><strong class="text-azul">COMPLEJO: </strong>&nbsp; ' + micomplejo + '</p>\n\
                            <p><strong class="text-azul">DESCRIPCIÓN LUGAR: </strong>&nbsp; ' + aux_obj.partido.lugar.descriptionplace + '</p>\n\
                        </div>\n\
                        <div class="clear"></div>\n\
                    </div>\n\
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 contend-local">\n\
                        <a href="' + aux_obj.partido.local.ir + '" target="_blank" style="text-decoration: none;">\n\
                            <h3 class="text-center text-azul">LOCAL</h3>\n\
                            <div class="img-thumbnail capa-img">\n\
                                <img title="' + aux_obj.partido.local.name + '" style="width: 100%;" src="' + imglocal + '">\n\
                            </div>\n\
                            <div style="display: inline-block;vertical-align: top; margin-left: 5px;">\n\
                                <p>' + aux_obj.partido.local.name + '</p>\n\
                                <p><strong class="text-azul">Marcador: </strong> ' + aux_obj.partido.local.score + '</p>\n\
                            </div>\n\
                            <div id="playerslocal">\n\
                                <div class="text-center">\n\
                                <p>Cargando jugadores locales...</p><br>\n\
                                <img class="img-thumbnail loader-medium" src="' + base_url + '/public/img/loader.gif"/>\n\
                                </div>\n\
                            </div>\n\
                        </a>\n\
                    </div>\n\
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 contend-local">\n\
                        <a href="' + aux_obj.partido.visitant.ir + '" target="_blank" style="text-decoration: none;">\n\
                            <h3 class="text-center text-azul">VISITANTE</h3>\n\
                            <div class="img-thumbnail capa-img">\n\
                                <img title="' + aux_obj.partido.visitant.name + '" style="width: 100%;" src="' + imgvisitant + '">\n\
                            </div>\n\
                            <div style="display: inline-block;vertical-align: top; margin-left: 5px;">\n\
                                <p>' + aux_obj.partido.visitant.name + '</p>\n\
                                <p><strong class="text-azul">Marcador: </strong> ' + aux_obj.partido.visitant.score + '</p>\n\
                            </div>\n\
                            <div id="playersvisitant">\n\
                                <div class="text-center">\n\
                                <p>Cargando jugadores visitantes...</p><br>\n\
                                <img class="img-thumbnail loader-medium" src="' + base_url + '/public/img/loader.gif"/>\n\
                                </div>\n\
                            </div>\n\
                        </a>\n\
                    </div>');
        _this.getPlayersLocalVisitant(aux_obj.partido.local.cod, aux_obj.partido.visitant.cod);
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
