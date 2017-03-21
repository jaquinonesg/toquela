var RegistroUser = (function() {

    function RegistroUser(id_form_registro) {
        if ($("#" + id_form_registro).length) {
            this.id_form_registro = id_form_registro;
            this.id_alert = "_alert_registro";
            this.events();
        } else {
            alert("No se encontro el formulario de registro...");
        }
    }

    RegistroUser.prototype.events = function() {
        $('#div-captcha').hide();
        var _self = this;
        $(document).on('click', "#" + _self.id_form_registro + " #btn_registrar_usuario", function() {
            if (_self.validateRegistro(false, true)) {
                _self.TerminosCondiciones();
            }
        });
        $("#" + _self.id_form_registro + " input").on('keyup', function(e) {
            if (e.which == 13) {
                e.preventDefault();
                if (_self.validateRegistro(false, true)) {
                    _self.TerminosCondiciones();
                    return;
                }
            }
            if (validate.isNumeric($(this).attr("maxlength"))) {
                var maxlength = parseInt($(this).attr("maxlength"));
                var auxvalue = $(this).val();
                if (auxvalue.length > maxlength) {
                    auxvalue = auxvalue.substr(0, maxlength);
                    $(this).val(auxvalue);
                }
            }
            var todo_lleno = _self.validateRegistro(true);
            if(todo_lleno){
                _self.validateRegistro(true, true);
                $('#div-captcha').fadeIn('slow');
            }
        });
    };

    RegistroUser.prototype.validateRegistro = function(keyup, captcha) {
        var _self = this;
        if (validate.isEmpty($("#" + _self.id_form_registro + " #regis_name").val())) {
            if(!keyup){
                component.alertComponent("Ingrese su(s) nombre(s).", _self.id_alert, "danger");
            }
            return false;
        }
        if (_self.validateSizeInput($("#" + _self.id_form_registro + " #regis_name").val(), parseInt($("#" + _self.id_form_registro + " #regis_name").attr("maxlength")))) {
            if(!keyup){
                component.alertComponent("El nombre no puede superar " + $("#" + _self.id_form_registro + " #regis_name").attr("maxlength") + " caracteres",
                    _self.id_alert,
                    "danger");
            }
            return false;
        }
        if (validate.isEmpty($("#" + _self.id_form_registro + " #regis_lastname").val())) {
            if(!keyup){
                component.alertComponent("Ingrese sus apellidos.", _self.id_alert, "danger");
            }
            return false;
        }
        if (_self.validateSizeInput($("#" + _self.id_form_registro + " #regis_lastname").val(), parseInt($("#" + _self.id_form_registro + " #regis_lastname").attr("maxlength")))) {
            if(!keyup){
                component.alertComponent("El apellido no puede superar " + $("#" + _self.id_form_registro + " #regis_lastname").attr("maxlength") + " caracteres",
                    _self.id_alert,
                    "danger");
            }
            return false;
        }
        if (validate.isEmpty($("#" + _self.id_form_registro + " #regis_email").val())) {
            if(!keyup){
                component.alertComponent("Ingrese su correo electrónico.", _self.id_alert, "danger");
            }
            return false;
        }
        if (!validate.isEmail($("#" + _self.id_form_registro + " #regis_email").val())) {
            if(!keyup){
                component.alertComponent("Ingrese un correo electrónico valido.", _self.id_alert, "danger");
            }
            return false;
        }
        if (validate.isEmpty($("#" + _self.id_form_registro + " #regis_password").val())) {
            if(!keyup){
                component.alertComponent("Ingrese su contraseña.", _self.id_alert, "danger");
            }
            return false;
        }
        if (_self.validateSizeInput($("#" + _self.id_form_registro + " #regis_password").val(), parseInt($("#" + _self.id_form_registro + " #regis_password").attr("maxlength")))) {
            if(!keyup){
                component.alertComponent("La contraseña no puede superar " + $("#" + _self.id_form_registro + " #regis_password").attr("maxlength") + " caracteres",
                    _self.id_alert,
                    "danger");
            }
            return false;
        }
        return true;
    };

    RegistroUser.prototype.validateSizeInput = function(value, size) {
        if (value.length > size) {
            return true;
        }
        return false;
    };

    RegistroUser.prototype.TerminosCondiciones = function() {
        var _self = this;
        component.popupHtml("Términos y condiciones", "_popup_terminos", "", true);
        setTimeout(function() {
            _self.eventsTerminos();
        }, 1000);
    };

    RegistroUser.prototype.eventsTerminos = function() {
        var _self = this;
        $("#container-terminos .btn_aceptar").on('click', function() {
            component.alertComponent("Enviando...", _self.id_alert, "loader");
            component.popupHtmlHide();
            $('#' + _self.id_form_registro).submit();
        });
        $("#container-terminos .btn_cancelar").on('click', function() {
            component.popupHtmlHide();
        });
    };

    return RegistroUser;
})();
