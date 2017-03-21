$(function() {

    $("ul#activity-form-type a").on('click', function(event) {
        event.preventDefault();
        $(this).parents("ul").find("li").removeClass("active");
        $(this).parent().addClass("active");

        var type = parseInt($("ul#activity-form-type li.active").attr('data-type'));
        switch (type) {
            case 2:
                $("#description").attr('placeholder', "Ingresar una URL de imagen.");
                break;
            case 3:
                $("#description").attr('placeholder', "Ingresar una URL de video.");
                break;
            case 1:
            default:
                $("#description").attr('placeholder', "Escribir mensaje");
                break;
        }


    });

    $("#publish").on('click', function() {
        var type = parseInt($("ul#activity-form-type li.active").attr('data-type'));
        var text = $("#description").val();
        var code = parseInt($(this).attr('data-code'));
        var validation = false;
        switch (type) {
            case 2:
            case 3:
                validation = isUrl(text);
                break;
            case 1:
            default:
                validation = !_.isEmpty(text);
                break;
        }
        if (validation && _.isNumber(code)) {
            $.ajax({
                type: 'POST',
                url: base_url + '/torneos/tablero/publish/',
                data: {
                    'type': type,
                    'text': text,
                    'code': code
                },
                success: function(data) {
                    if (data.hasOwnProperty('message') && data.hasOwnProperty('status')) {
                        if (data.status) {
                            loadNews(code);
                        }
                    }
                }
            });
        }
    });

    var isUrl = function(url) {
        var regex = /^(ht|f)tps?:\/\/\w+([\.\-\w]+)?\.([a-z]{2,4}|travel)(:\d{2,5})?(\/.*)?$/i;
        return regex.test(url);
    };

    var loadNews = function(code) {
        if (_.isNumber(code)) {
            $.ajax({
                type: 'POST',
                url: base_url + '/torneos/tablero/loadnews/',
                data: {
                    'code': code
                },
                success: function(data) {
                    console.log(data);
                    if (data.hasOwnProperty('html')) {
                        $("#content_news").html(data.html);
                    }
                }
            });
        }

    };

    var name_city = null, code_city = null;

    $("#city").autocomplete({
        source: base_url + "/autocomplete/city/",
        minLength: 3,
        select: function(event, ui) {
            $("#city").val(ui.item.label);
            name_city = ui.item.label;
            code_city = ui.item.value;
        },
        close: function(event, ui) {
            $("#city").val(name_city);
        }
    });

    $("#date_start").datepicker({
        defaultDate: "+1w",
        dateFormat: 'yy-mm-dd',
        onClose: function(selectedDate) {
            $("#date_end").datepicker("option", "minDate", selectedDate);
        }
    });
    $("#date_end").datepicker({
        defaultDate: "+1w",
        dateFormat: 'yy-mm-dd',
        onClose: function(selectedDate) {
            $("#date_start").datepicker("option", "maxDate", selectedDate);
        }
    });

    $("#btn_update").on('click', function(event) {
        event.preventDefault();
        var name = $("#name_tournament").val();
        var description = $("#description").val();
        var date_start = $("#date_start").val();
        var date_end = $("#date_end").val();
        var places = $("#places").val();
        var contacts = $("#contacts").val();
        var rules = $("#rules").val();
        var inscriptions = $("#inscriptions").val();
        var code = parseInt($(this).attr('data-code'));

        if (!_.isEmpty(name) && _.isNumber(code)) {
            var data = {
                'name': name,
                'code': code
            };
            if (!_.isEmpty(description)) {
                data['description'] = description;
            }
            if (!_.isEmpty(date_start)) {
                data['start'] = date_start;
            }
            if (!_.isEmpty(date_end)) {
                data['end'] = date_end;
            }
            if (!_.isEmpty(places)) {
                data['places'] = places;
            }
            if (!_.isEmpty(contacts)) {
                data['contacts'] = contacts;
            }
            if (!_.isEmpty(rules)) {
                data['rules'] = rules;
            }
            if (!_.isEmpty(inscriptions)) {
                data['inscriptions'] = inscriptions;
            }

            $.ajax({
                type: 'POST',
                url: base_url + '/torneos/tablero/update/',
                data: data,
                success: function(data) {
                    afterProcess(data);
                }
            });
        } else {
            modal("El nombre del torneo es obligatorio.");
        }

    });

    $("#img_poster").on('change', function() {
        var code = parseInt($(this).attr('data-code'));
        if (_.isNumber(code)) {
            try {
                new FileModel({
                    auto: true,
                    selector: '#img_poster',
                    url: base_url + '/file/postertournament/',
                    extensions: ['.jpg', '.png', '.jpeg'],
                    properties: {
                        code: code
                    },
                    success: function(data) {
                        afterProcess(data);
                    }
                });
            } catch (error) {
                console.log(error.message);
                modal(error.message, "Error al subir la imagen de poster");
            }
        }
    });

    var afterProcess = function(data) {
        if (data.hasOwnProperty('status') && data.hasOwnProperty('message')) {
            modal(data.message);
            if (data.status) {
                setTimeout(function() {
                    window.location.reload();
                }, 1500);
            }
        }
    };

});