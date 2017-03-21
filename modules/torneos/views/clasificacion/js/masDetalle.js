var unit_instance = true;
function init_mas_detalle() {
    if (unit_instance) {
        var cp = new masDetalle();
        cp.init();
        unit_instance = false;
    }
}

var masDetalle = function() {
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
