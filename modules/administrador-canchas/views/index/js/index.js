$(function() {
    $(".date").datepicker({'altFormat': "yy-mm-dd"});


    $("#view_results").on('click', function() {
        var start = $("#date_start").val();
        var end = $("#date_end").val();
        var complex = parseInt($(this).attr('data-code'));

        if (!_.isEmpty(start) && !_.isEmpty(end)) {
            $.ajax({
                type: 'POST',
                url: base_url + '/administrador-canchas/index/changeresults/',
                data: {
                    'start': start,
                    'end': end,
                    'complex': complex
                },
                success: function(data) {
                    if (data.hasOwnProperty('status')) {
                        if (data.status) {
                            if (data.hasOwnProperty('canal1') && data.hasOwnProperty('canal2')) {
                                console.log(data);
                                $("#canal1").width(data.canal1.porcentaje + '%').find('div').text((data.canal1.porcentaje).toFixed(2) + '%');
                                $("#canal2").width(data.canal2.porcentaje + '%').find('div').text((data.canal2.porcentaje).toFixed(2) + '%');
                                $("#canal3").find('div').text("$ " + (data.canal2.total).toFixed(2));
                            }
                        } else {
                            alert(data.message);
                        }
                    }
                }
            });
        } else {
            alert("Las fechas no pueden estar vacias.");
        }

    });


});