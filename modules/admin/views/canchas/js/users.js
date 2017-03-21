$(function() {

    $("#create_user").on('click', function() {

        var name = $("#name").val();
        var email = $("#email").val();
        var address = $("#address").val();
        var phone = $("#phone").val();
        var password = $("#password").val();
        var complex = parseInt($(this).attr('data-code'));
        var is_user = $("#is_user").is(':checked') ? true : false;
        var is_complex = $("#is_complex").is(':checked') ? true : false;
        var is_diary = $("#is_diary").is(':checked') ? true : false;
        var is_index = $("#is_index").is(':checked') ? true : false;

        if (!_.isEmpty(name) && !_.isEmpty(email) && !_.isEmpty(address) && !_.isEmpty(phone) && !_.isEmpty(password)) {
            if (is_user || is_complex || is_diary || is_index) {
                $.ajax({
                    type: 'POST',
                    url: base_url + '/administrador-canchas/index/createuser/',
                    data: {
                        'name': name,
                        'email': email,
                        'address': address,
                        'phone': phone,
                        'is_user': is_user,
                        'is_complex': is_complex,
                        'is_diary': is_diary,
                        'is_index': is_index,
                        'complex': complex,
                        'password': password
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
                alert("Debe seleccionar al menos un permiso para el usuario.");
            }
        } else {
            alert("Todos los campos son obligatorios");
        }


    });

    $(".delete_user").on('click', function() {
        var code = parseInt($(this).attr('data-code'));
        var complex = parseInt($(this).attr('data-complex'));

        if (_.isNumber(code) && _.isNumber(complex)) {

            if (confirm("¿Esta seguro(a) que desea eliminar el usuario ?")) {
                $.ajax({
                    type: 'POST',
                    url: base_url + '/administrador-canchas/index/deleteuser/',
                    data: {
                        'code': code,
                        'complex': complex
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
        }
    });

    $("#update_user").on('click', function() {
        var name = $("#name").val();
        var address = $("#address").val();
        var phone = $("#phone").val();
        var password = $("#password").val();
        var code = parseInt($(this).attr('data-code'));
        var is_user = $("#is_user").is(':checked') ? true : false;
        var is_complex = $("#is_complex").is(':checked') ? true : false;
        var is_diary = $("#is_diary").is(':checked') ? true : false;
        var is_index = $("#is_index").is(':checked') ? true : false;

        if (!_.isEmpty(name) && !_.isEmpty(address) && !_.isEmpty(phone)) {
            if (is_user || is_complex || is_diary || is_index) {

                var data = {
                    'name': name,
                    'address': address,
                    'phone': phone,
                    'is_user': is_user,
                    'is_complex': is_complex,
                    'is_diary': is_diary,
                    'is_index': is_index,
                    'code': code
                };
                if (!_.isEmpty(password)) {
                    data['password'] = password;
                }

                $.ajax({
                    type: 'POST',
                    url: base_url + '/administrador-canchas/index/updateuser/',
                    data: data,
                    success: function(data) {
                        if (data.hasOwnProperty('message') && data.hasOwnProperty('status')) {
                            alert(data.message);
                            if (data.status) {
                                window.location.href = base_url + '/administrador-canchas/index/usuarios/';
                            }
                        }
                    }
                });
            } else {
                alert("Debe seleccionar al menos un permiso para el usuario.");
            }
        } else {
            alert("Todos los campos son obligatorios, excepto la contraseña.");
        }


    });


});