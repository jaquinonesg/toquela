$(function() {
    $('.enviar').on('click', function() {
        var objetivo = $(this).attr('target');
        var txt = $("textarea[name=text_" + objetivo + "]").val();
        var link = $("input[name=link_" + objetivo + "]").val();
        console.log('txt', txt);
        console.log('link', link);
        var properties = {target: objetivo, txt: txt, link: link};
        $('#loading_' + objetivo).show();
        sendFile(base_url + "/administrador/banners/modify", properties, '#image_' + objetivo, function(data) {
            $('#loading_' + objetivo).hide();
            $('#message_' + objetivo).html(data.response);
            $('#message_' + objetivo).show(function() {
                setTimeout(function() {
                    $('#message_' + objetivo).hide();
                }, 1000);
            });
            $("img[preview=image_" + objetivo + "]").attr({src: base_url + "/" + data.img});
            console.log(data);
        });
    });
});