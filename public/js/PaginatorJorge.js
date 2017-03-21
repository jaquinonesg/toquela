/**
 * Carga e inicializa el javascript para el paginador
 * @param {String} clase_alias = es una clase adicional que se le agrega al paginador para darle una identificación unica.
 * @param {String} contend_load_data = id
 * @type _L4.PaginatorJorge
 */
var PaginatorJorge = (function() {
    var _self = null;
    function PaginatorJorge(clase_alias, contend_load_data, url_load_data) {
        _self = this;
        this.process = false;
        this.contend_load_data = "";
        this.url_load_data = "";
        if (!validate.isEmpty(clase_alias)) {
            this.clase_alias = clase_alias;
            this.objpaginator = $("." + this.clase_alias);
            if (this.objpaginator.length) {
                this.total_elementos = parseInt(this.objpaginator.attr("total_elementos"));
                this.num_elementos_por_pagina = parseInt(this.objpaginator.attr("num_elementos_por_pagina"));
                this.pagina_seleccionada = parseInt(this.objpaginator.attr("pagina_seleccionada"));
                this.num_paginas = parseInt(this.objpaginator.attr("num_paginas"));
                this.inicio_limit = parseInt(this.objpaginator.attr("inicio_limit"));
                this.fin_limit = parseInt(this.objpaginator.attr("fin_limit"));
                this.isajax = false;
                if (this.objpaginator.attr("isajax") == "true") {
                    this.isajax = true;
                }
                if (this.isajax) {
                    if (validate.isEmpty(contend_load_data) && validate.isEmpty(url_load_data)) {
                        alert("Debe ingresar el id sin numeral (#) del contenedor donde se van a cargar los datos del Ajax y la URL o link de donde provienen los datos.");
                        return;
                    }
                    this.contend_load_data = contend_load_data;
                    this.url_load_data = url_load_data;
                }
                if (validate.isNumeric(this.total_elementos) && validate.isNumeric(this.num_elementos_por_pagina) && validate.isNumeric(this.pagina_seleccionada) && validate.isNumeric(this.num_paginas) && validate.isNumeric(this.inicio_limit) && validate.isNumeric(this.fin_limit)) {
                    this.process = true;
                    this.loadPaginator();
                    return;
                }
            }
        }
        alert("No se encontro la clase alias del paginador...");
    }

    PaginatorJorge.prototype.loadPaginator = function() {
        if (this.process && this.isajax) {
            this.events();
        }
    };

    PaginatorJorge.prototype.events = function() {
        $(document).on('click', "." + this.clase_alias + " ._pag", function() {
            var pag = parseInt($(this).attr("pag"));
            if (pag != _self.pagina_seleccionada) {
                _self.loadAjax(pag);
            }
        });
        $(document).on('click', "." + this.clase_alias + " #_btn_back", function() {
            var pag_aux = (_self.pagina_seleccionada - 1);
            if (pag_aux > 0) {
                _self.loadAjax(pag_aux);
            }
        });
        $(document).on('click', "." + this.clase_alias + " #_btn_next", function() {
            var pag_aux = (_self.pagina_seleccionada + 1);
            if ((pag_aux > 0) && (pag_aux <= _self.num_paginas)) {
                _self.loadAjax(pag_aux);
            }
        });
        $(document).on('click', "." + this.clase_alias + " #_btn_ir_pag", function() {
            if (validate.isNumeric($("." + _self.clase_alias + " #_txt_ir_pag").val())) {
                var pag_aux = parseInt($("." + _self.clase_alias + " #_txt_ir_pag").val());
                if ((pag_aux > 0) && (pag_aux != _self.pagina_seleccionada) && (pag_aux <= _self.num_paginas)) {
                    _self.loadAjax(pag_aux);
                }
            }
        });
        $("." + _self.clase_alias + " .numeric").keyup(function(e) {
            if (/\D/g.test(this.value)) {
                this.value = this.value.replace(/\D/g, '');
            }
        });
    };

    PaginatorJorge.prototype.loadAjax = function(pag) {
        if (validate.isNumeric(pag)) {
            $.ajax({
                type: 'POST',
                url: _self.url_load_data,
                data: {'pag': pag},
                beforeSend: function() {
                    $("#" + _self.contend_load_data).html(_self.getHtmlLoader());
                },
                success: function(data) {
                    if (data.hasOwnProperty("status") && data.hasOwnProperty("message") && data.hasOwnProperty("html")) {
                        if (data.status) {
                            $("." + _self.clase_alias + ' .active').removeClass("active");
                            $("." + _self.clase_alias + ' ._pag[pag="' + pag + '"]').addClass("active");
                            _self.pagina_seleccionada = pag;
                            $("#" + _self.contend_load_data).html(data.html);
                            return;
                        }
                    }
                    $("#" + _self.contend_load_data).html("<p>No se cargaron lo datos correctamente.</p>");
                }
            });
        }
    };

    PaginatorJorge.prototype.getHtmlLoader = function() {
        return '<br><br><br><div class="text-center"><p>Cargando...</p><br><img class="img-thumbnail loader-medium" src="' + base_url + '/public/img/loader.gif"/></div><br><br><br>';
    };

    return PaginatorJorge;
})();
