$(document).ready(function() {
    var perfiluser = new PerfilUser();
    perfiluser.init();
});

var PerfilUser = function() {
    var base = this;

    this.init = function() {
        this.events();
    };

    this.events = function() {
        $('select[name=codcity]').on('change', function() {
            base.changecity();
        });
        $(document).on('change', '#sel_codlocality', function() {
            $("#hid_codlocality").val($(this).val());
        });
        $("#_btn_update_perfil").on('click', function() {
            base.validateperfil();
        });
    };

    this.validateperfil = function() {
        $("#form_perfil").submit();
        component.popupLoader("Mi perfil", "Espere un momento mientras se actualiza la información...");
    };

    this.changecity = function() {
        $('select[name=codlocality]').html('<option value="1">Cargando...</option>');
        var codcity = $('select[name=codcity]').val();
        var namecity = $('select[name=codcity] option:selected"').text();
        $("#namecity").val(namecity);
        $.ajax({
            type: "POST",
            cache: false,
            url: base_url + "/dialog/localities/",
            beforeSend: function() {
                $.fancybox.showActivity();
            },
            data: {city: codcity},
            success: function(data) {
                $.fancybox.hideActivity();
                $.fancybox.close();
                $('#contend_localidades').html(data);
                $("#hid_codlocality").val($('#sel_codlocality').val());
            }
        });
    };
};