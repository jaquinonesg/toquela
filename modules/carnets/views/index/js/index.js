//********************************************************

var Export = function() {
    var base = this;
    this.torneo = null;

    this.init = function(torneo) {
        this.torneo = torneo;
        this.events();
    };

    this.events = function() {
        //--------------------------
        $(".printteam").on("click", function() {
            base.loadHref($(this).attr("href"));
        });
        //--------------------------
        $(".exportjpg").on("click", function() {
            base.loadHref($(this).attr("href"));
        });
        //--------------------------
        $(".exportpng").on("click", function() {
            base.loadHref($(this).attr("href"));
        });
        //--------------------------
        $(".exportpdf").on("click", function() {
            base.loadHref($(this).attr("href"));
        });
        //----------
        var nameequipo = "";
        $("#txt_buscar_equipo").autocomplete({
            source: base_url + "/carnets/index/autocompleteequipo/" + base.torneo,
            minLength: 2,
            select: function(event, ui) {
                $(this).val(ui.item.label);
                nameequipo = ui.item.label;
                $(this).attr('data-code', ui.item.value);
                base.loadEquipo(ui.item.value);
            },
            close: function(event, ui) {
                $(this).val(nameequipo);
            }
        });
        //----------
        var namejugador = "";
        $("#txt_buscar_jugador").autocomplete({
            source: base_url + "/carnets/index/autocompleteusuario/" + base.torneo,
            minLength: 2,
            select: function(event, ui) {
                $(this).val(ui.item.label);
                namejugador = ui.item.label;
                $(this).attr('data-code', ui.item.value);
                base.loadUsuario(ui.item.value);
            },
            close: function(event, ui) {
                $(this).val(namejugador);
            }
        });
    };

    this.loadHref = function(href) {
        window.open(href);
    };

    this.loadEquipo = function(equipo) {
        $.ajax({
            type: 'POST',
            url: base_url + '/carnets/index/getresultadoequipo/',
            data: {
                'equipo': equipo,
                'torneo': base.torneo
            },
            success: function(data) {
                if (data.hasOwnProperty("html")) {
                    $("#result_equipo").html(data.html);
                }
            }
        });
    };
    
    this.loadUsuario = function(usuario) {
        $.ajax({
            type: 'POST',
            url: base_url + '/carnets/index/getresultadousuario/',
            data: {
                'usuario': usuario,
                'torneo': base.torneo
            },
            success: function(data) {
                if (data.hasOwnProperty("html")) {
                    $("#result_jugador").html(data.html);
                }
            }
        });
    };
};