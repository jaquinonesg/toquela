$(function() {
    $("#create_complex").on('click', function() {
        var name_complex = $("#name_complex").val();
        var name_admin = $("#name_admin").val();
        var description = $("#description").val();
        var email = $("#email").val();
        var password = $("#password").val();
        var phone = $("#phone").val();
        var address = $("#address").val();

        if (!_.isEmpty(description) && !_.isEmpty(name_complex) && !_.isEmpty(name_admin) && !_.isEmpty(email) && !_.isEmpty(password) && !_.isEmpty(phone) && !_.isEmpty(address)) {
            $.ajax({
                type: 'POST',
                url: base_url + '/administrador-canchas/toquela/createcomplex/',
                data: {
                    'name_complex': name_complex,
                    'name_admin': name_admin,
                    'description': description,
                    'email': email,
                    'password': password,
                    'phone': phone,
                    'address': address
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
            alert("Todos los campos son obligatorios.");
        }

    });


    $(".delete_complex").on('click', function() {
        var code = parseInt($(this).attr('data-code'));

        if (confirm("¿ Esta seguro(a) que desea eliminar el complejo ?")) {
            if (_.isNumber(code)) {
                $.ajax({
                    type: 'POST',
                    url: base_url + '/administrador-canchas/toquela/deletetoquela/',
                    data: {
                        'code': code
                    },
                    success: function(data) {
                        console.log(data);
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

});
