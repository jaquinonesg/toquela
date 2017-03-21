if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
    var msViewportStyle = document.createElement("style");
    msViewportStyle.appendChild(document.createTextNode("@-ms-viewport{width:auto!important}"));
    document.getElementsByTagName("head")[0].appendChild(msViewportStyle);
}

var validate = null;
var component = null;
//XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX

$(document).ready(function() {
    init_default();
});

$.fn.scrollTo = function(target, options, callback) {
    if (typeof options == 'function' && arguments.length == 2) {
        callback = options;
        options = target;
    }
    var settings = $.extend({
        scrollTarget: target,
        offsetTop: 50,
        duration: 500,
        easing: 'swing'
    }, options);
    return this.each(function() {
        var scrollPane = $(this);
        var scrollTarget = (typeof settings.scrollTarget == "number") ? settings.scrollTarget : $(settings.scrollTarget);
        var scrollY = (typeof scrollTarget == "number") ? scrollTarget : scrollTarget.offset().top + scrollPane.scrollTop() - parseInt(settings.offsetTop);
        scrollPane.animate({scrollTop: scrollY}, parseInt(settings.duration), settings.easing, function() {
            if (typeof callback == 'function') {
                callback.call(this);
            }
        });
    });
};

//XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
function init_default() {
    validate = new Validate();
    component = new Component();
}

//****************************VALIDATE DEFAULT***********************************
var Validate = function() {
    //--------------------------------------------------
    this.isNumeric = function(expression) {
        //return (String(expression).search(/^\d+$/) != -1);
        return (String(expression).search(/^-?\d*\.?\d*$/) != -1);
    };

    //---------------------------------------------------
    this.isEmpty = function(expression) {
        if ((expression == "") || (expression == null) || (expression == undefined)) {
            return true;
        }
        return false;
    };

    //---------------------------------------------------
    this.isDecimal = function(expression) {
        return (String(expression).search(/^\d+(\.\d+)?$/) != -1);
    };

    //---------------------------------------------------
    this.isInteger = function(value) {
        if (value == " ") {
            return false;
        }
        return value % 1 === 0;
    };

    //---------------------------------------------------
    this.isEmail = function(email) {
        var regex = /^(([a-zA-Z0-9._-])||([a-zA-Z0-9._-]+\/))+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
        return regex.test(email);
    };

    //--------------------------------------------------------
    this.validateExtencionesImg = function(valor) {
        var extenciones = ['.jpeg', '.png', '.jpg', '.gif', '.JPEG', '.PNG', '.JPG', '.GIF'];
        for (var a = 0; a < extenciones.length; a++) {
            if (this.getExtencion(valor) == extenciones[a]) {
                return true;
            }
        }
        return false;
    };

    //--------------------------------------------------------
    /*
     * implementacion sobre el input en el html se agrega:
     * onkeypress="validate.validateInsertNumeric()"
     * 
     */
    this.validateInsertNumeric = function() {
        if ((event.keyCode < 48) || (event.keyCode > 57)) {
            event.returnValue = false;
        }
        return true;
    };

    //---------------------------------------------------------
    this.isFunction = function(functionToCheck) {
        var getType = {};
        return functionToCheck && getType.toString.call(functionToCheck) === '[object Function]';
    };

    //---------------------------------------------------------
    this.getExtencion = function(value) {
        var index = value.lastIndexOf(".");
        return (index < 0) ? '' : (value.substring(index)).toLowerCase();
    };


};

//****************************COMPONENT DEFAULT***********************************
var Component = function() {
    var base = this;
    this.btn_close = true;
    //---------------------------------------------------
    this.alertComponent = function(text, id_element_msg, panel) {
        var element = null;
        if ($("#" + id_element_msg).length) {
            element = $("#" + id_element_msg);
        } else {
            alert("El elemento con el id: " + id_element_msg + " no exite...");
            return false;
        }
        element.html("");
        var class_panel = "";
        var icon = "";
        var is_loader = false;
        switch (panel) {
            case "linkgray":
                class_panel = "alert-linkgray";
                icon = "glyphicon-link";
                break;
            case "success":
                class_panel = "alert-success";
                icon = "glyphicon-ok-circle";
                break;
            case "info":
                class_panel = "alert-info";
                icon = "glyphicon-info-sign";
                break;
            case "warning":
                class_panel = "alert-warning";
                icon = "glyphicon-warning-sign";
                break;
            case "danger":
                class_panel = "alert-danger";
                icon = "glyphicon-ban-circle";
                break;
            case "dismissable":
                class_panel = "alert-dismissable";
                icon = "glyphicon-minus";
                break;
            case "loader":
                class_panel = "alert-dismissable";
                is_loader = true;
                break;
            default:
                class_panel = "alert-default";
                icon = "glyphicon-hand-right";
                break;
        }
        if (text == "") {
            text = "Alerta....";
        }
        if (is_loader) {
            if (!validate.isEmpty(text)) {
                element.html('<div class="alert ' + class_panel + '"><img class="loader-small" src="' + base_url + '/public/img/loader.gif"/> &nbsp;' + text + '</div>');
            } else {
                element.html('<div class="alert ' + class_panel + ' text-center"><img class="loader-small" src="' + base_url + '/public/img/loader.gif"/></div>');
            }
        } else {
            element.html('<div class="alert ' + class_panel + '"><span class="glyphicon ' + icon + '"></span> &nbsp;' + text + '</div>');
        }
        //$("body").scrollTo("#_my_scroll");
        element.vibrate('x', 5, 8, 50);
        class_panel = null;
        element = null;
        text = null;
        return true;
    };

    //---------------------------------------------------
    this.id_message_simple = '#_message_simple';
    this.messageSimple = function(titulo, texto, panel) {
        this.btn_close = true;
        var modal_message = null;
        var modal_template = this.uncommentHtml($('#_message_simple_template').html());
        var modal_contend = $("#_message_simple_contend");
        modal_contend.html("");
        var class_panel = "";
        var class_btn = "";
        switch (panel) {
            case "primary":
                class_panel = "modal-primary";
                class_btn = "btn-primary";
                break;
            case "success":
                class_panel = "modal-success";
                class_btn = "btn-success";
                break;
            case "info":
                class_panel = "modal-info";
                class_btn = "btn-info";
                break;
            case "warning":
                class_panel = "modal-warning";
                class_btn = "btn-warning";
                break;
            case "danger":
                class_panel = "modal-danger";
                class_btn = "btn-danger";
                break;
            default:
                class_panel = "modal-default";
                class_btn = "btn-default";
                break;
        }
        modal_template = modal_template.replace("[CLASS_MODAL]", class_panel);
        modal_template = modal_template.replace("[TITULO]", titulo);
        modal_template = modal_template.replace("[TEXTO]", texto);
        modal_template = modal_template.replace("[CLASS_BTN]", class_btn);
        modal_contend.html(modal_template);
        modal_message = $(this.id_message_simple);
        modal_message.modal('show');
        $(document).on('click', '#_btn_aceptar', function() {
            modal_message.modal('hide');
        });
        class_panel = null;
        class_btn = null;
        modal_template = null;
        return true;
    };

    //---------------------------------------------------
    this.messageSimpleHide = function() {
        $(this.id_message_simple).modal('hide');
    };

    //---------------------------------------------------
    this.messageAcept = function(titulo, texto, method, panel) {
        this.btn_close = true;
        var one = true;
        var id_body_message_acept = "_body_message_acept";
        var id_footer_message_acept = "_footer_message_acept";
        if (!validate.isFunction(method)) {
            alert("Debe pasar como parámetro una función que se ejecutará cuando de aceptar...");
            return false;
        }
        this.popupHtml(titulo, id_body_message_acept, id_footer_message_acept, false, panel, texto);
        $(document).on('click', '#_btn_aceptar_message_acept', function() {
            if (one) {
                base.popupHtmlHide();
                method();
                one = false;
            }
        });
        $(document).on('click', '#_btn_cancel_message_acept', function() {
            if (one) {
                base.popupHtmlHide();
                one = false;
            }
        });
        return true;
    };

    //---------------------------------------------------
    /*
     * implementacion sobre el input en el html se agrega:
     * onkeypress="component.toltipMaxSizeInputText()"
     * 
     */
    this.toltipMaxSizeInputText = function() {
        var element = $("#" + event.target.id);
        var max = parseInt(element.attr("maxlength"));
        if (element.val().length >= max) {
            alert("este no puede superar" + max);
        }
    };

    //---------------------------------------------------
    this.popupLoader = function(titulo, texto, panel) {
        this.btn_close = false;
        var id_body_poup_loader = "_body_popup_loader";
        this.popupHtml(titulo, id_body_poup_loader, "", false, panel, texto);
        return true;
    };

    //---------------------------------------------------
    this.popupForm = function(titulo, id_template, panel) {
        var modal_template = this.uncommentHtml($('#_popup_formulario_template').html());
        var modal_contend = $("#_popup_formulario_contend");
        var id_popup = "#_popup_formulario";
        var class_panel = "";
        modal_contend.html("");
        switch (panel) {
            case "primary":
                class_panel = "modal-primary";
                break;
            case "success":
                class_panel = "modal-success";
                break;
            case "info":
                class_panel = "modal-info";
                break;
            case "warning":
                class_panel = "modal-warning";
                break;
            case "danger":
                class_panel = "modal-danger";
                break;
            default:
                class_panel = "modal-default";
                break;
        }
        var modal_form = null;
        if ($("#" + id_template).length) {
            modal_template = modal_template.replace("[CLASS_MODAL]", class_panel);
            modal_template = modal_template.replace("[TITULO]", titulo);
            modal_template = modal_template.replace("[HTML]", this.uncommentHtml($("#" + id_template).html()));
            modal_contend.html(modal_template);
            modal_form = $(id_popup);
        } else {
            modal_template = modal_template.replace("[CLASS_MODAL]", class_panel);
            modal_template = modal_template.replace("[TITULO]", titulo);
            modal_template = modal_template.replace("[HTML]", "El identificador del contenido no existe...");
            modal_contend.html(modal_template);
            modal_form = $(id_popup);
            modal_form.modal('show');
            class_panel = null;
            modal_template = null;
            return false;
        }
        modal_form.modal('show');
        class_panel = null;
        modal_template = null;
        this.btn_close = true;
        return true;
    };

    //---------------------------------------------------
    this.id_popup_html = "#_popup_html_big";
    this.popupHtml = function(titulo, id_template_body, id_template_footer, popup_big, panel, texto) {
        //funcion o evento para cerrar el popup: $('#_popup_html_big').modal('hide')
        var modal_template = this.uncommentHtml($('#_popup_html_big_template').html());
        var modal_contend = $("#_popup_html_big_contend");
        var class_panel = "";
        var class_btn = "";
        modal_contend.html("");
        switch (panel) {
            case "primary":
                class_panel = "modal-primary";
                class_btn = "btn-primary";
                break;
            case "success":
                class_panel = "modal-success";
                class_btn = "btn-success";
                break;
            case "info":
                class_panel = "modal-info";
                class_btn = "btn-info";
                break;
            case "warning":
                class_panel = "modal-warning";
                class_btn = "btn-warning";
                break;
            case "danger":
                class_panel = "modal-danger";
                class_btn = "btn-danger";
                break;
            default:
                class_panel = "modal-default";
                class_btn = "btn-default";
                break;
        }
        var modal_form = null;
        if ($("#" + id_template_body).length) {
            modal_template = modal_template.replace("[CLASS_MODAL]", class_panel);
            if (popup_big) {
                modal_template = modal_template.replace("[CLASS_TAMANO]", "modal-dialog-big");
            } else {
                modal_template = modal_template.replace("[CLASS_TAMANO]", "modal-dialog");
            }
            modal_template = modal_template.replace("[TITULO]", titulo);
            if (this.btn_close) {
                modal_template = modal_template.replace("[BUTTONCLOSE]", '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>');
            } else {
                modal_template = modal_template.replace("[BUTTONCLOSE]", '');
            }
            modal_template = modal_template.replace("[BODY]", this.uncommentHtml($("#" + id_template_body).html()));
            if ((id_template_footer != "")) {
                if ($("#" + id_template_body).length) {
                    modal_template = modal_template.replace("[FOOTER]", '<div class="modal-footer">' + this.uncommentHtml($("#" + id_template_footer).html()) + '</div>');
                } else {
                    alert("El identificador del footer no existe...");
                    return false;
                }
            } else {
                modal_template = modal_template.replace("[FOOTER]", "");
            }
            if (texto != undefined) {
                modal_template = modal_template.replace("[TEXTO]", texto);
                modal_template = modal_template.replace("[CLASS_BTN]", class_btn);
                modal_template = modal_template.replace("[CLASS_BTN]", class_btn);
            }
            modal_contend.html(modal_template);
            modal_form = $(this.id_popup_html);
        } else {
            alert("El identificador del body no existe...");
            return false;
        }
        modal_form.modal({
            keyboard: false,
            backdrop: 'static'
        });
        class_panel = null;
        modal_template = null;
        this.btn_close = true;
        return true;
    };

    this.popupHtmlHide = function() {
        $(this.id_popup_html).modal('hide');
    };

    //---------------------------------------------------
    this.uncommentHtml = function(str) {
        str = this.replaceAll("<!--", "<", str);
        str = this.replaceAll("-->", ">", str);
        return str;
    };

    //---------------------------------------------------
    this.commentHtml = function(element) {
        //no se ha terminado...
    };

    //---------------------------------------------------
    this.replaceAll = function(find, replace, str) {
        return str.replace(new RegExp(find, 'g'), replace);
    };

    //----------------------------------------------
    this.aux_validate_element_message = "";
    this.validateElementMessage = function(titulo, texto, id_element_validate, if_resalta, panel) {
        if ((id_element_validate == undefined) || (id_element_validate == "")) {
            messageSimple(titulo, texto, panel);
            return true;
        }
        if (if_resalta) {
            $("#" + this.aux_validate_element_message).removeClass('resalta-element');
            messageSimple(titulo, texto, panel);
            $("#" + id_element_validate).addClass('resalta-element');
            $("#" + id_element_validate).focus();
            this.aux_validate_element_message = id_element_validate;
            return true;
        } else {
            messageSimple(titulo, texto, panel);
            $("#" + id_element_validate).focus();
        }
        return true;
    };

//----------------------------------------------
//var _aux_validate_element = "";
    this.validateElementAlert = function(messagem, id_element_msg, id_element_validate, panel) {
//    $("#" + _aux_validate_element).removeClass('resalta-element');
        alertComponent(messagem, id_element_msg, panel);
//    $("#" + id_element_validate).addClass('resalta-element');
        $("#" + id_element_validate).focus();
//    _aux_validate_element = id_element_validate;
    };

    this.parserStrJson = function(id_hid_element) {
        if ($('#' + id_hid_element).length) {
            var obj_joson = JSON && JSON.parse($('#' + id_hid_element).val()) || $.parseJSON($('#' + id_hid_element).val());
            if ((obj_joson == undefined) || (obj_joson == null)) {
                return null;
            }
            return obj_joson;
        }
        return null;
    };

    this.redireccionar = function(URL, time) {
        if (validate.isEmpty(time)) {
            time = 2000;
        }
        setTimeout("location.href='" + URL + "'", time);
    };

    this.reload = function(time) {
        if (validate.isEmpty(time)) {
            time = 2000;
        }
        setTimeout("window.location.reload();", 2000);
    };

    this.replaceStrURL = function(url) {
        url = encodeURI(url);
        if (window.history.replaceState) {
            window.history.replaceState(null, null, url);
            return true;
        } else {
            if (window.history.pushState) {
                window.history.pushState(null, null, url);
                return true;
            }
        }
        return false;
    };

};


