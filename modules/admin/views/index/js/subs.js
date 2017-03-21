$(function() {
    $("#create").on('click', function() {
        var name = $("#name").val();
        var code = parseInt($(this).attr('data-code'));
        if (!_.isEmpty(name) && _.isNumber(code)) {
            $.ajax({
                type: 'POST',
                url: base_url + '/administrador-canchas/index/createsub/',
                data: {
                    'name': name,
                    'code': code
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
            alert("El nombre es obligatorio.");
        }
    });

    $("#update").on('click', function() {
        var sub = parseInt($(this).attr('data-code'));
        var name = $("#name").val();
        if (_.isNumber(sub) && !_.isEmpty(name)) {
            $.ajax({
                type: 'POST',
                url: base_url + '/administrador-canchas/index/updatesub/',
                data: {
                    'name': name,
                    'code': sub
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
    });

    $(".delete_sub").on('click', function() {
        var code = parseInt($(this).attr('data-code'));
        if (_.isNumber(code)) {
            if (confirm("¿ Esta seguro(a) que desea eliminar la cancha ?")) {
                $.ajax({
                    type: 'POST',
                    url: base_url + '/administrador-canchas/index/deletesub/',
                    data: {
                        'code': code
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

});