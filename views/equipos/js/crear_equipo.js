$(function() {
    $('select[name=codcity]').on('change', function() {
        $('select[name=codlocality]').html('<option value="1">Cargando...</option>');
        var codcity = $('select[name=codcity]').val();
        $.ajax({
            type: "POST",
            cache: false,
            url: base_url + "/dialog/localities/",
            beforeSend: function() {
                $.fancybox.showActivity();
            },
            data: {
                city: codcity
            },
            success: function(data) {
                $.fancybox.hideActivity();
                $.fancybox.close();
                $('select[name=codlocality]').html(data);
                var cod = parseInt($("#codlocalityhidden").val());
                if (!_.isNull(cod) && !_.isUndefined(cod) && _.isNumber(cod)) {
                    $('select[name=codlocality] option[value=' + cod + ']').attr('selected', 'selected');
                }
            }
        });

    });
    $('select[name=codcity]').trigger('change');
    $(document).on('click','input, select', function(){
        $(this).attr('style','');
    })
    $("#create_team").on('click', function() {
        var name = $("#name").val();
        var gender = $("#sex").val();
        // var locality = parseInt($("#locality").val());
        var description = $("#description").val();
        var type = $("#typefutbol").val();
        if (!_.isEmpty(name) && !_.isEmpty(gender) && validate.isNumeric(type)) {
            $.ajax({
                type: 'POST',
                url: base_url + '/equipos/createteam/',
                data: {
                    'name': name,
                    'gender': gender,
                    'description': description,
                    'type': type
                },
                beforeSend: function() {
                    component.popupLoader("Equipos", "Espera un momento mientras se crea el equipo...");
                },
                success: function(data) {
                    console.log(data);
                    component.popupHtmlHide();
                    if (data.hasOwnProperty('message') && data.hasOwnProperty('status')) {
                        if (data.status) {
                            component.messageSimple("Equipos", "Su equipo fue creado con éxito...");
                            component.redireccionar(base_url + "/equipos/");
                        } else {
                            component.messageSimple("Equipos", data.message, "danger");
                        }
                    }
                }
            });
} else {
    if(_.isEmpty(name)){
        $("#name").attr('style','border: 2px solid red;');
    }
    if(_.isEmpty(gender)){
        $("#sex").attr('style','border: 2px solid red;');
    }
    if(validate.isNumeric(type)){
        $("#typefutbol").attr('style','border: 2px solid red;');
    }
    component.messageSimple("Equipos", "Los campos son obligatorios. Por favor inténtelo de nuevo.", "danger");
}
});

$("#update_team").on('click', function() {
    var type = $("#typefutbol").val();
    var name = $("#name").val();
    var gender = $("#sex").val();
    var locality = parseInt($("#locality").val());
    var description = $("#description").val();
    var code = $(this).attr('data-code');
    var obj = {
                'name': name,
                'gender': gender,
                'locality': locality,
                'description': description,
                'type': type,
                'code': code
            }; 
            console.log(obj);
    if (!_.isEmpty(name) && !_.isEmpty(gender) && _.isNumber(locality) && !_.isEmpty(description) && validate.isNumeric(type)) {
        $.ajax({
            type: 'POST',
            url: base_url + '/equipos/updateteam/',
            data: obj,
            success: function(data) {
                console.log(data);
                if (data.hasOwnProperty('message') && data.hasOwnProperty('status')) {
                    if (data.status) {
                        component.messageSimple("Equipos", data.message);
                        component.reload();
                    } else {
                        component.messageSimple("Equipos", data.message, "danger");
                    }
                }
            }
        });
    } else {
        component.messageSimple("Equipos", "Los campos son obligatorios.", "danger");
    }
});


var getTypes = function() {
    var types = [];
    $(".type_team:checked").each(function(i, e) {
        var code = parseInt($(e).attr('data-code'));
        if (_.isNumber(code)) {
            types.push(code);
        }
    });
    return types;
};

$("#file_team").on('change', function() {
    var code = parseInt($(this).attr('data-code'));
    if (_.isNumber(code)) {
        try {
            new FileModel({
                auto: true,
                selector: '#file_team',
                url: base_url + '/file/phototeam/',
                extensions: ['.jpg', '.png', '.jpeg'],
                properties: {
                    'code': code
                },
                before: function() {
                    component.popupLoader("Equipos", "Espere un momento mientras se sube la imagen...");
                },
                success: function(data) {
                    component.popupHtmlHide();
                    if (data.hasOwnProperty('message') && data.hasOwnProperty('status')) {
                        if (data.status) {
                            component.messageSimple("Equipos", data.message);
                            component.reload();
                        } else {
                            component.messageSimple("Equipos", data.message, "danger");
                        }
                    }
                }
            });
        } catch (error) {
            component.messageSimple("Equipos", error.message, "danger");
        }
    }
});
$(document).on('click','.escojo_esta', function(){
    var codteam = $(this).attr('data-team');
    var codattachment = $(this).attr('data-code');
    if(!validate.isEmpty(codteam) && !validate.isEmpty(codattachment)){
        escogerFotoPerfil(codteam, codattachment);
    }
});

var escogerFotoPerfil = function(codteam, codattachment){
    component.messageAcept('Mensaje','¿Quire escoger esta imagen como la foto principal del equipo?', function(){
        var obj = {'codteam': codteam, 'codattachment': codattachment};
        $.ajax({
            type: 'POST',
            url: base_url +'/equipos/escogerFotoPerfil',
            data: obj,
            success: function(data){
                if(data.status){
                    component.messageSimple('Exito','Se ha escogido como la foto principal del equipo.','info');
                    $(document).on('click','.modal-info', function(){
                        location.reload();
                    });
                }else{
                    component.messageSimple('Mensaje','No se pudo realizar la acción');
                }
            },
        });
    });
};

$("#inscription_team").on('click', function() {
    var team = parseInt($(this).attr("data-team"));
    if (_.isNumber(team)) {
        $.ajax({
            type: 'POST',
            url: base_url + '/equipos/inscription/',
            data: {
                team: team
            },
            success: function(data) {
                console.log(data);
            }
        });
    }

});

$(".delete_img").on('click', function() {
    var team = parseInt($(this).attr('data-team'));
    var attachment = parseInt($(this).attr('data-code'));
    var func = function() {
        if (_.isNumber(team) && _.isNumber(attachment)) {
            $.ajax({
                type: 'POST',
                url: base_url + '/file/deletephototeam/',
                data: {
                    team: team,
                    attachment: attachment
                },
                success: function(data) {
                    if (data.hasOwnProperty('message') && data.hasOwnProperty('status')) {
                        if (data.status) {
                            component.messageSimple("Equipos", data.message);
                            component.reload();
                        } else {
                            component.messageSimple("Equipos", data.message, "danger");
                        }
                    }
                }
            });
        }
    };
    component.messageAcept("Equipos", "¿Esta seguro(a) que desea eliminar la imagen?", func, "danger");
});

$('.captain_team').on('click', function() {
    component.messageAcept('ADVERTENCIA','El equipo le pertenecerá a este jugador y no va a poder volver editarlo.',function(){
        var team = parseInt($(this).attr("data-team"));
        var user = parseInt($(this).attr("data-code"));
        if (_.isNumber(team) && _.isNumber(user)) {
            $.ajax({
                type: 'POST',
                url: base_url + '/equipos/selectcaptain/',
                data: {
                    'team': team,
                    'user': user
                },
                success: function(data) {
                    if (data.hasOwnProperty('message') && data.hasOwnProperty('status')) {
                        if (data.status) {
                            component.messageSimple("Equipos", data.message);
                            component.reload();
                        } else {
                            component.messageSimple("Equipos", data.message, "danger");
                        }
                    }
                }
            });
        }
    },'warning');
});

$("#remove_captain").on('click', function() {
    var team = parseInt($(this).attr("data-team"));
    var user = parseInt($(this).attr("data-code"));

    if (_.isNumber(team) && _.isNumber(user)) {
        $.ajax({
            type: 'POST',
            url: base_url + '/equipos/removecaptain/',
            data: {
                'team': team,
                'user': user
            },
            success: function(data) {
                if (data.hasOwnProperty('message') && data.hasOwnProperty('status')) {
                    if (data.status) {
                        component.messageSimple("Equipos", data.message);
                        component.reload();
                    } else {
                        component.messageSimple("Equipos", data.message, "danger");
                    }
                }
            }
        });
    }

});

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

$(".popup").fancybox({
    'scrolling': 'no',
    'titleShow': false,
    'transitionIn': 'elastic',
    'transitionOut': 'elastic',
    'easingIn': 'easeOutBack',
    'easingOut': 'easeInBack',
    'autoDimensions': true,
});

var cod_user = null, name_user = null;
//    $("#username").autocomplete({
//        source: base_url + "/equipos/searchuser/",
//        minLength: 3,
//        select: function(event, ui) {
//            $("#username").val(ui.item.label);
//            cod_user = ui.item.value;
//            name_user = ui.item.label;
//        },
//        close: function(event, ui) {
//            $("#username").val(name_user);
//        }
//    });

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
                    if (data.status) {
                        component.messageSimple("Equipos", data.message);
                        component.reload();
                    } else {
                        component.messageSimple("Equipos", data.message, "danger");
                    }
                }
            }
        });
    }
});

$('.remove_user_team').on('click', function() {
    var user = parseInt($(this).attr('data-code'));
    var team = parseInt($(this).attr('data-team'));
    var func = function() {
        if (_.isNumber(user) && _.isNumber(team)) {
            $.ajax({
                type: 'POST',
                url: base_url + '/equipos/removeuserteam/',
                data: {
                    user: user,
                    team: team
                },
                success: function(data) {
                    if (data.hasOwnProperty('message') && data.hasOwnProperty('status')) {
                        if (data.status) {
                            component.messageSimple("Equipos", data.message);
                            component.reload();
                        } else {
                            component.messageSimple("Equipos", data.message, "danger");
                        }
                    }
                }
            });
        }
    };
    component.messageAcept("Equipos", "¿Esta seguro(a) que desea eliminar el jugador del equipo?", func, "danger");
});

$('.aceptar_jugador').on('click', function() {
    var user = parseInt($(this).attr('data-code'));
    var team = parseInt($(this).attr('data-team'));
    if (_.isNumber(user) && _.isNumber(team)) {
        $.ajax({
            type: 'POST',
            url: base_url + '/equipos/aceptarjugador/',
            beforeSend: function() {
                component.popupLoader("Espera...", "Espera un momento mientras se envía la información.");
            },
            data: {
                user: user,
                team: team
            },
            success: function(data) {
                component.popupHtmlHide();
                if (data.hasOwnProperty('message') && data.hasOwnProperty('status')) {
                    if (data.status) {
                        component.messageSimple("Equipos", data.message);
                        component.reload();
                    } else {
                        component.messageSimple("Equipos", data.message, "danger");
                    }
                }
            }
        });
    }
});

$('.rechazar_jugador').on('click', function() {
    var user = parseInt($(this).attr('data-code'));
    var team = parseInt($(this).attr('data-team'));
    if (_.isNumber(user) && _.isNumber(team)) {
        $.ajax({
            type: 'POST',
            url: base_url + '/equipos/rechazarjugador/',
            beforeSend: function() {
                component.popupLoader("Espera...", "Espera un momento mientras se envía la información.");
            },
            data: {
                user: user,
                team: team
            },
            success: function(data) {
                component.popupHtmlHide();
                if (data.hasOwnProperty('message') && data.hasOwnProperty('status')) {
                    if (data.status) {
                        component.messageSimple("Equipos", data.message);
                        component.reload();
                    } else {
                        component.messageSimple("Equipos", data.message, "danger");
                    }
                }
            }
        });
    }
});

function compartirFacebook(url, desc) {
    if (url.indexOf("ttp://") < 0) {
        url = base_url + url;
    }
    window.open('http://www.facebook.com/sharer.php?u=' + encodeURIComponent(url) + '&p[url]=' + encodeURIComponent(url) + '&s=100&p[title]=' + encodeURIComponent(desc) + '&p[summary]=' + encodeURIComponent(desc), 'sharer', 'toolbar=0,status=0,width=800,height=600');
    return false;
}

function compartirTwitter(url, desc) {
    if (url.indexOf("ttp://") < 0) {
        url = base_url + url;
    }
    var t = encodeURIComponent(desc + url);
    window.open('http://twitter.com/intent/tweet?source=webclient&text=' + t, 'sharer', 'toolbar=0,status=0,width=626,height=436');
    return false;
}

$("#btn_facebook").on('click', function() {
    compartirFacebook("http://www.toquela.com/equipos/perfil-equipo/" + $(this).attr("data-code"), "Tóquela");
});

$("#btn_twitter").on('click', function() {
    compartirTwitter("http://www.toquela.com/equipos/perfil-equipo/" + $(this).attr("data-code"), "Tóquela ");
});

$("#send_message").on('click', function(event) {

    event.preventDefault();

    var your_name = $("#your_name").val();
    var your_email = $("#your_email").val();
    var emails = $("#email_friends").val();
    var subject = $("#subject").val();
    var message = $("#message").val();

    if (!_.isEmpty(your_email) && !_.isEmpty(your_name) && !_.isEmpty(emails) && !_.isEmpty(subject) && !_.isEmpty(message)) {
        if (validateEmail(your_email) && validateEmail(emails)) {

            $.ajax({
                type: 'POST',
                url: base_url + '/equipos/email/',
                data: {
                    'your_name': your_name,
                    'your_email': your_email,
                    'emails': emails,
                    'subject': subject,
                    'message': message
                },
                success: function(data) {
                    if (data.hasOwnProperty('message')) {
                        alert(data.message);
                    }
                }
            });
        } else {
            alert("Los correos electronicos no son validos.");
        }
    } else {
        alert("Todos los campos son obligatorios.");
    }
});

function validateEmail(email) {
    var expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return expr.test(email);
}


});
