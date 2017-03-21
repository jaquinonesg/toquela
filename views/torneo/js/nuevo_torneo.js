$(document).ready(function() {
    $("#btn_create").on('click', function(event) {
        event.preventDefault();
        var name = $("#name_tournament").val();
        var descripcion = $("#descripcion").val();
        var type = parseInt($("input[name=type]:checked").val());
        var n_participants = parseInt($("#n_participants").val());
        if (!_.isEmpty(name) && !_.isEmpty(descripcion) && _.isNumber(type) && _.isNumber(n_participants)) {
            $.ajax({
                type: 'POST',
                url: base_url + '/torneo/createtournament/',
                data: {
                    'name': name,
                    'descripcion': descripcion,
                    'type': type,
                    'number': n_participants
                },
                success: function(data) {
                    processResult(data);
                }
            });
        } else {
            component.messageSimple("Torneo...", "Todos los campos son obligatorios.", "danger");
        }
    });

    var processResult = function(data) {
        console.log(data);
        if (data.hasOwnProperty('status')) {
            if (data.status) {
                component.messageSimple("Torneo...", data.message);
            } else {
                component.messageSimple("Torneo...", data.message, "danger");
            }
        }
    };

});