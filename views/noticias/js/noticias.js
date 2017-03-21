$(document).ready(function(){
	$('.prioridad').click(function(){
		var curr = $(this);
		if(curr.is(':checked')){
			check(curr.val());
		}else{
			uncheck(curr.val());
		}
	});
    $('.publico').click(function(){
        var curr = $(this);
        if(curr.is(':checked')){
            publicar(curr.val());
        }else{
            noPublicar(curr.val());
        }
    });
    $('.ayuda').mouseenter(function(){
        var helpbox = $(this).children('.helpbox');
        helpbox.show('fast');
        $(this).mouseleave(function(){
            helpbox.hide('normal');
        });
    });
    $('.btn-borrar').click(function(){
        var t = $(this);
        t.addClass('ajaxActive');
        component.messageAcept('...', '¿Desea borrar la publicación?', function(){ borrar_noticia( t.val() ); });
        return false;
    });
});

/**Funciones*/
    function check(id){
    	/**priorizar*/
    	$.ajax({
            dataType: "json",
            async: true,
            type: 'POST',
            url: base_url + '/noticias/priorizar/' + id,
            success: function(succesData) {
            },
            timeout: 10000,
            error: function() {
                alert(false, 'Surgió un error en la conexión por favor inténtelo de nuevo');
            }
        });
    }
    function uncheck(id){
    	/**priorizar*/
    	$.ajax({
            dataType: "json",
            async: true,
            type: 'POST',
            url: base_url + '/noticias/despriorizar/' + id,
            success: function(succesData) {
            },
            timeout: 10000,
            error: function() {
                alert(false, 'Surgió un error en la conexión por favor inténtelo de nuevo');
            }
        });
    }
    function publicar(id){
        /**priorizar*/
        $.ajax({
            dataType: "json",
            async: true,
            type: 'POST',
            url: base_url + '/noticias/publicar/' + id,
            success: function(succesData) {
            },
            timeout: 10000,
            error: function() {
                alert(false, 'Surgió un error en la conexión por favor inténtelo de nuevo');
            }
        });
    }
    function noPublicar(id){
        /**priorizar*/
        $.ajax({
            dataType: "json",
            async: true,
            type: 'POST',
            url: base_url + '/noticias/noPublicar/' + id,
            success: function(succesData) {
            },
            timeout: 10000,
            error: function() {
                alert(false, 'Surgió un error en la conexión por favor inténtelo de nuevo');
            }
        });
    }
    function borrar_noticia(id){
        $.ajax({
            dataType: "json",
            url: base_url + "/torneos/Noticias/borrarNoticia/" + id,
            success:function(data){
                switch(data.resp ){
                    case 'fail':
                        $('.ajaxActive').removeClass('ajaxActive');
                        component.messageSimple('Fail','El mensaje no pudo ser eliminado o no existe');
                        break;
                    case 'success':
                        $('.ajaxActive').parent().parent().remove();
                        break;
                }
            },
            error: function () {
                Component.messageSimple('Fail','Hubo un fallo en la conexión');
            }
        });
    };
