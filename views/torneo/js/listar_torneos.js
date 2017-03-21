/**
 * Carga e inicializa el javascript para el paginador
 * @param {string} clase_alias_paginador = es una clase adicional que se le agrega al paginador para darle una identificación unica.
 * @param {string} id_contend_load_data = id sin numeral (#) del contenedor donde se van a cargar la lista de los torneos
 * @param {string} id_form_buscador = id sin numeral (#) del formulario que contiene los componentes del buscador.
 * @param {string} url_load_data = url o link donde se hace la petición ajax para caargar los datos.
 * @type {PaginarTorneos}
 */
var PaginarTorneos = (function() {
    var _self = null;
    var timer_buscador = null;
    function PaginarTorneos(clase_alias_paginador, id_contend_load_data, id_form_buscador, url_load_data) {
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

    PaginarTorneos.prototype.readConfigPaginator = function() {
        this.objpaginator = $("." + this.clase_alias_paginador);
        this.total_elementos = parseInt(this.objpaginator.attr("total_elementos"));
        this.num_elementos_por_pagina = parseInt(this.objpaginator.attr("num_elementos_por_pagina"));
        this.pagina_seleccionada = parseInt(this.objpaginator.attr("pagina_seleccionada"));
        this.num_paginas = parseInt(this.objpaginator.attr("num_paginas"));
        this.inicio_limit = parseInt(this.objpaginator.attr("inicio_limit"));
        this.fin_limit = parseInt(this.objpaginator.attr("fin_limit"));
        $(".numeric").keyup(function(e) {
            if (/\D/g.test(this.value)) {
                this.value = this.value.replace(/\D/g, '');
            }
        });
    };

    PaginarTorneos.prototype.loadPaginator = function() {
        if (this.process && this.isajax) {
            this.events();
        }
    };

    PaginarTorneos.prototype.events = function() {
        $(document).on('click', "." + this.clase_alias_paginador + " ._pag", function() {
            var pag = parseInt($(this).attr("pag"));
            if (pag != _self.pagina_seleccionada) {
                _self.getTorneos($("#" + _self.id_form_buscador + " #sel_torneo_tipo").val(), $("#" + _self.id_form_buscador + " #txt_num_participantes").val(), $("#" + _self.id_form_buscador + " #txt_bus_torneo").val(), pag);
            }
        });
        $(document).on('click', "." + this.clase_alias_paginador + " #_btn_back", function() {
            var pag_aux = (_self.pagina_seleccionada - 1);
            if (pag_aux > 0) {
                _self.getTorneos($("#" + _self.id_form_buscador + " #sel_torneo_tipo").val(), $("#" + _self.id_form_buscador + " #txt_num_participantes").val(), $("#" + _self.id_form_buscador + " #txt_bus_torneo").val(), pag_aux);
            }
        });
        $(document).on('click', "." + this.clase_alias_paginador + " #_btn_next", function() {
            var pag_aux = (_self.pagina_seleccionada + 1);
            if ((pag_aux > 0) && (pag_aux <= _self.num_paginas)) {
                _self.getTorneos($("#" + _self.id_form_buscador + " #sel_torneo_tipo").val(), $("#" + _self.id_form_buscador + " #txt_num_participantes").val(), $("#" + _self.id_form_buscador + " #txt_bus_torneo").val(), pag_aux);
            }
        });
        $(document).on('click', "." + this.clase_alias_paginador + " #_btn_ir_pag", function() {
            if (validate.isNumeric($("." + _self.clase_alias_paginador + " #_txt_ir_pag").val())) {
                var pag_aux = parseInt($("." + _self.clase_alias_paginador + " #_txt_ir_pag").val());
                if ((pag_aux > 0) && (pag_aux != _self.pagina_seleccionada) && (pag_aux <= _self.num_paginas)) {
                    _self.getTorneos($("#" + _self.id_form_buscador + " #sel_torneo_tipo").val(), $("#" + _self.id_form_buscador + " #txt_num_participantes").val(), $("#" + _self.id_form_buscador + " #txt_bus_torneo").val(), pag_aux);
                }
            }
        });
        //------------buscador torneos
        $("#" + this.id_form_buscador + " #sel_torneo_tipo").on("change", function() {
            _self.getTorneos($(this).val(), $("#" + _self.id_form_buscador + " #txt_num_participantes").val(), $("#" + _self.id_form_buscador + " #txt_bus_torneo").val(), 1);
        });
        $("#" + _self.id_form_buscador + " #txt_num_participantes").on('keyup', function() {
            if (validate.isEmpty($(this).val())) {
                _self.focusTimeBuscador();
            } else if (validate.isInteger(parseInt($(this).val()))) {
                _self.focusTimeBuscador();
            }
        });
        $("#" + _self.id_form_buscador + " #txt_num_participantes").tooltip();

        $(document).keypress(function(e) {
            if (e.which == 13) {
                return false;
            }
        });
        $("#" + _self.id_form_buscador + " #txt_bus_torneo").on('keyup', function(e) {
            e.preventDefault();
            if (e.which == 13) {
                _self.focusTimeBuscador(true);
            } else {
                _self.focusTimeBuscador();
            }
        });
    };

    PaginarTorneos.prototype.focusTimeBuscador = function(deprimera) {
        clearTimeout(timer_buscador);
        if (deprimera) {
            _self.getTorneos($("#" + _self.id_form_buscador + " #sel_torneo_tipo").val(), $("#" + _self.id_form_buscador + " #txt_num_participantes").val(), $("#" + _self.id_form_buscador + " #txt_bus_torneo").val(), 1);
        } else {
            timer_buscador = setTimeout(function() {
                _self.getTorneos($("#" + _self.id_form_buscador + " #sel_torneo_tipo").val(), $("#" + _self.id_form_buscador + " #txt_num_participantes").val(), $("#" + _self.id_form_buscador + " #txt_bus_torneo").val(), 1);
            }, 1000);
        }
    };

    PaginarTorneos.prototype.getTorneos = function(tipo, participantes, strtorneo, pag) {
        if (validate.isInteger(pag) && (pag > 0)) {
            $.ajax({
                type: 'POST',
                url: base_url + "/torneo/search_torneos",
                data: {'tipo': tipo, 'participantes': participantes, 'strtorneo': strtorneo, 'pag': pag},
                beforeSend: function() {
                    $("#" + _self.id_contend_load_data).html(_self.getHtmlLoader());
                },
                success: function(data) {
                    if (data.hasOwnProperty("status") && data.hasOwnProperty("message") && data.hasOwnProperty("html")) {
                        if (data.status) {
                            $("#" + _self.id_contend_load_data).html(data.html);
                            _self.readConfigPaginator();
                            return;
                        }
                    }
                    $("#" + _self.id_contend_load_data).html("<br><br><br><p>No se cargaron lo datos correctamente.</p>");
                }
            });
        }
    };

    PaginarTorneos.prototype.getHtmlLoader = function() {
        return '<br><br><br><div class="text-center"><p>Cargando...</p><br><img class="img-thumbnail loader-medium" src="' + base_url + '/public/img/loader.gif"/></div><br><br><br>';
    };
    return PaginarTorneos;
})();