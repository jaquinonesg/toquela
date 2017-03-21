//XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
var aux_cali = "";
//XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
$(document).ready(
        function() {
            init();
            //---------------------------------------------------------------
            $(document).on('click', '#btn_califica', function() {
                getFormCalificacion();
            });
            //---------------------------------------------------------------
            $(document).on('click', '#btn_enviar_califi', function() {
                if (validaCalificacion()) {
                    $('#frm_califica').submit();
                    $('#btn_enviar_califi').attr("disabled", "disabled");
                }
            });


        });

function init() {
    $('.expe').raty({
        path: base_url + "/public/img/img_raty",
        number: 6,
        hints: ['1', '2', '3', '4', '5', '6'],
        score: function() {
            return $(this).attr('score');
        },
        readOnly: true
    });
    $('.inst').raty({
        path: base_url + "/public/img/img_raty",
        number: 6,
        hints: ['1', '2', '3', '4', '5', '6'],
        score: function() {
            return $(this).attr('score');
        },
        readOnly: true
    });
    $(".popup").fancybox({
        'scrolling': 'no',
        'titleShow': false,
        'transitionIn': 'elastic',
        'transitionOut': 'elastic',
        'easingIn': 'easeOutBack',
        'easingOut': 'easeInBack',
        'onClosed': function() {
            $("#login_error").hide();
        }
    });

    $('.iosSlider').iosSlider({
        desktopClickDrag: true,
        snapToChildren: true,
        infiniteSlider: true,
        snapSlideCenter: true,
        navPrevSelector: '.sliderContainer .prev',
        navNextSelector: '.sliderContainer .next',
        autoSlide: true,
        scrollbar: true,
        scrollbarMargin: '0',
        scrollbarBorderRadius: '0',
        keyboardControls: true
    });
}


function getFormCalificacion() {
    $('.expe_cali').raty({
        path: base_url + "/public/img/img_raty",
        number: 6,
        hints: ['1', '2', '3', '4', '5', '6'],
        click: function(score, evt) {
            $('#expe_hid_' + getCodeCalifi($(this).attr('id'), "expe_cali_")).val($(this).attr('alt') + "," + score);
        }
    });
    $('.inst_cali').raty({
        path: base_url + "/public/img/img_raty",
        number: 6,
        hints: ['1', '2', '3', '4', '5', '6'],
        click: function(score, evt) {
            $('#inst_hid_' + getCodeCalifi($(this).attr('id'), "inst_cali_")).val($(this).attr('alt') + "," + score);
        }
    });
}

function validaCalificacion() {
    $('#msg_califi').html('')
    var num_expe = $('#num_expe').val();
    for (var a = 0; a < num_expe; a++) {
        if ($('#expe_hid_' + a).val() == "") {
            msgCalifica("Falta calificar la opción: " + $('#expe_hid_' + a).attr('altname') + " de Experiencia de juego.", '#expe_cali_' + a);
            return false;
        }
    }
    var num_inst = $('#num_inst').val();
    for (var b = 0; b < num_inst; b++) {
        if ($('#inst_hid_' + b).val() == "") {
            msgCalifica("Falta calificar la opción: " + $('#inst_hid_' + b).attr('altname') + " de Instalaciones y servicios.", '#inst_cali_' + b);
            return false;
        }
    }
    return true;
}

function msgCalifica(text, id_resalta) {
    $(aux_cali).removeClass('resalta_cali');
    $('#msg_califi').html('<div class="format_msg">' + text + '</div>');
    $(id_resalta).addClass('resalta_cali');
    aux_cali = id_resalta;
}

function getCodeCalifi(id_text, sepuesto) {
    var code = parseInt(id_text.replace(sepuesto, ""));
    return code;
}