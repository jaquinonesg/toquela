$(function() {

    $("#send").on('click', function() {
        var email = $("#email").val();
        var password = $("#password").val();

        if (!_.isEmpty(email) && !_.isEmpty(password)) {
            $.ajax({
                type: 'POST',
                url: base_url + '/administrador-canchas/login/validate/',
                data: {
                    'email': email,
                    'password': password
                },
                success: function(data) {
                    if (data.hasOwnProperty('status')) {
                        if (data.status) {
                            console.log(data.path);
                            window.location.href = data.path;
                        } else {
                            alert(data.message);
                        }
                    }
                }
            });
        }
    });


});