$(document).ready(function() {
    init_funtions();
    //---------------------------------------------------
    $(document).on('click', '#_btn_ingresar', function() {
        component.popupForm("Inicio de Sesión", "_init_session_user_template");
    });
    //---------------------------------------------------
    $(document).on('click', '#_btn_register', function() {
        loadPopupRegister();
    });
    //---------------------------------------------------
    $(document).on('click', '.no_dispon', function() {
        component.messageSimple("En construcción", "Esta sección no está disponible en este momento...");
    });
});

//XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
function init_funtions() {
    initPrevia();
    $('.carousel').carousel({
        interval: 4000
    });
    var op = new OlvidePass();
}

function initPrevia() {
    $("a.previa").fancybox({
        'titleShow': false,
        'transitionIn': 'elastic',
        'transitionOut': 'elastic',
        'easingIn': 'easeOutBack',
        'easingOut': 'easeInBack'
    });
}

function loadPopupRegister() {
    component.popupForm("Resgistrate", "_register_template");
}

function isURLyoutube(url) {
    var regex = /^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#\&\?]*).*/;
    return regex.test(url);
}

var OlvidePass = (function() {
    function OlvidePass() {
        this.unique_process = true;
        this.events();
    }
    OlvidePass.prototype.events = function() {
        var _self = this;
        $(document).on('click', '#_olvide_pass', function() {
            var val_email = $("#_txt_user_email").val();
            if (_self.validate(val_email)) {
                if (_self.unique_process) {
                    _self.sendAndValidate(val_email);
                    _self.unique_process = false;
                }
            }
        });
    };

    OlvidePass.prototype.validate = function(email) {
        if (validate.isEmpty(email)) {
            component.alertComponent("Por favor ingrese el correo electrónico de la cuenta que desea recuperar.", "msg_init_session", "danger");
            return false;
        }
        if (!validate.isEmail(email)) {
            component.alertComponent("Por favor ingrese un correo electrónico valido.", "msg_init_session", "danger");
            return false;
        }
        return true;
    };

    OlvidePass.prototype.sendAndValidate = function(email) {
        var _self = this;
        $.ajax({
            type: 'POST',
            url: base_url + '/login/passrecovery',
            data: {'email': email},
            beforeSend: function() {
                component.alertComponent("Espere un momento mientras se procesa la información.", "msg_init_session", "loader");
            },
            success: function(data) {
                if (data.hasOwnProperty("message") && data.hasOwnProperty("status")) {
                    if (data.status) {
                        component.alertComponent(data.message, "msg_init_session", "success");
                    } else {
                        component.alertComponent(data.message, "msg_init_session", "alert");
                        _self.unique_process = true;
                    }
                }
            }
        });
    };

    return OlvidePass;
})();





