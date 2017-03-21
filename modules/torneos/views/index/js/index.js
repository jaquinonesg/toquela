//********************************************************
$(document).ready(function() {
    init_mis_torneos();
});

function init_mis_torneos() {
    $(".delete-torneo").on('click', function() {
        var cod_tour = $(this).attr("data");
        console.log(cod_tour);
        var func_delete = function() {
            console.log("ejcuta funcion interna...");
            $.ajax({
                dataType: "json",
                url: base_url + '/torneos/index/delete_torneo/',
                type: "POST",
                data: {'cod_tour': cod_tour},
                beforeSend: function() {
                    $(this).attr("disabled", "disabled");
                },
                success: function(dataSuccess) {
                    if (dataSuccess.retorno) {
                        component.redireccionar(base_url + '/torneos/index/');
                    } else {
                        component.messageSimple("Eliminar torneo", dataSuccess.mensaje, "danger");
                    }
                },
                timeout: 100000,
                error: function() {
                    component.messageSimple("Eliminar torneo", "No se pudo eliminar el torneo. Surgió un error en la conexión.", "danger");
                    return false;
                }
            });
        };

        component.messageAcept("Eliminar torneo", "¿Estás seguro de eliminar este torneo?", func_delete, "danger");
        func_delete = null;

    });
}