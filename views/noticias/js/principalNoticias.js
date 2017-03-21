$(document).ready(function(){
    $('#btn-ver-mas').click(function(){
        var acultos = $('.oculto');
        if(acultos instanceof Array ) {
            if(aculto.length < 4)
                $('#btn-ver-mas').hide();
            acultos[0].show('slow');
            acultos[1].show('slow');
            acultos[2].show('slow');
            acultos[0].removeClass('oculto');
            acultos[1].removeClass('oculto');
            acultos[2].removeClass('oculto');
        }else{
            $('#btn-ver-mas').hide();
            acultos.show('slow');
            acultos.removeClass('oculto');
        }
        
    });
});