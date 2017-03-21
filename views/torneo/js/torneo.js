var FileModel = Backbone.Model.extend({
    defaults: function() {
        return {
            'auto': false,
            'nameSend': 'document',
            'url': null,
            'selector': null,
            'response': null,
            'errors': [],
            'extensions': '*',
            'properties': {},
            'before': function() {
            },
            'success': function() {
            },
            'error': function() {
            }
        };
    },
    initialize: function() {
        if (!window.FormData) {
            throw new Error('El navegador no dispone de la tecnólogia necesaria para subir archivos, por favor intente con otro navegador.');
        }
        if (_.isNull(this.get('url')) || _.isNull(this.get('selector')) || !_.isFunction(this.get('before')) || !_.isFunction(this.get('success'))) {
            throw new Error('Parametros invalidos para inicialización.');
        }
        if (this.get('auto')) {
            this.send();
        }
    },
    validateExtensions: function(extension) {
        if (_.isArray(this.get('extensions'))) {
            var extensions = this.get('extensions');
            for (var i = 0; i < extensions.length; i++) {
                if (extensions[i] === extension) {
                    return true;
                }
            }
        } else if (_.isString(this.get('extensions')) && this.get('extensions') === "*") {
            return true;
        }
        return false;
    },
    error: function(name) {
        var temporal = this.get('errors');
        if (_.isArray(temporal)) {
            temporal.push(name);
            this.set('errors', temporal);
        }
    },
    send: function() {
        var formData = new FormData();
        var model = this;
        $(this.get('selector')).each(function(index, element) {
            if (!_.isEmpty($(element).val())) {
                var file = element.files[0];
                var extension = (file.name.substring(file.name.lastIndexOf("."))).toLowerCase();
                if (model.validateExtensions(extension)) {
                    formData.append(model.get('nameSend') + '[]', file);
                } else {
                    model.error(file.name);
                }
            }
        });
        if (!_.isNull(this.get('properties')) && _.isObject(this.get('properties'))) {
            var properties = this.get('properties');
            for (var index in properties) {
                formData.append(index, properties[index]);
            }
        }
        formData.append('name_files', this.get('nameSend'));
        var response = this.get('response');
        var errors = this.get('errors');
        if (errors.length > 0) {
            var string = "";
            for (var i = 0; i < errors.length; i++) {
                string += errors[i] + ' ,';
            }
            var text = 'Extensión invalida para los archivos: ' + string.substring(0, string.length - 1)
            if (!_.isNull(response)) {
                $(response).empty().append(text);
            } else {
                throw new Error(text);
            }
        }
        if (errors.length === 0) {
            $.ajax({
                url: this.get('url'),
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                beforeSend: this.get('before'),
                success: this.get('success'),
                error: this.get('error')
            });
        }
    }
});


$(function() {

    $("#description").attr('placeholder', "Escribir mensaje");

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
                url: base_url + '/torneo/publish/',
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
                url: base_url + '/torneo/loadnews/',
                data: {
                    'code': code
                },
                success: function(data) {
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
                url: base_url + '/torneo/update/',
                data: data,
                success: function(data) {
                    afterProcess(data);
                }
            });
        } else {
            component.messageSimple("Modifica Torneo...", "El nombre del torneo es obligatorio.", "danger");
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
                component.messageSimple("Modifica Torneo...", "Error al subir la imagen de poster. " + error.message, "danger");
            }
        }
    });

    var afterProcess = function(data) {
        if (data.hasOwnProperty('status') && data.hasOwnProperty('message')) {
            component.messageSimple("Modifica Torneo...", data.message);
            if (data.status) {
                setTimeout(function() {
                    window.location.reload();
                }, 1500);
            }
        }
    };

});