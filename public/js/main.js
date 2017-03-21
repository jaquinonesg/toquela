$(function() {

    $("ul#Mi-Cancha li").hover(function() {

        $("#Mi-Cancha li .Img-Mi-Cancha .perfil_1").css("background-image", "url('" + base_url + "/public/img/2.png')");
        //$(this).find(".Img-Mi-Cancha").find(".perfil_1").css("background-image", "url('" + base_url + "/public/img/2.png')!important");
        // $(this).find(".Img-Mi-Cancha").find(".perfil_1").css("background","red");

    }, function() {
        
        $("#Mi-Cancha li .Img-Mi-Cancha .perfil_1").css("background-image", "url('" + base_url + "/public/img/Img-Perfil2.png')");




    });
});
