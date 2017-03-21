$(function() {

    var name = null;

    $(".autocomplete_team").autocomplete({
        source: base_url + "/autocomplete/team/",
        minLength: 2,
        select: function(event, ui) {
            $(this).val(ui.item.label);
            name = ui.item.label;
            $(this).attr('data-code', ui.item.value);
            info_team(ui.item.value);
        },
        close: function(event, ui) {
            $(this).val(name);
        }
    });

    $("#save_teams").on('click', function() {
        var tournament = parseInt($(this).attr('data-code'));
        var teams = [];
        $("input.autocomplete_team[data-code]").each(function(index, element) {

            var code = parseInt($(element).attr('data-code'));
            var number = parseInt($(element).attr('data-number'));
            if (_.isNumber(code) && _.isNumber(number) && !_.isNaN(code)) {
                var team = {
                    'number': number,
                    'code': code
                };
                if (!_.contains(teams, team)) {
                    var aux = _.find(teams, function(t) {
                        return t.code === code;
                    });
                    if (_.isUndefined(aux)) {
                        teams.push(team);
                    } else {
                        $("input.autocomplete_team[data-code=" + code + "]").not(':first').val("").removeAttr('data-code');
                    }
                }
            }
        });
        if (_.size(teams) > 0) {
            $.ajax({
                type: 'POST',
                url: base_url + '/torneos/participantes/saveteams/',
                data: {
                    'teams': teams,
                    'code': tournament
                },
                success: function(data) {
                    after(data);
                }
            });
        }
    });

    $(".remove_team").on('click', function() {
        var team = parseInt($(this).attr('data-code'));
        var tournament = parseInt($(this).attr('data-tournament'));

        if (_.isNumber(team) && _.isNumber(tournament)) {
            $.ajax({
                type: 'POST',
                url: base_url + '/torneos/participantes/removeteam/',
                data: {
                    'code': team,
                    'tournament': tournament
                },
                success: function(data) {
                    after(data);
                }
            });
        }

    });

    var after = function(data) {
        if (data.hasOwnProperty('status') && data.hasOwnProperty('message')) {
            if (data.status) {
                var func_reload = function() {
                    window.location.reload();
                };
                console.log(data.message);
                component.messageAcept("Participantes...", data.message, func_reload);
            } else {
                component.messageSimple()("Participantes...", data.message, "danger");
            }

        }
    };

    var info_team = function(cod) {
        $.ajax({
            dataType: "json",
            url: base_url + '/torneo/info_team/',
            type: "POST",
            data: {'code': cod},
            success: function(dataSuccess) {
                if (dataSuccess.retorno) {
                    $("#container-info-team").html(dataSuccess.html);
                } else {
                    $("#container-info-team").html("");
                }
            }
        });
    };
});