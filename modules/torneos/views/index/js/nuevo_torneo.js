$(document).ready(function() {
    $('#descripcion').tooltip();

    $("#btn_create").on('click', function(event) {
        var element = $(this);
        event.preventDefault();
        var name = $("#name_tournament").val();
        var descripcion = $("#descripcion").val();
        var type = parseInt($("input[name=type]:checked").val());
        var n_participants = getNparticipants();
        if (!_.isEmpty(name) && !_.isEmpty(descripcion) && _.isNumber(type) && _.isNumber(n_participants)) {
            $.ajax({
                type: 'POST',
                url: base_url + '/torneos/index/createtournament/',
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
                var protocolo = window.location.protocol;
                var host = window.location.host;
                var link = protocolo + '//' + host + data.link + '?firstEnter=' + data.message + '';
                window.location.assign(link);

            } else {
                component.messageSimple("Torneo...", data.message, "danger");
            }
        }
    };

    $("input[type=radio][name=type]").on('change', function() {
        var value = parseInt($(this).val());
        $("#select_1,#select_2,#select_3,#select_4").hide();
        switch (value) {
            case 1:
                $("#select_1").show();
                break;
            case 2:
                $("#select_2").show();
                break;
            case 3:
                $("#select_3").show();
                break;
            case 4:
                $("#select_4").show();
                break;
        }
    });

    var getNparticipants = function() {
        var value = parseInt($("input[type=radio]:checked").val()), n = 0;
        switch (value) {
            case 1:
                n = parseInt($("#select_1").val());
                break;
            case 2:
                n = parseInt($("#select_2").val());
                break;
            case 3:
                n = parseInt($("#select_3").val());
                break;
            case 4:
                n = parseInt($("#select_4").val());
                break;
        }
        return n;
    };

});