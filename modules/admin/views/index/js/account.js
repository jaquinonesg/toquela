$(function() {
    $("#change_password").on('click', function() {
        var password1 = $("#password1").val();
        var password2 = $("#password2").val();
        var code = parseInt($(this).attr('data-code'));

        

        if (!_.isEmpty(password1) && !_.isEmpty(password2) && _.isNumber(code)) {
            if (_.isEqual(password1, password2)) {
                $.ajax({
                    type: 'POST',
                    url: base_url + '/administrador-canchas/index/changepassword/',
                    data: {
                        password1: password1,
                        password2: password2,
                        code: code
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
            } else {
                alert("Las contraseñas no coinciden.");
            }
        } else {
            alert("Debe completar los dos campos.");
        }
    });
});