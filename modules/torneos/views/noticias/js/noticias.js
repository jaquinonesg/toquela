$(document).ready(function(){
    $('#contend-ver-noticias').hide();

    $('.prioridad').click(function(){
        var curr = $(this);
        if(curr.is(':checked')){
            check(curr.val());
        }else{
            uncheck(curr.val());
        }
    });
    
    $('#pes_nueva_noticia').click(function(){
        $('.pesta').removeClass('active');
        $('#pes_nueva_noticia').addClass('active');
        $('#contend-ver-noticias').hide();
        $('#contend-nueva-noticia').show('slow');
    });
    
    $('#pes_ver_noticias').click(function(){
        console.log('ver noticias');
        $('.pesta').removeClass('active');
        $('#pes_ver_noticias').addClass('active');
        $('#contend-nueva-noticia').hide();
        $('#contend-ver-noticias').show('slow');
    });
    
    /**icono de ayuda slides*/
    $('#ayuda').mouseenter(function(){
        console.log('hola que hace');
        var helpbox = $(this).children('.helpbox');
        helpbox.show('fast').delay(3000).hide('normal');

    });
    /**
     * Validacion campos formulario Nueva noticia
     */
    $('#btn-nueva-noticia').click(function(){

        var titulo = $('#titulo').val();
        var resumen = $('#resumen').val();
        var noticia = $('#noticia').val();

        var se_puede_enviar = true;
        $('.form-group').removeClass('has-error');
        //Titulo obligatorio
        if( titulo == ''){
            $('#titulo').parent().parent().addClass('has-error');
            se_puede_enviar = false;
        }
        /*
        //resumen obligartorio
        if( resumen == ''){
            $('#resumen').parent().parent().addClass('has-error');
            se_puede_enviar = false;
        }
        //contenido obligatorio
        if( noticia == ''){
            $('#noticia').parent().parent().addClass('has-error');
            se_puede_enviar = false;
        }
        */
        if(se_puede_enviar)
            enviar_formulario();
        return false;

    });
    /**
     * Boton Borrar noticia
     */
    $('.btn-borrar').click(function(){
        var t = $(this);
        t.addClass('ajaxActive');
        component.messageAcept('...', '¿Desea borrar la publicación?', function(){ borrar_noticia( t.val() ); });
        return false;
    });


    /**
     * Herramienta para cortar imagen 
     * http://www.croppic.net/
    var cropperHeader;

    var cropperOptions = {
        uploadUrl: base_url + "/torneos/Noticias/saveimg/" + $('#codigo_torneo').val(),
        cropUrl: base_url + "/torneos/Noticias/cutImg/" + $('#codigo_torneo').val(),
        modal: true,
        imgEyecandyOpacity:0.5,
        processInline:true,
        loaderHtml: '<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div>',
        onBeforeImgUpload: function(){ 
            console.log('onBeforeImgUpload');
        },
        onAfterImgUpload: function(){ console.log('onAfterImgUpload') },
        onImgDrag: function(){ 
            console.log('onImgDrag');
        },
        onImgZoom: function(){ 
            console.log('onImgZoom');
        },
        onBeforeImgCrop: function(){ 
            console.log('onBeforeImgCrop') 
        },
        onAfterImgCrop:function(){ 
            console.log('onAfterImgCrop');
            $('.cropControlsUpload').hide();
        },
        onError:function(errormessage){ 
            console.log('onError:'+errormessage) 
        }
    };
    cropperHeader = new Croppic('upload-img', cropperOptions);
    */
   
    $("#subir_imagen").change(function(){
        formatos = {
            'jpeg': true,
            'jpg': true,
            'png': true,
            'gif': true
        }
        ext = $(this).val().split('.');
        ext = ext[ext.length - 1];
        if(formatos[ext] === undefined)
            component.messageSimple("Error:"," Archivo no valido solo archivos de imagen");
        else{
            archivo($(this),5, $('#codigo_torneo').val())
        }
        return false;
    });
    
});

function borrar_noticia(id){
    $.ajax({
        dataType: "json",
        url: base_url + "/torneos/Noticias/ borrarNoticia/" + id,
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
function enviar_formulario(){
    $.ajax({
        type: 'POST',
        url: base_url + "/torneos/Noticias/setNoticia/" + $('#codigo_torneo').val(),
        data: $('#noticia_formulario').serialize(),
        success:function(data){
                    component.messageAcept("Success", 'Noticia Publicada', function(){location.reload(true);});
                }
    });
};
function check(id){
    /**priorizar*/
    console.log('Despriorizar ' + id);
    $.ajax({
        dataType: "json",
        async: true,
        type: 'POST',
        url: base_url + '/noticias/priorizarTorneo/' + id,
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
        url: base_url + '/noticias/despriorizarTorneo/' + id,
        success: function(succesData){
        },
        timeout: 10000,
        error: function() {
            alert(false, 'Surgió un error en la conexión por favor inténtelo de nuevo');
        }
    });
}
function archivo(elemento, num_megas_validos, torneo) {
        var num_bytes_validate = (num_megas_validos * 1024) * 1024;
        var $mensage = $('#avisos p');
        if (elemento.val() === "") {
            $mensage.text("el archivo no existe");
        }

        if (elemento[0].files[0].size <= num_bytes_validate) {
            var myData = new FormData();

            jQuery.each(elemento[0].files, function(i, file) {
                myData.append('imagen', file);
            });
            var cod_team = $('#codigo_equipo').val();
            var opciones = {
                dataType: "json",
                url: base_url + '/torneos/noticias/subirImg/' + torneo,
                type: "POST",
                cache: false,
                contentType: false,
                processData: false,
                data: myData,
                beforeSend: function() {
                    component.popupLoader("", "Espera un momento mientras sube la imagen");
                },
                success: function(dataSuccess) {
                    component.popupHtmlHide();
                    switch(dataSuccess.estado){
                        case 'correcto':
                            img = $('#imagen');
                            img.empty();
                            img.html('<img src="'+ base_url +  dataSuccess.url_img +'" class="img-responsive" alt="'+ dataSuccess.nombre_orig +'" />');
                            break;
                        case 'error':
                            messageSimple("Error",dataSuccess.msg,"danger");
                            break;
                        default:
                            messageSimple("Error",'Ha ocurrido un error inseperado</span>',"warnig");
                            break;
                    }
                    console.log(dataSuccess);
                },
                error: function(obj) {
                    component.popupHtmlHide();
                    component.messageSimple("Error",'<span style="color: black">Ha ocurrido un error, intente de nuevo</span><br>server msg: ' + obj.responseText,"danger");
                    console.log(obj);
                }
            };

            $.ajax(opciones);

        } else {
            return false;
        }
    }
/**JS MODULES*/
