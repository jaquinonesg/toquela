$(function() {
    var cod_user = null, name_user = null;
    /*$("#username").autocomplete({
        source: base_url + "/equipos/searchuser/",
        minLength: 3,
        select: function(event, ui) {
            $("#username").val(ui.item.label);
            cod_user = ui.item.value;
            name_user = ui.item.label;
        },
        close: function(event, ui) {
            $("#username").val(name_user);
        }
    });*/

    $("#add_player_team").on('click', function(event) {
        event.preventDefault();
        var code_team = parseInt($(this).attr('data-code'));
        if (_.isNumber(cod_user) && !_.isEmpty(name_user) && _.isNumber(code_team)) {
            $.ajax({
                type: 'POST',
                url: base_url + '/equipos/addplayer/',
                data: {
                    code: cod_user,
                    team: code_team
                },
                success: function(data) {
                    if (data.hasOwnProperty('message') && data.hasOwnProperty('status')) {
                        alert(data.message);
                        if (data.status) {
                            window.location.reload();
                        }
                    }
                }
            });
        }
    });
});